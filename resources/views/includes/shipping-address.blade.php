<!-- Modal for Shipping Address -->
<div class="modal fade" id="shippingAddress" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content dark">
      <div class="modal-header">
        <h4 class="modal-title small" id="exampleModalToggleLabel">Choose Shipping Address</h4>
      </div>
      <div class="modal-body">
        <button class="btn-secondary new-address" data-bs-target="#newAddress" data-bs-toggle="modal">Add New Address</button>
        <br>

        @foreach ($address as $my_address)
        <div class="my-address">
          <div class="shipping-address">
            <div class="address">
                <p>
                    <b>
                        {{ auth()->user()->name }}
                    </b> 
                    &nbsp; ({{ $my_address->label }})
                    <br>
                    {{ $my_address->phone_number }}
                    <br>
                    {{ $my_address->address }}, {{ $my_address->city }}
                    <br>
                    {{ $my_address->province }}, {{ $my_address->postal_code }}
                </p>
                <a href="#">Edit</a>
              </div>
          </div>
        
        </div>
        @endforeach

      </div>
      <div class="modal-footer text-center mb-3">
    
            <button class="btn-primary address">Checkout</button>
         
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="newAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content dark">
      <form action="/address/create" method="post">
          @csrf
          <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
      <div class="modal-header">
        <h2 class="modal-title small" id="exampleModalToggleLabel">Shipping Address</h2>
      </div>
      <div class="modal-body">
        @foreach ($errors->address->all() as $message)
          <li style="color:red;">{{ $message }}</li>
        @endforeach
      <br>
        <label for="label" class="mb-2">
          Label
        </label>
        <input type="text" name="label" class="form-control input-modal mb-3">
        <label for="phone_number" class="mb-2">
          Phone Number
        </label>
        <input type="text" name="phone_number" class="form-control input-modal mb-3">
        <label for="province" class="mb-2">
          Province
        </label>
        <input type="text" name="province" class="form-control input-modal mb-3">
        <label for="city" class="mb-2">
          City
        </label>
        <input type="text" name="city" class="form-control input-modal mb-3">
        <label for="address" class="mb-2">
          Address
        </label>
        <textarea class="form-control input-modal mb-3" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
        <label for="postal_code" class="mb-2">
          Postal Code
        </label>
        <input type="number" name="postal_code" class="form-control input-modal mb-5">
        <input type="submit" class="btn-primary btn-login mb-3" value="Add this address">
      </div>
      </form>
    </div>
  </div>
</div>