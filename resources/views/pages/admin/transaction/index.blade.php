@extends('layouts.admin')

@section('content')

<style>
.popup{
  
}
.popup img{
    width: 200px;
    height: 200px;
    cursor: pointer
}
.show-img{
    z-index: 999;
    display: none;
}
.show-img .overlay{
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.66);
    position: absolute;
    top: 0;
    left: 0;
}
.show-img .img-show{
    width: 600px;
    height: 400px;
    background: #FFF;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden
}
.img-show span{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
/*End style*/

</style>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
        </div>

        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total Shipping</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Proof of Payment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->users->name }}</td>
                                    <td>${{ $item->total_shipping }}</td>
                                    <td>${{ $item->total_price }}</td>
                                    <td>{{ date("d/m/Y H:i:s", strtotime($item->created_at)) }}</td>
                                    <td>
                                    <div class="popup">
                                     <img src="{{ asset('storage/images/'.$item->payments[0]->proof_of_payment) }}" alt="" style="width: 150px"
                                            class="img-thumbnail" /></td>
                                    </div>
                                    <td>{{ $item->status == 1 ? 'not verified' : ($item->status == 2 ? 'verified' : ($item->status == 3 ? 'done' : ''))  }}
                                        <br>
                                        <form action="{{ route('transaction.update', $item->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('put')
                                            @if($item->status == 1)
                                                <input type="hidden" name="status" value="2" />
                                                <button class="btn btn-success">
                                                    Verify
                                                </button>
                                            @elseif($item->status == 2)
                                                <input type="hidden" name="status" value="3" />
                                                 <button class="btn btn-success">
                                                    Done
                                                </button>
                                            @endif
                                        </form>

                                    </td>
                                    <td>
                                        <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{ route('transaction.destroy', $item->id) }}" method="post"
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
    <div class="show-img">
  <div class="overlay"></div>
  <div class="img-show">
    <span>X</span>
    <img src="">
  </div>
</div>

    </div>
    <!-- /.container-fluid -->
<script>
$(function () {
    "use strict";
    
    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show-img").fadeIn();
        $(".img-show img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".show-img").fadeOut();
    });
    
});
</script>

@endsection
