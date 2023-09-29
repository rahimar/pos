<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;
use App\Models\User;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.view', compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
   
    public function store(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:100',
        ]);
       $branchId = 1;
       Category::insert([
           'category_name' => $request->category_name,
           'status'     => 1,
           'branchId'   =>$branchId,
        ]);

        Log::insert([
           'form_name' => 'Category Name Insert',
           'type'      => 'Insert',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/category')->with('message', 'Category Added Successfully');
    }
    public function update(Request $request){
        $id =  $request->id;
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:100',
        ]);
       $branchId = 1;
       Category::findOrFail($id)->update([
           'category_name' => $request->category_name,
        ]);

        Log::insert([
           'form_name' => 'Category Name Edit',
           'type'      => 'Edit',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/category')->with('message', 'Category Updated Successfully');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function delete($id){
        $category = Category::findOrFail($id)->delete();
        $branchId = 1;
        Log::insert([
            'form_name' => 'Category Name Delete',
            'type'      => 'Delete',
            'userId'    => Auth::user()->id,
            'branchId'  => $branchId,
         ]);

        return redirect('/admin/category')->with('message', 'Category Deleted Successfully');
    }
}
