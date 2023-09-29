@extends('admin.layouts.template')

@section('page_title')
Send Message
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>Send Message Record
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    
                </div>    
            </div>
        </div> 
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                    
                        <h5 class="card-title">SendMessage</h5>
                        <form class="" action="{{ route('addmessage')}}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                     <div class="position-relative form-group">
                                        <label for="sms_title" class="">Sms Title</label>
                                        <select name="sms_title" id="sms_title" class="form-control @error('sms_title') is-invalid @enderror" required="required">
                                         <option value="">Select Title</option>
                                         @foreach($messages as $message)
                                            <option value="{{ $message->id }}">{{ $message->sms_title }}</option>
                                          @endforeach
                                        </select>
                                        @error('sms_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                               </div>
                               <div class="col-lg-6">
                                    <div class="position-relative form-group">
                                        <label for="contact_type" class="">Contact Type</label>
                                        <select name="contact_type" id="contact_type" class="form-control @error('contact_type') is-invalid @enderror" required="required">
                                         <option value="">Select</option>
                                         
                                            <option value="1">Customer</option>
                                            <option value="2">Supplier</option>
                                            <option value="3">Employee</option>
                                            <option value="4">Reference</option>
                                        </select>
                                        @error('contact_type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                               </div>
                            </div>
                            <div class="position-relative form-group">
                                <label for="sms_body" class="">Create Message Body</label>
                                <textarea name="sms_body" id="sms_body" placeholder="Sms Body" type="text" class="form-control @error('sms_body') is-invalid @enderror"></textarea>
                               
 
                                @error('sms_body')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button class="mt-1 btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>





@endsection