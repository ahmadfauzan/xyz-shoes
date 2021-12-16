@extends('layouts.home')

@section('title', 'XYZ SHOES')

@section('content')

@if (session()->has('success'))
<script>
alert("{{ session('success') }}");
</script>
@endif
    <!-- Header -->
    <header>
        <div class="container">
            @if($is_detail)      
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                        @foreach ($detail->galleries as $gallery)       
                            <div class="carousel-item {{ $detail->galleries[1]->image == $gallery->image ? 'active' : '' }}">
                                <img src="{{ asset('storage/images/'. $gallery->image) }}" class="d-block w-100 img-display {{ $detail->galleries[1]->image == $gallery->image ? 'rotate-28' : '' }}" alt="...">
                            </div>
                        @endforeach
                        </div>
                        <div class="carousel-indicators">
                            <div class="row align-items-center">
                              @foreach ($detail->galleries as $gallery)       
                                <div class="col d-none d-sm-none d-md-none d-lg-none d-xl-block">
                                    <div class="{{ $detail->galleries[1]->image == $gallery->image ? 'main-' : '' }}background-indicator shadow p-3 mb-5">
                                        <button class="{{ $detail->galleries[1]->image == $gallery->image ? 'main-' : '' }}btn-indicator" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"
                                            aria-current="true" aria-label="Slide 1">
                                            <img src="{{ asset('storage/images/'. $gallery->image) }}" class="img-indicator {{ $detail->galleries[1]->image == $gallery->image ? 'main rotate-28' : '' }}" alt="">
                                        </button>
                                    </div>
                                </div>
                              @endforeach
                   
                            </div>
                            <div class="hidden-btn">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="0">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <!-- Detail-product -->
                <div class="col-lg-4">
                    <div class="title">
                        {{ $detail->name }}
                    </div>
                    <div class="star">
                        <h4>
                            @php
                                $rate=0;
                            @endphp
                            @foreach ($detail->ratings as $rating)
                                @php
                                floor($rate += $rating->rate / $rating->count());
                                @endphp    
                            @endforeach
                            @for ($i=0; $i<floor($rate); $i++)    
                                <i class="icon ph-star-fill"></i>
                            @endfor
                            @for ($i=0; $i<5-$rate; $i++)    
                                <i class="icon ph-star"></i>
                            @endfor
                        </h4>
                    </div>
                    <p class="description">
                        {{ $detail->desc }}

                    </p>
                    <form action="/cart/create" method="POST">
                        @csrf
                    <input type="hidden" name="products_id" value="{{ $detail->id }}">
                    @auth
                    <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                    @endauth
                    <p class="label-size">
                        {{ $detail->type_sizes->name }}
                        <input type="hidden" name="type_size" value="{{ $detail->type_sizes->name }}">
                    </p>
            
                    @foreach ($detail->sizes->sortBy('size') as $size)
                    <input type="radio" class="btn-check" name="size" id="option{{ $loop->index + 1}}" autocomplete="off" value="{{ $size->size }}" {{ (($detail->sizes[0]->size) == ($size->size)) ? 'checked' : '' }}>
                    <label class="btn-size me-2" for="option{{ $loop->index + 1 }}">{{ $size->size }}</label>
                    @endforeach
                    
                          
                        <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-3">
                            <div class="qty mt-3" id="qty">
                                <button type="button" class="qty-btn remove" id="remove">
                                    <span class="icon" data-feather="minus-circle"></span>
                                </button>
                                <input type="text" class="quantity" size="1" value="1" name="qty">
                                <button type="button" class="qty-btn add">
                                    <span class="icon" data-feather="plus-circle"></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-6 col-md-9">
                            <p class="price mt-2" id="price">
                                ${{ $detail->price }}
                            </p>
                        </div>
                    </div>
                    <input type="submit" class="btn-secondary shadow" name="add2bag" value="Add to bag">
                    <input type="button" class="btn-primary btn-buy-now ms-2  shadow" name="buyNow" value="Buy Now" onclick="window.location.href='/buyNow/{{ $items[0]->id }}'">
                </form>
                </div>
            </div>


            @else
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        @foreach ($items[0]->galleries as $gallery)
                            <div class="carousel-item {{ $items[0]->galleries[1]->image == $gallery->image ? 'active' : '' }}">
                                <img src="{{ asset('storage/images/'. $gallery->image) }}" class="d-block w-100 img-display {{ $items[0]->galleries[1]->image == $gallery->image ? 'rotate-28' : '' }}" alt="...">
                            </div>
                        @endforeach
                  
                        </div>
                        <div class="carousel-indicators">
                            <div class="row align-items-center">
                                @foreach ($items[0]->galleries as $gallery)
                                <div class="col d-none d-sm-none d-md-none d-lg-none d-xl-block">
                                    <div class="{{ $items[0]->galleries[1]->image == $gallery->image ? 'main-' : '' }}background-indicator shadow p-3 mb-5">
                                        <button class="{{ $items[0]->galleries[1]->image == $gallery->image ? 'main-' : '' }}btn-indicator" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"
                                            aria-current="true" aria-label="Slide 1">
                                            <img src="{{ asset('storage/images/'. $gallery->image) }}" class="img-indicator {{ $items[0]->galleries[1]->image == $gallery->image ? 'main rotate-28' : '' }}" alt="">
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                  
                            </div>
                            <div class="hidden-btn">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="0">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <!-- Detail-product -->
                <div class="col-lg-4">
                    <div class="title">
                        {{ $items[0]->name }}
                    </div>
                    <div class="star">
                        <h4>
                            @php
                                $rate=0;
                            @endphp
                            @foreach ($items[0]->ratings as $rating)
                                @php
                                floor($rate += $rating->rate / $rating->count());
                                @endphp    
                            @endforeach
                            @for ($i=0; $i<floor($rate); $i++)    
                                <i class="icon ph-star-fill"></i>
                            @endfor
                            @for ($i=0; $i<5-$rate; $i++)    
                                <i class="icon ph-star"></i>
                            @endfor
                        </h4>
                    </div>
                    <p class="description">
                        {{ $items[0]->desc }}

                    </p>
                    <form action="/cart/create" method="POST">
                        @csrf
                    <input type="hidden" name="products_id" value="{{ $items[0]->id }}">
                    @auth
                    <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                    @endauth
                    <p class="label-size">
                        {{ $items[0]->type_sizes->name }}
                        <input type="hidden" name="type_size" value="{{ $items[0]->type_sizes->name }}">
                    </p>
            
                    @foreach ($items[0]->sizes->sortBy('size') as $size)
                    <input type="radio" class="btn-check" name="size" id="option{{ $loop->index + 1}}" autocomplete="off" value="{{ $size->size }}" {{ (($items[0]->sizes[0]->size) == ($size->size)) ? 'checked' : '' }}>
                    <label class="btn-size me-2" for="option{{ $loop->index + 1 }}">{{ $size->size }}</label>
                    @endforeach
                    
                          
                        <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-3">
                            <div class="qty mt-3" id="qty">
                                <button type="button" class="qty-btn remove" id="remove">
                                    <span class="icon" data-feather="minus-circle"></span>
                                </button>
                                <input type="text" class="quantity" size="1" value="1" name="qty">
                                <button type="button" class="qty-btn add">
                                    <span class="icon" data-feather="plus-circle"></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-6 col-md-9">
                            <p class="price mt-2" id="price">
                                ${{ $items[0]->price }}
                            </p>
                        </div>
                    </div>
                    <input type="submit" class="btn-secondary shadow" name="add2bag" value="Add to bag">
                    <input type="button" class="btn-primary btn-buy-now ms-2  shadow" name="buyNow" value="Buy Now" onclick="window.location.href='/buyNow/{{ $items[0]->id }}'">
                </form>
                </div>
            </div>
            @endif
        </div>
    </header>

    <main>

        @if(count($flash_sale)>0)    
        @if((date("Y-m-d H:i:s") >= date($flash_sale[0]->start_at)) && (date("Y-m-d H:i:s") <= date($flash_sale[0]->finish_at)))
        <!-- Flash Sale -->
        <section class="flash-sale">
            <div class="container">
                <div class="row justify-content-start align-middle">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                        <h2>
                            Flash Sale
                        </h2>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                        <div class="time-remaining text-center" id="clockdiv">
                            <span class="hours"></span>
                            :
                            <span class="minutes"></span>
                            :
                            <span class="seconds"></span>
                            <!-- 12 : 20 : 20 -->
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                        <a href="#">See All <span class="icon" data-feather="arrow-right"></span></a>
                    </div>
                </div>

                <section class="list-product-flash-sale">
                    <!-- Laptop -->
                    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
                        <div class="row justify-content-center">
                            @foreach ($items as $item)
                                    @foreach ($item->discount->slice(0, 5) as $discount)
                                        <div class="col-3">
                                            <div class="card">

                                                <div class="label-discount text-center">
                                                    {{ $discount->discount_percentage }}%
                                                </div>
                                                <img src="{{ asset('storage/images/'. $item->galleries[1]->image) }}" class="img-card" alt="">
                                                <p class="name">
                                                    {{ $item->name }}
                                                </p>
                                                <p class="normal-price">
                                                    <s>
                                                        ${{ $item->price }}
                                                    </s>
                                                </p>
                                                <p class="price">
                                                    ${{ calc_discount($item->price, $discount->discount_percentage) }}
                                                </p>
                                                <button class="btn-primary btn-save2bag shadow" onclick="window.location.href='/save2bag/{{ $item->id }}'">
                                                    Save to bag
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach                                
                            @endforeach
              
                        </div>
                    </div>
                    <!-- Mobile -->
                    <div class="d-md-block d-lg-none">
                        <div id="carouselExampleIndicators" class="carousel" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="d-flex justify-content-center">
                                        <div>
                                            <div class="card">
                                                <div class="label-discount text-center">
                                                    70%
                                                </div>
                                                <img src="/frontend/images/sepatu_4.png" class="img-card" alt="">
                                                <p class="name">
                                                    Adidas biasa
                                                </p>
                                                <p class="normal-price">
                                                    <s>
                                                        $399
                                                    </s>
                                                </p>
                                                <p class="price">
                                                    $199.7
                                                </p>
                                                <button class="btn-primary btn-save2bag shadow">
                                                    Save to bag
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex justify-content-center">
                                        <div>
                                            <div class="card">
                                                <div class="label-discount text-center">
                                                    70%
                                                </div>
                                                <img src="/frontend/images/sepatu_4.png" class="img-card" alt="">
                                                <p class="name">
                                                    Adidas biasa
                                                </p>
                                                <p class="normal-price">
                                                    <s>
                                                        $399
                                                    </s>
                                                </p>
                                                <p class="price">
                                                    $199.7
                                                </p>
                                                <button class="btn-primary btn-save2bag shadow">
                                                    Save to bag
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-indicators mobile">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        @endif
        @endif

        <!-- New Arrival -->
        <section class="new-arrival">
            <div class="container">
                <div class="row justify-content-start align-middle">
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <h2>
                            New Arrival
                        </h2>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="#">See All <span class="icon" data-feather="arrow-right"></span></a>
                    </div>
                </div>

                <section class="list-product-new-arrival">
                    <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block">
                        <div class="row align-items-center">
                        @foreach ($items->sortByDesc('created_at')->take(3) as $item)
                         
                            <div class="col-4">
                                @if(count($items)>2)
                                    @if($loop->index == 1)                                  
                                    <div class="card2 main">
                                    @else
                                    <div class="card2">
                                    @endif
                                @else   
                                <div class="card2">
                                @endif

                                    <img src="{{ asset('storage/images/'. $item->galleries[1]->image) }}" class="img-new-arrival" alt="">
                                    <div class="row align-items-center">

                                        <div class="col-6 label">
                                            <p class="title">
                                                {{ $item->name }}
                                            </p>
                                            <p class="type">
                                                {{ ucwords($item->gender) }}'s Series
                                            </p>
                                            <p class="price">
                                                ${{ $item->price }}
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn-primary btn-plus"> <span class="icon"
                                                    data-feather="plus" onclick="window.location.href='/save2bag/{{ $item->id }}'"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>

                    <!-- Mobile -->
                    <div class="d-lg-block d-xl-none">
                        <div id="carouselExampleIndicators" class="carousel" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="d-flex justify-content-center">

                                        <div class="card2">

                                            <img src="frontend/images/sepatu_main_3.png" class="img-new-arrival" alt="">
                                            <div class="row align-items-center">

                                                <div class="col-6 label">
                                                    <p class="title">
                                                        Adidas biasa
                                                    </p>
                                                    <p class="type">
                                                        Men's Series
                                                    </p>
                                                    <p class="price">
                                                        $119.7
                                                    </p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn-primary btn-plus"> <span class="icon"
                                                            data-feather="plus"></span></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex justify-content-center">

                                        <div class="card2">

                                            <img src="/frontend/images/sepatu_main_3.png" class="img-new-arrival" alt="">
                                            <div class="row align-items-center">

                                                <div class="col-6 label">
                                                    <p class="title">
                                                        Adidas biasa
                                                    </p>
                                                    <p class="type">
                                                        Men's Series
                                                    </p>
                                                    <p class="price">
                                                        $119.7
                                                    </p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn-primary btn-plus"> <span class="icon"
                                                            data-feather="plus"></span></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex justify-content-center">

                                        <div class="card2">

                                            <img src="/frontend/images/sepatu_main_3.png" class="img-new-arrival" alt="">
                                            <div class="row align-items-center">

                                                <div class="col-6 label">
                                                    <p class="title">
                                                        Adidas biasa
                                                    </p>
                                                    <p class="type">
                                                        Men's Series
                                                    </p>
                                                    <p class="price">
                                                        $119.7
                                                    </p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn-primary btn-plus"> <span class="icon"
                                                            data-feather="plus"></span></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="carousel-indicators mobile">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>

@endsection

@push('addon-script')
    <script>
        var value, quantity = document.getElementsByClassName('qty');

        function createBindings(quantityContainer) {
            var quantityAmount = quantityContainer.getElementsByClassName('quantity')[0];
            var increase = quantityContainer.getElementsByClassName('add')[0];
            var decrease = quantityContainer.getElementsByClassName('remove')[0];
            increase.addEventListener('click', function() {
                increaseValue(quantityAmount);
            });
            decrease.addEventListener('click', function() {
                decreaseValue(quantityAmount);
            });
        }

     

        function init() {
            for (var i = 0; i < quantity.length; i++) {
                createBindings(quantity[i]);
            }
        }

        function increaseValue(quantityAmount) {
            var price = document.getElementById('price');
            var normalPrice = {{ $items[0]->price }};
            var totalPrice;

            value = parseInt(quantityAmount.value, 10);

            //   console.log (quantityAmount, quantityAmount.value);

            value = isNaN(value) ? 0 : value;
            value++;
            quantityAmount.value = value;
            //   quantity.textContent = quantityAmount.value;
            totalPrice = normalPrice * value;
            price.innerHTML = '$' + totalPrice;
            return (quantityAmount);
        }
        
        function decreaseValue(quantityAmount) {
            var price = document.getElementById('price');
            var normalPrice = {{ $items[0]->price }};
            var totalPrice;

            value = parseInt(quantityAmount.value, 10);

            value = isNaN(value) ? 0 : value;
            if (value > 1) value--;

            quantityAmount.value = value;
            totalPrice = normalPrice * value;
            price.innerHTML = '$' + totalPrice;
        }

        init();
    </script>
    <script>
        function getTimeRemaining (endtime) {
            const total = Date.parse (endtime) - Date.parse (new Date ());
            const seconds = Math.floor (total / 1000 % 60);
            const minutes = Math.floor (total / 1000 / 60 % 60);
            const hours = Math.floor (total / (1000 * 60 * 60) % 24);
            // const days = Math.floor (total / (1000 * 60 * 60 * 24));
          
            return {
              total,
              // days,
              hours,
              minutes,
              seconds,
            };
          }
          
          function initializeClock (id, endtime) {
            const clock = document.getElementById (id);
            // const daysSpan = clock.querySelector ('.days');
            const hoursSpan = clock.querySelector ('.hours');
            const minutesSpan = clock.querySelector ('.minutes');
            const secondsSpan = clock.querySelector ('.seconds');
          
            function updateClock () {
              const t = getTimeRemaining (endtime);
          
              // daysSpan.innerHTML = t.days;
              hoursSpan.innerHTML = ('0' + t.hours).slice (-2);
              minutesSpan.innerHTML = ('0' + t.minutes).slice (-2);
              secondsSpan.innerHTML = ('0' + t.seconds).slice (-2);
          
              if (t.total <= 0) {
                clearInterval (timeinterval);
              }
            }
          
            updateClock ();
            const timeinterval = setInterval (updateClock, 1000);
          }
          
          @if(count($flash_sale)>0)    
          @if((date("Y-m-d H:i:s") >= date($flash_sale[0]->start_at)) && (date("Y-m-d H:i:s") <= date($flash_sale[0]->finish_at)))
            const deadline = new Date (Date.parse ('{{ date("M d, Y H:i:s", strtotime($flash_sale[0]->finish_at)) }}'));
          @else
           const deadline = new Date (Date.parse (new Date ()) + 1 * 3 * 60 * 60 * 1000);
          @endif
          @endif
          initializeClock ('clockdiv', deadline);
          
    </script>
    <script>

        @if (count($errors->auth) > 0)
            var myModal = new bootstrap.Modal(document.getElementById("exampleModalToggle"), {});
            document.onreadystatechange = function() {
            myModal.show();
            };
        @endif
    </script>
@endpush
