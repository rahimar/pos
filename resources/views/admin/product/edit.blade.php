@extends('admin.layouts.template')

@section('page_title')
Edit product
@endsection

@section('content')

<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>Edit product Record
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
                    
                        <h5 class="card-title">Edit product</h5>
                        <form class="" action="{{ route('updateproduct')}}" method="POST">
                            @csrf

                            <div class="row">
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="category_id" class="">Category Name</label>
                                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                         <option value="">Select Category</option>
                                         @foreach($categories as $category)
                                         <option value="{{ $category->id }}" {{ ($product->category_id ==  $category->id) ? 'selected':''}}>{{ $category->category_name }}</option>
                                         @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="brand_id" class="">Brand Name</label>
                                        <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                         <option value="">Select Brand</option>
                                         @foreach($brands as $brand)
                                         <option value=" {{ $brand->id }} " {{ ($product->brand_id ==  $brand->id) ? 'selected':''}}>{{ $brand->brand_name }}</option>
                                         @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="product_name" class="">Product Name</label>
                                        <input name="product_id" id="product_id" value="{{$product->id}}"  type="hidden">
                                        <input name="product_name" id="product_name" value="{{$product->product_name}}" placeholder="Name" type="text" class="form-control @error('product_name') is-invalid @enderror">
                                    
        
                                        @error('product_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="product_code" class="">Product Code</label>
                                        <input name="product_code" id="product_code" value="{{$product->product_code}}" placeholder="Code " type="text" class="form-control @error('product_code') is-invalid @enderror">
                                    
        
                                        @error('product_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="product_generic" class="">Product Generic</label>
                                        <input name="product_generic" id="product_generic" value="{{$product->product_generic}}" placeholder="Generic" type="text" class="form-control @error('product_generic') is-invalid @enderror">
                                    
        
                                        @error('product_generic')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="unit_id" class="">Unit Name</label>
                                        <select name="unit_id" id="unit_id" class="form-control @error('unit_id') is-invalid @enderror">
                                         <option value="">Select Unit</option>
                                         @foreach($units as $unit)
                                         <option value="{{ $unit->id }}" {{ ($product->unit_id ==  $unit->id) ? 'selected':''}}>{{ $unit->unit_name }}</option>
                                         @endforeach
                                        </select>
                                        @error('unit_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="pruchase_price" class="">Pruchase Price</label>
                                        <input name="pruchase_price" id="pruchase_price" value="{{$stock->pruchase_price}}" placeholder="Pruchase Price" type="text" class="form-control @error('pruchase_price') is-invalid @enderror">
                                    
        
                                        @error('pruchase_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="sale_price" class="">Sale Price</label>
                                        <input name="sale_price" id="sale_price" value="{{$stock->sale_price}}" placeholder="Sale Price" type="text" class="form-control @error('sale_price') is-invalid @enderror">
                                    
        
                                        @error('sale_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="stock_qty" class="">Stock Quantity</label>
                                        <input name="stock_qty" id="stock_qty" value="{{$stock->stock_qty}}" placeholder="Stock Quantity" type="text" class="form-control @error('stock_qty') is-invalid @enderror">
                                    
        
                                        @error('stock_qty')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="alert_qty" class="">Alert Quantity</label>
                                        <input name="alert_qty" id="alert_qty" value="{{$stock->alert_qty}}" placeholder="Alert Quantity" type="text" class="form-control @error('alert_qty') is-invalid @enderror">
                                    
        
                                        @error('alert_qty')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="position-relative form-group">
                                        <label for="status" class="">Status</label>
                                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                         <option value="">Select Status</option>
                                         <option value="1" {{ ($product->status ==  1) ? 'selected':''}}>Active</option>
                                         <option value="0" {{ ($product->status ==  0) ? 'selected':''}}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                           
                            
                            <button class="mt-1 btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>





@endsection