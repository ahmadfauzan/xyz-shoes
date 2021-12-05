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
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="frontend/images/sepatu_1.png" class="d-block w-100 img-display" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="frontend/images/sepatu_main_3.png" class="d-block w-100 img-display rotate-28"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="frontend/images/sepatu_3.png" class="d-block w-100 img-display" alt="...">
                            </div>
                        </div>
                        <div class="carousel-indicators">
                            <div class="row align-items-center">
                                <div class="col d-none d-sm-none d-md-none d-lg-none d-xl-block">
                                    <div class="background-indicator shadow p-3 mb-5">
                                        <button class="btn-indicator" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                            aria-current="true" aria-label="Slide 1">
                                            <img src="frontend/images/sepatu_1.png" class="img-indicator" alt="">
                                        </button>
                                    </div>
                                </div>
                                <div class="col d-none d-sm-none d-md-none d-lg-none d-xl-block">
                                    <div class="main-background-indicator shadow p-3 mb-5">
                                        <button class="main-btn-indicator" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                            aria-colspan="active" aria-label="Slide 2">
                                            <img src="frontend/images/sepatu_main_3.png"
                                                class="img-indicator main rotate-28" alt="">
                                        </button>
                                    </div>
                                </div>
                                <div class="col d-none d-sm-none d-md-none d-lg-none d-xl-block">
                                    <div class="background-indicator shadow p-3 mb-5">
                                        <button class="btn-indicator" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                            aria-label="Slide 3">
                                            <img src="frontend/images/sepatu_3.png" class="img-indicator" alt="">
                                        </button>
                                    </div>
                                </div>
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
                        {{ $display[0]->name }}
                    </div>
                    <div class="star">
                        <h4>
                            @php
                                $rate=0;
                            @endphp
                            @foreach ($display[0]->ratings as $rating)
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
                        {{ $display[0]->desc }}

                    </p>
                    <form action="/cart/create" method="POST">
                        @csrf
                    <input type="hidden" name="products_id" value="{{ $display[0]->id }}">
                    @auth
                    <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                    @endauth
                    <p class="label-size">
                        {{ $display[0]->type_sizes->name }}
                        <input type="hidden" name="type_size" value="{{ $display[0]->type_sizes->name }}">
                    </p>
            
                    @foreach ($display[0]->sizes as $size)
                    <input type="radio" class="btn-check" name="size" id="option{{ $loop->index + 1}}" autocomplete="off" value="{{ $size->size }}" {{ (($display[0]->sizes[0]->size) == ($size->size)) ? 'checked' : '' }}>
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
                                ${{ $display[0]->price }}
                            </p>
                        </div>
                    </div>
                    <input type="submit" class="btn-secondary shadow" name="add2bag" value="Add to bag">
                    <input type="submit" class="btn-primary btn-buy-now ms-2  shadow" name="buyNow" value="Buy Now">
                </form>
                </div>
            </div>
        </div>
    </header>

    <main>
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
                    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <div class="card">

                                    <div class="label-discount text-center">
                                        70%
                                    </div>
                                    <img src="frontend/images/sepatu_4.png" class="img-card" alt="">
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
                            <div class="col-3">
                                <div class="card">

                                    <div class="label-discount text-center">
                                        70%
                                    </div>
                                    <img src="frontend/images/sepatu_4.png" class="img-card" alt="">
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
                            <div class="col-3">
                                <div class="card">

                                    <div class="label-discount text-center">
                                        70%
                                    </div>
                                    <img src="frontend/images/sepatu_4.png" class="img-card" alt="">
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
                            <div class="col-3">
                                <div class="card">

                                    <div class="label-discount text-center">
                                        70%
                                    </div>
                                    <img src="frontend/images/sepatu_4.png" class="img-card" alt="">
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
                                                <img src="frontend/images/sepatu_4.png" class="img-card" alt="">
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
                                                <img src="frontend/images/sepatu_4.png" class="img-card" alt="">
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
                            <div class="col-4">
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
                            <div class="col-4">
                                <div class="card2 main">

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
                            <div class="col-4">
                                <div class="card2">

                                    <img src="frontend/images/sepatu_main_3.png" class="img-new-arrival" alt="">
                                    <div class="row align-items-center">

                                        <div class="col-6 label">
                                            <p class="title">
                                                Adidas Biasa
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
            var normalPrice = {{ $display[0]->price }};
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
            var normalPrice = {{ $display[0]->price }};
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
          
          // const deadline1 = new Date (Date.parse (new Date ()) + 1 * 3 * 60 * 60 * 1000);
          const deadline = new Date (Date.parse ('Dec 02, 2021 23:00:00'));
          console.log ('deadline' + deadline);
          initializeClock ('clockdiv', deadline);
          
    </script>
    <script>
        @if (count($errors) > 0)
            var myModal = new bootstrap.Modal(document.getElementById("exampleModalToggle"), {});
            document.onreadystatechange = function() {
            myModal.show();
            };
        @endif
    </script>
@endpush
