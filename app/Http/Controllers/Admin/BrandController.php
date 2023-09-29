<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\Log;
use App\Models\User;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand.view', compact('brands'));
    }
    public function create(){
        return view('admin.brand.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:100',
        ]);
       $branchId = 1;
        Brand::insert([
           'brand_name' => $request->brand_name,
           'status'     => 1,
           'branchId'   =>$branchId,
        ]);

        Log::insert([
           'form_name' => 'Brand Name Insert',
           'type'      => 'Insert',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/brand')->with('message', 'Brand Added Successfully');
    }
    public function update(Request $request){
        $id =  $request->id;
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:100',
        ]);
       $branchId = 1;
        Brand::findOrFail($id)->update([
           'brand_name' => $request->brand_name,
        ]);

        Log::insert([
           'form_name' => 'Brand Name Edit',
           'type'      => 'Edit',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/brand')->with('message', 'Brand Updated Successfully');
    }

    public function edit($id){
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }
    public function delete($id){
        $brand = Brand::findOrFail($id)->delete();
        $branchId = 1;
        Log::insert([
            'form_name' => 'Brand Name Delete',
            'type'      => 'Delete',
            'userId'    => Auth::user()->id,
            'branchId'  => $branchId,
         ]);

        return redirect('/admin/brand')->with('message', 'Brand Deleted Successfully');
    }
}
