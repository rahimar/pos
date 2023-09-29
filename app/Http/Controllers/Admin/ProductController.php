<?php

namespace App\Http\Controllers\Admin;

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
use Response;

class ProductController extends Controller
{
    public function index(){
        $products = Product::select('products.*','categories.category_name', 'unit_name', 'brand_name','pruchase_price', 'sale_price', 'stock_qty')
                   ->join('product_stocks', 'product_stocks.product_id', '=', 'products.id')
                   ->join('categories', 'categories.id', '=', 'products.category_id')
                   ->join('units', 'units.id', '=', 'products.unit_id')
                   ->join('brands', 'brands.id', '=', 'products.brand_id')
                   ->get();
        return view('admin.product.view', compact('products'));
    }
    public function create(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $units = Unit::latest()->get();
        return view('admin.product.create', compact('brands','categories','units'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'product_name' => 'required|unique:products|max:100',
            'product_code' => 'required|unique:products|max:100',
            'brand_id' => 'required',
            'category_id' => 'required',
            'unit_id' => 'required',
            'pruchase_price' => 'required',
            'sale_price' => 'required',
            'stock_qty' => 'required',
        ]);
       $branchId = 1;
       $id = Product::insertGetId([
           'product_name' => $request->product_name,
           'product_code' => $request->product_code,
           'product_generic' => $request->product_generic,
           'brand_id' => $request->brand_id,
           'category_id' => $request->category_id,
           'unit_id' => $request->unit_id,
           'product_barcode'     => 0,
           'product_type'     => 0,
           'status'     => 1,
           'branchId'   =>$branchId,
        ]);

        ProductStock::insert([
           'product_id' =>  $id,
           'pruchase_price' => $request->pruchase_price,
           'sale_price' => $request->sale_price,
           'stock_qty' => $request->stock_qty,
           'alert_qty' => $request->alert_qty,
           'status'     => 1,
           'branchId'   =>$branchId,
        ]);

        Log::insert([
           'form_name' => 'Product Name Insert',
           'type'      => 'Insert',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/product')->with('message', 'Product Added Successfully');
    }
    public function update(Request $request){
        $validated = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'unit_id' => 'required',
            'pruchase_price' => 'required',
            'sale_price' => 'required',
            'stock_qty' => 'required',
        ]);
       $branchId = 1;
       $id = $request->product_id;
      Product::findOrFail($id)->update([
           'product_name' => $request->product_name,
           'product_code' => $request->product_code,
           'product_generic' => $request->product_generic,
           'brand_id' => $request->brand_id,
           'category_id' => $request->category_id,
           'unit_id' => $request->unit_id,
           'product_barcode'     => 0,
           'product_type'     => 0,
           'status'     => $request->status,
        ]);

        ProductStock::where('product_id', $id)->update([
           'product_id' =>  $id,
           'pruchase_price' => $request->pruchase_price,
           'sale_price' => $request->sale_price,
           'stock_qty' => $request->stock_qty,
           'alert_qty' => $request->alert_qty,
        ]);

        Log::insert([
           'form_name' => 'Product Name Edit',
           'type'      => 'Edit',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/product')->with('message', 'Product Updated Successfully');
    }


    public function edit($id){
        $product = Product::findOrFail($id);
        $stock = ProductStock::where('product_id',$id)->first();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $units = Unit::latest()->get();
        return view('admin.product.edit', compact('product','stock','brands','categories','units'));
    }
    public function catByProductID($id){
        $products = Product::where('category_id',$id)->get();
        return Response::json($products);
    }
}
