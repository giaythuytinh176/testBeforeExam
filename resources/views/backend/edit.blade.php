@extends('backend.master')

@section('content')

    <div class="container">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                                                                       href="https://datatables.net">official DataTables
                documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                                    @if($errors->any())
                                        {{ $errors->first('name') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>
                                    <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                                    @if($errors->any())
                                        {{ $errors->first('price') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>
                                    <input type="file" class="form-control" name="image">
                                    <input type="hidden" class="form-control" name="imageName" value="{{ $product->image }}">
                                    @if($errors->any())
                                        {{ $errors->first('image') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>
                                    <textarea name="description" id="" cols="100" rows="10">
                                      {{ $product->description }}
                                </textarea>
                                    @if($errors->any())
                                        {{ $errors->first('description') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="4">
                                    <input type="submit" value="Submit">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
