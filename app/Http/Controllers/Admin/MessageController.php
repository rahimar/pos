<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CreateSms;
use App\Models\SendSms;
use App\Models\Log;
use App\Models\User;

class MessageController extends Controller
{
    

    public function index(){
        $messages = CreateSms::latest()->get();
        return view('admin.message.view', compact('messages'));
    }
    public function create(){
        return view('admin.message.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'sms_title' => 'required',
            'sms_body' => 'required',
        ]);
       $branchId = 1;
       CreateSms::insert([
           'sms_title' => $request->sms_title,
           'sms_body' => $request->sms_body,
           'status'     => 1,
           'branchId'   =>$branchId,
        ]);

        Log::insert([
           'form_name' => 'Message Name Insert',
           'type'      => 'Insert',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/message')->with('message', 'Message Added Successfully');
    }
    public function update(Request $request){
        $id =  $request->id;
        $validated = $request->validate([
            'sms_title' => 'required',
            'sms_body' => 'required',
        ]);
       $branchId = 1;
       CreateSms::findOrFail($id)->update([
        'sms_title' => $request->sms_title,
        'sms_body' => $request->sms_body,
        ]);

        Log::insert([
           'form_name' => 'Message Name Edit',
           'type'      => 'Edit',
           'userId'    => Auth::user()->id,
           'branchId'  => $branchId,
        ]);

        return redirect('/admin/message')->with('message', 'Message Updated Successfully');
    }

    public function edit($id){
        $message = CreateSms::findOrFail($id);
        return view('admin.message.edit', compact('message'));
    }
    public function delete($id){
        $message = CreateSms::findOrFail($id)->delete();
        $branchId = 1;
        Log::insert([
            'form_name' => 'Message Name Delete',
            'type'      => 'Delete',
            'userId'    => Auth::user()->id,
            'branchId'  => $branchId,
         ]);

        return redirect('/admin/message')->with('message', 'Message Deleted Successfully');
    }


    public function sendsms(){
        $messages = CreateSms::latest()->get();
        return view('admin.message.sendsms', compact('messages'));
    }
}
