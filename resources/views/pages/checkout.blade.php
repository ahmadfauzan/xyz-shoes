@extends('layouts.checkout') @section('title', 'Checkout - XYZ SHOES')
@section('content')

    <!-- content -->
    <main>
       <section class="content-cart">
            <div class="container">
                <h2>Checkout</h2>
                <div class="d-flex">
                  <div class="flex-grow-1">

                <section class="shipping-address">
                    <h5>
                        Shipping Address
                    </h5>
                    @if (count($address)<1)
                      <div class="address">
                        <p> No data yet </p>
                      </div>
                    @else
                      <div class="address">
                          <p>
                              <b>
                                  {{ auth()->user()->name }}
                              </b> 
                              &nbsp; ({{ $address[0]->label }})
                              <br>
                              {{ $address[0]->phone_number }}
                              <br>
                              {{ $address[0]->address }}, {{ $address[0]->city }}
                              <br>
                              {{ $address[0]->province }}, {{ $address[0]->postal_code }}
                          </p>
                          <div class="d-grid">
                              <button class="btn-primary" data-bs-target="#shippingAddress" data-bs-toggle="modal">choose another address</button>
                          </div>
                      </div>
                    @endif
                  
                </section>
                
                <section class="list-cart mt-4">
                
                @foreach ($orders as $order)
                  <div class="d-flex align-items-center">

                    <div class="row">
                      <div class="col-2">
                        <div class="card-cart">
                          <img src="frontend/images/sepatu_4.png" class="img-card" alt="">
                        </div>
                      </div>
                      <div class="col-6"  style="margin-left: 5rem !important">
                        <p class="name">
                          {{ $order->products->name }}
                        </p>
                        <p class="qty-checkout">
                            {{ $order->qty }} piece
                        </p>
                        <p class="price" id="price">
                          ${{ $order->price }}
                        </p>
                      </div>
                    </div>

  
                  </div>
                @endforeach

                </section>
              </div>
              <div>

                <section class="order-summary">
                  <h5>Order Summary</h5>
                  <div class="d-flex justify-content-between mb-1">
                    <div class="label-sub-price">
                      Shipping Price
                    </div>
                    <div class="ship-price">
                      Free
                    </div>
                  </div>
                <div class="d-flex justify-content-between">
                  <div class="label-sub-price">
                    Sub Price
                  </div>
                  <div class="sub-price">
                    @php
                      $total=0;
                    @endphp
                    @foreach ($orders as $order)
                      @php
                         $total+=$order->price
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
                      ${{ $total }}
                    </div>
                  </div>
                  <div class="d-grid">
                    <button class="btn-primary payment" data-bs-target="#payment" data-bs-toggle="modal">I have made payment</button>
                  </div>
                </section>

                <section class="payment-intructions">
                    <h5>
                        Payment Intructions
                    </h5>
                    <p>
                        Please complete payment before you 
                        continue the wonderful trip     
                    </p>
                    <img src="frontend/images/logo-bca.png" alt="">
                    <p class="bank-detail">
                        PT XYZ SHOES
                        <br>
                        0881 8829 8800
                        <br>
                        Bank Central Asia
                    </p>
                </section>
              </div>
              </div>
              
          

            </div>
       </section>
    </main>

    <!-- Modal for payment -->
    <div class="modal fade" id="payment" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content dark">
        <form action="/transaction/create" method="POST" enctype="multipart/form-data">
        @csrf
          <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
          <input type="hidden" name="total_shipping" value="0">
          <input type="hidden" name="total_price" value="{{ $total }}">

         @if (count($address)>0)
          <input type="hidden" name="address_id" value="{{ $address[0]->id }}">
          @endif
          
          @foreach ($orders as $order)
          <input type="hidden" name="orders_id[]" value="{{ $order->id }}">
          @endforeach
          @if(count($carts)>0)         
          @foreach ($carts as $cart)
          <input type="hidden" name="carts_id[]" value="{{ $cart->id }}">
          @endforeach
          @endif
          
          <div class="modal-header">
            <h2 class="modal-title small" id="exampleModalToggleLabel">Payment</h2>
          </div>
          <div class="modal-body">
            <label for="account_name" class="mb-2">
              Account Name
            </label>
            <input type="text" name="account_name" class="form-control input-modal mb-3">
            <label for="provider" class="mb-2">
              Provider
            </label>
            <input type="text" name="provider" class="form-control input-modal mb-3">
            <label for="amount" class="mb-2">
              Amount
            </label>
            <span class="dollar">$</span>
            <input type="text" name="amount" class="form-control input-modal amount mb-3" value="{{ $total }}" readonly>
            <label for="proof_of_payment" class="form-label mt-1">Proof of payment</label>
            <input class="form-control input-modal mb-5" name="proof_of_payment" type="file" id="formFile">
            <input type="submit" class="btn-primary btn-login mb-3" value="Submit">
          </div>
          </form>
        </div>
      </div>
    </div>

    @endsection

    @push('addon-script')
    <script>
      @if (count($address) < 1)
          var myModal = new bootstrap.Modal(document.getElementById("newAddress"), {});
          document.onreadystatechange = function() {
          myModal.show();
          };
      @endif
    </script>
    <script>
      @if(count($errors->address) > 0)
          var myModal = new bootstrap.Modal(document.getElementById("newAddress"), {});
          document.onreadystatechange = function() {
          myModal.show();
          };
      @endif
    </script>
    {{--  {{ dd($errors->payment->all()) }}  --}}
    {{--  {{ dd($errors->address->all()) }}  --}}

    <script>
        @if (count($errors->payment) > 0)
               @foreach ($errors->payment->all() as $message)
                  alert('{{ $message }}');
                  @endforeach
        @endif
    </script>

    @endpush