
   <style>

   .red-heart{
       color:red !important;
   }
    #dp-dots li.active {
      background-color: yellow !important;
      /* Add any additional styling you want */
    }
#dp-next,
#dp-prev {
  position: absolute;
  top: 50%;
  right: 16%;
  height: 33px;
  width: 33px;
  z-index: 10;
  cursor: pointer;
}

#dp-prev {
  left: 15px;
  transform: rotate(180deg);
}

#dp-dots {
  position: absolute;
  bottom: -60px !important;
  z-index: 12;
  left: 38%;
  cursor: default;
}

#dp-dots li {
  display: inline-block;
  width: 13px;
  height: 13px;
  background: white !important;
  border-radius: 50%;
}

#dp-dots li:hover {
  cursor: pointer;

  transition: background 0.3s;
}

#dp-dots li.active {
  background: goldenrod !important;
}

.dp_item {
  width: 85%;
}


 /*.row .column {*/
 /* display: none;*/
 /* }*/

    @font-face {

    src: url('http://html5css3demos.bplaced.net/css3-slider-v3/websymbols-regular-webfont.eot');
    src: url('http://html5css3demos.bplaced.net/css3-slider-v3/websymbols-regular-webfont.eot?#iefix') format('embedded-opentype'), url('http://html5css3demos.bplaced.net/css3-slider-v3/websymbols-regular-webfont.woff') format('woff'), url('http://html5css3demos.bplaced.net/css3-slider-v3/websymbols-regular-webfont.ttf') format('truetype'), url('http://html5css3demos.bplaced.net/css3-slider-v3/websymbols-regular-webfont#WebSymbolsRegular') format('svg');
}

@import url(https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700);

* {
    margin: 0;
    padding: 0;
}



h1 { color: white }

#slideshow-wrap {
    display: block;
    height: 320px;
    min-width: 260px;
    max-width: 640px;
    margin: auto;
    border: 12px rgba(255,255,240,1) solid;
    -webkit-box-shadow: 0px 0px 5px rgba(0,0,0,.8);
    -moz-box-shadow: 0px 0px 5px rgba(0,0,0,.8);
    box-shadow: 0px 0px 5px rgba(0,0,0,.8);
    margin-top: 20px;
    position: relative;
}

#slideshow-inner {
    width: 100%;
    height: 100%;
    background-color: white;
    overflow: hidden;
    position: relative;
}

#slideshow-inner>ul {
    list-style: none;
    height: 100%;
    width: 500%;
    overflow: hidden;
    position: relative;
    left: 0px;
    -webkit-transition: left .8s cubic-bezier(0.77, 0, 0.175, 1);
    -moz-transition: left .8s cubic-bezier(0.77, 0, 0.175, 1);
    -o-transition: left .8s cubic-bezier(0.77, 0, 0.175, 1);
    transition: left .8s cubic-bezier(0.77, 0, 0.175, 1);
}

#slideshow-inner>ul>li {
    width: 20%;
    height: 320px;
    float: left;
    position: relative;
}

#slideshow-inner>ul>li>img {
    margin: auto;
    height: 100%;
}

#slideshow-wrap input[type=radio] {
    position: absolute;
    left: 50%;
    bottom: 15px;
    z-index: 100;
    visibility: hidden;
}

#slideshow-wrap label:not(.arrows):not(.show-description-label) {
    position: absolute;
    left: 50%;
    bottom: -45px;
    z-index: 100;
    width: 12px;
    height: 12px;
    background-color: rgba(200,200,200,1);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    cursor: pointer;
    -webkit-box-shadow: 0px 0px 3px rgba(0,0,0,.8);
    -moz-box-shadow: 0px 0px 3px rgba(0,0,0,.8);
    box-shadow: 0px 0px 3px rgba(0,0,0,.8);
    -webkit-transition: background-color .2s;
    -moz-transition: background-color .2s;
    -o-transition: background-color .2s;
    transition: background-color .2s;
}

#slideshow-wrap label:not(.arrows):active { bottom: -46px }

#slideshow-wrap input[type=radio]#button-1:checked~label[for=button-1] { background-color: rgba(100,100,100,1) }

#slideshow-wrap input[type=radio]#button-2:checked~label[for=button-2] { background-color: rgba(100,100,100,1) }

#slideshow-wrap input[type=radio]#button-3:checked~label[for=button-3] { background-color: rgba(100,100,100,1) }

#slideshow-wrap input[type=radio]#button-4:checked~label[for=button-4] { background-color: rgba(100,100,100,1) }

#slideshow-wrap input[type=radio]#button-5:checked~label[for=button-5] { background-color: rgba(100,100,100,1) }

#slideshow-wrap label[for=button-1] { margin-left: -36px }

#slideshow-wrap label[for=button-2] { margin-left: -18px }

#slideshow-wrap label[for=button-4] { margin-left: 18px }

#slideshow-wrap label[for=button-5] { margin-left: 36px }

#slideshow-wrap input[type=radio]#button-1:checked~#slideshow-inner>ul { left: 0 }

#slideshow-wrap input[type=radio]#button-2:checked~#slideshow-inner>ul { left: -100% }

#slideshow-wrap input[type=radio]#button-3:checked~#slideshow-inner>ul { left: -200% }

#slideshow-wrap input[type=radio]#button-4:checked~#slideshow-inner>ul { left: -300% }

#slideshow-wrap input[type=radio]#button-5:checked~#slideshow-inner>ul { left: -400% }

label.arrows {
    font-family: 'WebSymbolsRegular';
    font-size: 25px;
    color: rgb(255,255,240);
    position: absolute;
    top: 50%;
    margin-top: -25px;
    display: none;
    opacity: 0.7;
    cursor: pointer;
    z-index: 1000;
    background-color: transparent;
    -webkit-transition: opacity .2s;
    -moz-transition: opacity .2s;
    -o-transition: opacity .2s;
    transition: opacity .2s;
    text-shadow: 0px 0px 3px rgba(0,0,0,.8);
}

label.arrows:hover { opacity: 1 }

label.arrows:active { margin-top: -23px }

input[type=radio]#button-1:checked~.arrows#arrow-2, input[type=radio]#button-2:checked~.arrows#arrow-3, input[type=radio]#button-3:checked~.arrows#arrow-4, input[type=radio]#button-4:checked~.arrows#arrow-5 {
    right: -55px;
    display: block;
}

input[type=radio]#button-2:checked~.arrows#arrow-1, input[type=radio]#button-3:checked~.arrows#arrow-2, input[type=radio]#button-4:checked~.arrows#arrow-3, input[type=radio]#button-5:checked~.arrows#arrow-4 {
    left: -55px;
    display: block;
    -webkit-transform: scaleX(-1);
    -moz-transform: scaleX(-1);
    -ms-transform: scaleX(-1);
    -o-transform: scaleX(-1);
    transform: scaleX(-1);
}

input[type=radio]#button-2:checked~.arrows#arrow-1 { left: -19px }

input[type=radio]#button-3:checked~.arrows#arrow-2 { left: -37px }

input[type=radio]#button-5:checked~.arrows#arrow-4 { left: -73px }

.description {
    position: absolute;
    top: 0;
    left: 0;
    width: 260px;
    font-family: 'Yanone Kaffeesatz';
    z-index: 1000;
}

.description input { visibility: hidden }

.description label {
    font-family: 'WebSymbolsRegular';
    background-color: rgba(255,255,240,1);
    position: relative;
    left: -17px;
    top: 00px;
    width: 40px;
    height: 27px;
    display: inline-block;
    text-align: center;
    padding-top: 7px;
    border-bottom-right-radius: 15px;
    cursor: pointer;
    opacity: 0;
    -webkit-transition: opacity .2s;
    -moz-transition: opacity .2s;
    -o-transition: opacity .2s;
    transition: opacity .2s;
    z-index: 5;
    color: rgb(20,20,20);
}

#slideshow-inner>ul>li:hover .description label { opacity: 1 }

.description input[type=checkbox]:checked~label { opacity: 1 }

.description .description-text {
    background-color: rgba(255,255,230,.5);
    padding-left: 45px;
    padding-top: 25px;
    padding-right: 15px;
    padding-bottom: 15px;
    position: relative;
    top: -35px;
    z-index: 4;
    opacity: 0;
    -webkit-transition: opacity .2s;
    -moz-transition: opacity .2s;
    -o-transition: opacity .2s;
    transition: opacity .2s;
    color: rgb(20,20,20);
}

.description input[type=checkbox]:checked~.description-text { opacity: 1 }

@keyframes slide {
    0% { left: 0; }
    20% { left: 0; }
    25% { left: -100%; }
    45% { left: -100%; }
    50% { left: -200%; }
    70% { left: -200%; }
    75% { left: -300%; }
    95% { left: -300%; }
    100% { left: -400%; }
}

#slideshow-inner>ul {
    animation: slide 20s infinite;
}

#slideshow-wrap:hover #slideshow-inner>ul {
    animation-play-state: paused;
}


</style>


<?php
$review = DB::table('bravo_review')->limit(10)->get();
$reviews = DB::table('bravo_review')->first();

$user_review = [];

foreach ($review as $rr) {
    $user = DB::table('users')->select('first_name', 'last_name', 'images')->where('id', $rr?->user_id)->first();
    $rr->user = $user;
    $user_review[] = $rr;
}
$totalUsers = count($user_review);
?>






 <div class="container h-80">
    <div class="bravo-list-event layout_<?php echo e($style_list); ?>">
        <?php if($title): ?>
        <div class="title mx-3">
            <?php echo e($title); ?> <span><a href="<?php echo e(url('/activity/')); ?>"><span style="float:right; color:#FF3500; font-size:15px; font-weight: 900;position: relative;
    top: 33px;">View All</span></a></span>
        </div>
        <?php endif; ?>
        <?php if($desc): ?>
            <div class="sub-title mx-3">
                <?php echo e($desc); ?>

            </div>
        <?php endif; ?>
        <div class="list-item">
            <?php if($style_list === "normal"): ?>
                <div class="row">
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-<?php echo e($col ?? 3); ?> col-md-6" style="height:93%; width:100%">
                            <?php echo $__env->make('Event::frontend.layouts.search.loop-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <?php if($style_list === "carousel"): ?>
                <div class="owl-carousel">
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('Event::frontend.layouts.search.loop-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>



<div class="container">
   <div class="row">
      <h4 class="title" style="font-weight:700; font-size:28px;margin-top: 17px; margin-left: 10px;">Combo Offers</h4>
   </div>
   <div class="row" style="margin-left: 0px;">
   <div id="filtering">

      <button class="bttn active" data-filter="all" onclick="geeksportal('all')">Show all</button>
     <button class="bttn" data-filter="top-rating" onclick="geeksportal('top-rating')">Top Rated</button>
     <button class="bttn" data-filter="top-discount" onclick="geeksportal('top-discount')">Top Discount</button>
<button class="bttn" data-filter="top-selling" onclick="geeksportal('top-selling')">Top Selling</button>
   </div>
 </div>
   <div class="row">
      <div class="column top-rating">
         <div class="col-md-12">
            <div class="row" style="width: 104%;
               margin-left: -25px;">
               <?php $__currentLoopData = $data_review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotelData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
               $hotel = $hotelData['hotel'];
               $banner_image_path = $hotelData['banner_image_path'];
               ?>
               <div class="col-md-3">
                  <div class="card mb-3 h-100" style="border-radius: 10px; position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                     <div class="Daily-Deals1" style="position: relative;">
                        <a href="">
                        <img src="<?php echo e($banner_image_path); ?>" style="height: 200px; width: 100%; border-radius: 10px;">
                        </a>
                        <input type="text" class="objectidgetclass<?php echo e($hotel->id); ?>" style="display: none;" name="object_id" value="<?php echo e($hotel->id); ?>">
                        <input type="text" class="objectmodalgetclass<?php echo e($hotel->id); ?>" style="display: none;" name="object_model" value="hotel">
                        <span class="fa fa-heart fa-3x fass newhotelheartstatus<?php echo e($hotel->id); ?> hotelwishlistaddingheart <?php if ($hotel->wishlist == true) {
                           echo 'class';
                           } ?>" attr="<?php echo e($hotel->id); ?>"></span>
                     </div>
                     <div class="card-body">
                        <h5 class="card-title"><?php echo e($hotel->title); ?></h5>
                        <p class="card-text">


                            <?php

                            $location = DB::table('bravo_locations')->where('id',$hotel->location_id)->first();

                            ?>

                           <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($location->name); ?></span>




                        </p>
                        <p>
                           <?php if(isset($hotel->review_score)): ?>
                           <span class="Daily-btn btn btn-light" style="padding: 3px 7px !important;"><?php echo e($hotel->review_score); ?> <i class="fa fa-star"></i></span>
                           <?php endif; ?>

                        </p>
                        <p style="margin-top: -27px;">
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
                                  $hoteldiscountformattedPrice = number_format( $hotel->discount_percent, $decimalPlaces);
                              ?>
                        <p  style="position: relative; top:36px;">
                           <span style="font-size: 24px; font-weight:500; position: relative;"><?php echo e($hoteldiscountformattedPrice); ?></span>
                           <span style="font-size: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
                        </p>

                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;"><?php echo e($formattedPrice); ?></span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important; position: relative;
                           top: 24px;
                           "><?php echo e(number_format($discountPercentage,0)); ?> %</button>
                        <?php
                           } else {
                               $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
                           ?>
                        <p style="position: relative;
                           top:36px;">
                           <span style="font-size: 24px; font-weight:500;"><?php echo e($hotel->discount_percent); ?></span>
                           <span style="font-size: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;"><?php echo e(intval($hotel->price)); ?></span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important;position: relative;    position: relative;
                           top: 24px;
                           "><?php echo e(number_format($discountPercentage,0)); ?> %</button>
                        <?php
                           }
                           ?>
                        </p>
                     </div>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="column top-discount">
         <div class="col-md-12">
            <div class="row" style="width: 104%;
               margin-left: -25px;
               ">

               <?php $__currentLoopData = $data_discount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotelData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
               $hotelx = $hotelData['hotel'];
               $banner_image_path = $hotelData['banner_image_path'];
               ?>
               <div class="col-md-3">
                  <div class="card mb-3 h-100" style="border-radius: 10px; position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                     <div class="Daily-Deals1" style="position: relative;">
                        <a href="">
                        <img src="<?php echo e($banner_image_path); ?>" style="height: 200px; width: 100%; border-radius: 10px;">
                        </a>
                        <input type="text" class="objectidgetclass<?php echo e($hotelx->id); ?>" style="display: none;" name="object_id" value="<?php echo e($hotelx->id); ?>">
                        <input type="text" class="objectmodalgetclass<?php echo e($hotelx->id); ?>" style="display: none;" name="object_model" value="hotel">
                        <span class="fa fa-heart fa-3x fass newhotelheartstatus<?php echo e($hotelx->id); ?> hotelwishlistaddingheart <?php if ($hotelx->wishlist == true) {
                           echo 'class';
                           } ?>" attr="<?php echo e($hotelx->id); ?>"></span>
                     </div>
                     <div class="card-body">
                        <h5 class="card-title"><?php echo e($hotelx->title); ?></h5>
                        <p class="card-text">
                           <?php

                            $location = DB::table('bravo_locations')->where('id',$hotelx->location_id)->first();

                            ?>

                           <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($location->name); ?></span>
                        </p>
                        <p>
                           <?php if(isset($hotelx->review_score)): ?>
                           <span class="Daily-btn btn btn-light" style="padding: 3px 7px !important;"><?php echo e($hotelx->review_score); ?> <i class="fa fa-star"></i></span>
                           <?php endif; ?>
                           <?php if(isset($hotelx->star_rate)): ?>
                           <?php echo e($hotelx->star_rate); ?>

                           <span> Excellent </span>
                           <?php endif; ?>
                        </p>
                        <p style="margin-top: -27px;">
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

                       $originalPrice = intval($hotelx->price);

                       $discountAmount = $hotelx->discount_percent;

                       $discountedPrice = $originalPrice - $discountAmount;

                       $discountPercentage = ($discountedPrice / $originalPrice) * 100;


                              if ($exchangeRate) {
                                  $hotelx->price /= $exchangeRate;

                                  $hotelx->discount_percent /= $exchangeRate;

                                  $decimalPlaces = 0;
                                  $formattedPrice = number_format($hotelx->price, $decimalPlaces);

                                  $discountformattedPrice = number_format($hotelx->discount_percent, $decimalPlaces);
                              ?>
                        <p  style="position: relative; top:36px;">
                           <span style="font-size: 24px; font-weight:500; position: relative;"><?php echo e($discountformattedPrice); ?></span>
                           <span style="font-size: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;"><?php echo e($formattedPrice); ?></span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important; position: relative;
                           top: 24px;
                           "><?php echo e(number_format($discountPercentage,0)); ?> %</button>
                        <?php
                           } else {
                               $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
                           ?>
                        <p style="position: relative;
                           top:36px;">
                           <span style="font-size: 24px; font-weight:500;"><?php echo e($hotelx->discount_percent); ?></span>
                           <span style="font-size: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;"><?php echo e(intval($hotelx->price)); ?></span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important;position: relative;    position: relative;
                           top: 24px;
                           "><?php echo e(number_format($discountPercentage,0)); ?> %</button>
                        <?php
                           }
                           ?>
                        </p>
                     </div>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="column top-selling">
         <div class="col-md-12 mb-3">
              <div class="row">
                    <h5 style="font-weight:600;margin-left:3px;">Staycation Top Selling</h5>
                </div>
            <div class="row" style="width: 105%;
               left: -22px;
               ">
               <?php $__currentLoopData = $data_selling_hotel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotelData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
               $hotel = $hotelData['hotel'];
               $banner_image_path = $hotelData['banner_image_path'];
               ?>
               <div class="col-md-3">
                  <div class="card mb-3 h-100" style="border-radius: 10px; position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                     <div class="Daily-Deals1" style="position: relative;">
                        <a href="">
                        <img src="<?php echo e($banner_image_path); ?>" style="height: 200px; width: 100%; border-radius: 10px;">
                        </a>
                        <input type="text" class="objectidgetclass<?php echo e($hotel->id); ?>" style="display: none;" name="object_id" value="<?php echo e($hotel->id); ?>">
                        <input type="text" class="objectmodalgetclass<?php echo e($hotel->id); ?>" style="display: none;" name="object_model" value="hotel">
                        <span class="fa fa-heart fa-3x fass newhotelheartstatus<?php echo e($hotel->id); ?> hotelwishlistaddingheart <?php if ($hotel->wishlist == true) {
                           echo 'class';
                           } ?>" attr="<?php echo e($hotel->id); ?>"></span>
                     </div>
                     <div class="card-body">
                        <h5 class="card-title"><?php echo e($hotel->title); ?></h5>
                        <p class="card-text">

                            <?php

                            $location = DB::table('bravo_locations')->where('id',$hotel->location_id)->first();

                            ?>

                           <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($location->name); ?></span>

                        </p>
                        <p>
                           <?php if(isset($hotel->review_score)): ?>
                           <span class="Daily-btn btn btn-light" style="padding: 3px 7px !important;"><?php echo e($hotel->review_score); ?> <i class="fa fa-star"></i></span>
                           <?php endif; ?>
                           <?php if(isset($hotel->star_rate)): ?>
                           <?php echo e($hotel->star_rate); ?>

                           <span> Excellent </span>
                           <?php endif; ?>
                        </p>
                        <p style="margin-top: -27px;">
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

                                  $pricehotel = $hotel->price;

                                  $pricehotel /= $exchangeRate;
                                  $hotel->discount_percent /= $exchangeRate;

                                  $decimalPlaces = 0;

                                  $formattedPrice = number_format($pricehotel, $decimalPlaces);

                                  $discountformattedPrice = number_format($hotel->discount_percent, $decimalPlaces);
                              ?>
                        <p  style="position: relative; top:36px;">
                           <span style="font-size: 24px; font-weight:500; position: relative;"><?php echo e($discountformattedPrice); ?></span>
                           <span style="font-size: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;"><?php echo e($formattedPrice); ?></span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important; position: relative;
                           top: 24px;
                           "><?php echo e(number_format($discountPercentage,0)); ?> %</button>
                        <?php
                           } else {
                               $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
                           ?>
                        <p style="position: relative;
                           top:36px;">
                           <span style="font-size: 24px; font-weight:500;"><?php echo e($hotel->discount_percent); ?></span>
                           <span style="font-size: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;"><?php echo e(intval($hotel->price)); ?></span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important;position: relative;    position: relative;
                           top: 24px;
                           "><?php echo e(number_format($discountPercentage,0)); ?> %</button>
                        <?php
                           }
                           ?>
                        </p>
                     </div>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>

            <div class="col-md-12 ">
                <div class="row">
                    <h5 style="font-weight:600;margin-left:3px;">Event Top Selling</h5>
                </div>

            <div class="row" style="width: 105%;
               left: -22px;
               ">
               <?php $__currentLoopData = $top_event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotelData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
               $hotel = $hotelData['hotel'];
               $banner_image_path = $hotelData['banner_image_path'];
               ?>
               <div class="col-md-3 mb-2">
                  <div class="card mb-3 h-100" style="border-radius: 10px; position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                     <div class="Daily-Deals1" style="position: relative;">
                        <a href="">
                        <img src="<?php echo e($banner_image_path); ?>" style="height: 200px; width: 100%; border-radius: 10px;">
                        </a>
                        <input type="text" class="objectidgetclass<?php echo e($hotel->id); ?>" style="display: none;" name="object_id" value="<?php echo e($hotel->id); ?>">
                        <input type="text" class="objectmodalgetclass<?php echo e($hotel->id); ?>" style="display: none;" name="object_model" value="hotel">
                        <span class="fa fa-heart fa-3x fass newhotelheartstatus<?php echo e($hotel->id); ?> hotelwishlistaddingheart <?php if ($hotel->wishlist == true) {
                           echo 'class';
                           } ?>" attr="<?php echo e($hotel->id); ?>"></span>
                     </div>
                     <div class="card-body">
                        <h5 class="card-title"><?php echo e($hotel->title); ?></h5>
                        <p class="card-text">

                            <?php

                            $location = DB::table('bravo_locations')->where('id',$hotel->location_id)->first();

                            ?>

                           <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($location->name); ?></span>

                        </p>
                        <p>
                           <?php if(isset($hotel->review_score)): ?>
                           <span class="Daily-btn btn btn-light" style="padding: 3px 7px !important;
                    " ><?php echo e($hotel->review_score); ?> <i class="fa fa-star"></i></span>
                           <?php endif; ?>
                        </p>
                        <p style="margin-top: -27px;">
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

                       $discountAmount = $hotel->discount;

                       $discountedPrice = $originalPrice - $discountAmount;

                       $discountPercentage = ($discountedPrice / $originalPrice) * 100;


                              if ($exchangeRate) {

                                  $pricehotel = $hotel->price;

                                  $pricehotel /= $exchangeRate;
                                  $hotel->discount /= $exchangeRate;

                                  $decimalPlaces = 0;

                                  $formattedPrice = number_format($pricehotel, $decimalPlaces);

                                  $discountformattedPrice = number_format($hotel->discount, $decimalPlaces);
                              ?>
                        <p  style="position: relative; top:36px;">
                           <span style="font-size: 24px; font-weight:500; position: relative;"><?php echo e($discountformattedPrice); ?></span>
                           <span style="font-size: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;"><?php echo e($formattedPrice); ?></span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important; position: relative;
                           top: 24px;
                           "><?php echo e(number_format($discountPercentage,0)); ?> %</button>
                        <?php
                           } else {
                               $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
                           ?>
                        <p style="position: relative;
                           top:36px;">
                           <span style="font-size: 24px; font-weight:500;"><?php echo e($hotel->discount); ?></span>
                           <span style="font-size: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;"><?php echo e(intval($hotel->price)); ?></span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important;position: relative;    position: relative;
                           top: 24px;
                           "><?php echo e(number_format($discountPercentage,0)); ?> %</button>
                        <?php
                           }
                           ?>
                        </p>
                     </div>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      </div>
   </div>

</div>


<div class="container-fluid mb-5 mt-5 pt-5" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%); width:100% !important">

       <div class="row d-flex justify-content-center   p-4">

       <div class="col-md-6">
         <h4 class="card-text pt-5 text-white p-1" style="font-size:32px; font-weight:700">Listen to Our Happy Customers</h4>
         <p class="card-text text-white pt-3 " style="font-size:18px;">Experience blissful relaxation, captivating local adventures,
          and charming accommodations - all in one staycation destination; our guests' reviews speak volumes
          about the unforgettable memories and cherished experiences awaiting you!</p>
         <div class="row"style="position: relative;
    left: -12px;">
           <div class="col-md-6">
             <h3 class="card-text pt-2 text-white p-1"><?php

                    $user = DB::table('users')->get();
                      $alluser = count($user);
                   ?>

                    <?php echo e($alluser); ?> </h3>
             <h6 class="card-text text-white">Happy Customers</h6>
           </div>
           <div class="col-md-6">
             <h3 class="card-text pt-2 text-white p-1"><?php echo e(number_format($reviews->rate_number, 0)); ?> <i class="fa fa-star"></i></h3>
             <h6 class="card-text text-white">Overall Rating</h6>
           </div>
         </div>
       </div>
       <div class="col-md-5 p-4">
         <div id="slider" style="height: 400px;">
           <div class="dp-wrap mt-2" style="height: 300px;">
             <div id="dp-slider">

               <?php $__currentLoopData = $user_review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($index <= 4): ?>
     <div class="dp_item" data-class="slide<?php echo e($index + 1); ?>" data-position="<?php echo e($index + 1); ?>" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; height:320px;">
                 <div class="row">
                   <div class="col-md-12 mb-3">
                     <p class="card-text text-dark p-3 text-item-p" style="font-size:17px;">
                       <?php echo e($item->content); ?>

                     </p>
                   </div>
                   <div class="col-md-12 mb-4">
                     <div class="row">
                       <div class="col-md-4 offset-md-1">
                         <?php if(!empty($item->user->images)): ?>
                         <img class="img-fluid dpimg" src="/image/<?php echo e($item->user->images); ?>" height="10%" alt="investing" style="border-radius:100%; height:100px; width:100px;">
                         <?php else: ?>

                         <img class="img-fluid dpimg" src="/images/avatar.png" height="10%" alt="investing" style="border-radius:100%; height:100px; width:100px;">

                         <?php endif; ?>
                       </div>
                       <div class="col-md-5">
                         <?php if(!empty($item->user->first_name) && !empty($item->user->last_name)): ?>
                         <h6 class="text-dark sell-item">
                        <?php echo e($item->user->first_name); ?> <?php echo e($item->user->last_name); ?>

                         </h6>
                         <?php endif; ?>
                         <p class="text-dark">
                           <?php if(!empty($item->rate_number)): ?>
                           <div class="star">
                               <?php for($i = 0; $i < $item->rate_number; $i++): ?>
                                   <i class="fa fa-star" style="color:#FE9000;"></i>
                               <?php endfor; ?>
                           </div>
                       <?php endif; ?>
                         </p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

             </div>
             <ul id="dp-dots">
          <?php $__currentLoopData = $user_review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($index <= 4): ?>
         <li data-class="slide<?php echo e($index + 1); ?>" class="<?php echo e($index === 0 ? 'active' : ''); ?>"></li>
       <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </ul>
             <div class="btn" style="display:none;">
               <button id="dp-prev" class="btn btn-light"></button>
               <button id="dp-next" class="btn btn-light"></button>
             </div>
           </div>
         </div>
       </div>
     </div>

</div>






<script>
var slides = document.querySelectorAll('#slideshow-inner>ul>li');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide, 2000);

function nextSlide() {
    slides[currentSlide].classList.remove('show');
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('show');
}
</script>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

 <script>
$(document).ready(function () {
  function detect_active() {
    // Get active
    var get_active = $("#dp-slider .dp_item:first-child").data("class");
    $("#dp-dots li").removeClass("active");
    $("#dp-dots li[data-class=" + get_active + "]").addClass("active");
  }

  function autoplay() {
    $("#dp-next").click();
  }

  $("#dp-next").click(function () {
    var total = $(".dp_item").length;
    $("#dp-slider .dp_item:first-child").hide().appendTo("#dp-slider").fadeIn();
    $.each($(".dp_item"), function (index, dp_item) {
      $(dp_item).attr("data-position", index + 1);
    });
    detect_active();
  });

  $("#dp-prev").click(function () {
    var total = $(".dp_item").length;
    $("#dp-slider .dp_item:last-child").hide().prependTo("#dp-slider").fadeIn();
    $.each($(".dp_item"), function (index, dp_item) {
      $(dp_item).attr("data-position", index + 1);
    });

    detect_active();
  });

  $("#dp-dots li").click(function () {
    // Clear the timer for autoplay
    clearInterval(autoplayInterval);

    $("#dp-dots li").removeClass("active");
    $(this).addClass("active");
    var get_slide = $(this).attr("data-class");
    console.log(get_slide);

    // Move all slides to the end
    while ($("#dp-slider .dp_item:first-child").data("class") !== get_slide) {
      $("#dp-slider .dp_item:first-child").hide().appendTo("#dp-slider").fadeIn();
    }

    // Restart autoplay
    autoplayInterval = setInterval(autoplay, 5000);

    detect_active();
  });

  $("body").on("click", "#dp-slider .dp_item:not(:first-child)", function () {
    var get_slide = $(this).attr("data-class");
    console.log(get_slide);

    // Move all slides to the end
    while ($("#dp-slider .dp_item:first-child").data("class") !== get_slide) {
      $("#dp-slider .dp_item:first-child").hide().appendTo("#dp-slider").fadeIn();
    }

    detect_active();
  });

  // Autoplay
  var autoplayInterval = setInterval(autoplay, 5000); // Change the interval time as per your requirement
});
</script>






 <script>
    geeksportal("all");

    function geeksportal(c) {
        var x, i;

        x = document.getElementsByClassName("column");

        if (c == "all") c = "";

        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");

            if (x[i].className.indexOf(c) > -1)
                w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");

        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current
    // button (highlight it)
    var btnContainer = document.getElementById("filtering");
    var btns = btnContainer.getElementsByClassName("bttn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {

            var current =
                document.getElementsByClassName("active");

            current[0].className =
                current[0].className.replace(" active", "");

            this.className += " active";
        });
    }
</script>



 <script>
  function geeksportal(category) {
    // Hide all content rows first
    var allContentRows = document.querySelectorAll('.row .column');
    for (var i = 0; i < allContentRows.length; i++) {
      allContentRows[i].style.display = "none";
    }

    // Show the content row based on the selected category
    var selectedContentRow = document.querySelector('.row .' + category);
    selectedContentRow.style.display = "block";
  }
</script>


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


<script>
    var activeBtn = document.querySelector(".bttn.active");
    activeBtn.style.backgroundColor = "orange";

    function geeksportal(c) {
        var x, i;
        x = document.getElementsByClassName("column");
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (c == "all" || x[i].className.indexOf(c) > -1) {
                w3AddClass(x[i], "show");
            }
        }

        // Update button styles
        var btns = document.getElementsByClassName("bttn");
        for (i = 0; i < btns.length; i++) {
            if (btns[i].classList.contains("active")) {
                btns[i].style.backgroundColor = "orange";
            } else {
                btns[i].style.backgroundColor = "white";
            }
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");

        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    var btnContainer = document.getElementById("filtering");
    var btns = btnContainer.getElementsByClassName("bttn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            for (var j = 0; j < btns.length; j++) {
                btns[j].classList.remove("active");
                btns[j].style.backgroundColor = "white";
            }
            this.classList.add("active");
            this.style.backgroundColor = "orange";
            geeksportal(this.getAttribute("data-filter"));
        });
    }

    // Initial call to show all content
    geeksportal("all");
</script>





<?php /**PATH /Users/pro/Desktop/readyForSell/BookingManagement/themes/BC/Event/Views/frontend/blocks/list-event/index.blade.php ENDPATH**/ ?>