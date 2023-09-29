@extends('admin.layouts.template')

@section('page_title')
All Register
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-bookmark-o icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>All Register Records
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                        <a href="{{ route('addregister')}}" class="btn btn-primary"> Add Register</a>
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
                        <h5 class="card-title">All Register</h5>
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registers as $register)
                                <tr>
                                    <th scope="row">{{ $register->id }}</th>
                                    <td>{{ $register->name }}</td>
                                    <td>{{ $register->mobile }}</td>
                                    <td>{{ $register->address }}</td>
                                    <td>
                                        @if($register->register_type == 1)
                                         <span>Customer</span>
                                        @elseif($register->register_type == 2)
                                         <span>Supplier</span>
                                         @elseif($register->register_type == 3)
                                         <span>Employee</span>
                                         @elseif($register->register_type == 4)
                                         <span>Reference</span>
                                         @endif
                                    </td>
                                    <td>{{ $register->status == 1 ? 'Active':'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('editregister', $register->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('deleteregister', $register->id)}}" class="btn btn-warning">Delete</a>
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