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
                        <td>{{ $items->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $items->users->name }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $items->address->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            <p> {{ $items->address->address }}, {{ $items->address->city }} </p>
                            <p> {{ $items->address->province }}, {{ $items->address->postal_code }} </p>
                        </td>
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
                                @foreach ($items->orders as $order)
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
                        <td>${{ $items->payments[0]->amount }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
