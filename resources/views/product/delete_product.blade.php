@extends('admin_master')
@section('admin')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product List</h3>
                <a class="float-right mr-4 btn btn-outline-success" href="{{ route('products.create') }}"><strong>Add
                        Product</strong></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tablecontents"">
                        @php$i = 0; @endphp
                        @foreach ($Productlist as $key => $product)
                            <tr class="row1" data-id="{{ $product->id }}">
                                <td width="10% " scope="row">{{ ++$key }}</td>
                                <td width="10%">{{ $product->name }}</td>
                                <td width="10%">{{ $product->pro_quantity }}</td>
                                <td width="10%">{{ $product->pro_price }}</td>
                                <td width="30%">
                                    <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                        class="btn btn-outline-primary btn-sm mr-2">
                                        <i class="fa fa-eye" aria-hidden="true">
                                            Show
                                        </i>
                                    </a>

                                    <form action="{{ route('products.restore', ['id' => $product->id]) }}" method="post">
                                        @csrf
                                        @method('POST')

                                        <button type="submit" class="btn btn-outline-success btn-sm mr-2">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                            Restore
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <h5>Drag and Drop the table rows and <button class="btn btn-success btn-sm" onclick="window.location.reload()">REFRESH</button> the page to check the Demo.</h5>  --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
