@extends('backend.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                                                                       href="https://datatables.net">official DataTables
                documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $key => $product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price) }} d</td>
                                <td>
                                    <img src="{{ asset('images/' . $product->image) }}" alt="">
                                </td>
                                <td>
                                    {{ $product->description }}
                                </td>
                                <td>
                                    <a href="{{ route("admin.edit", $product->id) }}">Edit</a>
                                    <a href="{{ route("admin.destroy", $product->id) }}">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Data not available.</td>
                            </tr>

                        @endforelse
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>


@endsection
