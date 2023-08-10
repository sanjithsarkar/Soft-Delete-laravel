@extends('admin_master')
@section('admin')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Profile</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <div class="user-profile-image--default d-block">
                                    <img src="{{ asset('backend/image/avatar-15.png') }}" alt="" class="d-block">
                                    <span class="d-flex justify-content-center mt-4">{{$user->name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 ">
                        <table class="table table-bordered text-center">
                            <tbody>
                                <tr>
                                  <td>Name</td>
                                  <td>
                                    {{ $user->name }}
                                  </td>
                                </tr>
                                <tr>
                                  <td>Email</td>
                                  <td>
                                    {{ $user->email }}
                                  </td>
                                </tr>
                                <tr>
                                    <td>UserType</td>
                                    <td>
                                      {{ $user->usertype }}
                                    </td>
                                  </tr>
                              </tbody>
                          </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
