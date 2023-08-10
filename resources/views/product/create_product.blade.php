@extends('admin_master')
@section('admin')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <strong>Add User with Role</strong>
                @if (session('success'))
                    <span class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                    </span>
                @endif
            </div>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control form-control-sm" id="name"
                                    placeholder="Enter Name" name="name" required>
                                    
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="Product Type">Product Type:</label>
                                <input type="text" class="form-control form-control-sm" id="pro_type"
                                    placeholder="Enter Product Type" name="pro_type" required>
                                    
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="Product Quantity">Product Quantity:</label>
                                <input type="text" class="form-control form-control-sm" id="pro_quantity"
                                    placeholder="Enter Product Quantity" name="pro_quantity" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="phone">Product Price:</label>
                                <input type="text" class="form-control form-control-sm" id="pro_price"
                                placeholder="Enter Product Price" name="pro_price" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
