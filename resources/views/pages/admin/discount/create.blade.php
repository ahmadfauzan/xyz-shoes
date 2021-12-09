@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Discount</h1>
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
                <form action="{{ route('discount.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="product_id">Product</label>
                        <select name="product_id" required class="form-control">
                            <option value="">Choose Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="discount_percentage">Discount Percentage</label>
                        <input type="text" class="form-control" name="discount_percentage" placeholder="Discount Percentage"
                           value="{{ old('discount_percentage') }}">
                    </div>
                    <div class="form-group">
                        <label for="start_at">Start at</label>
                        <input type="date" class="form-control" name="start_at" placeholder="Start at"
                           value="{{ old('start_at') }}">
                    </div>
                    <div class="form-group">
                        <label for="finish_at">Finish at</label>
                        <input type="date" class="form-control" name="finish_at" placeholder="Finish at"
                           value="{{ old('finish_at') }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
