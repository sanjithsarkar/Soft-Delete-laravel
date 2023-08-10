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

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('insert.user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control form-control-sm" id="name"
                                    placeholder="Enter Name" name="name" >

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control form-control-sm" id="email"
                                    placeholder="Enter email" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="phone">UserType:</label>
                                <select class="custom-select rounded-1 form-control form-control-sm" id="usertype"
                                    name="usertype" required>
                                    <option selected="" disabled="">Select UserType</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Operator">Operator</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control form-control-sm" id="password"
                                    placeholder="Enter Password" name="password" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="view_role" value="1">
                                        <span>View Role</span>
                                </li>
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="create_role" value="1">
                                        <span>Create Role</span>
                                </li>
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="edit_role" value="1">
                                        <span>Edit Role</span>
                                </li>
                                @if (Auth::user()->usertype == 'Admin')
                                    <li class="list-group-item">
                                        <label class="ckbox">
                                            <input type="checkbox" name="delete_role" value="1">
                                            <span>Delete Role</span>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="view_product" value="1">
                                        <span>View Product</span>
                                </li>
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="create_product" value="1">
                                        <span>Create Product</span>
                                </li>
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="edit_product" value="1">
                                        <span>Edit Product</span>
                                </li>
                                @if (Auth::user()->usertype == 'Admin')
                                    <li class="list-group-item">
                                        <label class="ckbox">
                                            <input type="checkbox" name="delete_product" value="1">
                                            <span>Delete Product</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div></br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
