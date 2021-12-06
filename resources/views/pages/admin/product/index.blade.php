@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
            <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Product
            </a>
        </div>
            <ol class="breadcrumb" style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#">Manage Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>

        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Category</th>
                                <th>Type Size</th>
                                <th>Size</th>
                                <th>Description</th>
                                <th>Gender</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Donation</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->categories->name }}</td>
                                    <td>{{ $item->type_sizes->name }}</td>
                                    <td>
                                      @foreach ($item->sizes as $size)
                                            {{ $size->size }}
                                        @endforeach
                                    </td>
                                    <td>{{ substr($item->desc,0, 20) }}...</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->donation }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

@endsection
