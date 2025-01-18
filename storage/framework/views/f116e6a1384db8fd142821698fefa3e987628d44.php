

<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/fotorama/fotorama.css")); ?>"/>
    
 <link rel="stylesheet" type="text/css"   href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.css">
    <style>
    
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


    .hhhhhh{
      position: relative;
    top: -154px !important;
    left: -31px;  
    }
  /*     .row .column {*/
  /*  display: none;*/
  /*}*/
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
    left: -17px;
    top: 9px;
}
.Daily-btn{
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color:white;
    padding: 8px 6px;
    font-size: 10px;
    border-radius: 10px !important;
}

.image{
        background: url("images/img.png");
         height:400px;
         border-radius:28px;
    }
    .image1{
        background: url("images/img_1.png");
         height:400px;
         border-radius:28px;   
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
<?php
$review = DB::table('bravo_review')->limit(10)->get();
$reviews = DB::table('bravo_review')->first();



$user_review = [];

foreach ($review as $rr) {
    $user = DB::table('users')->select('first_name', 'last_name', 'images')->where('id', $rr->user_id)->first();
    $rr->user = $user;
    $user_review[] = $rr;
}
$totalUsers = count($user_review);
?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .img {
     width: 100%; 
    height: auto;
}
.Daily-Deals{
  background-size: cover;
  height:200px;
  width:100%;
  border-radius: 10px;
  background-repeat: no-repeat;
  background-image: url("images/05102023125612645b946ceee0b.jpg");
}
.fass {
    font-size: 19px;
    color: white;
    float: right;
    position: relative;
    left: -17px;
    top: 9px;
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
   
}
  
/* Content decoration */
.content {
    /* background-color: white;
    padding: 10px;
    border: 1px solid gray; */
}
  
/* Paragraph decoration */
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
  
/* .content {
    background-color: white;
    padding: 10px;
    border: 1px solid gray;
} */
  
.show {
    display: block;
}
  
/* Style the filter buttons */
.bttn {
    border: none;
    padding: 8px 14px;
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color:white;
    border-radius:4px;
}
  
.bttn:hover {
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    opacity: 0.8;
    color:white;
}
  
.bttn.active {
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color: white;
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
   
.dp-wrap {
  /* margin: 120px auto; */
  position: relative;
  perspective: 1000px;
  height: 100%;
}

.dp-slider {
  height: 100%;
  width: 100%;
  position: absolute;
  transform-style: preserve-3d;
}

.dp-slider div {
  transform-style: preserve-3d;
}

.dp_item {
  display: block;
  position: absolute;
  text-align: center;
  color: #fff;
  border-radius: 10px;
  transition: transform 1.2s;
}

.dp-img img {
  border-left: 1px solid #fff;
}

#dp-slider .dp_item:first-child {
  z-index: 10 !important;
  transform: rotateY(0deg) translateX(0px) !important;
}

.dp_item[data-position="2"] {
  z-index: 9;
  transform: rotateY(0deg) translateX(10%) scale(0.9);
}

.dp_item[data-position="3"] {
  z-index: 8;
  transform: rotateY(0deg) translateX(20%) scale(0.8);
}

.dp_item[data-position="4"] {
  z-index: 7;
  transform: rotateY(0deg) translateX(30%) scale(0.7);
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
  bottom: 60px;
  z-index: 12;
  left: 38%;
  cursor: default;
}

#dp-dots li {
  display: inline-block;
  width: 13px;
  height: 13px;
  background: #fff;
  border-radius: 50%;
}

#dp-dots li:hover {
  cursor: pointer;
 color:white !important;
  transition: background 0.3s;
}

#dp-dots li.active {
  background: goldenrod;
}

.dp_item {
  width: 85%;
}

.dp-content,
.dp-img {
  text-align: left;
}

.dp_item {
  display: flex;
  align-items: center;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  border-top: none;
}

.dp-content {
  padding-left: 100px;
  padding-right: 0;
  display: inline-block;
  width: 100%;
}

.dp-content h2 {
  color: #41414b;
  font-family: Circular Std Bold;
  font-size: 48px;
  max-width: 460px;
  margin-top: 8px;
  margin-bottom: 0px;
}

.dp-content p {
  color: #74747f;
  max-width: 490px;
  margin-top: 15px;
  font-size: 24px;
}

.dp-content .site-btn {
  margin-top: 15px;
  font-size: 18px;
  padding: 19px 40px;
}

.dp-img:before {
  background: -webkit-linear-gradient(
    -90deg,
    rgba(255, 255, 255, 0.25),
    rgba(255, 255, 255, 0)
  );
  background: -o-linear-gradient(
    -90deg,
    rgba(255, 255, 255, 0.25),
    rgba(255, 255, 255, 0)
  );
  background: -moz-linear-gradient(
    -90deg,
    rgba(255, 255, 255, 0.25),
    rgba(255, 255, 255, 0)
  );
  background: linear-gradient(
    -90deg,
    rgba(255, 255, 255, 0.75),
    rgba(255, 255, 255, 0)
  );
  content: "";
  position: absolute;
  height: 100%;
  width: 25%;
  z-index: 1;
  top: 0;
  pointer-events: none;
  background: -webkit-linear-gradient(
    -90deg,
    rgba(255, 255, 255, 0),
    rgba(255, 255, 255, 0.75)
  );
  background: -o-linear-gradient(
    -90deg,
    rgba(255, 255, 255, 0),
    rgba(255, 255, 255, 0.75)
  );
  background: -moz-linear-gradient(
    -90deg,
    rgba(255, 255, 255, 0),
    rgba(255, 255, 255, 0.75)
  );
  background: linear-gradient(
    -90deg,
    rgba(255, 255, 255, 0),
    rgb(255, 255, 255)
  );
}

.dp-img img {
  object-fit: cover;
  object-position: right;
}

#dp-slider,
.dp-img img {
  height: 738px;
}

#dp-slider .dp_item:hover:not(:first-child) {
  cursor: pointer;
}

.site-btn {
  color: #fff;
  font-size: 18px;
  font-family: "Circular Std Medium";
  background: goldenrod;
  padding: 14px 33px;
  display: inline-block;
  border-radius: 50px;
  position: relative;
  top: -10px;
  text-decoration: none;
}

.site-btn:hover {
  text-decoration: none;
  color: #fff;
}
.image{
        background: url("images/img.png");
         height:400px;
         border-radius:28px;
         background-repeat:no-repeat;
         width:100%;
         background-size:cover;
         

    }
    .image1{
        background: url("images/img_1.png");
         height:400px;
         border-radius:28px;  
           background-repeat:no-repeat;
         width:100%;
         background-size:cover;
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
fass:hover{
  color: #FF3500;   
}

.ican-img{
    padding: 3px 10px;
 width: 11%;
} 


 .class{

   color: red !important;

     }
     
     .fass {
             position: absolute;
             top: 12px;
             right: 10px;
             color: black;
             text-shadow: 1px 1px 27px black;
             left: 86% !important;
             height: 30px;
             width: 30px;
             background: white;
             padding: 7px 6px !important;
             border-radius: 30px;
             z-index:2;
         }

.img {
  width: 100%;
  height: auto;
  
}

.h2 {
  text-align: center;
  padding-bottom: 1em;
}

.slick-dots {
  text-align: center;
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

/* Custom Arrow */
.prev {
  color: #999;
  position: absolute;
  top: 38%;
  left: -2em;
  font-size: 1.5em;
}

.prev:hover {
  cursor: pointer;
  color: black;
}

.next {
  color: #999;
  position: absolute;
  top: 38%;
  right: -2em;
  font-size: 1.5em;
}

.next:hover {
  cursor: pointer;
  color: black;
}

@media screen and (max-width: 800px) {
  .next {
    display: none !important;
  }
}

.column.row {
   display: none !important;
}

</style>


  <center><h3 class="title py-2" style="margin-top: 43px; font-weight:700; font-size:28px;">Explore UAE <span style="color: #FE9000;">Activities!</span></h3></center>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <img src="<?php echo e(asset('images\benner-img.png')); ?>" alt="" srcset="" style="width:100%;">
        </div>
       
    </div>
  </div>
 
 <div class="container">
    <h4 class="mt-2 mx-3" style="font-weight: 700; font-size: 28px; margin-top: 48px !important;">Categories</h4>
    <div class="row">
        <div class="col-md-12 heroSlider-fixed">
            <div class="overlay"></div>
         
            <div class="slider responsive">
            <?php $__currentLoopData = $fetch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
        <?php
        $queryParams = [
            'price_range' => '100;4000000',
            'terms' => [$cat->id]  // Put the term ID in an array
        ];
        $queryString = http_build_query($queryParams);
        $url = url('activity') . '?' . $queryString;
        ?>
        <a href="<?php echo e($url); ?>" style="text-decoration:none;">
            <div class="Trending In Dubai">
                <div class="card1" style="position: relative;">
                    <div class="categories1" style="position: relative;">
                        <img src="<?php echo e($cat->banner_image); ?>" alt="" srcset="" style="position: relative; height: 226px; width:100%; border-radius:10px;">
                        <div style="height: 226px; width:100%;  border-radius: 10px;background: rgba(0,0,0,0.3);
                                    background: linear-gradient(359deg, rgba(0,0,0,0.8) 10%, rgba(255,255,255,0.1) 55%);
                                    position: absolute;top:0px;left:0px">
                        </div>
                        <h2 class="heading" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%); color: white; text-align: center; width: 100%; font-weight: 900;"><?php echo e($cat->name); ?></h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




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





<div class="container mt-5">
   
   <div class="row">
    <h4  class="title mx-3" style="margin-top:-37px; font-weight:700; font-size:28px;  position: relative;
    top: 15px;">Top Activities<a href="<?php echo e(url('activity')); ?>" ><span style="font-size:15px; font-weight: 900; float:right;color:#FF3500; position: relative;
    left: -27px;
    top: -11px;margin-top: 27px; ">View All</span></a></h4> 
   </div>
 
 
 <?php
   
    $mergedEvents = [];
    foreach ($data as $datas) {
        $mergedEvents = array_merge($mergedEvents, $datas['events']);
    }
    
     $limitedEvents = array_slice($mergedEvents, 0, 6);
?>
 

   
  
   <div class="row">
       <?php $__currentLoopData = $limitedEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-md-4 mb-3">
            
               <span class="fa fa-heart-o fa-3x fass newhotelheartstatus<?php echo e($dt->id); ?> hotelwishlistaddingheart <?php if ($dt->wishlist== true) {
                  echo "class";
                }   ?>" attr="<?php echo e($dt->id); ?>" ></span>


            <a href ="<?php echo e(url('/activity/'.$dt->slug)); ?>" style="text-decoration:none;">
            <div class="card"  style="border-radius: 10px;;">
                <div class="Daily-Deals1" style="position: relative;">
                  <img src="<?php echo e($dt->banner_image); ?>" style="height:200px; width:100%; border-radius: 10px;">
                 
            <input type ="text" class="objectidgetclass<?php echo e($dt->id); ?>" style="display:none;" name="object_id" value="<?php echo e($dt->id); ?>">
           <input type ="text" class="objectmodalgetclass<?php echo e($dt->id); ?>" style="display:none;" name="object_model" value="event">
 
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo e($dt->title); ?></h5>
                  <p class="card-text">
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                    <?php
                   
                   $location = DB::table('bravo_locations')->where('id', $dt->location_id)->first();
                  ?>
                  
                  <?php echo e($location->name); ?>

                    
                    </p></span>
                    
                   <?php if(isset($dt->review_score) && $dt->review_score > 0): ?>
    <p><span class="Daily-btn"><?php echo e($dt->review_score); ?> <i class="fa fa-star"></i></span></p>
<?php else: ?>
    <p>No Rating</p>
<?php endif; ?>
                    
                     <p style="margin-top: -27px; ">
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
    $dt->price /= $exchangeRate;
    $decimalPlaces = 2;
    $formattedPrice = number_format($dt->price, $decimalPlaces);
?>
 <p  style="position: relative; top:36px;">
          
       <span style="font-size: 24px; font-weight:500; position: relative;"><?php echo e(intval($dt->price - ($dt->price * ($dt->discount / 100)))); ?></span> 
       <span style="font-size: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
      </p>

<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
    top: 24px;"><?php echo e(intval($dt->price)); ?></span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
    top: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
<button class="Daily-btn btn btn-light" style="padding: 4px 5px;
    border-radius: 4px !important; position: relative;
    top: 24px;
   "><?php echo e($dt->discount); ?> %</button>



<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>

 <p style="position: relative;
  top:36px;">
          
       <span style="font-size: 24px; font-weight:500;"><?php echo e(intval($dt->price - ($dt->price * ($dt->discount / 100)))); ?></span> 
       <span style="font-size: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
      </p>
     
 <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
    top: 24px;"><?php echo e(intval($dt->price)); ?></span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
    top: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
<button class="Daily-btn btn btn-light" style="padding: 4px 5px;
    border-radius: 4px !important;position: relative;    position: relative;
    top: 24px;
   "><?php echo e($dt->discount); ?> %</button>


<?php
}
?>
                                        

 </p>
 
                </div>
              </div>
              </a>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
   
  

</div>

<div class="container">
   <div class="row">
      <h4 class="title" style="font-weight:700; font-size:28px;margin-top: 17px;">Combo Offers</h4>
   </div>
   <div class="row">
      <div id="filtering">
         <button class="bttn" onclick="geeksportal('all')" style="display:none">Show all</button>
         <button class="bttn" onclick="geeksportal('top-discount')">Top Discount</button>
         <button class="bttn " onclick="geeksportal('top-rating')">Top Rated</button>
         <button class="bttn" onclick="geeksportal('top-selling')">Top Selling</button>
      </div>
   </div>
  
   <div class="row">
    <div class="column top-rating">
      
            <div class="col-md-12">
                 <div class="row" style="width: 105%; left: -22px;position: relative;">
                  
                 <?php $__currentLoopData = $data_review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $event = $eventData['event']; 
                $banner_image_path = $eventData['banner_image_path']; 
            ?>
              
              
                   <div class="col-md-4  mb-3">
                <div class="card mb-3 h-100" style="border-radius: 10px; position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                    <div class="Daily-Deals1" style="position: relative;">
                        <a href="">
                            <img src="<?php echo e($banner_image_path); ?>" style="height: 200px; width: 100%; border-radius: 10px;">
                        </a>
                        <input type="text" class="objectidgetclass<?php echo e($event->id); ?>" style="display: none;" name="object_id" value="<?php echo e($event->id); ?>">
                        <input type="text" class="objectmodalgetclass<?php echo e($event->id); ?>" style="display: none;" name="object_model" value="hotel">
                        <span class="fa fa-heart fa-3x fass newhotelheartstatus<?php echo e($event->id); ?> hotelwishlistaddingheart <?php if ($event->wishlist == true) {
                            echo 'class';
                        } ?>" attr="<?php echo e($event->id); ?>"></span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($event->title); ?></h5>
                       <p class="card-text">
          <?php if($event->address): ?>
          <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($event->address); ?></span>
        <?php else: ?>
         <span style="display:none;"></span>
          <?php endif; ?>
</p> 
                        <p>
                            <?php if($event->review_score): ?>
                                <span class="Daily-btn"><?php echo e($event->review_score); ?> <i class="fa fa-star"></i></span>
                            <?php else: ?>
                                <span class="Daily-btn" style="display:none;"><i class="fa fa-star"></i></span>
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

if ($exchangeRate) {
    $event->price /= $exchangeRate;
    $decimalPlaces = 2;
    $formattedPrice = number_format($event->price, $decimalPlaces);
?>
 <p  style="position: relative; top:36px;">
          
       <span style="font-size: 24px; font-weight:500; position: relative;"><?php echo e(intval($event->price - ($event->price * ($event->discount / 100)))); ?></span> 
       <span style="font-size: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
      </p>

<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
    top: 24px;"><?php echo e(intval($event->price)); ?></span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
    top: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
<button class="Daily-btn btn btn-light" style="padding: 4px 5px;
    border-radius: 4px !important; position: relative;
    top: 24px;
   "><?php echo e($event->discount); ?> %</button>

<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>

 <p style="position: relative;
  top:36px;">
          
       <span style="font-size: 24px; font-weight:500;"><?php echo e(intval($event->price - ($event->price * ($event->discount / 100)))); ?></span> 
       <span style="font-size: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
      </p>
     
 <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
    top: 24px;"><?php echo e(intval($event->price)); ?></span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
    top: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
<button class="Daily-btn btn btn-light" style="padding: 4px 5px;
    border-radius: 4px !important;position: relative;    position: relative;
    top: 24px;
   "><?php echo e($event->discount); ?> %</button>


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
                 <div class="row" style="width: 105%; left: -22px;position: relative;">
                 <?php $__currentLoopData = $data_discount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $event = $eventData['event']; // Retrieve the event from the associative array
                $banner_image_path = $eventData['banner_image_path']; // Retrieve the banner image path
            ?>
              
        <div class="col-md-4 mb-3">
       <div class="card mb-3 h-100" style="border-radius: 10px; position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
        <div class="Daily-Deals1" style="position: relative;">
            <a href="">
                <img src="<?php echo e($banner_image_path); ?>" style="height: 200px; width: 100%; border-radius: 10px;">
            </a>
            <input type="text" class="objectidgetclass<?php echo e($event->id); ?>" style="display: none;" name="object_id" value="<?php echo e($event->id); ?>">
            <input type="text" class="objectmodalgetclass<?php echo e($event->id); ?>" style="display: none;" name="object_model" value="hotel">
            <span class="fa fa-heart fa-3x fass newhotelheartstatus<?php echo e($event->id); ?> hotelwishlistaddingheart <?php if ($event->wishlist == true) {
                echo 'class';
            } ?>" attr="<?php echo e($event->id); ?>"></span>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo e($event->title); ?></h5>
            <p class="card-text">
          <?php if($event->address): ?>
          <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($event->address); ?></span>
        <?php else: ?>
         <span style="display:none;"></span>
          <?php endif; ?>
</p> 
            <p>
                <?php if($event->review_score): ?>
                    <span class="Daily-btn"><?php echo e($event->review_score); ?> <i class="fa fa-star"></i></span>
                   <?php else: ?>
                     <span class="Daily-btn" style="display:none;"></span>
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

if ($exchangeRate) {
    $event->price /= $exchangeRate;
    $decimalPlaces = 2;
    $formattedPrice = number_format($event->price, $decimalPlaces);
?>
 <p  style="position: relative; top:36px;">
          
       <span style="font-size: 24px; font-weight:500; position: relative;"><?php echo e(intval($event->price - ($dt->price * ($event->discount / 100)))); ?></span> 
       <span style="font-size: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
      </p>

<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
    top: 24px;"><?php echo e(intval($event->price)); ?></span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
    top: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
<button class="Daily-btn btn btn-light" style="padding: 4px 5px;
    border-radius: 4px !important; position: relative;
    top: 24px;
   "><?php echo e($dt->discount); ?> %</button>



<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>

 <p style="position: relative;
  top:36px;">
          
       <span style="font-size: 24px; font-weight:500;"><?php echo e(intval($event->price - ($event->price * ($event->discount / 100)))); ?></span> 
       <span style="font-size: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
      </p>
     
 <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
    top: 24px;"><?php echo e(intval($event->price)); ?></span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
    top: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
<button class="Daily-btn btn btn-light" style="padding: 4px 5px;
    border-radius: 4px !important;position: relative;    position: relative;
    top: 24px;
   "><?php echo e($event->discount); ?> %</button>


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
                    <div class="col-md-12">
              
            
            <div class="row" style="width: 105%;
               left: -22px;
               ">
              
               <?php $__currentLoopData = $top_event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotelData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
               $hotel = $hotelData['hotel']; 
               $banner_image_path = $hotelData['banner_image_path']; 
               ?>
               <div class="col-md-3  mb-3">
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
                            
                        <?php if($event->address): ?>
          <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($event->address); ?></span>
        <?php else: ?>
         <span style="display:none;"></span>
          <?php endif; ?>
                           
                        </p>
                       <?php if($event->review_score): ?>
                                <span class="Daily-btn"><?php echo e($event->review_score); ?> <i class="fa fa-star"></i></span>
                            <?php else: ?>
                                <span class="Daily-btn" style="display:none;"><i class="fa fa-star"></i></span>
                            <?php endif; ?>
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




<div class="container-fluid mb-5 w-100 mt-2 pt-2" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);">
    <div class="row d-flex justify-content-center p-4">
   
      <div class="col-md-6" style="margin-left: 25px;">
       <h3 class="card-text pt-5 text-white p-1" style="font-size:32px; font-weight:700">Listen to Our Happy Customers</h3>
        <p class="card-text text-white pt-3" style="font-size: 18px;">Experience blissful relaxation, captivating local adventures, and charming accommodations - all in one staycation destination; our guests' reviews speak volumes about the unforgettable memories and cherished experiences awaiting you!</p>
        <div class="row mx-3" style="position: relative;
    left: -42px;">
          <div class="col-md-6">
            <h3 class="card-text pt-2 text-white p-1"><?php
                   
                    $user = DB::table('users')->get();
                      $alluser = count($user);
                   ?>
                    
                    <?php echo e($alluser); ?> +</h3>
            <p class="card-text text-white">Happy Customers</p>
          </div>
          <div class="col-md-6">
            
        
              <h3 class="card-text pt-2 text-white p-1"><?php echo e(number_format($reviews->rate_number, 0)); ?> <i class="fa fa-star"></i></h3>
                  <p class="card-text text-white">Overall Rating</p>
          </div>
        </div>
      </div>
      <div class="col-md-5 p-4">
        <div id="slider" style="height: 400px;">
          <div class="dp-wrap">
            <div id="dp-slider" style="margin-top: 17px;">

              <?php $__currentLoopData = $user_review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
               <?php if($index <= 4): ?>
            <div class="dp_item" data-class="slide<?php echo e($index + 1); ?>" data-position="<?php echo e($index + 1); ?>" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; height:300px;">
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
                        <a href="<?php echo e(url('activity?location_id=11')); ?>" class="btn btn-light butn" target="_blank"> 
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
  
  
<div class="container mt-5 pt-5 mb-5">
       <div class="row">
           <div class="col-md-4 text-center">
               <div class="card1">
                <img src="<?php echo e(url('images/Frame_1.svg')); ?>" class="card-img-top" alt="...">
                 
               </div>
           </div>
           <div class="col-md-4 text-center">
               <div class="card1">
                <img src="<?php echo e(url('images/Frame_2.png')); ?>" class="card-img-top" alt="...">
                  
               </div>
           </div>
           <div class="col-md-4 text-center">
               <div class="card1">
                <img src="<?php echo e(('images/Group2608634.svg')); ?>" class="card-img-top" alt="..." style="height:64px">
                   <div class="card-body">
                       <h5 class="card-title pt-3" style="font-weight:900">Best Offer</h5>
                       <p class="card-text">Best Recommendations according to your Interest and offers.</p>
                   </div>
               </div>
           </div>
       </div>
   </div>
   
 
       

   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
   
   
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
   $('.responsive').slick({
      dots: true,
      prevArrow: $('.prev'),
      nextArrow: $('.next'),
      infinite: true,        // Set to true for continuous loop
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 5,
      autoplay: false,
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









       


 <script>
        geeksportal("all")
  
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
    btns[i].addEventListener("click", function () {
  
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
   

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/themes/BC/Event/Views/frontend/explore-activity.blade.php ENDPATH**/ ?>