@extends('layouts.cart') @section('title', 'Cart - XYZ SHOES')
@section('content')

<!-- content -->
<main>
    <section class="content-cart">
        <div class="container">
            <h2>In you'r bag</h2>
            <div class="d-flex">
                <div class="flex-grow-1">
                    <section class="select-all">
                        <form action="/order/create" method="post">
                        @csrf
                            <div class="form-check">
                            <div class="d-flex">
                                <div class="check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name=""
                                        id="select-all"
                                        onClick="toggle(this);javacript:EnableDisableButton(this, 0);"
                                        checked
                                    />
                                </div>
                                <div class="flex-grow-1">
                                    <label
                                        class="form-check-label"
                                        for="flexCheckChecked"
                                    >
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
                        <input type="hidden" name="products_id[]" value="{{ $cart->products->id }}">
                        <input type="hidden" name="users_id[]" value="{{ auth()->user()->id }}">
                        <div class="d-flex align-items-center">
                            <div class="row">
                                <div class="col-1 my-auto me-2">
                                    <input
                                        class="form-check-input select"
                                        name="select[]"
                                        type="checkbox"
                                        id="select"
                                        value="{{ $loop->index }}"
                                        onclick="javacript:EnableDisableButton(this,{{ $loop->iteration }});"
                                       />
                                </div>
                                <div class="col-2">
                                    <div class="card-cart">
                                        <img
                                            src="{{ asset('storage/images/'. $cart->products->galleries[1]->image) }}"
                                            class="img-card"
                                            alt=""
                                        />
                                    </div>
                                </div>
                                <div
                                    class="col-6 qty-container"
                                    style="margin-left: 4rem !important"
                                >
                                    <p class="name">
                                        {{ $cart->products->name }}
                                    </p>
                                    <div class="qty mt-2">
                                        <button
                                            type="button"
                                            class="qty-btn remove"
                                        >
                                            <span
                                                class="icon"
                                                data-feather="minus-circle"
                                            ></span>
                                        </button>
                                        <input
                                            type="text"
                                            name="qty[]"
                                            class="quantity"
                                            size="1"
                                            value="{{ $cart->qty }}"
                                        />
                                        <input
                                            type="hidden"
                                            class="base-qty"
                                            value="{{ $cart->qty }}"
                                        />
                                        <!-- <span class="quantity">1</span> -->
                                        <button
                                            type="button"
                                            class="qty-btn add"
                                        >
                                            <span
                                                class="icon"
                                                data-feather="plus-circle"
                                            ></span>
                                        </button>
                                    </div>
                                    <p class="price" id="price">
                                        ${{ $cart->products->price * $cart->qty }}
                                    </p>
                                        <input
                                            type="hidden"
                                            class="price-input"
                                            name="price[]"
                                            value="{{ $cart->products->price * $cart->qty }}"
                                        />
                                        <input
                                            type="hidden"
                                            class="normal-price"
                                            value="{{ $cart->products->price }}"
                                        />
                             @if (count($cart->products->discount) > 0)

                                        @php
                                        $check = is_discount($cart->products_id,
                                                   $cart->products->discount[0]->product_id,
                                                    $cart->products->discount[0]->start_at,
                                                    $cart->products->discount[0]->finish_at);
                                         @endphp
                                    @if($check == 'true')
                                        <div class="label-discount text-center">
                                            {{ $cart->products->discount[0]->discount_percentage }}%
                                        </div>
                                @endif
                                @endif
                                </div>
                            </div>

                            <div class="ms-auto">
                                <div class="remove-btn">
                                    <button class="btn-remove" type="button" onclick="window.location.href='/cart/{{ $cart->id }}'">
                                        <span
                                            class="icon"
                                            data-feather="x"
                                        ></span>
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
                            <div class="label-sub-price">Sub Price</div>
                            <div class="sub-price" id="sub-price">
                                @php $total = 0; @endphp @foreach ($carts as
                                $cart) @php $total += ($cart->products->price *
                                $cart->qty) @endphp @endforeach ${{ $total }}
                            </div>
                        </div>
                        
                        <hr />
                        <div class="d-flex justify-content-between">
                            <div class="label-total-price">Total Price</div>
                            <div class="total-price" id="total-price">
                                @php $total = 0; @endphp @foreach ($carts as
                                $cart) @php $total += ($cart->products->price *
                                $cart->qty) @endphp @endforeach ${{ $total }}
                            </div>
                        </div>
                        <div class="d-grid">
                            <button
                                type="submit"
                                class="btn-primary"
                                id="checkout"
                                disabled
                            >
                                Checkout
                            </button>
                        </div>
                    </form>
                    </section>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection @push('addon-script')
<script>
    var value,
        quantity = document.getElementsByClassName("qty-container");

    function createBindings(quantityContainer) {
        var quantityAmount =
            quantityContainer.getElementsByClassName("quantity")[0];
        var baseQty = quantityContainer.getElementsByClassName("base-qty")[0];
        var price = quantityContainer.getElementsByClassName("price")[0];
        var priceInput = quantityContainer.getElementsByClassName("price-input")[0];
        var normalPrice = quantityContainer.getElementsByClassName("normal-price")[0];
        var increase = quantityContainer.getElementsByClassName("add")[0];
        var decrease = quantityContainer.getElementsByClassName("remove")[0];
        increase.addEventListener("click", function () {
            increaseValue(quantityAmount, normalPrice, price, priceInput);
        });
        decrease.addEventListener("click", function () {
            decreaseValue(quantityAmount, normalPrice, price, priceInput, baseQty);
        });
    }

    function init() {
        for (var i = 0; i < quantity.length; i++) {
            createBindings(quantity[i]);
        }
    }

    function increaseValue(quantityAmount, normalPrice, price, priceInput) {
        var totalPrice;

        value = parseInt(quantityAmount.value, 10);

        value = isNaN(value) ? 0 : value;
        value++;
        quantityAmount.value = value;
        //   quantity.textContent = quantityAmount.value;
        totalPrice = normalPrice.value * value;
        price.innerHTML = "$" + totalPrice;
        priceInput.value = totalPrice;
        console.log(priceInput.value);
        return quantityAmount;
    }

    function decreaseValue(quantityAmount, normalPrice, price, priceInput, baseQty) {
        var totalPrice;

        value = parseInt(quantityAmount.value, 10);

        value = isNaN(value) ? 0 : value;

        if (value > 1) value--;

        quantityAmount.value = value;
        totalPrice = normalPrice.value * value;
        price.innerHTML = "$" + totalPrice;
        priceInput.value = totalPrice;
        console.log(priceInput.value);
    }

    init();
</script>
<script language="JavaScript">

    checker = document.getElementById("select-all");
    checkboxes = document.getElementsByClassName("select");

    if(checker.checked){
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = true;
            document.getElementById('checkout').disabled = false;
        }
    }

    function toggle(source) {
        checkboxes = document.getElementsByClassName("select");
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
<script>
    var idList = ";"

    function EnableDisableButton(cb, id) {

        if (cb.checked == 1) {
        idList = idList + id + ";"
        }

        if (cb.checked == 0) {
        var v;
        v = ";" + id + ";"
        idList = idList.replace(v, ";");
        }

        if (idList == ";") {
        document.getElementById('checkout').disabled = true;
        } else {
        document.getElementById('checkout').disabled = false;
        }

    }
</script>
@endpush
