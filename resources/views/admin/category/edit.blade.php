@extends('admin.layouts.template')

@section('page_title')
Edit Category
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>Edit Category Record
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
                    
                        <h5 class="card-title">Edit Category</h5>
                        <form class="" action="{{ route('updatecategory')}}" method="POST">
                            @csrf
                            <div class="position-relative form-group">
                                <label for="category_name" class="">Category Name</label>
                                <input name="id" id="id"  type="hidden" value="{{ $category->id }}" >
                                <input name="category_name" id="category_name" placeholder="Name" type="text" value="{{ $category->category_name }}" class="form-control @error('category_name') is-invalid @enderror">
                               
 
                                @error('category_name')
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