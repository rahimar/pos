@extends('admin.layouts.template')

@section('page_title')
Add Account Head
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer fa fa-bookmark-o"></i>
                    </div>
                    <div>Add Account Head Record
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                      <a href="{{ route('acchead')}}" class="btn btn-primary"> View Account Head</a>
                    </div>
                </div>    
            </div>
        </div> 
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                    
                        <h5 class="card-title">Add Account Head</h5>
                        <form class="" action="{{ route('addhead')}}" method="POST">
                            @csrf

                            <div class="position-relative form-group">
                                <label for="head_type" class="">Head Type</label>
                                <select style="width:;" id="head_type" name="head_type" class="form-control  @error('head_type') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="1">Asset</option>
                                    <option value="2">Liabilities</option>
                                    <option value="3">Expenses</option>
                                    <option value="4">Revenue</option>
                                    

                                </select>
 
                                @error('head_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="head_name" class="">Head Name</label>
                                <input name="head_name" id="name" placeholder="Name" type="text" class="form-control @error('head_name') is-invalid @enderror">
                               
 
                                @error('head_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="position-relative form-group">
                                <label for="is_group" class="">Head Group</label>
                                <select style="width:;" id="is_group" name="is_group" class="form-control  @error('is_group') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="1">Group</option>
                                    <option value="2" selected>Non-Group</option>
                                    

                                </select>
 
                                @error('is_group')
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