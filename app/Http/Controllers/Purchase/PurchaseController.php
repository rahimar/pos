<?php

namespace App\Http\Controllers\Purchase;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;
use App\Models\User;
use App\Models\Register;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use App\Models\PurchasePayment;

class PurchaseController extends Controller
{
    public function index(){
        $purchases = Purchase::latest()->get();
        return view('admin.purchase.view', compact('purchases'));
    }

    public function create(){
        $registers = Register::where('register_type', 2)->latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $units = Unit::latest()->get();
        return view('admin.purchase.create', compact('brands','registers','categories','units'));
    }


    public function store(Request $request){
       // dd($request);
        $validated = $request->validate([
            'suplier_id' => 'required',
            'purchase_date' => 'required',
            'sub_total' => 'required',
        ]);
       $branchId = 1;
  
        $id = Purchase::insertGetId([
           'supllier_id' => $request->suplier_id,
           'purchase_number' => Str::random(6),
           'purchase_date' => $request->purchase_date,
           'subTotal' => $request->sub_total,
           'vat' => $request->vat_type,
           'vat_amount' => $request->vat_amount,
           'discount' => $request->discount_type,
           'discount_amount' => $request->discount_amount,
           'discount_note' => $request->discount_note,
           'total_amount' => $request->total_payable,
           'payable_amount' => 0,
           'payable_type' => 2,
           'payable_note'     => 1,
           'userId'     => Auth::user()->id,
           'branchId'   =>$branchId,
        ]);

        if(count($request->category_id) > 0){
            for($i = 0; $i < count($request->category_id); $i++){
                $object = new PurchaseDetails();
                $object->purchase_id = $id;
                $object->category_id = $request->category_id[$i];
                $object->product_id = $request->product_id[$i];
                $object->unit_id = $request->unit_id[$i];
                $object->quantity = $request->product_qty[$i];
                $object->rate = $request->rate[$i];
                $object->product_discount = $request->product_discount[$i];
                $object->product_discount_amount = $request->discount[$i];
                $object->product_total_amount = $request->amount[$i];
                $object->userId = Auth::user()->id;
                $object->branchId = $branchId;
                $object->save();
            } 
        }
        PurchasePayment::insert([
            'purchase_id' => $id,
            'payable_amount' => 0,
            'payable_type' => 2,
            'payable_note'     => 1,
            'userId'     => Auth::user()->id,
            'branchId'   =>$branchId,
         ]);

        Log::insert([
           'form_name' => 'Purchase Name Insert',
           'type'      => 'Insert',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/purchaseitems')->with('message', 'Purchase Successfully');
    }

    public function edit($id){
        $purchase = Purchase::findOrFail($id);
        $ppayment = PurchasePayment::where('purchase_id',$id)->first();
        $purchaseDetails = PurchaseDetails::where('purchase_id',$id)->get();
        $registers = Register::where('register_type', 2)->latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $units = Unit::latest()->get();
        return view('admin.purchase.edit', compact('purchase','ppayment','purchaseDetails','registers','brands','categories','units'));
    }

    public function update(Request $request){
        // dd($request);
         $validated = $request->validate([
             'suplier_id' => 'required',
             'purchase_date' => 'required',
             'sub_total' => 'required',
         ]);
        $branchId = 1;
        $id = $request->purchase_id;
        Purchase::findOrFail($id)->update([
            'supllier_id' => $request->suplier_id,
            'purchase_date' => $request->purchase_date,
            'subTotal' => $request->sub_total,
            'vat' => $request->vat_type,
            'vat_amount' => $request->vat_amount,
            'discount' => $request->discount_type,
            'discount_amount' => $request->discount_amount,
            'discount_note' => $request->discount_note,
            'total_amount' => $request->total_payable,
            'payable_amount' => $request->total_paid,
            'payable_type' => 2,
            'payable_note'     => 1,
         ]);
         PurchaseDetails::where('purchase_id', $id)->delete();
         if(count($request->category_id) > 0){
             for($i = 0; $i < count($request->category_id); $i++){
                 $object = new PurchaseDetails();
                 $object->purchase_id = $id;
                 $object->category_id = $request->category_id[$i];
                 $object->product_id = $request->product_id[$i];
                 $object->unit_id = $request->unit_id[$i];
                 $object->quantity = $request->product_qty[$i];
                 $object->rate = $request->rate[$i];
                 $object->product_discount = $request->product_discount[$i];
                 $object->product_discount_amount = $request->discount[$i];
                 $object->product_total_amount = $request->amount[$i];
                 $object->userId = Auth::user()->id;
                 $object->branchId = $branchId;
                 $object->save();
             } 
         }

         PurchasePayment::where('purchase_id', $id)->update([
            
            'payable_amount' => $request->total_paid,
            'payable_type' => 2,
            'payable_note'     => 1,
            'userId'     => Auth::user()->id,
            'branchId'   =>$branchId,
         ]);
      
 
         Log::insert([
            'form_name' => 'Purchase Name Edit',
            'type'      => 'Edit',
            'userId'    => Auth::user()->id,
            'branchId'  => $branchId,
         ]);
 
         return redirect('/admin/purchaseitems')->with('message', 'Purchase Updated Successfully');
     }
}
