@extends('admin.layouts.template')

@section('page_title')
All Product
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>All Product Records
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
                <div class="page-title-actions">
                    
                    <div class="d-inline-block dropdown">
                        <a href="{{ route('addproduct')}}" class="btn btn-primary"> Add Product</a>
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
                        <h5 class="card-title">All Products</h5>
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Pruchase Price</th>
                                    <th>Sale Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->category_name }}</td>
                                    <td>{{ $product->unit_name }}</td>
                                    <td>{{ $product->pruchase_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td>{{ $product->stock_qty }}</td>
                                    <td>{{ $product->status == 1 ? 'Active':'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('editproduct', $product->id)}}" class="btn btn-primary">Edit</a>
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