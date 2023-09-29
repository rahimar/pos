@extends('admin.layouts.template')

@section('page_title')
All Sales
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>All Sales Records
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                        <a href="{{ route('addpurchaseitems')}}" class="btn btn-primary"> Add Sales</a>
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
                        <h5 class="card-title">All Sales</h5>
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sales Date</th>
                                    <th>Sales Number</th>
                                    <th>Supllier Name</th>
                                    <th>Sub Total</th>
                                    <th>Vat</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($saleses as $sales)
                                <tr>
                                    <th scope="row">{{ $sales->id }}</th>
                                    <td>{{ $sales->sales_date }}</td>
                                    <td>{{ $sales->sales_number }}</td>
                                    <td>{{ $sales->customer_id }}</td>
                                    <td>{{ $sales->subTotal }}</td>
                                    <td>{{ $sales->vat_amount }}</td>
                                    <td>{{ $sales->discount_amount }}</td>
                                    <td>{{ $sales->total_amount }}</td>
                                    <td>
                                        <a href="{{ route('editsalesitems', $sales->id)}}" class="btn btn-primary">Edit</a>
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