@extends('admin.layouts.template')

@section('page_title')
Edit Register
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer fa fa-bookmark-o"></i>
                    </div>
                    <div>Edit Register Record
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                       
                    </div>
                </div>    
            </div>
        </div> 
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                    
                        <h5 class="card-title">Edit Register</h5>
                        <form class="" action="{{ route('updateregister')}}" method="POST">
                            @csrf
                            <div class="position-relative form-group">
                                <label for="name" class="">Register Name</label>
                                <input name="id" id="id" placeholder="Name" value="{{$register->id}}" type="hidden" >
                                <input name="name" id="name" placeholder="Name" value="{{$register->name}}" type="text" class="form-control @error('name') is-invalid @enderror">
                               
 
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="mobile" class="">Register Mobile</label>
                                <input name="mobile" id="mobile" placeholder="Mobile" value="{{$register->mobile}}" type="text" class="form-control @error('mobile') is-invalid @enderror">
                               
 
                                @error('mobile')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="address" class="">Register Address</label>
                                <input name="address" id="address" placeholder="Address" value="{{$register->address}}" type="text" class="form-control @error('address') is-invalid @enderror">
                               
 
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="nid" class="">Register NID</label>
                                <input name="nid" id="nid" placeholder="NID" type="text" value="{{$register->nid}}" class="form-control @error('nid') is-invalid @enderror">
                               
 
                                @error('nid')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="register_type" class="">Register Type</label>
                                <select style="width:;" id="register_type" name="register_type" class="form-control  @error('register_type') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="1" {{ ($register->register_type ==  1) ? 'selected':''}}>Customer</option>
                                    <option value="2" {{ ($register->register_type ==  2) ? 'selected':''}}>Supplier</option>
                                    <option value="3" {{ ($register->register_type ==  3) ? 'selected':''}}>Employee</option>
                                    <option value="4" {{ ($register->register_type ==  4) ? 'selected':''}}>Reference</option>
                                    

                                </select>
 
                                @error('register_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="status" class="">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                         <option value="">Select Status</option>
                                         <option value="1" {{ ($register->status ==  1) ? 'selected':''}}>Active</option>
                                         <option value="0" {{ ($register->status ==  0) ? 'selected':''}}>Inactive</option>
                                        </select>
 
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            
                            <button class="mt-1 btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>





@endsection