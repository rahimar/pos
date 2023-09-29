@extends('admin.layouts.template')

@section('page_title')
All Create Message
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>All Create Message Records
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                        <a href="{{ route('addmessage')}}" class="btn btn-primary"> Add Create Message</a>
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
                        <h5 class="card-title">All Create Message</h5>
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Create Message Title</th>
                                    <th>Create Message Body</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                <tr>
                                    <th scope="row">{{ $message->id }}</th>
                                    <td>{{ $message->sms_title }}</td>
                                    <td>{{ $message->sms_body }}</td>
                                    <td>{{ $message->status == 1 ? 'Active':'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('editmessage', $message->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('deletemessage', $message->id)}}" class="btn btn-warning">Delete</a>
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