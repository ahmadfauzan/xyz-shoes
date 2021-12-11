@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Flash Sale</h1>
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

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $item->id }}</td>
                    </tr>
                    <tr>
                        <th>Start at</th>
                        <td>{{ $item->start_at }}</td>
                    </tr>
                    <tr>
                        <th>Finish at</th>
                        <td>{{ $item->finish_at }}</td>
                    </tr>
                    
                    <tr>
                        <th>Product</th>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Donation Percentage</th>
                                </tr>
                                @foreach ($item->discounts as $discount)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $discount->product->name }}%</td>
                                        <td>{{ $discount->discount_percentage }}%</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
