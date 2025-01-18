 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css"   href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.css">



 <style>
 
 .hhhhhh{
 position: relative;
    top: -151px !important;
    left: -31px;
} 

 }
 .slick-dots {
    text-align: center !important;
  }

  .slick-dots li {
    display: inline-block;
    margin: 0 5px;
  }
 
 .slick-dots {
  text-align: center !important;
  margin: 0 0 10px 0;
  padding: 0;
}

.slick-dots li {
  display: inline-block;
  margin-left: 4px;
  margin-right: 4px;
}

.slick-dots li.slick-active button {
  background-color: black;
}

.slick-dots li button {
  font: 0/0 a;
  text-shadow: none;
  color: transparent;
  background-color: #999;
  border: none;
  width: 15px;
  height: 15px;
  border-radius: 50%;
}

.slick-dots li:hover button {
  background-color: black;
}

.prev,
.next {
  position: absolute !important;
  top: 44% !important;
  transform: translateY(-50%) !important;
  font-size: 24px !important;
  color: red !important;
  cursor: pointer !important;
  background: white;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size:20px !important;
      padding: 3px 5px !important;
}

.prev {
  left: 29px !important;
}

.next {
  right: 29px !important;
}

.prev.clicked,
.next.clicked {
 /* background: lightgray !important;*/
 /* color: red !important;*/
 /*opacity: 0.5 ;*/
}
    

@media screen and (max-width: 800px) {
  .next {
    display: none !important;
  }
}

     .Daily-Deals {
         background-size: cover;
         height: 200px;
         width: 100%;
         border-radius: 10px;
        
       background-repeat: no-repeat;
         background-image: url("images/05102023125612645b946ceee0b.jpg");
     }

     .fass {
         font-size: 19px;
         color: black;
         float: right;
         position: relative;
         left: -17px;
         top: 9px;
     }

     .Daily-btn {
         background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
         color: white;
         padding: 3px 6px !important;
         font-size: 10px !important;
         border-radius: 6px !important;
         text-align: center !important;
     }

     /* Anchor tag decoration */
     a {
         text-decoration: none;
         color: #5673C8;
     }

     a:hover {
         color: lightblue;
     }

     .row {
         margin: 0px -14px;
         padding: 8px;
     }

     .row>.column {
         padding: 6px;
     }

     .column {
         float: left;
         width: 100%;
         display: none;
     }

     p {
         display: -webkit-box;
         -webkit-box-orient: vertical;
         -webkit-line-clamp: 4;
         overflow: hidden;
     }

     .row:after {
         content: "";
         display: table;
         clear: both;
     }



     .show {
         display: block;
     }

     /* Style the filter buttons */
     .bttn {
         border: none;
         padding: 8px 14px;
         color: #FE9000;
         border-radius: 4px;
         background:white;
         border:1px solid #FE9000;
     }

     .bttn:hover {
        color: #FE9000;
         opacity: 0.8;
         color: #FE9000;
          border:1px solid #FE9000;
     }

     .bttn.active {
         background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
         color: white;
     }

     .categories {
         background-size: cover;
         height: 200px;
         width: 100%;
         border-radius: 10px;
         background-repeat: no-repeat;

     }

     .categories1 {
         background-size: cover;
         height: 100%;
         width: 100%;
         border-radius: 21px;
         background-repeat: no-repeat;
         height: 286px;
         background-image: url("images/category.png");

     }

     .heading {
         color: white;
         position: relative;
         top: 140px;
         text-align: center;
         font-size: 22px;
     }


     .row>.column {
         padding: 6px;
     }


     @media screen and (max-width: 850px) {
         .column {
             width: 100%;
         }
     }

     /* Window size 400 width set */
     @media screen and (max-width: 400px) {
         .column {
             width: 100%;
         }
     }

  
    .fass {
    position: absolute;
    text-shadow: 1px 1px 27px black;
    left: 87% !important;
    height: 29px;
    width: 29px;
    background: white;
    padding: 6px 5px !important;
    border-radius: 30px;
    z-index: 2;
    margin-top: 6px !important;

         }
     
     .red-heart {
    color: red !important;
      }
      
      .class {

         color: black !important;

     }

    
     
 @media only screen and (max-width: 1399px) {
  .img-cate {
   height:230px !important;
  }
  
}
.ggcard{
    padding:10 !important;
}
 
 </style>

 <div class="container mt-5">
     
   
     @foreach ($datas as $dealydeal)
    
    
     
         <div class="row">
             <h4 class="title mx-1" style="margin-top: 43px; font-weight:700; font-size:28px;">
                 {{ $dealydeal['parent_name'] }}
                 <a href="{{ url('staycation?price_range=200%3B400000&terms%5B%5D='.$dealydeal['id']) }}">
                     <span style="float:right; color:#FF3500; font-size:15px; font-weight: 900;left: -9px;
    position: relative;
    top: 10px;">View All</span>
                 </a>
             </h4>
         </div>
         <div class="row">
             @foreach ($dealydeal['hotels'] as $hotel)
                 <div class="col-md-4 mb-3">
                     
                         <span class="fa fa-heart-o fa-3x fass newhotelheartstatus{{ $hotel->id }} hotelwishlistaddingheart {{ $hotel->wishlist ? 'red-heart' : '' }}" attr="{{ $hotel->id }}"></span>

                      <a href="{{ url('/staycation/' . $hotel->slug) }}"
                         style="text-decoration:none;">
                         <div class="card mb-3"
                             style="border-radius: 10px;position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; height: 93% !important;">
                             <div class="Daily-Deals1" style="position: relative;">

                                 <img src="{{ $hotel->banner_image }}" 
                                     style="height:200px; width:100%; border-radius: 10px;" class="image-fixd">

                                 <input type="text" class="objectidgetclass{{ $hotel->id }}" style="display:none;"
                                     name="object_id" value="{{ $hotel->id }}">
                                 <input type="text" class="objectmodalgetclass{{ $hotel->id }}"
                                     style="display:none;" name="object_model" value="hotel">
                                 
                             </div>
                             <div class="card-body">
                                 <h5 class="card-title">{{ $hotel->title }}</h5>
                                 <p class="card-text" style="margin-top: px; color: #5e6d77;">
                                     <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                                         {{ $hotel->address }}</span>
                                 </p>
                                   
                                   
   
   @if ($hotel->review_score)
    <span class="Daily-btn"
      style=" padding: 3px 6px !important; 
      position: relative;
      left: 5px;">{{ $hotel->review_score }} <i class="fa fa-star" ></i>
   </span>      
@else
   <span class="Daily-btn"
      style=" padding: 3px 6px !important; 
      position: relative;
      left: 5px; display:none;"><i class="fa fa-star"></i> 
      </span>
@endif
   
                                 <p  class="mb-5">
                                     {{ $hotel->star_rate }}
                                     <span>
                                         @if (isset($hotel) && property_exists($hotel, 'review_text'))
                                             <span>{{ $hotel->review_text }}</span>
                                         @else

                                         @endif
                                     </span>
                                 </p>
   
   
  <p  style="margin-top: -26px;">
    <?php
      $currency = DB::table('core_settings')->where('name', 'extra_currency')->first();
      
      $forex = json_decode($currency->val);
      $targetCurrency = strtoupper(Session::get('bc_current_currency'));
      
      $exchangeRate = null;
      
      foreach ($forex as $item) {
          $dataRate = $item->currency_main;
      
          if ($dataRate === Session::get('bc_current_currency')) {
              $exchangeRate = $item->rate;
              break;
          }
      }
      
  $originalPrice = intval($hotel->price);
  
  $discountAmount = $hotel->discount_percent;
  
  $discountedPrice = $originalPrice - $discountAmount;
  
  $discountPercentage = ($discountedPrice / $originalPrice) * 100;
      
      if ($exchangeRate) {
          
          $hotel->price /= $exchangeRate;
          
          $hotel->discount_percent /= $exchangeRate;
      
          $decimalPlaces = 0;
          $formattedPrice = number_format($hotel->price, $decimalPlaces);
          
          $discountformattedPrice = number_format($hotel->discount_percent, $decimalPlaces);
      ?>
      <p style="position: relative;
      top: 9px;">
          
        <span style="font-size: 24px; font-weight:500">{{ $discountformattedPrice }}</span>
       <span style="font-size: 24px;">{{ strtoupper($targetCurrency) }}</span>
      </p>

      
   <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ $formattedPrice }}</span>
   <span style="font-size: 15px; text-decoration: line-through; ">{{ strtoupper($targetCurrency) }}</span>
   
    <span class="Daily-btn"
      style=" padding: 3px 6px !important; 
      position: relative;
      left: 5px;">{{ number_format($discountPercentage,0) }}%
   OFF</span>
  
   <?php
      } else {
           
          $mainCurrency = DB::table('core_settings')->where('name','currency_main')->first();
      ?>
      
     <p style="position: relative;
      top: 9px;">
          
       <span style="font-size: 24px; font-weight:500">{{ intval($hotel->discount_percent) }}</span> 
       
       <span style="font-size: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
      </p>
   <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; ">{{ intval($hotel->price) }}</span>
   <span style="font-size: 15px; text-decoration: line-through;">{{ strtoupper($mainCurrency->val) }}</span>
    

  <span class="Daily-btn"
      style=" padding: 3px 6px !important; 
      position: relative;
      left: 5px;">{{ number_format($discountPercentage,0) }}%
   OFF</span>
 </p>

   <?php
      }
      ?> 
      
                          </div>
                        </div>
                     </a>
                 </div>
             @endforeach
         </div>
     @endforeach
 </div>


 <div class="container ">
    <div class="bravo-list-hotel layout_{{ $style_list }}">
        @if ($title)
        
            <div class="title mx-1" style=" font-weight:700; font-size:28px;margin-top: -63px !important;">
              Staycation <span> <a href="{{ url('/staycation/') }}">
                        <span style="float:right; color:#FF3500; font-size:15px; font-weight: 900; top:20px;position:relative;">View All</span>
                    </a></span>
            </div>
        @endif
        {{-- @if ($desc)
           <div class="sub-title">
               {{$desc}}
           </div>
       @endif --}}

        <div class="sub-title mx-1 mb-2">
            Staycation highly rated for thoughtful design
        </div>
        <div class="list-item">
            @if ($style_list === 'normal')
                <div class="row">
                    @foreach ($rows as $row)
                        <div class="col-lg-{{ $col ?? 3 }} col-md-6" style="height:93%;">
                            @include('Hotel::frontend.layouts.search.loop-grid')
                        </div>
                    @endforeach
                </div>
            @endif
            @if ($style_list === 'carousel')
                <div class="owl-carousel">
                    @foreach ($rows as $row)
                        @include('Hotel::frontend.layouts.search.loop-grid')
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>








 

 <div class="container">
    <h4 class="mt-2 mx-3" style="font-weight: 700; font-size: 28px; margin-top: 48px !important;">Categories</h4>
    <div class="row">
        <div class="col-md-12 heroSlider-fixed">
            <div class="overlay"></div>
         
            <div class="slider responsive">
                @foreach($fetch as $cat)
                
                
                    <div>
                         <?php
        $queryParams = [
            'price_range' => '100;4000000',
            'terms' => [$cat->id]  // Put the term ID in an array
        ];
        $queryString = http_build_query($queryParams);
        $url = url('activity') . '?' . $queryString;
        ?>
                          <a href="{{ $url}}" style="text-decoration:none;">
                        <div class="Trending In Dubai">
                            <div class="card1" style="position: relative;">
                                <div class="cats" style="position: relative;">
                                    <img src="{{ $cat->banner_image }}" alt="" srcset="" class="img-cate" style="position: relative; height:286px; width:100%; border-radius:10px;">
                                     <div style="height: 286px; width:100%;  border-radius: 10px;background: rgba(0,0,0,0.3);
                                    background: linear-gradient(359deg, rgba(0,0,0,0.8) 10%, rgba(255,255,255,0.1) 55%);
                                   position: absolute;top:0px;left:0px" class="img-cate">
                                 </div>
                                    <h2 class="heading" style="position: absolute; top: 85%; left: 52%; transform: translate(-50%, -50%); color: white; text-align: start; width: 100%; font-weight: 900;">{{ $cat->name }}</h2>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- control arrows -->
            <div class="prev">
         <span class="fa fa-arrow-left" aria-hidden="true" ></span>
      </div>
      <div class="next">
         
        
        <span class="fa fa-arrow-right" aria-hidden="true"></span>
      </div>
        </div>
    </div>
</div>
 
 
 
 
 

 <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
     crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick.min.js"></script>
 

 <script>
   $('.responsive').slick({
      dots: true,
      prevArrow: $('.prev'),
      nextArrow: $('.next'),
      infinite: true,        // Set to true for continuous loop
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      autoplay:false ,
      autoplaySpeed: 3000,   // Set a shorter autoplay speed
      pauseOnHover: false,   // Prevent pausing on hover
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
   });
   $('.prev, .next').click(function() {
    $('.prev, .next').removeClass('clicked'); // Remove the class from all arrows
    $(this).addClass('clicked'); // Add the class to the clicked arrow
  });
</script>



<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->


<script>
$(document).ready(function() {
    var $heartIcons = $('.hotelwishlistaddingheart'); // Select all heart icons
    
    // Function to set the red-heart class based on the local storage
    function setHeartStatus() {
        $heartIcons.each(function() {
            var object_id = $(this).attr('attr');
            var savedStatus = localStorage.getItem('wishlist_' + object_id);
            var $heartIcon = $('.newhotelheartstatus' + object_id);
            
            if (savedStatus === 'active') {
                $heartIcon.removeClass('fa-heart-o').addClass('fa-heart red-heart');
            } else {
                $heartIcon.removeClass('red-heart').addClass('fa-heart-o');
            }
        });
    }
    
    // Set initial heart status on page load
    setHeartStatus();
    
    // Handle heart icon click
    $heartIcons.click(function() {
        var object_id = $(this).attr('attr');
        var object_model = 'hotel';
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var $heartIcon = $('.newhotelheartstatus' + object_id);
        
        $.ajax({
            url: '/user/wishlist',
            type: 'post',
            data: {
                object_id: object_id,
                object_model: object_model
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                if (response.class === "active") {
                    $heartIcon.removeClass('fa-heart-o').addClass('fa-heart red-heart');
                    localStorage.setItem('wishlist_' + object_id, 'active'); // Save status in local storage
                } else if (response.class === "inactive") {
                    $heartIcon.removeClass('red-heart').addClass('fa-heart-o');
                    localStorage.setItem('wishlist_' + object_id, 'inactive'); // Save status in local storage
                } else {
                    alert("Unexpected response status: " + response.class);
                }
            },
            error: function(xhr, status, error) {
                $('#login').modal('show');
            }
        });
    });
});
</script>






