<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register;
use App\Models\Log;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        $registers = Register::latest()->get();
        return view('admin.register.view', compact('registers'));
    }
    public function create(){
        return view('admin.register.create');
    }
   
    public function store(Request $request){
        $validated = $request->validate([
            'mobile' => 'required|unique:registers|max:100',
            'name' => 'required',
            'address' => 'required',
            'register_type' => 'required',
        ]);
       $branchId = 1;
       Register::insert([
           'mobile' => $request->mobile,
           'name' => $request->name,
           'address' => $request->address,
           'nid' => $request->nid,
           'register_type' => $request->register_type,
           'join_date'     => 1,
           'image'     => 1,
           'status'     => 1,
           'branchId'   =>$branchId,
        ]);

        Log::insert([
           'form_name' => 'Register Name Insert',
           'type'      => 'Insert',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/register')->with('message', 'Register Added Successfully');
    }
    public function update(Request $request){
        $id =  $request->id;
        $validated = $request->validate([
            'mobile' => 'required',
            'name' => 'required',
            'address' => 'required',
            'register_type' => 'required',
        ]);
       $branchId = 1;
       Register::findOrFail($id)->update([
            'mobile' => $request->mobile,
            'name' => $request->name,
            'address' => $request->address,
            'nid' => $request->nid,
            'register_type' => $request->register_type,
            'status' => $request->status,
        ]);

        Log::insert([
           'form_name' => 'Register Name Edit',
           'type'      => 'Edit',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/register')->with('message', 'Register Updated Successfully');
    }

    public function edit($id){
        $register = Register::findOrFail($id);
        return view('admin.register.edit', compact('register'));
    }
    public function delete($id){
        $register = Register::findOrFail($id)->delete();
        $branchId = 1;
        Log::insert([
            'form_name' => 'Register Name Delete',
            'type'      => 'Delete',
            'userId'    => Auth::user()->id,
            'branchId'  => $branchId,
         ]);

        return redirect('/admin/register')->with('message', 'Register Deleted Successfully');
    }
}
