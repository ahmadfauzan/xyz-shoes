@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Flash Sale</h1>
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
                <form action="{{ route('flash_sale.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="discounts_Id">Product</label>
                        <select name="discounts_id" required class="form-control">
                            <option value="">Choose Product</option>
                            @foreach ($discounts as $discount)
                                <option value="{{ $discount->id }}">{{ $discount->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                       
                    <div class="form-group">
                        <label for="start_at">Start at</label>
                        <input type='text' class="form-control" placeholder="Start at"
                           value="{{ old('start_at') }}" name="start_at" id='datetimepicker1' />
                    </div>
                    <div class="form-group">
                        <label for="finish_at">Finish at</label>
                         <input type='text' class="form-control" name="finish_at" placeholder="Finish at"
                           value="{{ old('finish_at') }}" id='datetimepicker2' />
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
