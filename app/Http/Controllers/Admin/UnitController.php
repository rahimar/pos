<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;
use App\Models\Log;
use App\Models\User;

class UnitController extends Controller
{
    public function index(){
        $units = Unit::latest()->get();
        return view('admin.unit.view', compact('units'));
    }
    public function create(){
        return view('admin.unit.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'unit_name' => 'required|unique:units|max:100',
        ]);
       $branchId = 1;
       Unit::insert([
           'unit_name' => $request->unit_name,
           'status'     => 1,
           'branchId'   =>$branchId,
        ]);

        Log::insert([
           'form_name' => 'Unit Name Insert',
           'type'      => 'Insert',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/unit')->with('message', 'Unit Added Successfully');
    }
    public function update(Request $request){
        $id =  $request->id;
        $validated = $request->validate([
            'unit_name' => 'required|unique:units|max:100',
        ]);
       $branchId = 1;
       Unit::findOrFail($id)->update([
           'unit_name' => $request->unit_name,
        ]);

        Log::insert([
           'form_name' => 'Unit Name Edit',
           'type'      => 'Edit',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/unit')->with('message', 'Unit Updated Successfully');
    }

    public function edit($id){
        $unit = Unit::findOrFail($id);
        return view('admin.unit.edit', compact('unit'));
    }
    public function delete($id){
        $unit = Unit::findOrFail($id)->delete();
        $branchId = 1;
        Log::insert([
            'form_name' => 'Unit Name Delete',
            'type'      => 'Delete',
            'userId'    => Auth::user()->id,
            'branchId'  => $branchId,
         ]);

        return redirect('/admin/unit')->with('message', 'Unit Deleted Successfully');
    }
}
