@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Donation</h1>
        </div>

        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Transaction</th>
                                <th>Date</th>
                                <th>Total Price</th>
                                <th>Donation Percentage</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->transaction->id }}</td>
                                    <td>{{ date("d/m/Y H:i:s", strtotime($item->created_at)) }}</td>
                                    <td>${{ $item->transaction->total_price }}</td>
                                    @php
                                        $donation = 0;
                                    @endphp
                                    @foreach ($item->transaction->orders as $order)
                                        @php
                                            $donation += $order->products->donation * $order->qty;
                                        @endphp
                                    @endforeach
                                    <td>{{ $donation }}%</td>
                                    <td>${{ $item->amount }}</td>
                                    <td>
                                        <a href="{{ route('donation.show', $item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
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
