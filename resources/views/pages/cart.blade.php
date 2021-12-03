@extends('layouts.cart')

@section('title', 'Cart - XYZ SHOES')

@section('content')

<!-- content -->
<main>

    <section class="content-cart">
        <div class="container">
            <h2>In you'r bag</h2>
            <div class="d-flex">
                <div class="flex-grow-1">

                    <section class="select-all">
                        <div class="form-check">
                            <div class="d-flex">
                                <div class="check">
                                    <input class="form-check-input" type="checkbox" name="" id="">
                                </div>
                                <div class="flex-grow-1">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Select All
                                    </label>
                                </div>
                                <div class="trash">
                                    <button class="btn-trash">
                                        <span data-feather="trash-2"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="list-cart">
                        @foreach ($carts as $cart)
                        <div class="d-flex align-items-center">

                            <div class="row">
                                <div class="col-1 my-auto me-2">
                                    <input class="form-check-input" type="checkbox" name="" id="">
                                </div>
                                <div class="col-2">
                                    <div class="card-cart">
                                        <img src="frontend/images/sepatu_4.png" class="img-card" alt="">
                                    </div>
                                </div>
                                <div class="col-6 qty-container" style="margin-left: 4rem !important;">
                                    <p class="name">
                                        {{ $cart->products->name }}
                                    </p>
                                    <div class="qty mt-2">
                                        <button class="qty-btn remove">
                                            <span class="icon" data-feather="minus-circle"></span>
                                        </button>
                                        <input type="text" class="quantity" size="1" value="{{ $cart->qty }}">
                                        <input type="hidden" class="base-qty" value="{{ $cart->qty }}">
                                        <!-- <span class="quantity">1</span> -->
                                        <button class="qty-btn add">

                                            <span class="icon" data-feather="plus-circle"></span>
                                        </button>
                                    </div>
                                    <p class="price" id="price">
                                        ${{ $cart->products->price * $cart->qty }}
                                        <input type="hidden" class="normal-price" name="normal-price" value="{{ $cart->products->price }}">
                                    </p>
                                </div>
                            </div>

                            <div class="ms-auto">
                                <div class="remove-btn">
                                    <button class="btn-remove">
                                        <span class="icon" data-feather="x"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </section>
                </div>
                <div>

                    <section class="order-summary">
                        <h5>Order Summary</h5>
                        <div class="d-flex justify-content-between">
                            <div class="label-sub-price">
                                Sub Price
                            </div>
                            <div class="sub-price">
                               @php
                                   $total = 0;
                               @endphp
                               @foreach ($carts as $cart)
                                   @php
                                       $total += ($cart->products->price * $cart->qty)
                                   @endphp
                               @endforeach
                               ${{ $total }}
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="label-total-price">
                                Total Price
                            </div>
                            <div class="total-price">
                                 @php
                                   $total = 0;
                               @endphp
                               @foreach ($carts as $cart)
                                   @php
                                       $total += ($cart->products->price * $cart->qty)
                                   @endphp
                               @endforeach
                               ${{ $total }}
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn-primary" data-bs-target="#shippingAddress" data-bs-toggle="modal">Checkout</button>
                        </div>
                    </section>
                </div>
            </div>


        </div>
    </section>
</main>
@endsection


@push('addon-script')
<script>
    var value, quantity = document.getElementsByClassName('qty-container');

    function createBindings(quantityContainer) {
        var quantityAmount = quantityContainer.getElementsByClassName('quantity')[0];
        var baseQty = quantityContainer.getElementsByClassName('base-qty')[0];
        var price = quantityContainer.getElementsByClassName('price')[0];
        var normalPrice = quantityContainer.getElementsByClassName('normal-price')[0];
        var increase = quantityContainer.getElementsByClassName('add')[0];
        var decrease = quantityContainer.getElementsByClassName('remove')[0];
        increase.addEventListener('click', function() {
            increaseValue(quantityAmount, normalPrice, price);
        });
        decrease.addEventListener('click', function() {
            decreaseValue(quantityAmount, normalPrice, price, baseQty);
        });
    }



    function init() {
        for (var i = 0; i < quantity.length; i++) {
            createBindings(quantity[i]);
        }
    }

    function increaseValue(quantityAmount, normalPrice, price) {
        var totalPrice;

        value = parseInt(quantityAmount.value, 10);

        value = isNaN(value) ? 0 : value;
        value++;
        quantityAmount.value = value;
        //   quantity.textContent = quantityAmount.value;
        totalPrice = normalPrice.value * value;
        price.innerHTML = '$' + totalPrice;
        return (quantityAmount);
    }

    function decreaseValue(quantityAmount, normalPrice, price, baseQty) {
        var totalPrice;

        value = parseInt(quantityAmount.value, 10);

        value = isNaN(value) ? 0 : value;

        if (value > baseQty.value) value--;



        quantityAmount.value = value;
        totalPrice = normalPrice.value * value;
        price.innerHTML = '$' + totalPrice;
    }

    init();

</script>
 <script>
        @if(count($errors->address) > 0)
            var myModal = new bootstrap.Modal(document.getElementById("newAddress"), {});
            document.onreadystatechange = function() {
            myModal.show();
            };
        @endif
    </script>
@endpush
