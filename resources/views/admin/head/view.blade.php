@extends('admin.layouts.template')

@section('page_title')
All Account Head
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-bookmark-o icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>All Account Head Records
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                        <a href="{{ route('addhead')}}" class="btn btn-primary"> Add Account Head</a>
                    </div>
                </div>    
            </div>
        </div> 
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                        <h5 class="card-title">All Account Head</h5>
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Main Head</th>
                                    <th>Name</th>
                                    <th>Group</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($heads as $head)
                                <tr>
                                    <th scope="row">{{ $head->id }}</th>
                                    <td>
                                        @if($head->head_type == 1)
                                         <span>Asset</span>
                                        @elseif($head->head_type == 2)
                                         <span>Liabilities</span>
                                         @elseif($head->head_type == 3)
                                         <span>Expenses</span>
                                         @elseif($head->head_type == 4)
                                         <span>Revenue</span>
                                         @endif
                                    </td>
                                    <td>{{ $head->head_name }}</td>
                                    
                                    <td>{{ $head->is_group == 1 ? 'Group':'Non-Group' }}</td>
                                    <td>{{ $head->status == 1 ? 'Active':'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('edithead', $head->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('deletehead', $head->id)}}" class="btn btn-warning">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>





@endsection