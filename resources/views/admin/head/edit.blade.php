@extends('admin.layouts.template')

@section('page_title')
Edit Account Head
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer fa fa-bookmark-o"></i>
                    </div>
                    <div>Edit Account Head Record
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
                    
                        <h5 class="card-title">Edit Account Head</h5>
                        <form class="" action="{{ route('updatehead')}}" method="POST">
                            @csrf
                            <div class="position-relative form-group">
                            <select style="width:;" id="head_type" name="head_type" class="form-control  @error('head_type') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="1" {{ ($head->head_type ==  1) ? 'selected':''}}>Asset</option>
                                    <option value="2" {{ ($head->head_type ==  2) ? 'selected':''}}>Liabilities</option>
                                    <option value="3" {{ ($head->head_type ==  3) ? 'selected':''}}>Expenses</option>
                                    <option value="4" {{ ($head->head_type ==  4) ? 'selected':''}}>Revenue</option>
                                    

                                </select>
 
                                @error('head_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="head_name" class="">Register Name</label>
                                <input name="id" id="id" placeholder="Name" value="{{$head->id}}" type="hidden" >
                                <input name="head_name" id="head_name" placeholder="Name" value="{{$head->head_name}}" type="text" class="form-control @error('head_name') is-invalid @enderror">
                               
 
                                @error('head_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="position-relative form-group">
                                <label for="is_group" class="">Head Group</label>
                                <select name="is_group" id="is_group" class="form-control @error('is_group') is-invalid @enderror">
                                         <option value="">Select </option>
                                         <option value="1" {{ ($head->is_group ==  1) ? 'selected':''}}>Group</option>
                                         <option value="2" {{ ($head->is_group ==  2) ? 'selected':''}}>Non-Group</option>
                                        </select>
 
                                @error('is_group')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="status" class="">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                         <option value="">Select Status</option>
                                         <option value="1" {{ ($head->status ==  1) ? 'selected':''}}>Active</option>
                                         <option value="0" {{ ($head->status ==  0) ? 'selected':''}}>Inactive</option>
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