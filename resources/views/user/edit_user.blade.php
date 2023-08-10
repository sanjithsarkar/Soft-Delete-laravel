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

            <form action="{{ url('/update/user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control form-control-sm" id="name"
                                    value="{{ $user->name }}" name="name" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control form-control-sm" id="email"
                                    value="{{ $user->email }}" name="email" readonly>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="phone">UserType:</label>
                                <select class="custom-select rounded-1 form-control form-control-sm" id="usertype"
                                    name="usertype">
                                    <option value="{{ $user->usertype }}" selected disabled>{{ $user->usertype }}</option>
                                    @if (Auth::user()->usertype == "Admin")
                                    <option value="Admin">Admin</option>
                                    @endif
                                    <option value="Operator">Operator</option>
                                    <option value="User">User</option>
                                </select>
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
                                        <input type="checkbox" name="view_role" value="1"
                                            @php if ($user->role->view_role == 1) {
                                                echo "checked";
                                            } @endphp>
                                        <span>View Role</span>
                                </li>
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="create_role" value="1"
                                            @php if ($user->role->create_role == 1) {
                                                echo "checked";
                                            } @endphp>
                                        <span>Create Role</span>
                                </li>
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="edit_role" value="1"
                                            @php if ($user->role->edit_role == 1) {
                                                echo "checked";
                                            } @endphp>
                                        <span>Edit Role</span>
                                </li>

                                @if (Auth::user()->usertype == "Admin")
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="delete_role" value="1"
                                            @php if ($user->role->delete_role == 1) {
                                                echo "checked";
                                            } @endphp>
                                        <span>Delete Role</span>
                                </li>
                                @endif
                            </ul>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="view_product" value="1"
                                            @php if ($user->role->view_product == 1) {
                                                echo "checked";
                                            } @endphp>
                                        <span>View Product</span>
                                </li>
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="create_product" value="1"
                                            @php if ($user->role->create_product == 1) {
                                                echo "checked";
                                            } @endphp>
                                        <span>Create Product</span>
                                </li>
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="edit_product" value="1"
                                            @php if ($user->role->edit_product == 1) {
                                                echo "checked";
                                            } @endphp>
                                        <span>Edit Product</span>
                                </li>
                                @if (Auth::user()->usertype == "Admin")
                                <li class="list-group-item">
                                    <label class="ckbox">
                                        <input type="checkbox" name="delete_product" value="1"
                                            @php if ($user->role->delete_product == 1) {
                                                echo "checked";
                                            } @endphp>
                                        <span>Delete Product</span>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
