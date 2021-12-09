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
            @php
                $start_at = date("m/d/y H:i A", strtotime($item->start_at));
                $finish_at = date("m/d/y H:i A", strtotime($item->finish_at));
            @endphp
                <form action="{{ route('flash_sale.update', $item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="discounts_id">Product</label>
                         <input type="text" class="form-control" placeholder="Product"
                           value="{{ $item->discounts->product->name }}" readonly>
                        <input type="hidden" class="form-control" name="discounts_id"  placeholder="Product"
                           value="{{ $item->discounts_id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="start_at">Start at</label>
                        <input type='text' class="form-control" placeholder="Start at"
                           value="{{ $start_at }}" name="start_at" id='datetimepicker1' />
                    </div>
                    <div class="form-group">
                        <label for="finish_at">Finish at</label>
                         <input type='text' class="form-control" name="finish_at" placeholder="Finish at"
                           value="{{ $finish_at  }}" id='datetimepicker2' />
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
