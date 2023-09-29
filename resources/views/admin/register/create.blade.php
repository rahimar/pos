@extends('admin.layouts.template')

@section('page_title')
Add Register
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer fa fa-bookmark-o"></i>
                    </div>
                    <div>Add Register Record
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                      <a href="{{ route('companyregister')}}" class="btn btn-primary"> View Register</a>
                    </div>
                </div>    
            </div>
        </div> 
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                    
                        <h5 class="card-title">Add Register</h5>
                        <form class="" action="{{ route('addregister')}}" method="POST">
                            @csrf
                            <div class="position-relative form-group">
                                <label for="name" class="">Register Name</label>
                                <input name="name" id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror">
                               
 
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="mobile" class="">Register Mobile</label>
                                <input name="mobile" id="mobile" placeholder="Mobile" type="text" class="form-control @error('mobile') is-invalid @enderror">
                               
 
                                @error('mobile')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="address" class="">Register Address</label>
                                <input name="address" id="address" placeholder="Address" type="text" class="form-control @error('address') is-invalid @enderror">
                               
 
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="nid" class="">Register NID</label>
                                <input name="nid" id="nid" placeholder="NID" type="text" class="form-control @error('nid') is-invalid @enderror">
                               
 
                                @error('nid')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="register_type" class="">Register Type</label>
                                <select style="width:;" id="register_type" name="register_type" class="form-control  @error('register_type') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="1">Customer</option>
                                    <option value="2">Supplier</option>
                                    <option value="3">Employee</option>
                                    <option value="4">Reference</option>
                                    

                                </select>
 
                                @error('register_type')
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