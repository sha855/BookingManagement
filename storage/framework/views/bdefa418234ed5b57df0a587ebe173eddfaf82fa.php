
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/fotorama/fotorama.css")); ?>"/>
    <style>
     .red-heart{
        color:red !important;
    }
    
    .btn:hover{
    color:white; !important;    
    } 
.categories{
  background-size: cover;
  height:200px;
  width:100%;
  border-radius: 10px;
  background-repeat: no-repeat;
  background-image: url("https://images.pexels.com/photos/5087165/pexels-photo-5087165.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");   
}
.heading{
    color: white;
    position: relative;
    top: 140px;
    text-align: center;
    font-size: 22px;
}
   

.Daily-Deals{
  background-size: cover;
  height:200px;
  width:100%;
  border-radius: 10px;"
  background-repeat: no-repeat;
  background-image: url("images/05102023125612645b946ceee0b.jpg");
}
.fass {
    font-size: 19px;
    color: white;
    float: right;
    position: relative;
    left: -9%;
    top: 9px;
}
.Daily-btn{
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
color:white;
padding: 4px 4px;
font-size: 10px;
    border-radius: 4px;
}

.image{
        background: url("images/img.png");
         height:400px;
         border-radius:10px;
         background-size: cover;
    width: 100%;
    }
    .image1{
        background: url("images/img_1.png");
         height:400px;
         border-radius:10px;
         background-size: cover;
    width: 100%;
    }
    .text1{
        font-size: 30px;
    position: relative;
    top: 244px;
    left: 10px;
    color: white;
    }
    .text2{
        font-size: 16px;
    position: relative;
    top: 234px;
    left: 10px;
    color: white;   
    }
    .butn{
        position: relative;
    top: 241px;
    left: 10px;
}


</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    
    <div class="row mb-4">

<?php

if (auth()->check()) {
    $user_id = auth()->user()->id;
} else {
    $user_id = null;
}

$wishlist = DB::table('user_wishlist')
    ->where('user_id', $user_id)
    ->where('object_model', 'hotel')
    ->get();

$staycation = [];

foreach ($wishlist as $stay) {
    $hotel = DB::table('bravo_hotels')->where('id', $stay->object_id)->first();
    if ($hotel) {
        $bannerImage = DB::table('media_files')->select('file_path')->where('id', $hotel->banner_image_id)->first();
        $file_path = $bannerImage ? '/uploads/' . $bannerImage->file_path : null;

        $staycation[] = [
            'hotel' => $hotel,
            'file_path' => $file_path,
        ];
    }
}

$xxwishlist = DB::table('user_wishlist')
    ->where('user_id', $user_id)
    ->where('object_model', 'event')
    ->get();

$activitiesall = [];

foreach ($xxwishlist as $xstay) {
    $xhotel = DB::table('bravo_events')->where('id', $xstay->object_id)->where('deleted_at', null)->first();

    if ($xhotel) {
        $xbannerImage = DB::table('media_files')->select('file_path')->where('id', $xhotel->banner_image_id)->first();
        $file_path = $xbannerImage ? '/uploads/' . $xbannerImage->file_path : null;

        $activitiesall[] = [
            'hotel' => $xhotel,
            'file_path' => $file_path,
        ];
    }
}

?>
    

    <div class="row">
     <h4  class="title py-3 mx-3 text-center ">Staycation wishlist</h4>
    </div>

  <?php if(count($staycation) > 0): ?>
    <?php $__currentLoopData = $staycation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-4">
            
             <span id="heartIcon" class="fa fa-heart fa-3x fass newhotelheartstatus<?php echo e($wishlist['hotel']->id); ?> hotelwishlistaddingheart" style=" 
    right: 10px;
    z-index:2;
    padding: 6px 6px;
    border-radius: 30px;
    background-color: white;
    height: 30px;
    width: 30px;
    color: red;
"  attr="<?php echo e($wishlist['hotel']->id); ?>"></span> 

             <a href="<?php echo e(url('/staycation/' . $wishlist['hotel']->slug)); ?>" style="text-decoration:none;">
            <div class="card" style="border-radius: 10px;">
                
                <div class="Daily-Deals1" style="position: relative;">
                    <img src="<?php echo e($wishlist['file_path']); ?>" style="height: 240px; width:100%; border-radius: 10px;">
                   

 <input type ="text" class="objectidgetclass<?php echo e($wishlist['hotel']->id); ?>" style="display:none;" name="object_id" value="<?php echo e($wishlist['hotel']->id); ?>">
  <input type ="text" class="objectmodalgetclass<?php echo e($wishlist['hotel']->id); ?>" style="display:none;" name="object_model" value="hotel">
               
               
                </div>
                <div class="card-body" >
                    <h5 class="card-title"><?php echo e($wishlist['hotel']->title); ?></h5>
                    <p class="card-text">
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?php echo e($wishlist['hotel']->address); ?></p></span>
                    <p>
                        <span class="btn btn-light Daily-btn"><?php echo e($wishlist['hotel']->review_score); ?> <i class="fa fa-star"></i></span> 
                        </span>
                    </p>
                    
                    
                    
 <p style="position: relative; top: 29px;">
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

if ($exchangeRate) {
    $wishlist->price /= $exchangeRate;
    $decimalPlaces = 2;
    $formattedPrice = number_format($wishlist->price, $decimalPlaces);
?>
    <span style="font-size: 25px; color: black; font-weight: 700;"><?php echo e(intval($wishlist['hotel']->price)); ?></span>
    <span style="font-size: 25px;"><?php echo e($targetCurrency); ?></span>
<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
}
?>

<span style="font-size: 25px; font-weight: 700; color: black;">
    <?php echo e(intval($wishlist['hotel']->price - ($wishlist['hotel']->price * ($wishlist['hotel']->discount_percent / 100)))); ?>

</span>
<span style="font-size: 25px;">
    <?php echo e(strtoupper($mainCurrency->val)); ?>

</span>
</p>
        
                    <p style="position: relative;
                      top: 18px;">
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;"><?php echo e(intval($wishlist['hotel']->price)); ?></span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">  <?php echo e(strtoupper($mainCurrency->val)); ?> </span>
                        <span class="btn btn-light Daily-btn"><?php echo e($wishlist['hotel']->discount_percent); ?>% OFF</span>
                    </p>
                </div>
               
            </div>
             </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
   <p class="text-center mx-3">No data found.</p>
<?php endif; ?>

 
 
    <div class="row" style="margin-top:14px;">
     <h4  class="title py-3 mx-3 text-center ">Activities wishlist</h4>
    </div>

 <?php if(count($activitiesall) > 0): ?>
 
 
 
    <?php $__currentLoopData = $activitiesall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
        <div class="col-md-4 mb-4">
            
                     <span id="heartIcon" class="fa fa-heart fa-3x fass newhotelheartstatus<?php echo e($wishlist['hotel']->id); ?> hotelwishlistaddingheart" style=" 
    
    z-index:2;
   
    padding: 6px 6px;
    border-radius: 30px;
    background-color: white;
    height: 30px;
    width: 30px;
    color: red;"  attr="<?php echo e($wishlist['hotel']->id); ?>"></span> 
    
    
             <a href="<?php echo e(url('/activity/' . $wishlist['hotel']->slug)); ?>" style="text-decoration:none;">
            <div class="card" style="border-radius: 10px;">
               
                <div class="Daily-Deals1" style="position: relative;">
                    <img src="<?php echo e($wishlist['file_path']); ?>" style="height: 240px;; width:100%; border-radius: 10px;">
            
  <input type ="text" class="objectidgetclass<?php echo e($wishlist['hotel']->id); ?>" style="display:none;" name="object_id" value="<?php echo e($wishlist['hotel']->id); ?>">
  <input type ="text" class="objectmodalgetclass<?php echo e($wishlist['hotel']->id); ?>" style="display:none;" name="object_model" value="event">
                </div>
                
                
                <div class="card-body" >
                    <h5 class="card-title"><?php echo e($wishlist['hotel']->title); ?></h5>
                    <p class="card-text">
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?php echo e($wishlist['hotel']->address); ?></p></span>
                    <p>
                        <span class="btn btn-light Daily-btn"><?php echo e($wishlist['hotel']->review_score); ?> <i class="fa fa-star"></i> </span> 
                        </span>
                    </p>
                     <p style="position: relative; top: 29px;">
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

if ($exchangeRate) {
    $wishlist->price /= $exchangeRate;
    $decimalPlaces = 2;
    $formattedPrice = number_format($wishlist->price, $decimalPlaces);
?>
    <span style="font-size: 25px; color: black; font-weight: 700;"><?php echo e(intval($wishlist['hotel']->price)); ?></span>
    <span style="font-size: 25px;"><?php echo e($targetCurrency); ?></span>
<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
}
?>

<span style="font-size: 25px; font-weight: 700; color: black;">
    <?php echo e(intval($wishlist['hotel']->price - ($wishlist['hotel']->price * ($wishlist['hotel']->discount / 100)))); ?>

</span>
<span style="font-size: 25px;">
    <?php echo e(strtoupper($mainCurrency->val)); ?>

</span>
</p>
                    <p style="position: relative;
                       top: 18px;">
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;"><?php echo e(intval($wishlist['hotel']->price)); ?></span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">  <?php echo e(strtoupper($mainCurrency->val)); ?> </span>
                        <span class="btn btn-light Daily-btn"><?php echo e($wishlist['hotel']->discount); ?>% OFF</span>
                    </p>
                </div>
             
            </div>
               </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <p class="text-center  mx-3">No data found.</p>
<?php endif; ?>

  
  

        
 </div>
 
     <div class="bravo-list-news">
     <div class="container">
        <div class="row">
        <div class="col-md-6">
              <div class="card1">
                <div class="destination-item">
                    <div class="image">
                    <div class="effect"></div>
                     <div class="content">
                        
                        <small class="text2">Experience Better</small>
                        <h4 class="title text1">Top Staycation Around UAE</h4>
                          <div class="desc">                                                                                                                                                                                                                                             
                         <a href="<?php echo e(url('staycation?location_id=11')); ?>" class="btn btn-light butn" target="_blank"> 
                            Explore
                         </a> 
                        </div>
                      </div>
                </div>
            </div>
              </div>
        </div>
        <div class="col-md-6">
            <div class="card1"> 
                <div class="destination-item">
                    <div class="image1">
                    <div class="effect"></div>
                    <div class="content">
                        
                        <small class="text2">Experience More</small>
                        <h4 class="title text1">Top Activities Around UAE</h4>
                          <div class="desc">                                                                                                                                                                                                                                             
                         <a href="<?php echo e(url('staycation?location_id=11')); ?>" class="btn btn-light butn" target="_blank"> 
                            Explore
                         </a> 
                        </div>
                      </div>
                </div>
            </div>
              </div>
        </div>
      </div>
      </div>
    </div>
    
     <div class="container mt-5 pt-5 mb-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="card1">
                    <img src="images/Frame_1.svg" class="card-img-top" alt="...">
                    
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card1">
                    <img src="images/Frame_2.png" class="card-img-top" alt="...">
                    
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card1">
                    <img src="images/Group2608634.svg" class="card-img-top" alt="..." style="height:64px">
                    <div class="card-body">
                        <h5 class="card-title pt-3" style="font-weight:900">Best Offer</h5>
                        <p class="card-text">Best Recommendations according to your Interest and offers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
   $('document').ready(function(){
   
   $('.hotelwishlistaddingheart').click(function() {
   var id = $(this).attr('attr');
  
   
   var object_id = $('.objectidgetclass' + id).val();
   
 
   
   var object_modal = $('.objectmodalgetclass' + id).val();
   
   var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Retrieve the CSRF token from the meta tag
   
   $.ajax({
     url: '/user/wishlist',
     type: 'post',
     data: {
       object_id: object_id,
       object_model: object_modal
     },
     headers: {
       'X-CSRF-TOKEN': csrfToken 
     },
    success: function(response) {
   if (response.class === "active") {
       
   
       $('.newhotelheartstatus' +id).addClass('class');
     
   
   } else if (response.class === "inactive") {
     
     $('.newhotelheartstatus' +id).removeClass('class');
     
    window.location.reload();
     
   } else {
   
     alert("Unexpected response status: " + response.status);
    
   }
   },
     error: function(xhr, status, error) {
        // alert("AJAX request failed: " + error);
   
        $('#login').modal('show');
       
     }
   });
   });
   
   });
   
   
   
   
        
</script>







<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/themes/BC/Hotel/Views/frontend/wishlist-list.blade.php ENDPATH**/ ?>