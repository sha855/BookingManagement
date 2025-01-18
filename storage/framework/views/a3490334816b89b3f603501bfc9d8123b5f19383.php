

<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/event/css/event.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('libs/ion_rangeslider/css/ion.rangeSlider.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('libs/fotorama/fotorama.css')); ?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
    
    .custom-calendar table.calendar-table td.off {
     display: none;
    }
    
   
        .iti--allow-dropdown{
                             left: 0px;
                            width: 106%;
                            
                            }
                             
    
    @media only screen and (max-width: 1399px) {
  .procced_btn{
   background:  #FF3500 !important;
   float: right !important;
   right: 118px !important;
  }
}
 
   @media only screen and (max-width: 1400px) {
  .procced_btn{
   background:  #FF3500 !important;
   float: right !important;
   /*right: 134px !important;*/
  }
}
 
    
    .btn:hover{
     color:white !important;   
 }
    
    
        .rounded-start {
            padding: 10px;
            height: 200px;
            border-radius: 20px;
        }
        .totl {
            background: #FFF3E3;
        }
        
        .fc-ltr .fc-dayGrid-view .fc-day-top .fc-day-number {
    float: none;
    left: 36px !important;
    position: relative;
    cursor: default;
}
        /*.fa {*/
        /*    color: #FF3500;*/
        /*}*/
        .price {
            float: ;
            color: #FF3500;
            left: 30px;
            position: relative;
        }
        .text {
            color: black;
            font-size: 12px;
        }

 .input-container {
    display: flex;
    align-items: center;
  }

  .input-container img {
    width: 15px;
    height: 15px;
    margin-right: 10px;
    position: relative;
    left:10px;
  }

  .input-container input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  #calendar {
    left: -95px;
    max-width: 384px;
    margin: 0 auto;
    position: relative;
    margin-top:10px;
}


.fc-unthemed td.fc-today {
    background: #fcf8e3;
    border-radius: 20px !important;
}

.fc-left{
    
    top: 10px;
    position: relative; 
    
}
.fc-past {
    background: #f8f9fa !important;
    border-radius: 20px !important;
}

  .fc-toolbar h2 {
    font-size: 0.999em;
    margin: 0;
}

  .fc-dayGridMonth-view .fc-day-grid {
    width: 100%; /* Adjust the grid cell width */
  }

  .fc-dayGridMonth-view .fc-day-grid .fc-day {
    width: 25px;
    height: 25px; 
  }
  
 .fc-title {
    color: #fff;
    border: 1px solid white;
    background: #c09630 !important;
    border-left: none;
    border-right: none;
    border-radius: 12px;
    padding: 3px;
    left: 10px;
    position: relative;
}
   .fc-event, .fc-event-dot {
       border: none !important;
      }
   
    .fc-dayGrid {
    border: none;
  }

    #calendar {
       border-radius: 10px;
    }

.fc-day:hover {
    background-color: #f0f0f0;
    cursor: pointer;
    border-radius:12px;
  }

.fc-dayGridMonth-view .fc-day-grid .fc-day {
    width: 25px;
    height: 25px;
    border: none;
}


.fc-day-grid-container
{
height: 336px !Important;
border-radius: 12px;
}

.fc-scroller{
height: 336px;
}

.fc-title {
   
    border-left: none;
    border-right: none;
}

.fc-highlight {
    background: #ff3500 !important;
    opacity: .3;
}

.disabled{
    
    background:lightgray;
}
    </style>
<style>
   .text-item{
    color:#FF3500;
    font-size:19px; 
    }
    .text-item2{
   text-decoration: line-through;
    }
   .inbtn {
    border-radius: 17px;
    width: 22px;
    border: 1px solid #FF3500;
    color: #FF3500;
    background: transparent;
    height: 22px;
    padding: 0px;
    margin: 0px;
    left: -5px;
    position: relative;
}
    .card-btn{
       background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
       color:white;
    }
    .btn-text{
       color:#FF3500;   
    }
    .fc-right{

      display:none;
    }
   .totlx {
    border-radius: 14px;
    background: #FFF3E3;
}
.totl {
   background: none;
}

.cardbodyx{

    margin-top: -18px;
    left: 118px;
    position: relative;

}

#fieldGenaratorAuto label {
        width: 160px;
}
.roomheading {
    left: 15px;
    position: relative;
    font-size: 14px;
    font-weight: bold;
}
.fc-event, .fc-event-dot {
    background-color: none !important;
}
  .extraFields{
     
     margin-top: -45px;
    margin-bottom: -5px;
    left: 8%;
    position: relative; 
      
  }
  .chekedactionclasses{
      
    padding: 8px;
    left: 5%;
    position: relative;
      
  }
  .uppersidecontainer{
      
     left: 4%;
    position: relative;
  }
  #fieldGenaratorAuto {
   top: 8px;
   left: 0%;
    position: relative;
}
  .autogeneratorClass {
    left: 6%;
    position: relative;
}
  .fc-unthemed{
      
      margin-bottom: 100px;
    border: 2px solid orangered;
    border-radius: 20px;
    height: 431px;
  }
  .fc-button-group{
      
      left: 6%;
  }
  
  #applyButton {
    background-color: #ff3500;
    color: #ff3500;
    border: aliceblue;
    right: 34px;
    padding: 0px;
    border-radius: 6px;
    left: 86%;
    top: -31px;
    position: relative;
    background: transparent;
}
  
  .promoImages {
    width: 19px;
    height: 19px;
    margin-right: 10px;
    top: 8px;
    left: 24%;
    position: relative;
    z-index: 2;
}
  #promoInput {
    border: 1px solid lightgray;
    flex: 1;
    margin-top: -22px;
    padding-left: 32px;
    width: 85%;
    position: relative;
    left: 21%;
}

.imageClass{
    border-radius: 16px;
    position: relative;
    top: 25px;
    height: 65%;
    width:130% !important;
    left: 40px;
    width: 100%;
    height: 45%;
}

.hrStyle{
    width: 70%;
    border: 1px solid gray;
    left: 63px;
    position: relative;
    }

#pp {
    width: 10px;
    padding-left: 34%;
    font-weight: bold;
    left: 5px;
}

.totlx{
    
    margin-left:37px;
}

.buttondiv {
    left: 68px;
    margin-top: 10px;
    position: relative;
}

.proceedButton{
   background:  #FF3500 !important;
   float: right !important;
   right: 120px !important;
    
}
.cancelVutton{
    background: lightgray !important;
    float: right;
    
    right: 12%;
    
}

    #nightCount{
        width:100%; top: 8px;
        position: relative;background: #FF3500;
        padding: 5px;
        color: white;
        border-radius: 5px;
        font-size: 12px;
     }

.card-title{
    left: 30px;
    position: relative;width: 440px;
}

@media screen and (max-width: 600px) {
    
    .card-title{
        
        left: 30px;
    position: relative;
    width: 346px
        
    }
    .buttondiv {
    left: 11.8%;
    margin-top: 10px;
    position: relative;
}

#nightCount{
    
    width: 100%;
    top: 8px;
    position: relative;
    background: #FF3500;
    padding: 6px;
    color: white;
    border-radius: 5px;
    font-size: 12px;
    left: 50%;
}

  .proceedButton {
    background: #FF3500 !important;
    float: right !important;
    right: 50px !important;
}
   .cancelVutton{
    background: lightgray !important;
    float: right;
    right: 12%;
    
     }



    .totlx{
    
    margin-left:0px;
}

 .imageClass {
    border-radius: 16px;
    position: relative;
    top: 25px;
    height: 65%;
    width: 100% !important;
    left: 0px;
    width: 100%;
    height: 45%;
}

.cardbodyx {
    left: -56px;
    position: relative;
    margin-top: -57%;
    width: 118%;
}

#promoInput {
    border: 1px solid lightgray;
    flex: 1;
    margin-top: -22px;
    padding-left: 27px;
    width: 114%;
    position: relative;
    left: -6%;
    border-radius: 5px;
}

.promoImages {
    width: 19px;
    height: 19px;
    margin-right: 10px;
    top: 8px;
    left: -3%;
    position: relative;
    z-index: 2;
}
  .hrStyle {
    width: 95%;
    left: 29px;
    position: relative;
}
    
    #applyButton {
    background-color: #ff3500;
    color: #ff3500;
    border: aliceblue;
    right: 34px;
    padding: 0px;
    border-radius: 6px;
    left: 76%;
    top: -31px;
    position: relative;
    background: transparent;
}

  


.genrator{
    
     left: -15px;
    position: relative;
    
}

.phoneResponsive{
    
    
    top: -145px;

}
.grandtotalresponsive{
    
    margin-top: -120px;
}

#pp {
    width: 100%;
    padding-left: 82%;
    font-weight: bold;
    top: -30px;
}
 /*.form-control {*/
 /*   width: 300%;*/
 /*   left: 19px;*/
 /*   position: relative;*/
 /*   font-size: 12px;*/
 /*   height: 35px !important;*/
 /* }*/
}



.iti__country-list{
    
    z-index:5 !important;
}
   </style>


<?php $__env->stopPush(); ?>


   
<style>
    
    .iti--allow-dropdown{
        
        width: 522px;
        
    }
    
    .iti__country-list{
       
       z-index:1001; 
        
    }
</style>


    
<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="row">
        <h4 class="title py-3 mx-3" style="font-weight: 600;
    font-size: 27px;
}">Staycation Booking Details</h4>
    </div>
</div>
 <form method ="post" action = "<?php echo e(url('booking')); ?>">
     
     <?php echo csrf_field(); ?>
     
     <div class="container mt-3 card" style="border-radius: 20px;width: 84%;">
    
   
 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
   <?php
    
       $vatPrice = DB::table('bravo_hotels')->where('id',$dd->parent_id)->first();
       
       
        if($vatPrice->service_fee)
      {
       $vat = $vatPrice->service_fee;
       
        $getvat = json_decode($vat);
      
       $vatpercent = [];
       
       foreach($getvat as $gg)
       {
          $vatpercent[] = $gg->price;
       }
      }
     
  ?> 
 
    <div class="mb-3 totl mt-3">
        <div class="row">
            <div class="col-md-4 text-end">

               <?php

                $file = DB::table('media_files')->where('id',$vatPrice->banner_image_id)->first();
                
               ?>

               <?php if($file): ?>

               <img src="<?php echo e(asset('uploads/'.$file->file_path)); ?>" class="imageClass" style="height:380px
              "alt="...">

               <?php else: ?>

                <img class="imageClass" src="https://media.cntraveller.com/photos/62f51fb12148309d8a68838b/4:3/w_2664,h_1998,c_limit/25hours%20dubai-aug22-pr-%20global-Ingrid%20Rasmussen1.jpg" alt="..." style="height:380px">

               <?php endif; ?>
               
            </div>

            <input type="hidden" value="<?php echo e($dd->id); ?>"  id="datafetchget">
            <div class="col-md-8">
                <div class="card-body cardbodyx" style="top: 18px;">
                    
                    <div class="uppersidecontainer">
                        
                     <h3 style="left: 30px;
                            position: relative;width: 440px;"><?php if($vatPrice->title): ?><?php echo e($vatPrice->title); ?> <?php endif; ?></h3> 
                        <br>
                    <h5 class="card-title" style="">
                        <span><?php echo e($dd->title); ?></span>
                    
                    </h5>
                    
                     <input type = "hidden" name="object_model" value="hotel">
                    
                     <input type = "hidden" name="object_id" value="<?php echo e($vatPrice->id); ?>">
                    
                     <input type = "hidden" name="package_id" value="<?php echo e($dd->id); ?>">
                    
                     <input type = "hidden" name="object_name" value="<?php echo e($vatPrice->title); ?>">
                    
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
    
    $dd->price /=         $exchangeRate;
    $dd->discount_price /=$exchangeRate;
    $decimalPlaces = 0;
    $formattedPrice = number_format($dd->price, $decimalPlaces);
    $discountusd = number_format($dd->discount_price, $decimalPlaces);
    
    
?>
                    
                    <?php

$discountedPrice = $formattedPrice - $discountusd;


$discountPercentage = ($discountusd / $formattedPrice) * 100;

                      ?>

            
                       <input id = "discountpercent" style="display:none;" value="<?php echo e($discountPercentage); ?>">
                     
                       <input id = "exchangeRate"  style="display:none;"   value="<?php echo e($exchangeRate); ?>">
                       
                       <input id = ""  name="currency" style="display:none;"   value="<?php echo e($targetCurrency); ?>">
                       
                       <h5 class="card-text price" data-price="<?php echo e($formattedPrice); ?>">
                            <?php echo e(str_replace(',','',number_format($formattedPrice - $discountusd,0))); ?><span class="text">&nbsp;<?php echo e($targetCurrency); ?>/night</span>
                          </h5>


<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name','currency_main')->first();
?>

    <?php

$discountedPrice = $dd->price  -  $dd->discount_price;

$discountPercentage = ($dd->discount_price / $dd->price) * 100;
     
   
?>

                       <input id = "discountpercent" style="display:none;" value="<?php echo e($discountPercentage); ?>">
                      
                       <input id = ""  name="currency" style="display:none;"   value="AED">
                    
                      <h5 class="card-text price" data-price="<?php echo e($dd->price); ?>">
                      <?php echo e(str_replace(',', '', number_format($dd->price - $dd->discount_price, 0))); ?><span class="text">&nbsp;AED/night</span>
                      </h5>

<?php
}
?>
 
                      <p class="card-text">
                       <div class ="container" style="left: 30px;
                       position: relative;
                       margin-top: 0px;
                       margin-bottom: 0px;">
                     <small style="font-size: 100%;
                    font-weight: 400;">Rooms</small> &nbsp;&nbsp;
                     <button type="button" id="decrementButton" data-decrease class="inbtn">-</button>
                     <input  name="packageQuantity" class="valueButton" data-value type="text" value="1" style="width: 21px; border:none;padding: 4px; left:-7px; position:relative;" readonly>
                     <button type="button" style="left:-12px; position:relative;" id="incrementButton" data-increase class="inbtn">+</button>
                     </div></p> 

                      </div>
                     
                        <div class="chekedactionclasses">
                            
                        <div class="col-md-8" style="display:inline-flex;">  

                        <label style="width: 100%;width: 100%;
                        top: 10px;
                        position: relative;">Select Dates:</label>
                     
                           <input type="text" class="form-control dateRangeInput inputFormDateRange" name="travellingdate" style="border-radius: 5px;
                         border: 1px solid lightgrey;" id="dateRangeInput" required>
                       </div>
                       
                       <span style="
                       " id="nightCount"></span>
                       <br><br>
                       
                       
            <div id="calendar" class="calendershowhide" style="margin-bottom:100px; display:none;"></div>
                        
              <div class="col-md-8" style="display:inline-flex">
                <label style="width: 100%;
                top: 10px;
                position: relative;">Contact No:</label>
                <input type="text" class="form-control inputForm " id="formcontactInput"  style="border-radius: 5px;
                border: 1px solid lightgrey;"  name="phone_no" required>
                <br>
          
              </div>
         <?php $__errorArgs = ['phone_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              
              <input type="hidden" id="stdCode" name="std_code">
              
               <br><br>
                <div class="col-md-8" style="display:inline-flex">
          
              <label style="width:100%;width: 100%;
              top: 10px;
              position: relative;">Email Address:</label>
              <input type="text" class="form-control inputForm" id="emailuser"  style="border-radius: 5px;
               border: 1px solid lightgrey;" name="email" required>
               <br>
       
              </div>
               <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              
               <br><br>
               
                  <div class="col-md-8" style="display:inline-flex;">
                          <label style="width: 100%;
    top: 10px;
 
    position: relative; ">Apply Promocode:</label>
                     
                         
            <div class="form col-md-8" style="">

    <img src="<?php echo e(asset(url('images/Group.png'))); ?>" alt="Image" class="promoImages" style="">
    <input type="text" id="promoInput" placeholder="Apply" class="form-control inputForm" style="" >
    <button type="button" id="applyButton" style="">Apply</button>
<span style="
    left: 20px;
    position: relative;" id="promocodestatus"></span>
            </div>
          </div>
    </div>

               <hr class="hrStyle" style= "">
      <span style="padding: 8px;
    left: 7%;
    position: relative;
"><b>Room 1 Details</b></span>
      <br>
                <br>
              
             <div class="autogeneratorClass">
           
    <?php if($dd->adults): ?>
     <?php for($i = 0; $i < $dd->adults; $i++): ?>
        <div class="col-md-8" style="margin-top: 17px; display:inline-flex;">
            <label for="adults" style="width:100%;width: 100%; top: 10px; position: relative;">Lead Guest Name <?php echo e($i + 1); ?>:</label>
            <input type="text" class="form-control genrator leadguestnameclass" style="border-radius: 5px; border: 1px solid lightgrey; display:inline-flex;" id="adults_age<?php echo e($i); ?>" name="adults[]" value="" required>
        </div>
        <br>
        <br>
     <?php endfor; ?>
  <?php endif; ?>

   <?php if($dd->children): ?>
     <?php for($i = 0; $i < $dd->children; $i++): ?>
        <div class="col-md-8" style="margin-top: 17px; display:inline-flex;">
            <label for="children" style="width:100%;">Child Age <?php echo e($i + 1); ?>:</label>
            <select type="number" class="form-control genrator childageClass" style="border-radius: 5px; border: 1px solid lightgrey;" id="children_age<?php echo e($i); ?>" name="children_age[]" value="" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            
        </div>
        <i class="fas fa-caret-down" style="right: 6%;
    position: relative;
    padding: 9px;
    top: 6px;"></i>
        <br><br>
    <?php endfor; ?>
<?php endif; ?>

            </div>
            
             
             <div  class="col-md-16"  id="fieldGenaratorAuto">
             </div>

                </div>
            </div>
        </div>
    </div>
    
    
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
  

    <div class=" mb-3  mb-3">
      <div class="row d-flex justify-content-center">
          <div class="col-md-5">
            
            <input  type="hidden" class="hiddentotal">
            
            <input  type="hidden" class="hiddensaving">
            
            <input  type= "hidden" class="hiddensubtotal">
            
          </div>
        
          <div class="col-md-6 ">
              <p><b style="left:50px;position:relative;">Pricing</b></p> 
              <div class="card-body totlx"  style="">
                <div class="row ">
                   
                  <div class="col-md-6">
                       <p class="text-start">VAT</p>
                    <p class="text-start">Total</p>
                   
                    <p class="text-start">Promo Code</p>
                    <p class="text-start">Total Savings</p>
                
                  </div>
                  <div class="col-md-6 phoneResponsive">
                 
                    <p class="text-end vatValue" style="color:#FF3500"><?php
                      $originalPrice = $dd->price - $dd->discount_price; 
                      
                      $percentage = 0.05; 
                    
                      $percentageValue = $originalPrice * $percentage;
                      $formattedValue = number_format($percentageValue, 0);

                    echo  $formattedValue;
                       
                       ?> <?php echo e(isset($targetCurrency) ? $targetCurrency : 'AED'); ?> </p>
                       
                       
                    <p class="text-end pricex"        style="color:#FF3500"><?php echo e($dd->price); ?> <?php echo e(isset($targetCurrency) ? $targetCurrency : 'AED'); ?> </p>
                    <p class="text-end"  id="result"  style="color:#FF3500">00</p>
                    <p class="text-end totalSaving"   style="color:#FF3500">00</p>
                  </div>
                </div>
              
               
    <div class="row grandtotalresponsive">
    <div class="col-md-6">
        <h6 class="text-start"><b>Grand Total</b></h6>
    </div>
    <?php
       $formattedPrice = number_format($dd->price, 0, '.', '');
    ?>
    <div class="updated-price col-md-6"  id="pp" style="">
                 
                <h6 class="text-end"><b><?php echo e($formattedPrice); ?></b></h6>
                 
    </div>
    
     <input type="hidden" name="price" id="bookingPrice">
</div>

              </div>
          </div>
           <br>
            <br>
            <div class="buttondiv" style="">
                
                 <button type="submit" class="btn  btn-primary Daily-btn col-md-2 proceedButton procced_btn" >Proceed</button> 
                   
                   &nbsp;&nbsp;&nbsp;&nbsp;
                 
                 <a href="/" class="btn btn-primary  Daily-btn cancelVutton col-md-2" style="">Cancel</a>
                 
            </div>

      </div>
      
  
  </div>
 
  
</div></form>
<br>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.js"></script>

<script>


function checkInputs() {
    var allInputsFilled = true;

   
    var requiredInputs = [
        $('#dateRangeInput'),
        $('#formcontactInput'),
        $('.childageClass'),
        $('#emailuser'),
        $('.leadguestnameclass')
    ];

    
    requiredInputs.forEach(function(input) {
        if (input.val().trim() === '') {
            allInputsFilled = false;
            return false;
        }
    });

    
    if (allInputsFilled) {
        $('#paymentLink').removeClass('disabled');
    } else {
        $('#paymentLink').addClass('disabled');
    }
}

// Attach the checkInputs function to the input change event for the required fields
$('#dateRangeInput, #formcontactInput, .childageClass, .leadguestnameclass, #emailuser').on('input', checkInputs);


    
    
</script>


<script>

$(document).ready(function() {
    function initializePaymentLink() {
        
        
        
        var initialPriceWithComma = $("#bookingPrice").val();
        var initialPrice = initialPriceWithComma.match(/\d+/);
         
         
        $('#checkedvalue').val(initialPriceWithComma);

       
        var bookingLink = "https://roamiodeals.techdocklabs.com/booking?price=" + initialPrice;
        $("#paymentLink").attr("href", bookingLink);

     
        function updatePaymentLink() {
            var updatedPriceWithComma = $("#bookingPrice").val();
            var updatedPrice = updatedPriceWithComma.match(/\d+/);
               var updatedBookingLink = "https://roamiodeals.techdocklabs.com/booking?price=" + updatedPrice;
            $("#paymentLink").attr("href", updatedBookingLink);
        }
        $("#bookingPrice").on("change", function() {
            updatePaymentLink();
        });
        
        
    }
      setTimeout(initializePaymentLink, 2000); 
});

</script>




<script>

$(document).ready(function(){
  const xcontactInput = document.getElementById("formcontactInput");
  
  
  const excludedCountries = [
  "BD", // Bangladesh
  "DZ", // Algeria
  "AO", // Angola
  "BJ", // Benin
  "BW", // Botswana
  "BF", // Burkina Faso
  "BI", // Burundi
  "CV", // Cabo Verde
  "CM", // Cameroon
  "CF", // Central African Republic
  "TD", // Chad
  "KM", // Comoros
  "CG", // Congo (Brazzaville)
  "CD", // Congo (Kinshasa)
  "CI", // Cote d'Ivoire (Ivory Coast)
  "DJ", // Djibouti
  "GQ", // Equatorial Guinea
  "ER", // Eritrea
  "SZ", // Eswatini (formerly Swaziland)
  "ET", // Ethiopia
  "GA", // Gabon
  "GM", // Gambia
  "GH", // Ghana
  "GN", // Guinea
  "GW", // Guinea-Bissau
  "KE", // Kenya
  "LS", // Lesotho
  "LR", // Liberia
  "LY", // Libya
  "MG", // Madagascar
  "MW", // Malawi
  "ML", // Mali
  "MR", // Mauritania
  "MU", // Mauritius
  "MA", // Morocco
  "MZ", // Mozambique
  "NA", // Namibia
  "NE", // Niger
  "NG", // Nigeria
  "RW", // Rwanda
  "ST", // Sao Tome and Principe
  "SN", // Senegal
  "SC", // Seychelles
  "SL", // Sierra Leone
  "SO", // Somalia
  "SS", // South Sudan
  "SD", // Sudan
  "TZ", // Tanzania
  "TG", // Togo
  "TN", // Tunisia
  "UG", // Uganda
  "ZM", // Zambia
  "ZW"  // Zimbabwe
];
  
  
  
  const itiContact = window.intlTelInput(xcontactInput, {
    initialCountry: null,
    separateDialCode: true,
    excludedCountries: excludedCountries,
    utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js'
  });

  let typingTimer; // Timer identifier
  const typingDelay = 1000; // Delay in milliseconds

  xcontactInput.addEventListener('input', function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(updateValues, typingDelay);
  });

  xcontactInput.addEventListener('blur', updateValues);

  function updateValues() {
    const xcurrentInputValue = xcontactInput.value;
    const xdialCode = itiContact.getSelectedCountryData().dialCode;
     
       document.getElementById("stdCode").value = xdialCode;
     
    if (xcurrentInputValue.startsWith(xdialCode)) {
      const phoneNumber = xcurrentInputValue.slice(xdialCode.length).replace(/\D/g, '');
      xcontactInput.value = xdialCode + phoneNumber;
      document.getElementById("formcontactInput").value = xdialCode;
    }
  }
});


</script>
<script>

$(document).ready(function() {
       
    var events = [];
    var blocked = [];

    $.ajax({
        url: '/get_dates_data',
        method: 'GET',
        success: function(response) {
            events = response;
            blocked = events
                .filter(event => event.title === "Block")
                .map(event => {
                    return {
                        start: moment(event.start, 'YYYY-MM-DD'),
                        end: moment(event.end, 'YYYY-MM-DD')
                    };
                });

            var currentDate = moment();
            
            var dateString = currentDate.format('DD-MM-YYYY');
            var isTodayBlocked = blocked.some(function(event) {
                 return moment(dateString, 'DD-MM-YYYY').isBetween(event.start, event.end, null, '[]');
            });

            if (isTodayBlocked) {
                Swal.fire('Booking is closed for today , date please book next available date !');
                
            } else {
                // $('#dateRangeInput').prop('disabled', false);
            }
        },
        error: function() {
            console.error('Error fetching data from the API.');
        }
    });

   
});

$(document).ready(function(){
  
    
    $('#incrementButton').click(function(){
        var quantity = parseInt($('.valueButton').val(), 10); // Use parseInt with base 10
        var finalquantity = quantity + 1;
        var total = parseFloat($('.hiddentotal').val());
        var subtotal = parseFloat($('.hiddensubtotal').val());
        var saving = parseFloat($('.hiddensaving').val());
        var exchangeRate = parseFloat($('#exchangeRate').val());

        
        var totalboth = finalquantity * total;
        var subtotalboth = finalquantity * subtotal;
        var savingboth = finalquantity * saving;
        
        if (exchangeRate === undefined || isNaN(exchangeRate)) {
            $('.totalSaving').html("AED" +" "+ savingboth.toFixed(0));
            $('#pp').html(subtotalboth.toFixed(0) + " AED");
            
            $('#bookingPrice').val("AED" + " " + subtotalboth.toFixed(0) );
            
            $('.pricex').html( "AED" + " " + totalboth.toFixed(0));
        } else {
            $('.totalSaving').html("USD" + " " + savingboth.toFixed(0));
            $('#pp').html("USD" + " " + subtotalboth.toFixed(0));
            
            $('#bookingPrice').val("USD" + " " +subtotalboth.toFixed(0) );
            $('.pricex').html("USD" + " " + totalboth.toFixed(0));
        }
    });
    
    $('#decrementButton').click(function(){
        var quantity = parseInt($('.valueButton').val(), 10); // Use parseInt with base 10
        var finalquantity = quantity - 1;
        var total = parseFloat($('.hiddentotal').val());
        var subtotal = parseFloat($('.hiddensubtotal').val());
        var saving = parseFloat($('.hiddensaving').val());
        var exchangeRate = parseFloat($('#exchangeRate').val());

        
        var totalboth = finalquantity * total;
        var subtotalboth = finalquantity * subtotal;
        var savingboth = finalquantity * saving;
        
        if (exchangeRate === undefined || isNaN(exchangeRate)) {
            $('.totalSaving').html("AED" +" "+  savingboth.toFixed(0) );
            $('#pp').html("AED" +" "+ subtotalboth.toFixed(0));
            $('#bookingPrice').val("AED" +" "+  subtotalboth.toFixed(0));
            $('.pricex').html("AED" +" "+  totalboth.toFixed(0));
        } else {
            $('.totalSaving').html("USD" + " " + savingboth.toFixed(0));
            $('#pp').html("USD" + " " + subtotalboth.toFixed(0) );
            $('#bookingPrice').val("USD" + " " + subtotalboth.toFixed(0));
            $('.pricex').html("USD" + " " + totalboth.toFixed(0));
        }
    });
});



</script>

<script>

$(document).ready(function() {
    
    var events = [];
    var blocked = [];

    $.ajax({
        url: '/get_dates_data',
        method: 'GET',
        success: function(response) {
            
               if (response.status === "376") {
                    window.location.href = '/';
                 }
                      
            events = response;
          
            blocked = events
                .filter(event => event.title === "Block")
                .map(event => {
                    return {
                        start: moment(event.start),
                        end: moment(event.end)
                    };
                });
              
     $('#dateRangeInput').daterangepicker({
        locale: {
                    format: 'DD/MM/YYYY'
                },
               
        autoApply: true,
        
    
        minDate: moment().startOf('month'), 
        
        
        maxDate: moment().endOf('month').add(3, 'month').startOf('month').subtract(1, 'day'),
      
    
     isInvalidDate: function(date) {
    var currentDate = moment();
    var yesterday = currentDate.clone().subtract(0, 'days');  // Get yesterday's date

    if (date.isBefore(yesterday, 'day')) {
        return true;  // Disable dates before yesterday
    }

    var nextThreeMonthsEnd = currentDate.clone().add(3, 'months').endOf('month');
    if (date.isAfter(nextThreeMonthsEnd, 'day')) {
        return true;  // Disable dates after next 3 months
    }
    var firstDayOfMonth = currentDate.clone().startOf('month');
     
    var lastDayOfMonth = currentDate.clone().endOf('month');
        
    // if (date.isBefore(firstDayOfMonth, 'day') || date.isAfter(lastDayOfMonth, 'day')) {
    //   return !date.isBetween(firstDayOfMonth, lastDayOfMonth, null, '[]');
    // }

    var dateString = date.format('DD/MM/YYYY');
    var isBlocked = blocked.some(function(event) {
        return moment(dateString, 'DD/MM/YYYY').isBetween(event.start, event.end, null, '[]');
    });
    
    

    return isBlocked;
},





startDate: moment(),
endDate: moment().add(1, 'days') 
}).addClass('custom-calendar');;
  
 
  $('#dateRangeInput').on('apply.daterangepicker', function(ev, picker) {
    var selectedEndDate = picker.endDate;
    
    var xendDate = selectedEndDate.format('DD/MM/YYYY');
       
    var selectedDate = picker.startDate;

    var nextBlockedDate = getNextBlockedDate(selectedDate);

if(nextBlockedDate)
{
  
   var oneDayBeforeNextBlockedDate = nextBlockedDate.clone().subtract(1, 'day');
    var permissionformattedOneDayBeforeNextBlockedDate = oneDayBeforeNextBlockedDate.format('DD-/MM/YYYY');
    
  if (moment(xendDate, 'DD/MM/YYYY').isAfter(moment(permissionformattedOneDayBeforeNextBlockedDate, 'DD/MM/YYYY'))) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'You are selecting more than the allowed block date range!',
    });

    var defaultStartDate = moment();
    var defaultEndDate = moment().add(1, 'days');

    $('#dateRangeInput').val(defaultStartDate.format('DD/MM/YYYY') + ' - ' + defaultEndDate.format('DD/MM/YYYY'));
    picker.hide();
}

    if (oneDayBeforeNextBlockedDate.isAfter(moment())) {
        var formattedOneDayBeforeNextBlockedDate = oneDayBeforeNextBlockedDate.format('DD/MM/YYYY');
        if (picker.endDate.isAfter(oneDayBeforeNextBlockedDate)) {
            picker.endDate = oneDayBeforeNextBlockedDate;
            picker.updateView();
        }
    }  
    
}
        var selectedStartDate = picker.startDate;
        var selectedEndDate = picker.endDate;
        
        if (selectedStartDate.isSame(selectedEndDate, 'day')) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please select at least one Night!',
            });
            // picker.endDate = selectedEndDate.clone().add(1, 'day');
            // picker.updateView();
            
            return;
        }
        
        var xendDate = selectedEndDate.format('DD/MM/YYYY');
   
});

    },
        error: function() {
            console.error('Error fetching data from the API.');
        }
    });



    function getNextBlockedDate(date) {
        var sortedBlockedDates = blocked
            .filter(event => event.start.isAfter(date))
            .sort((a, b) => a.start - b.start);

        if (sortedBlockedDates.length > 0) {
            return sortedBlockedDates[0].start;
        }

        return null;
    }
});


</script>


<?php $__env->startPush('js'); ?>
 
 <script>
     
     
     $('document').ready(function(){
         
         $('.inputFormDateRange').on('change',function(){
            
            var discountpercent =$('#discountpercent').val();
            var exchangeRate = $('#exchangeRate').val();
            
            var vat  = parseFloat($('.vatValue').text());
            
            var value = $(this).val();

            var dateRange = value.split(' - ');
            var startDateString = dateRange[0];
            var endDateString = dateRange[1];

                $.ajax({
                    url: '/get_all_calculate_price',
                    method: 'GET',
                    data: {
                        start_date: startDateString,
                        end_date: endDateString
                    },
                    success: function(priceResponse) {
                     
                     if(priceResponse.nightCount == "1")
                     {
                         $('#nightCount').html(priceResponse.nightCount + ' night');
                         
                     }else{
                         
                         $('#nightCount').html(priceResponse.nightCount + ' Nights');
                         
                     }
                
                   
                   
                    var price = parseFloat(priceResponse.totalPrice);
                    var discount = parseFloat(discountpercent);
                    var promocode = $('#result').html();
                    var finalpromo = parseFloat(promocode);
                    var multiplyNumber = $('.valueButton').val();
                    
                    if (exchangeRate === undefined) {
                          
                        var discountedPrice = price - (price * (discount / 100)) - finalpromo; 
                        var totalmultiplyformattedDiscountedPrice = discountedPrice * multiplyNumber;
                        
                        var totalmultiplyformattedDiscountedPrice = discountedPrice * multiplyNumber;
                        var fivePercentValue = totalmultiplyformattedDiscountedPrice * 0.05;
                        
                        $('.vatValue').text("AED" + " " + fivePercentValue.toFixed(0));
                        
                        
                       var totalafterVatminus = totalmultiplyformattedDiscountedPrice - fivePercentValue;
                        
                        $('.pricex').html("AED" + " " + totalafterVatminus.toFixed(0) );
                        
                        var totalSaving = price - discountedPrice;
                        var totalmultiplyformattedTotalSaving = totalSaving * multiplyNumber;
                        $('.totalSaving').html("AED" + " " + totalmultiplyformattedTotalSaving.toFixed(0));
                        var subtotal = price - totalSaving;
                        var multiplysubtotal = subtotal * multiplyNumber;
                        $('#pp').html("AED" + " " + multiplysubtotal.toFixed(0) );
                        $('#bookingPrice').val("AED" + " " + multiplysubtotal.toFixed(0));
                        
                        $('.hiddensaving').val(totalmultiplyformattedTotalSaving);
                        $('.hiddensubtotal').val(multiplysubtotal);
                        
                        $('.hiddentotal').val(totalmultiplyformattedDiscountedPrice);
                        
                        
                    } else {
                        var exchangedPrice = price / exchangeRate;
                        
                        var discountedExchangedPrice = exchangedPrice - (exchangedPrice * (discount / 100)) - finalpromo; 
                        var multiplyformattedDiscountedExchangedPrice = discountedExchangedPrice * multiplyNumber;
                        
                         var fivePercentValue = multiplyformattedDiscountedExchangedPrice * 0.05;
                        
                        $('.vatValue').text("USD" + " " + fivePercentValue.toFixed(0) );
                        
                          var totalafterVatminus = multiplyformattedDiscountedExchangedPrice - fivePercentValue;
                        
                        $('.pricex').html( "USD" + " " + totalafterVatminus.toFixed(0));
                        var totalSaving = exchangedPrice - discountedExchangedPrice;
                        var multiplytotalSaving = totalSaving * multiplyNumber;
                        $('.totalSaving').html("USD" + " " + multiplytotalSaving.toFixed(0));
                        var subtotal = exchangedPrice - totalSaving
                        
                     
                        var multiplysubtotal = subtotal * multiplyNumber;
                        $('#pp').html("USD" + " " + multiplysubtotal.toFixed(0));
                        
                        $('#bookingPrice').val("USD" + " " + multiplysubtotal.toFixed(0));
                        
                        $('.hiddensaving').val(multiplytotalSaving);
                        $('.hiddensubtotal').val(multiplysubtotal);
                        
                        
                         $('.hiddentotal').val(multiplyformattedDiscountedExchangedPrice);
                    }
                    
                    
        var initialPriceWithComma = $("#bookingPrice").val();
        var initialPrice = initialPriceWithComma.match(/\d+/);
         
         
        $('#checkedvalue').val(initialPriceWithComma);

       
        var bookingLink = "https://roamiodeals.techdocklabs.com/booking?price=" + initialPrice;
        $("#paymentLink").attr("href", bookingLink);

     
        function updatePaymentLink() {
            var updatedPriceWithComma = $("#bookingPrice").val();
            var updatedPrice = updatedPriceWithComma.match(/\d+/);
               var updatedBookingLink = "https://roamiodeals.techdocklabs.com/booking?price=" + updatedPrice;
            $("#paymentLink").attr("href", updatedBookingLink);
        }
        $("#bookingPrice").on("change", function() {
            updatePaymentLink();
        });
                   

                    
                    },
                    error: function() {
                        console.error('Error fetching price data from the API.');
                    }
                });
             
         });
         
     });
     
     
 </script>
 


<script>
 $(document).ready(function () {
    let counterValue = 1; 
    $('#counter').text(counterValue);

    function generateDiv(roomNumber) {
        const templateDiv = $('.autogeneratorClass').first().clone(); 
        templateDiv.find('[id]').each(function () {
            const newId = $(this).attr('id') + '_' + roomNumber;
            $(this).attr('id', newId);
        });

        const heading = $('<h6 class="roomheading">').text('Room ' + roomNumber + ' Details');
        templateDiv.prepend(heading);

        return templateDiv;
    }

    function generateDivs() {
        $('#fieldGenaratorAuto').empty(); 
        for (let i = counterValue; i > 1; i--) {
            $('#fieldGenaratorAuto').prepend(generateDiv(i));
        }
    }

    $('#incrementButton').on('click', function () {
        if (counterValue < 10) {
            counterValue++;
            $('#counter').text(counterValue);
            generateDivs();
        }
        
        
         var initialPriceWithComma = $("#bookingPrice").val();
        var initialPrice = initialPriceWithComma.match(/\d+/);
         
         
        $('#checkedvalue').val(initialPriceWithComma);

       
        var bookingLink = "https://roamiodeals.techdocklabs.com/booking?price=" + initialPrice;
        $("#paymentLink").attr("href", bookingLink);

     
        function updatePaymentLink() {
            var updatedPriceWithComma = $("#bookingPrice").val();
            var updatedPrice = updatedPriceWithComma.match(/\d+/);
               var updatedBookingLink = "https://roamiodeals.techdocklabs.com/booking?price=" + updatedPrice;
            $("#paymentLink").attr("href", updatedBookingLink);
        }
        $("#bookingPrice").on("change", function() {
            updatePaymentLink();
        });
        
        
        
        
    });

   
    $('#decrementButton').on('click', function () {
        if (counterValue > 1) {
            counterValue--;
            $('#counter').text(counterValue);
            generateDivs();
        }
        
        
         var initialPriceWithComma = $("#bookingPrice").val();
        var initialPrice = initialPriceWithComma.match(/\d+/);
         
         
        $('#checkedvalue').val(initialPriceWithComma);

       
        var bookingLink = "https://roamiodeals.techdocklabs.com/booking?price=" + initialPrice;
        $("#paymentLink").attr("href", bookingLink);

     
        function updatePaymentLink() {
            var updatedPriceWithComma = $("#bookingPrice").val();
            var updatedPrice = updatedPriceWithComma.match(/\d+/);
               var updatedBookingLink = "https://roamiodeals.techdocklabs.com/booking?price=" + updatedPrice;
            $("#paymentLink").attr("href", updatedBookingLink);
        }
        $("#bookingPrice").on("change", function() {
            updatePaymentLink();
        });
    });

});

  </script>



<script>
$(document).ready(function() {
    $('#applyButton').on('click', function() {
        
        var code = $('#promoInput').val();
        
        var totalsaving = $('.totalSaving').html();
                          
        var actualsaving = totalsaving.match(/\d+/);
        
        var exchangeRate = $('#exchangeRate').val();
        
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: '/promo',
            type: 'POST',
            data: { promoCode: code },
            success: function(response) {
                var discount = 0; // Default discount is 0 if response.data is null or undefined

                if (response.data !== null && response.data !== undefined) {
                     
                     
               if (exchangeRate === undefined) {
                var currency = " AED";
   
               } else {
              var currency = " USD";
    
               }
          
                         var subtotalfirst =  $("#pp").html();
                         
                       var numericValue = subtotalfirst.match(/\d+/);
                       
                          var final = parseInt(numericValue);
                          
                           
                        
                          discount = parseFloat(response.data.discount);
                          
                        
                          
                         var subtotalSecond = final - discount ;
                      
                    
                         
                         $("#pp").html(currency + subtotalSecond);
                         
                         var finaltotaldata = parseFloat(actualsaving);
                          
                         var totaldata = discount + finaltotaldata;
                         
                        
                         
                         $('.totalSaving').html(currency + " " + totaldata);
                         
                         $('#result').text(currency + " " + discount.toFixed(0)  );
                         
                         $('#promocodestatus').html("PROMOCODE APPLIED");
                         $('#promocodestatus').css("color", "green");
                         
                            
                    $('#promoinput').prop('disabled', true);
                   $('#applyButton').prop('disabled', true);

                    
                   
                }else{
                    
                    
                    $('#promocodestatus').html("INVALID PROMOCODE");
                    $('#promocodestatus').css("color", "red");
                    
                    
                }

             
               
            },
            error: function(error) {
                console.error('Error:', error);
                // Handle the error if the server request fails
            }
        });
    });
});


  </script>


<script>
$(function() {
    $('[data-decrease]').click(decrease);
    $('[data-increase]').click(increase);
    $('[data-value]').change(valueChange);
});

function decrease() {
    var valueElement = $(this).parent().find('[data-value]');
    var currentValue = parseInt(valueElement.val());

    if (currentValue > 1) {
        currentValue--;
        valueElement.val(currentValue);
        // updatePrice(currentValue);
    }
}

function increase() {
    var valueElement = $(this).parent().find('[data-value]');
    var currentValue = parseInt(valueElement.val());

    if (currentValue < 10) { // Change the upper limit to 10
        currentValue++;
        valueElement.val(currentValue);
        // updatePrice(currentValue);
    }
}

function valueChange() {
    var value = $(this).val();
    if (value == undefined || isNaN(value) || value < 1) {
        $(this).val(1);
    } else if (value > 10) { // Change the upper limit to 10
        $(this).val(10);
    }

    // updatePrice(value);
}


</script>




<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>



<?php if(Session::get('successdataadded')): ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

 Swal.fire('Item Deleted Successfully')

</script>


<?php

Session::forget('successdataadded');


?>


<?php endif; ?>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/themes/BC/Hotel/Views/frontend/staycationbookingdetail.blade.php ENDPATH**/ ?>