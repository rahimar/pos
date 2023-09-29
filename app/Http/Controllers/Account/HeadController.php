<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AccountHead;
use App\Models\Log;
use App\Models\User;

class HeadController extends Controller
{
    

    public function index(){
        $heads = AccountHead::latest()->get();
        return view('admin.head.view', compact('heads'));
    }
    public function create(){
        return view('admin.head.create');
    }
   
    public function store(Request $request){
        $validated = $request->validate([
            'head_name' => 'required|unique:account_heads|max:100',
            'head_type' => 'required',
            'is_group' => 'required',
        ]);
       $branchId = 1;
       AccountHead::insert([
           'head_name' => $request->head_name,
           'head_type' => $request->head_type,
           'is_group' => $request->is_group,
           'status'     => 1,
           'branchId'   =>$branchId,
        ]);

        Log::insert([
           'form_name' => 'AccountHead Name Insert',
           'type'      => 'Insert',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/acchead')->with('message', 'Account Head Added Successfully');
    }
    public function update(Request $request){
        $id =  $request->id;
        $validated = $request->validate([
            'head_name' => 'required',
            'head_type' => 'required',
            'is_group' => 'required',
        ]);
       $branchId = 1;
       AccountHead::findOrFail($id)->update([
            'head_name' => $request->head_name,
            'head_type' => $request->head_type,
            'is_group' => $request->is_group,
            'status' => $request->status,
        ]);

        Log::insert([
           'form_name' => 'AccountHead Name Edit',
           'type'      => 'Edit',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/acchead')->with('message', 'Account Head Updated Successfully');
    }

    public function edit($id){
        $head = AccountHead::findOrFail($id);
        return view('admin.head.edit', compact('head'));
    }
    public function delete($id){
        $register = AccountHead::findOrFail($id)->delete();
        $branchId = 1;
        Log::insert([
            'form_name' => 'AccountHead Name Delete',
            'type'      => 'Delete',
            'userId'    => Auth::user()->id,
            'branchId'  => $branchId,
         ]);

        return redirect('/admin/acchead')->with('message', 'Account Head Deleted Successfully');
    }
}
