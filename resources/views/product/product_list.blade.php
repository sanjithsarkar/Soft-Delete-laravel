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

                                    @if (Auth::user()->usertype == 'Admin' || Auth::user()->usertype == 'Operator')
                                        <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                            class="btn btn-outline-success btn-sm mr-2">
                                            <i class="fa fa-edit" aria-hidden="true">
                                                Edit
                                            </i>
                                        </a>
                                    @endif


                                    @if (Auth::user()->usertype == 'Admin')
                                        <form action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-outline-danger btn-sm mr-2">
                                                <i class="fa fa-eye" aria-hidden="true">
                                                    Delete
                                                </i>
                                            </button>
                                        </form>
                                    @endif
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

    <script type="text/javascript">
        $(function() {
            //   $("#table").DataTable();

            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('product-sortable') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
@endsection
