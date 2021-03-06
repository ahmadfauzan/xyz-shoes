@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Discount</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card w-50 shadow">
            <div class="card-body">
                <form action="{{ route('discount.update', $item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="product_id">Product</label>
                        <input type="text" class="form-control" placeholder="Product"
                           value="{{ $item->product->name }}" readonly>
                        <input type="hidden" class="form-control" name="product_id"  placeholder="Product"
                           value="{{ $item->product_id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="discount_percentage">Discount Percentage</label>
                        <input type="text" class="form-control" name="discount_percentage" placeholder="Discount Percentage"
                           value="{{ $item->discount_percentage }}">
                    </div>
                    <div class="form-group">
                        <label for="start_at">Start at</label>
                        <input type="date" class="form-control" name="start_at" placeholder="Start at"
                           value="{{ $item->start_at }}">
                    </div>
                    <div class="form-group">
                        <label for="finish_at">Finish at</label>
                        <input type="date" class="form-control" name="finish_at" placeholder="Finish at"
                           value="{{ $item->finish_at }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
