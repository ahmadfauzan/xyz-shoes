@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Transaction</h1>
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
                        <td>{{ $items->transaction->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $items->transaction->users->name }}</td>
                    </tr>
                    
                    <tr>
                        <th>Orders</th>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>qty</th>
                                    <th>Donation Percentage</th>
                                    <th>Price</th>
                                </tr>
                                @php
                                    $donation = 0;
                                @endphp
                                @foreach ($items->transaction->orders as $order)
                                @php 
                                    $donation += $order->products->donation * $order->qty;
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->products->name }}</td>
                                        <td>{{ $order->qty }}</td>
                                        <td>{{ $order->products->donation }}% x {{ $order->qty }} piece <b>({{ $order->products->donation*$order->qty }}%)</b></td>
                                        <td>${{ $order->price }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th>Total price</th>
                        <td>${{ $items->transaction->payments[0]->amount }}</td>
                    </tr>
                    <tr>
                        <th>Total donation</th>
                        <td><b>${{ $items->amount }}  ({{ $donation }}%)</b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
