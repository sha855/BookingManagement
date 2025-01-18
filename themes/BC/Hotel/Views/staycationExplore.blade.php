@extends('layouts.app')
@push('css')
    <link href="{{ asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
    
    
    <style>
    .red-heart{
        color:red !important;
    }
    
     .btn:hover{
    color:white; !important;    
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
  background: white;
  transition: background 0.3s;
}

#dp-dots li.active {
  background: #FE9000 !important;
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
         background-size:cover;
         width:100%;
         background-repeat: no-repeat;

    }
    .image1{
        background: url("images/img_1.png");
         height:400px;
         border-radius:28px;
         background-size:cover;
          background-repeat: no-repeat;
        width:100%;
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
padding: 4px 4px;
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

.card{
    
    position: relative;
    height: 93%;
    border-radius: 12px !important;
}

.row .column {
    display: none;
}

</style>
@endpush
@php
$review = DB::table('bravo_review')->limit(10)->get();
$reviews = DB::table('bravo_review')->first();
$user_review = [];
foreach ($review as $rr) {
$user = DB::table('users')->select('first_name', 'last_name', 'images')->where('id', $rr->user_id)->first();
$rr->user = $user;
$user_review[] = $rr;
}
$totalUsers = count($user_review);
@endphp
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
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
   .Daily-btn{
   background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
   color: white;
      padding: 3px 6px;
   border-radius: 4px;
   font-size: 10px;
   text-align: center;
   align-items: center !important;
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
   border: 1px solid #FF3500;
   color:#FF3500;
   background:white;
   border-radius:4px;
   }
   .bttn:hover {
    border: 1px solid #FF3500;
   opacity: 0.8;
   color:#FF3500;
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
   
   .class {

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
     
    .show {
        display: block;
    }

    .active {
        background-color: #4CAF50;
        color: white;
    }
</style>




<center>
   <h3  class="title py-2" style="margin-top: 43px;
      font-weight: 900;
      font-size: 35px;
      font-family: 'Poppins';
      ">Explore UAE <span style="color: #FE9000; font-weight:700; font-size:35px;">Staycation</span></h3>
</center>
<div class="container mt-3 w-100">
   <div class="row">
      <img src="{{ asset('images\benner-img_3.png')}}" style="width:100%;">
   </div>
</div>
<div class="container mt-5">


   <div class="row">
      <h4 class="title mx-2" style="margin-top: 15px;font-weight:700; font-size:28px;">Top Staycations <a href="{{ url('staycation?price_range=200%3B400000&terms%5B%5D='.$topstaycation['id'])}}"><span style="font-size:15px; font-weight: 900; float:right;color:#FF3500; position: relative;
    left: -18px;top: 10px; ">View All</span></a></h4>
   </div>
   <div class="row">
     
     
      @foreach ($topstaycation['hotels'] as $hotelx)
      <div class="col-md-4 mb-3">
          
          <?php
   
    $isLoggedIn = false;

    if ($isLoggedIn) {
        $heartClass = "fa-heart-o active";  // Set class for active heart icon
    } else {
        $heartClass = "fa-heart-o";  // Set class for inactive heart icon
    }
?>
          
          <span class="fa fa-3x fass newhotelheartstatus{{$hotelx->id}} hotelwishlistaddingheart <?php echo $heartClass; ?>" attr="{{$hotelx->id}}">
</span>

        <a href="{{ url('/staycation/' . $hotelx->slug) }}" style="text-decoration:none;"> <div class="card mb-2" style=" position: relative; height:95%; border-radius: 20px;">
            <div class="Daily-Deals1" style="position: relative;">
               <img src="{{$hotelx->banner_image}}" style="height:200px; width:100%; border-radius: 12px;">
               <input type ="text" class="objectidgetclass{{$hotelx->id}}" style="display:none;" name="object_id" value="{{$hotelx->id}}">
               <input type ="text" class="objectmodalgetclass{{$hotelx->id}}" style="display:none;" name="object_model" value="hotel">
              
            </div>
            <div class="card-body">
               <h5 class="card-title">{{ $hotelx->title }}</h5>
               <p class="card-text" style="margin-top: -5px;">
                  <span><i class="fa fa-map-marker" aria-hidden="true"></i> 
                  
                  @php
                   
                   $location = DB::table('bravo_locations')->where('id', $hotelx->location_id)->first();
                  @endphp
                  
                  {{$location->name }}
                  
                  </span>
               </p>
              
               
               @if ($hotelx->review_score )
    <span class="Daily-btn"
      style=" padding: 3px 6px !important; 
      position: relative;
      left: 5px;">{{$hotelx->review_score }} <i class="fa fa-star" ></i>
   </span>      
@else
   <span class="Daily-btn"
      style=" padding: 3px 6px !important; 
      position: relative;
      left: 5px; display:none;"><i class="fa fa-star"></i> 
      </span>
@endif
         
               
 <p style="position: relative;
    top: 4px;">
                                   
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

        <p style="position: relative;
        top: 9px;">
       <span style="font-size: 24px; font-weight:500">{{ $discountformattedPrice }}</span> 
       <span style="font-size: 24px;">{{ strtoupper($targetCurrency) }}</span>
      </p>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ $formattedPrice }}</span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ $targetCurrency }}</span>

<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>

<p style="position: relative;
   top: 9px;">
          
    <span style="font-size: 24px; font-weight:500">{{ intval($hotelx->discount_percent) }}</span> 
    <span style="font-size: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
      </p>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ intval($hotelx->price) }}</span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ strtoupper($mainCurrency->val)}}</span>

<?php
}
?>
                  <span class="Daily-btn" style="margin-top: -10px;">{{ number_format($discountPercentage,0) }}% OFF</span>
               </p>
            </div>
         </div></a>
      </div>
      @endforeach
   </div>
</div>




<div class="container mt-5">
   <div class="row">
      <h4 class="title mx-2" style="margin-top: 15px;font-weight:700; font-size:28px;">Best Deals Staycations <a href="{{ url('staycation?price_range=200%3B400000&terms%5B%5D='.$bestDeal['id'])}}"><span style="font-size:15px; font-weight: 900; float:right;color:#FF3500; position: relative;
    left: -18px;top: 10px; ">View All</span></a></h4>
   </div>
   <div class="row">
     
     
      @foreach ($bestDeal['hotels'] as $hotelx)
      <div class="col-md-4 mb-3">
          
          <?php
   
    $isLoggedIn = false;

    if ($isLoggedIn) {
        $heartClass = "fa-heart-o active";  // Set class for active heart icon
    } else {
        $heartClass = "fa-heart-o";        // Set class for inactive heart icon
    }
?>
          
          <span class="fa fa-3x fass newhotelheartstatus{{$hotelx->id}} hotelwishlistaddingheart <?php echo $heartClass; ?>" attr="{{$hotelx->id}}">
</span>

        <a href="{{ url('/staycation/' . $hotelx->slug) }}" style="text-decoration:none;"> <div class="card mb-2" style=" position: relative; height:95%; border-radius: 20px;">
            <div class="Daily-Deals1" style="position: relative;">
               <img src="{{$hotelx->banner_image}}" style="height:200px; width:100%; border-radius: 12px;">
               <input type ="text" class="objectidgetclass{{$hotelx->id}}" style="display:none;" name="object_id" value="{{$hotelx->id}}">
               <input type ="text" class="objectmodalgetclass{{$hotelx->id}}" style="display:none;" name="object_model" value="hotel">
              
            </div>
            <div class="card-body">
               <h5 class="card-title">{{ $hotelx->title }}</h5>
               <p class="card-text" style="margin-top: -5px;">
                  <span><i class="fa fa-map-marker" aria-hidden="true"></i> 
                  
                  @php
                   
                   $location = DB::table('bravo_locations')->where('id', $hotelx->location_id)->first();
                   
                  @endphp
                  
                  {{$location->name }}
                  
                  
                  </span>
               </p>
               
               @if ($hotelx->review_score )
    <span class="Daily-btn"
      style=" padding: 3px 6px !important; 
      position: relative;
      left: 5px;">{{$hotelx->review_score }} <i class="fa fa-star" ></i>
   </span>      
@else
   <span class="Daily-btn"
      style=" padding: 3px 6px !important; 
      position: relative;
      left: 5px; display:none;"><i class="fa fa-star"></i> 
      </span>
@endif
               <!--<p  class="mb-4" style="margin-top: -5px;">-->
               <!--   <span class="btn btn-light Daily-btn">{{$hotelx->review_score }} <i class="fa fa-star"></i></span>-->
               <!--   {{$hotelx->star_rate }}-->
                  
               <!--</p>-->

 <p style="position: relative;
    top: 4px;">
                                   
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
    
    $bestdealsprice = $hotelx->price;
     
    $bestdealsprice /= $exchangeRate;
    
    $hotelx->discount_percent /= $exchangeRate;
    
    $decimalPlaces = 0;
    
    $formattedPrice = number_format($bestdealsprice, $decimalPlaces);
    
    
    
    $discountformattedPrice = number_format($hotelx->discount_percent, $decimalPlaces);
    
?>

     <p style="position: relative;
      top: 9px;">
       <span style="font-size: 24px; font-weight:500">{{ intval($discountformattedPrice) }}</span> 
       <span style="font-size: 24px;">{{ strtoupper($targetCurrency) }}</span>
      </p>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ intval($formattedPrice) }}</span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ $targetCurrency }}</span>

<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>

<p style="position: relative;
   top: 9px;">
          
       <span style="font-size: 24px; font-weight:500">{{ $hotelx->discount_percent }}</span> 
       <span style="font-size: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
      </p>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ intval($hotelx->price) }}</span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ strtoupper($mainCurrency->val) }}</span>

<?php
}
?>
                  <span class="Daily-btn" style="margin-top: -10px;">{{ number_format($discountPercentage,0) }}% OFF</span>
               </p>
            </div>
         </div></a>
      </div>
      @endforeach
   </div>
</div>


<div class="container ">
   <div class="row">
      <h4 class="title mx-2" style="margin-top: 10px; font-weight:700; font-size:28px;">Budget Staycation <a href="{{url('staycation?price_range=200%3B400000&terms%5B%5D='.$budget['id'])}}"><span style="font-size:15px; font-weight: 900; float:right;color:#FF3500;position: relative;
left: -10px;
    top: 12px;">View All</span></a></h4>
   </div>
   <div class="row">
      @foreach ($budget['hotels'] as $hotelx)
      <div class="col-md-4 mb-3">
          <span class="fa fa-heart-o fa-3x fass newhotelheartstatus{{$hotelx->id}} hotelwishlistaddingheart <?php if ($hotelx->wishlist== true) {
                  echo "class";
                  }   ?>" attr="{{$hotelx->id}}" ></span>
          <a href="{{ url('/staycation/' . $hotelx->slug) }}" style="text-decoration:none;">
            <div class="card mb-3" style="  position: relative; height:93%; ">
            <div class="Daily-Deals1" style="position: relative;">
              <img src="{{$hotelx->banner_image}}" style="height:200px; width:100%; border-radius: 12px;">
               <input type ="text" class="objectidgetclass{{$hotelx->id}}" style="display:none;" name="object_id" value="{{$hotelx->id}}">
               <input type ="text" class="objectmodalgetclass{{$hotelx->id}}" style="display:none;" name="object_model" value="hotel">
               
            </div>
            <div class="card-body">
               <h5 class="card-title">{{ $hotelx->title }}</h5>
               <p class="card-text">
                  <span><i class="fa fa-map-marker" aria-hidden="true"></i> 
                  
                   @php
                   
                   $location = DB::table('bravo_locations')->where('id', $hotelx->location_id)->first();
                  @endphp
                  
                  {{$location->name }}
                  
                  </span>
               </p>
               <!--<p  class="mb-4" style="margin-top: -5px;">-->
               <!--   <span class="btn btn-light Daily-btn">{{$hotelx->review_score }}  <i class="fa fa-star"></i> </span>-->
               <!--   {{$hotelx->star_rate }}-->
                 
               <!--</p>-->
               @if ($hotelx->review_score )
    <span class="Daily-btn"
      style=" padding: 3px 6px !important; 
      position: relative;
      left: 5px;">{{$hotelx->review_score }} <i class="fa fa-star" ></i>
   </span>      
@else
   <span class="Daily-btn"
      style=" padding: 3px 6px !important; 
      position: relative;
      left: 5px; display:none;"><i class="fa fa-star"></i> 
      </span>
@endif
               
                <p style="position: relative;
    top: 14px;">
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
    
                           
    
    $hotelx->price  /=          $exchangeRate;
    $hotelx->discount_percent /= $exchangeRate;
    $decimalPlaces   =          0;
    $formattedPrice  =          number_format($hotelx->price, $decimalPlaces);
    $discountformattedPrice =   number_format($hotelx->discount_percent, $decimalPlaces);
?>



 <p style="position: relative;
       top: 9px;">
       <span style="font-size: 24px; font-weight:500">{{ intval($discountformattedPrice) }}</span> 
       <span style="font-size: 24px;">{{ strtoupper($targetCurrency) }}</span>
 </p>
 
 <span  style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ intval($formattedPrice) }}</span>
 <span  style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ strtoupper($targetCurrency) }}</span>
 <span  class="Daily-btn"  style="margin-top: -10px;">{{ number_format($discountPercentage,0) }}% OFF</span>
<?php

} else {
 
  $mainCurrency = DB::table('core_settings')->where('name','currency_main')->first();
    
  $originalPrice = intval($hotelx->price);
  
  $discountAmount = $hotelx->discount_percent;
  
  $discountedPrice = $originalPrice - $discountAmount;
  
  $discountPercentage = ($discountedPrice / $originalPrice) * 100;

?>


<p style="position: relative;
   top: 9px;">
          
       <span style="font-size: 24px; font-weight:500">{{ intval($hotelx->discount_percent) }}</span> 
       <span style="font-size: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
      </p>
   <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; ">{{ intval($hotelx->price) }}</span>
   <span style="font-size: 15px; text-decoration: line-through;">{{ strtoupper($mainCurrency->val) }}</span>
 <span class="Daily-btn"  style="margin-top: -10px;">{{ number_format($discountPercentage,0) }}% OFF</span>
<?php
}
?>
                                        
 
 </p>
             

            </div>
         </div></a>
      </div>
      @endforeach
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
            <div class="row" style="idth: 104%;
               margin-left: -25px;">
               @foreach ($data_review as $hotelData)
               @php
               $hotel = $hotelData['hotel']; // Retrieve the event from the associative array
               $banner_image_path = $hotelData['banner_image_path']; // Retrieve the banner image path
               @endphp
               <div class="col-md-3">
                  <div class="card mb-3 h-100" style="border-radius: 10px; position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                     <div class="Daily-Deals1" style="position: relative;">
                        <a href="">
                        <img src="{{ $banner_image_path }}" style="height: 200px; width: 100%; border-radius: 10px;">
                        </a>
                        <input type="text" class="objectidgetclass{{ $hotel->id }}" style="display: none;" name="object_id" value="{{ $hotel->id }}">
                        <input type="text" class="objectmodalgetclass{{ $hotel->id }}" style="display: none;" name="object_model" value="hotel">
                        <span class="fa fa-heart fa-3x fass newhotelheartstatus{{ $hotel->id }} hotelwishlistaddingheart <?php if ($hotel->wishlist == true) {
                           echo 'class';
                           } ?>" attr="{{ $hotel->id }}"></span>
                     </div>
                     <div class="card-body">
                        <h5 class="card-title">{{ $hotel->title }}</h5>
                        <p class="card-text">
                            <?php
                        
                            $location = DB::table('bravo_locations')->where('id',$hotel->location_id)->first();
                            
                            ?>
                            
                           <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{$location->name}}</span>
                        </p>
                        <p>
                           @if(isset($hotel->review_score))
                           <span class="Daily-btn">{{ $hotel->review_score }} <i class="fa fa-star"></i></span>
                           @endif
                           @if(isset($hotel->star_rate))
                           {{ $hotel->star_rate }}
                           <span> Excellent </span>
                           @endif
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
                              ?>
                        <p  style="position: relative; top:36px;">
                           <span style="font-size: 24px; font-weight:500; position: relative;">{{ intval($hotel->discount_percent) }}</span> 
                           <span style="font-size: 24px;">{{ strtoupper($targetCurrency) }}</span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;">{{ intval($formattedPrice) }}</span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;">{{ strtoupper($targetCurrency) }}</span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important; position: relative;
                           top: 24px;
                           ">{{ number_format($discountPercentage) }} %</button>
                           
                        <?php
                           } else {
                               $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
                           ?>
                        <p style="position: relative;
                           top:36px;">
                           <span style="font-size: 24px; font-weight:500;">{{ intval($hotel->discount_percent) }}</span> 
                           <span style="font-size: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;">{{ intval($hotel->price) }}</span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important;position: relative;    position: relative;
                           top: 24px;
                           ">{{ number_format($discountPercentage) }} %</button>
                        <?php
                           }
                           ?>
                        </p>
                     </div>
                  </div>
               </div>
               @endforeach
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
               @foreach ($data_discount as $hotelData)
               @php
               $hotel = $hotelData['hotel']; // Retrieve the event from the associative array
               $banner_image_path = $hotelData['banner_image_path']; // Retrieve the banner image path
               @endphp
               <div class="col-md-4">
                  <div class="card mb-3 h-100" style="border-radius: 10px; position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                     <div class="Daily-Deals1" style="position: relative;">
                        <a href="">
                        <img src="{{ $banner_image_path }}" style="height: 200px; width: 100%; border-radius: 10px;">
                        </a>
                        <input type="text" class="objectidgetclass{{ $hotel->id }}" style="display: none;" name="object_id" value="{{ $hotel->id }}">
                        <input type="text" class="objectmodalgetclass{{ $hotel->id }}" style="display: none;" name="object_model" value="hotel">
                        <span class="fa fa-heart fa-3x fass newhotelheartstatus{{ $hotel->id }} hotelwishlistaddingheart <?php if ($hotel->wishlist == true) {
                           echo 'class';
                           } ?>" attr="{{ $hotel->id }}"></span>
                     </div>
                     <div class="card-body">
                        <h5 class="card-title">{{ $hotel->title }}</h5>
                        <p class="card-text">
                           <?php
                        
                            $location = DB::table('bravo_locations')->where('id',$hotel->location_id)->first();
                            
                            ?>
                            
                           <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{$location->name}}</span>
                        </p>
                        <p>
                           @if(isset($hotel->review_score))
                           <span class="Daily-btn">{{ $hotel->review_score }} <i class="fa fa-star"></i></span>
                           @endif
                           @if(isset($hotel->star_rate))
                           {{ $hotel->star_rate }}
                           <span> Excellent </span>
                           @endif
                        </p>
                        <p style="margin-top: -27px;">
                           <?php
                              $currency = DB::table('core_settings')->where('name', 'extra_currency')->first();
                              
                              $forex =          json_decode($currency->val);
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
                                  $hotel->discount_percent  /= $exchangeRate;
                                  $decimalPlaces = 0;
                                  $formattedPrice = number_format($hotel->price, $decimalPlaces);
                              ?>
                        <p  style="position: relative; top:36px;">
                           <span style="font-size: 24px; font-weight:500; position: relative;">{{ number_format($hotel->discount_percent) }}</span> 
                           <span style="font-size: 24px;">{{ strtoupper($targetCurrency) }}</span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;">{{ $formattedPrice }}</span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;">{{ strtoupper($targetCurrency) }}</span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important; position: relative;
                           top: 24px;
                           ">{{ number_format($discountPercentage) }} %</button>
                        <?php
                           } else {
                               $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
                           ?>
                        <p style="position: relative;
                           top:36px;">
                           <span style="font-size: 24px; font-weight:500;">{{ $hotel->discount_percent }}</span> 
                           <span style="font-size: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;">{{ intval($hotel->price) }}</span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important;position: relative;    position: relative;
                           top: 24px;
                           ">{{ number_format($discountPercentage) }} %</button>
                        <?php
                           }
                           ?>
                        </p>
                     </div>
                  </div>
               </div>
               @endforeach
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
               @foreach ($data_selling_hotel as $hotelData)
               @php
               $hotel = $hotelData['hotel']; 
               $banner_image_path = $hotelData['banner_image_path']; 
               @endphp
               <div class="col-md-3">
                  <div class="card mb-3 h-100" style="border-radius: 10px; position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                     <div class="Daily-Deals1" style="position: relative;">
                        <a href="">
                        <img src="{{ $banner_image_path }}" style="height: 200px; width: 100%; border-radius: 10px;">
                        </a>
                        <input type="text" class="objectidgetclass{{ $hotel->id }}" style="display: none;" name="object_id" value="{{ $hotel->id }}">
                        <input type="text" class="objectmodalgetclass{{ $hotel->id }}" style="display: none;" name="object_model" value="hotel">
                        <span class="fa fa-heart fa-3x fass newhotelheartstatus{{ $hotel->id }} hotelwishlistaddingheart <?php if ($hotel->wishlist == true) {
                           echo 'class';
                           } ?>" attr="{{ $hotel->id }}"></span>
                     </div>
                     <div class="card-body">
                        <h5 class="card-title">{{ $hotel->title }}</h5>
                        <p class="card-text">
                            
                            <?php
                        
                            $location = DB::table('bravo_locations')->where('id',$hotel->location_id)->first();
                            
                            ?>
                            
                           <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{$location->name}}</span>
                           
                        </p>
                        <p>
                           @if(isset($hotel->review_score))
                           <span class="Daily-btn btn btn-light" style="padding: 3px 7px !important;">{{ $hotel->review_score }} <i class="fa fa-star"></i></span>
                           @endif
                           @if(isset($hotel->star_rate))
                           {{ $hotel->star_rate }}
                           <span> Excellent </span>
                           @endif
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
                           <span style="font-size: 24px; font-weight:500; position: relative;">{{ $discountformattedPrice }}</span> 
                           <span style="font-size: 24px;">{{ strtoupper($targetCurrency) }}</span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;">{{ $formattedPrice }}</span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative;
                           top: 24px;">{{ strtoupper($targetCurrency) }}</span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important; position: relative;
                           top: 24px;
                           ">{{ number_format($discountPercentage,0) }} %</button>
                        <?php
                           } else {
                               $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
                           ?>
                        <p style="position: relative;
                           top:36px;">
                           <span style="font-size: 24px; font-weight:500;">{{ $hotel->discount_percent  }}</span> 
                           <span style="font-size: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;">{{ intval($hotel->price) }}</span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;     position: relative;
                           top: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px;
                           border-radius: 4px !important;position: relative;    position: relative;
                           top: 24px;
                           ">{{ number_format($discountPercentage,0) }} %</button>
                        <?php
                           }
                           ?>
                        </p>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
         
          
      </div>
   </div>
</div>
 
   
   
 
   <div class="container mt-3">
      <div class="row">
         <h4 class="title mx-2" style="margin-top: 10px; font-weight:700; font-size:28px;">Staycation <a href="{{ url('staycation')}}"><span style="font-size:15px; font-weight: 900; float:right;color:#FF3500;position: relative;
left: -10px;
    top: 12px;">View All</span></a></h4>
      </div>
      <div class="row">
         @foreach ($datas as $hotel)
         <div class="col-md-4 mb-3">
               <span class="fa fa-heart-o fa-3x fass newhotelheartstatus{{$hotel->id}} hotelwishlistaddingheart <?php if ($hotel->wishlist == true) {
                     echo "class";
                     }   ?>" attr="{{$hotel->id}}" ></span>
                     
            <a href="{{ url('/staycation/' . $hotelx->slug) }}" style="text-decoration:none;"> <div class="card mb-3" style=" position: relative; height:93%;">
               <div class="Daily-Deals1" style="position: relative;">
               <img src="{{ $hotel->bannerImage }}" style="height:200px; width:100%; border-radius: 12px;">
                  <input type ="text" class="objectidgetclass{{$hotel->id}}" style="display:none;" name="object_id" value="{{$hotelx->id}}">
                  <input type ="text" class="objectmodalgetclass{{$hotel->id}}" style="display:none;" name="object_model" value="hotel">
                
               </div>
               <div class="card-body">
                  <h5 class="card-title">{{ $hotel->title }}</h5>
                  <p class="card-text" style="margin-top: -5px;">
                     <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                     
                      @php
                   
                   $location = DB::table('bravo_locations')->where('id', $hotel->location_id)->first();
                  @endphp
                  
                  {{$location->name }}
                     
                     
                     </span>
                  </p>
                  <p  class="mb-4" style="margin-top: -5px;">
                     <span class="btn btn-light Daily-btn">{{$hotel->review_score }} <i class="fa fa-star"></i></span>
                     {{ $hotel->star_rate }} 
                     
                  </p>
                  
      <p>
                                      
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
?>

<p style="position: relative;
      top: 9px;">
       <span style="font-size: 24px; font-weight:500">{{ intval($hotel->discount_percent) }}</span> 
       <span style="font-size: 24px;">{{ strtoupper($targetCurrency) }}</span>
      </p>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ intval($hotel->price) }}</span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ $targetCurrency }}</span>
 <span class="Daily-btn"  style="margin-top: -10px;">{{number_format($discountPercentage)}}% OFF</span>
 



<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>

<p style="position: relative;
   top: 9px;">
          
       <span style="font-size: 24px; font-weight:500">{{ intval($hotel->discount_percent) }}</span> 
       <span style="font-size: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
      </p>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{intval($hotel->price) }}</span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;">{{ strtoupper($mainCurrency->val) }}</span>
 <span class="Daily-btn" style="margin-top:-10px;">{{ number_format($discountPercentage) }}% OFF</span>

<?php
}
?>
                    
                  </p>
               </div>
            </div></a>
         </div>
         @endforeach
      </div>
   </div>

<div class="container-fluid mb-5 w-100 mt-5 pt-5" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);">
   <div class="row d-flex justify-content-center p-4">
      <div class="col-md-6">
         <h4 class="card-text pt-5 text-white p-1" style="font-size: 32px;
    font-weight: 800;
">Listen to Our Happy Customers</h4>
         <p class="card-text text-white pt-3" style="font-size:18px;">Experience blissful relaxation, captivating local adventures, 
            and charming accommodations - all in one staycation destination; 
            our guests' reviews speak volumes about the unforgettable memories and cherished experiences awaiting you!
         </p>
         <div class="row" style="position: relative;
    left: -12px;" >
            <div class="col-md-6">
               <h3 class="card-text pt-2 text-white p-1"><?php
                   
                    $user = DB::table('users')->get();
                      $alluser = count($user);
                   ?>
                    
                    {{$alluser}}</h3>
               <p class="card-text text-white">Happy Customers</p>
            </div>
            <div class="col-md-6">
               <h3 class="card-text pt-2 text-white p-1">{{ number_format($reviews->rate_number, 0) }} <i class="fa fa-star"></i></h3>
               <p class="card-text text-white">Overall Rating</p>
            </div>
         </div>
      </div>
      <div class="col-md-5 p-4 pt-5">
         <div id="slider" style="height: 400px;">
            <div class="dp-wrap mt-2">
               <div id="dp-slider">
                  @foreach($user_review  as $index => $item)
                  @if($index <= 4)
     <div class="dp_item" data-class="slide{{ $index + 1 }}" data-position="{{ $index + 1 }}" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; height:300px;">
                 <div class="row">
                   <div class="col-md-12 mb-3">
                     <p class="card-text text-dark p-3 text-item-p" style="font-size:17px;">
                       {{ $item->content}} 
                     </p>
                   </div>
                   <div class="col-md-12 mb-4">
                     <div class="row">
                       <div class="col-md-4 offset-md-1">
                         @if(!empty($item->user->images))
                         <img class="img-fluid dpimg" src="/image/{{$item->user->images}}" height="10%" alt="investing" style="border-radius:100%; height:100px; width:100px;">
                         @else
                         
                         <img class="img-fluid dpimg" src="/images/avatar.png" height="10%" alt="investing" style="border-radius:100%; height:100px; width:100px;">
                         
                         @endif
                       </div>
                       <div class="col-md-5">
                         @if(!empty($item->user->first_name) && !empty($item->user->last_name))
                         <h6 class="text-dark sell-item">
                        {{$item->user->first_name}} {{$item->user->last_name}}
                         </h6>
                         @endif
                         <p class="text-dark">
                           @if(!empty($item->rate_number))
                           <div class="star">
                               @for($i = 0; $i < $item->rate_number; $i++)
                                   <i class="fa fa-star" style="color:#FE9000;"></i>
                               @endfor
                           </div>
                       @endif
                         </p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             @endif 
                  @endforeach
               </div>
              <ul id="dp-dots">
          @foreach($user_review as $index => $item)
              @if($index <= 4)
         <li data-class="slide{{ $index + 1 }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
       @endif
      @endforeach
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
         <div class="card1" style="padding:0px;">
            <div class="destination-item">
               <div class="image">
                  <div class="effect"></div>
                  <div class="content">
                     <small class="text2">Experience Better</small>
                     <h4 class="title text1">Top Staycation Around UAE</h4>
                     <div class="desc">                                                                                                                                                                                                                                             
                        <a href="{{url('staycation?location_id=11')}}" class="btn btn-light butn" target="_blank"> 
                        Explore
                        </a> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card1" style="padding:0px;">
            <div class="destination-item">
               <div class="image1">
                  <div class="effect"></div>
                  <div class="content">
                     <small class="text2">Experience More</small>
                     <h4 class="title text1">Top Activities Around UAE</h4>
                     <div class="desc">                                                                                                                                                                                                                                             
                        <a href="{{url('activity?location_id=11')}}" class="btn btn-light butn" target="_blank"> 
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
            <img src="{{ url('images/Frame_1.svg')}}" class="card-img-top" alt="...">
            {{-- 
            <div class="card-body">
               <h5 class="card-title">Best Price Guarantee</h5>
               <p class="card-text">Best Recommendations according to your Interest</p>
            </div>
            --}}
         </div>
      </div>
      <div class="col-md-4 text-center">
         <div class="card1">
            <img src="{{ url('images/Frame_2.png')}}" class="card-img-top" alt="...">
            {{-- 
            <div class="card-body">
               <h5 class="card-title">Best Offer</h5>
               <p class="card-text">Best Recommendations according to your Interest and offers.</p>
            </div>
            --}}
         </div>
      </div>
      <div class="col-md-4 text-center">
         <div class="card1">
            <img src="{{ ('images/Group2608634.svg')}}" class="card-img-top" alt="..." style="height:64px">
            <div class="card-body">
               <h5 class="card-title pt-3" style="font-weight:900">Best Offer</h5>
               <p class="card-text">Best Recommendations according to your Interest and offers.</p>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
  // Add event listener to the window to run this code when the page loads
  window.addEventListener('load', function () {
    // Set "all" category as active by default
    var defaultCategory = "all";
    var defaultButton = document.querySelector('.bttn[data-filter="' + defaultCategory + '"]');
    defaultButton.classList.add("active");

    // Call the geeksportal function with the default category
    geeksportal(defaultCategory);
  });

  function geeksportal(category) {
    var allContentRows = document.querySelectorAll('.row .column');
    for (var i = 0; i < allContentRows.length; i++) {
      allContentRows[i].style.display = "block";
    }
    if (category !== "all") {
      for (var i = 0; i < allContentRows.length; i++) {
        if (!allContentRows[i].classList.contains(category)) {
          allContentRows[i].style.display = "none";
        }
      }
    }
  }
</script>







@endsection