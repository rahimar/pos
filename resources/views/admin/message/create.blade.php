@extends('admin.layouts.template')

@section('page_title')
Add Create Message
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>Add Create Message Record
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                      <a href="{{ route('message')}}" class="btn btn-primary"> View Create Message</a>
                    </div>
                </div>    
            </div>
        </div> 
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                    
                        <h5 class="card-title">Add Create Message</h5>
                        <form class="" action="{{ route('addmessage')}}" method="POST">
                            @csrf
                            <div class="position-relative form-group">
                                <label for="sms_title" class="">Create Message Title</label>
                                <input name="sms_title" id="sms_title" placeholder="Title" type="text" class="form-control @error('sms_title') is-invalid @enderror">
                               
 
                                @error('sms_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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