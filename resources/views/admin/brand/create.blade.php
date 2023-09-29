@extends('admin.layouts.template')

@section('page_title')
Add Brand
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>Add Brand Record
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                      <a href="{{ route('brand')}}" class="btn btn-primary"> View Brands</a>
                    </div>
                </div>    
            </div>
        </div> 
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                    
                        <h5 class="card-title">Add Brand</h5>
                        <form class="" action="{{ route('addbrand')}}" method="POST">
                            @csrf
                            <div class="position-relative form-group">
                                <label for="brand_name" class="">Brand Name</label>
                                <input name="brand_name" id="brand_name" placeholder="Name" type="text" class="form-control @error('brand_name') is-invalid @enderror">
                               
 
                                @error('brand_name')
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