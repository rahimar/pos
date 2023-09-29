@extends('admin.layouts.template')

@section('page_title')
Edit Unit
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>Edit Unit Record
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
                    
                        <h5 class="card-title">Edit Unit</h5>
                        <form class="" action="{{ route('updateunit')}}" method="POST">
                            @csrf
                            <div class="position-relative form-group">
                                <label for="unit_name" class="">Unit Name</label>
                                <input name="id" id="id"  type="hidden" value="{{ $unit->id }}" >
                                <input name="unit_name" id="unit_name" placeholder="Name" type="text" value="{{ $unit->unit_name }}" class="form-control @error('unit_name') is-invalid @enderror">
                               
 
                                @error('unit_name')
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