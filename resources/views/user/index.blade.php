@extends('admin_master')
@section('admin')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User List</h3>
                @php
                    $usertype = Auth::user()->usertype;
                @endphp
                @if ($usertype == 'Admin' || $usertype == 'Operator')
                    <a class="float-right mr-4 btn btn-outline-success" href="{{ route('create.user') }}"><strong>Add
                            User</strong></a>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>UserType</th>
                            <th>Action</th>

                            
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($users as $key => $user)
                            <tr role="row" class="odd">
                                <td width="10% " scope="row">{{ ++$key }}</td>
                                <td width="10%">{{ $user->name }}</td>
                                <td width="10%">{{ $user->email }}</td>
                                <td width="10%">{{ $user->usertype }}</td>
                                <td width="30%">
                                    @if (Auth::user()->usertype == "Admin" || $user->role->view_role == 1)
                                    <a href="{{ url('/show/user/'.$user->id) }}" class="btn btn-outline-success btn-sm mr-2">
                                        <i class="fa fa-eye" aria-hidden="true">
                                            Show
                                        </i>
                                    </a>
                                    @endif
                                    
                                    @if (Auth::user()->usertype == "Admin" || Auth::user()->usertype == "Operator")
                                    <a href="{{ url('/edit/user/'.$user->id) }}" class="btn btn-outline-primary btn-sm mr-2">
                                        <i class="fa fa-edit" aria-hidden="true">
                                            Edit
                                        </i>
                                    </a>
                                    @endif
                                    
                                    @if (Auth::user()->usertype == "Admin")
                                    <a href="{{ url('/delete/user/'.$user->id) }}" class="btn btn-outline-danger btn-sm mr-2">
                                        <i class="fa fa-trash" aria-hidden="true">
                                            Delete
                                        </i>
                                    </a>
                                    @endif
                                </td>
                                

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
