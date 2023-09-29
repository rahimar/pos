<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;
use App\Models\User;
use App\Models\Register;
use App\Models\Sales;
use App\Models\SalesDetails;
use App\Models\SalesPayment;

class SalesController extends Controller
{
    public function index(){
        $saleses = Sales::latest()->get();
        return view('admin.sales.view', compact('saleses'));
    }

    public function create(){
        $registers = Register::where('register_type', 1)->latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $units = Unit::latest()->get();
        return view('admin.sales.create', compact('brands','registers','categories','units'));
    }

    public function store(Request $request){
        // dd($request);
         $validated = $request->validate([
             'customer_id' => 'required',
             'sales_date' => 'required',
             'sub_total' => 'required',
         ]);
        $branchId = 1;
   
         $id = Sales::insertGetId([
            'customer_id' => $request->customer_id,
            'sales_number' => Str::random(6),
            'sales_date' => $request->sales_date,
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
                 $object = new SalesDetails();
                 $object->sales_id = $id;
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
         SalesPayment::insert([
             'sales_id' => $id,
             'payable_amount' => 0,
             'payable_type' => 2,
             'payable_note'     => 1,
             'userId'     => Auth::user()->id,
             'branchId'   =>$branchId,
          ]);
 
         Log::insert([
            'form_name' => 'Sales Name Insert',
            'type'      => 'Insert',
            'userId'    => Auth::user()->id,
            'branchId'  => $branchId,
         ]);
 
         return redirect('/admin/salesitems')->with('message', 'Sales Items Successfully');
     }


     public function edit($id){
        $sales = Sales::findOrFail($id);
        $spayment = SalesPayment::where('sales_id',$id)->first();
        $salesDetails = SalesDetails::where('sales_id',$id)->get();
        $registers = Register::where('register_type', 1)->latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $units = Unit::latest()->get();
        return view('admin.sales.edit', compact('sales','spayment','salesDetails','registers','brands','categories','units'));
    }

    public function update(Request $request){
        // dd($request);
         $validated = $request->validate([
             'customer_id' => 'required',
             'sales_date' => 'required',
             'sub_total' => 'required',
         ]);
        $branchId = 1;
        $id = $request->sales_id;
        Sales::findOrFail($id)->update([
            'customer_id' => $request->customer_id,
            'sales_date' => $request->sales_date,
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
         SalesDetails::where('sales_id', $id)->delete();
         if(count($request->category_id) > 0){
             for($i = 0; $i < count($request->category_id); $i++){
                 $object = new SalesDetails ();
                 $object->sales_id = $id;
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

         SalesPayment::where('sales_id', $id)->update([
            
            'payable_amount' => $request->total_paid,
            'payable_type' => 2,
            'payable_note'     => 1,
            'userId'     => Auth::user()->id,
            'branchId'   =>$branchId,
         ]);
      
 
         Log::insert([
            'form_name' => 'Sales Name Edit',
            'type'      => 'Edit',
            'userId'    => Auth::user()->id,
            'branchId'  => $branchId,
         ]);
 
         return redirect('/admin/salesitems')->with('message', 'Sales Updated Successfully');
     }
}
