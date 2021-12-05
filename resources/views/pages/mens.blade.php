 @extends('layouts.mens')

 @section('title', 'XYZ SHOES')

 @section('content')
 <!-- content -->
 <main>
     <section class="content-mens">
         <div class="container">
             <h2 class="text-center">Men's Series</h2>
             <section class="category">
                 <div class="row justify-content-center" id="filter">
                     <div class="col-1 me-4">
                         <button class="btn-secondary filter-menu filter-active" onclick="filterSelection('all')">
                             All
                         </button>
                     </div>

                     @foreach ($categories as $category)
                     <div class="col-1 me-4">
                         <button class="btn-secondary filter-menu" onclick="filterSelection('{{ $category->name }}')">
                             {{ ucwords($category->name) }}
                         </button>
                     </div>
                     @endforeach

                 </div>
             </section>

             <section class="list-product-mens">
                 <div class="row justify-content-center filter-item">

                     <!-- @php
                     $now = Carbon\Carbon::now();
                     $now->toDateString();
                     @endphp -->
                     @foreach ($products as $product)
                     <div class="col-3 column {{ $product->categories->name }}">
                         <div class="card">
                             @if (count($product->discounts) > 0)
                                @php
                                        $check = is_discount($product->id,
                                            $product->discounts[0]->product_id,
                                            $product->discounts[0]->start_at,
                                            $product->discounts[0]->finish_at);
                                @endphp
                                    @if($check == 'true')
                                        <div class="label-discount text-center">
                                            {{ $product->discounts[0]->discount_percentage }}%
                                        </div>
                                @endif
                             @endif

                             <img src="frontend/images/sepatu_4.png" class="img-card" alt="">
                             <p class="name">
                                 {{ $product->name }}
                             </p>
                             <p class="normal-price">
                                 {{ ucwords($product->categories->name) }}
                             </p>
                             <p class="price">
                                 @if (count($product->discounts) > 0)
                                    @php
                                    $check = is_discount($product->id,
                                                $product->discounts[0]->product_id,
                                                $product->discounts[0]->start_at,
                                                $product->discounts[0]->finish_at);
                                    @endphp
                                        @if($check == 'true')
                                            ${{ calc_discount($product->price, $product->discounts[0]->discount_percentage) }}
                                            <s class="diskon">
                                                ${{ $product->price }}
                                            </s>
                                        @elseif ($check == 'expired')
                                            ${{ $product->price }}
                                        @endif
                                @else
                                    ${{ $product->price }}
                                 @endif
                             </p>
                             <button class="btn-primary btn-save2bag shadow" onclick="window.location.href='/save2bag/{{ $product->id }}'">
                                 Save to bag
                             </button>
                         </div>
                     </div>
                     @endforeach


                 </div>
             </section>
         </div>
     </section>
 </main>
 @endsection

 @push('addon-script')
 <script>
     filterSelection('all'); // Execute the function and show all columns
     function filterSelection(c) {
         var x, i;
         x = document.getElementsByClassName('column');
         if (c == 'all') c = '';
         // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
         for (i = 0; i < x.length; i++) {
             w3RemoveClass(x[i], 'show');
             if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], 'show');
         }
     }

     // Show filtered elements
     function w3AddClass(element, name) {
         var i, arr1, arr2;
         arr1 = element.className.split(' ');
         arr2 = name.split(' ');
         for (i = 0; i < arr2.length; i++) {
             if (arr1.indexOf(arr2[i]) == -1) {
                 element.className += ' ' + arr2[i];
             }
         }
     }

     // Hide elements that are not selected
     function w3RemoveClass(element, name) {
         var i, arr1, arr2;
         arr1 = element.className.split(' ');
         arr2 = name.split(' ');
         for (i = 0; i < arr2.length; i++) {
             while (arr1.indexOf(arr2[i]) > -1) {
                 arr1.splice(arr1.indexOf(arr2[i]), 1);
             }
         }
         element.className = arr1.join(' ');
     }

     // Add active class to the current button (highlight it)
     var btnContainer = document.getElementById('filter');
     var btns = btnContainer.getElementsByClassName('filter-menu');
     for (var i = 0; i < btns.length; i++) {
         btns[i].addEventListener('click', function() {
             var current = document.getElementsByClassName('filter-active');
             current[0].className = current[0].className.replace(' filter-active', '');
             this.className += ' filter-active';
             console.log(current);
         });
     }
 </script>
 @endpush