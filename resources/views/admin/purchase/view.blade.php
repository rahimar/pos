@extends('admin.layouts.template')

@section('page_title')
All Purchase
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>All Purchase Records
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                        <a href="{{ route('addpurchaseitems')}}" class="btn btn-primary"> Add Purchase</a>
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
                        <h5 class="card-title">All Purchases</h5>
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Purchase Date</th>
                                    <th>Purchase Number</th>
                                    <th>Supllier Name</th>
                                    <th>Sub Total</th>
                                    <th>Vat</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($purchases as $purchase)
                                <tr>
                                    <th scope="row">{{ $purchase->id }}</th>
                                    <td>{{ $purchase->purchase_date }}</td>
                                    <td>{{ $purchase->purchase_number }}</td>
                                    <td>{{ $purchase->supllier_id }}</td>
                                    <td>{{ $purchase->subTotal }}</td>
                                    <td>{{ $purchase->vat_amount }}</td>
                                    <td>{{ $purchase->discount_amount }}</td>
                                    <td>{{ $purchase->total_amount }}</td>
                                    <td>
                                        <a href="{{ route('editpurchaseitems', $purchase->id)}}" class="btn btn-primary">Edit</a>
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