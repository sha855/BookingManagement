
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/event/css/event.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/fotorama/fotorama.css")); ?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <style>
    
   .title{
    font-weight: 800;
    }
    .fa{
     color:#FF3500;
    }
    .star-item {
     margin-top: -20px;
    }
    .act-img{
        padding:20px; 
        border-radius: 30px;
    }
    .act-btn{
        float: right;
    color: white;
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    position: relative;
    top: 52px;
    }
    
    .increment{
     border: 1px solid red;
    border-radius: 17px;
    width: 25px;
    background: white;
    }
    .totl{
        background:#FFF3E3;border-top-right-radius: 11px;
       border-top-left-radius: 11px;
    }
    .totl1{
        background:#FFF3E3;border-bottom-right-radius: 11px;
       border-bottom-left-radius: 11px;
    }
   
  </style>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

 <form method = "post" action="<?php echo e(url('booking')); ?>">

 
  <?php echo csrf_field(); ?>
 <div class="container mt-3">
     <div class="row">
      <h4 class="title py-3 mx-3">
          <?php if(Session('product')): ?>
          <?php
          
$activityNAme = DB::table('bravo_events')->where('id',session('product'))->first();
$packageName =  DB::table('activity_packages')->where('parent_id', session('product'))->get();
$quantityTotal = Session::get('quantitytotal');

$discountSum = [];

$packageId = [];

foreach ($packageName as $index => $pp) {
    $packageId[] = $pp->id;
    $quantity = $quantityTotal[$index];
    $discountPrice = $pp->discount_price;
    $totalDiscountedPrice = $quantity * $discountPrice;
    $discountSum[] = $totalDiscountedPrice;
}

$packageIdsString = implode(',', $packageId);

$totalSavings = array_sum($discountSum);

          ?>
          
          <?php echo e($activityNAme->title); ?>

          
          <?php endif; ?>
          
           <input type = "hidden"  name="object_model" value="event">
           <input type = "hidden"  name="object_id"   value=" <?php echo e($activityNAme->id); ?>">
           <input type = "hidden"  name="package_id"  value="<?php echo e($packageIdsString); ?>">
           <input type = "hidden"  name="object_name" value=" <?php echo e($activityNAme->title); ?>">
           
          </h4>
    </div>
</div>
<div class="container star-item">
<p><span>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
</span>
<span>(4 reviews) Excellent</span>
</p>
<p><i class="fa fa-location"></i> Dubai</p>
</div>


<?php

$value = request()->quantity;


?>




<div class="container mt-3 card">
<div class="row">
  <div class="col-md-4">
   <div class="card" style="border:none;">

    <?php
    
    
        
       if(Session('product'))
     {
         
          
         $activityNAme = DB::table('bravo_events')->where('id',session('product'))->first();
         
        
            
         $image = DB::table('media_files')->where('id',$activityNAme->banner_image_id)->first();
   }
          

    ?>
    
    <?php if(Session('product')): ?>

    <img src="<?php echo e(asset('uploads/'.$image->file_path)); ?>" alt="" srcset=""  class="act-img">
    
    <?php endif; ?>
    


  </div>
  </div>
  <div class="col-md-8">
 
    <h6 class="pt-4">  <?php if(Session('product')): ?>
          <?php
          
          $activityNAme = DB::table('bravo_events')->where('id',session('product'))->first();
          
          ?>
          
          <?php echo e($activityNAme->title); ?>

          
          <?php endif; ?>
          </h6>
    <p>
        
        <?php if(Session('formattedTotalPrice') && Session('product')): ?>
           
           <?php
           $targetCurrency = strtoupper(Session::get('bc_current_currency'));
           ?>
        
        <?php endif; ?>
        
        
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
$xprice =session('formattedTotalPrice');

 $price = floatval(str_replace(',', '', $xprice));


if ($exchangeRate) {
    $price /= $exchangeRate;
    $decimalPlaces = 0;
    $formattedPrice = number_format($price, $decimalPlaces);
?>

             <span style="color:#FF3500" id="realupcomingPrice" class="price pricex" data-price="<?php echo e($formattedPrice); ?>"><?php echo e($formattedPrice); ?></span><span>
              
              <?php if($targetCurrency): ?>
            
              <?php echo e($targetCurrency); ?> 
             
              <?php else: ?>
             
              AED
             
              <?php endif; ?>
             
             </span>

<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>

              <span style="color:#FF3500" id="realupcomingPrice" class="price pricex" data-price="<?php echo e(number_format($price,0)); ?>"><?php echo e(number_format($price,0)); ?></span><span>
              
              <?php if($targetCurrency): ?>
            
              <?php echo e($targetCurrency); ?> 
             
              <?php else: ?>
             
              AED
             
              <?php endif; ?>
             
             </span>

<?php
}
?>

          
        <style>
            .smalldiv {
    position: relative;
    margin-top: -74px;
    left: 59px;
}
            
        </style>
        
    
    </p>
    <?php
    
    $persons = Session::get('totalpersons');
    
    $price = Session::get('totalPrice');
    
    $quatitytoatl = Session::get('quantitytotal');
    
  $data = [
    'persons' => $persons,
    'price' => $price,
    'quantityTotal' => $quatitytoatl
    ];
  
 $travellerdata = json_encode($data);

    ?>
    
    <input type="hidden" name = "travellers" value="<?php echo e($travellerdata); ?>">
    
    <div class="row">
    <div class="col-md-4">
    <h6>Package</h6>
  
  

       <?php $__currentLoopData = $data['persons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
            <?php if(!($data['quantityTotal'][$index] == "0")): ?>
                <p><?php echo e($pp); ?></p>  
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   
    </div>
    
     <div class="col-md-4">
    <h6>price</h6>
    
  <?php $__currentLoopData = $quatitytoatl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($tt == 0 || $price[$index] == 0): ?>
        <?php continue; ?>
    <?php endif; ?>
    <p style="width: 105%;">
        Quantity: <?php echo e($tt); ?> |
        Price: <?php
           if($exchangeRate)
           {
               
               $price[$index] /= $exchangeRate;
               
           }
           
        ?>
        
        <?php echo e(number_format($price[$index],0)); ?> |
        
        
        
        
        Total Price: <?php echo e(number_format($tt * $price[$index],0)); ?>

    </p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
    </div>
    </div>
    
    
    <hr class="hrclass" style="">
    
    <style>
        
        .hrclass{
            
            border:2px solid grey !important;
        }
    </style>
    
 
 <p id="finalPrice"></p>

    <div class="row">
        <div class="col-md-6">
            <label> Select Date </label>
             <input type="text" name="activityDAte" class="form-control" id="activityBookDate" aria-describedby="emailHelp" placeholder="Travel Dates" pattern="\d{2}/\d{2}/\d{4}" required>
        </div>
        <div class="col-md-6">
            <label>Apply Promocode </label>
             <img src="<?php echo e(asset(url('images/Group.png'))); ?>" alt="Image" style="width: 19px;
    height: 19px;
    margin-right: 0px;
    top: 36px;
    left: -120px;
    position: relative;">
    <input type="text" id="promoInput" placeholder="Apply" class="form-control" style="border: 1px solid lightgray;
    flex: 1;
    margin-top: 0px;
    padding-left: 30px;">
    <button type="button" id="applyButton" style="background-color: #ff3500;
    color: #ff3500;
    border: aliceblue;
    right: 34px;
    padding: 0px 0px;
    border-radius: 6px;
    left: 83%;
    top: -31px;
    position: relative;
    background: transparent;">Apply</button>
    <span id="promocodestatus"></span>
        </div>
    </div>
     <h6 class="pt-3">Pricing</h6>
     <div class="row pt-3 totl">
        <div class="col-md-6">
            <p class="text-end">VAT</p>
             <p class="text-end">Total</p>
             <p class="text-end">Promo Code</p>
             <p class="text-end">Total Saving</p>
            
        </div>
        <div class="col-md-6 text-end">
            
            
            
            <p class="text-end" id="vatprice">
                
                
                <?php
               $xprice = session('formattedTotalPrice');
           $price = floatval(str_replace(',', '', $xprice));

 
            $percent5Value = $price * 0.05;
                
                if ($exchangeRate) {
                    
              $percent5Value /= $exchangeRate;
              
                   }
                   
              echo $targetCurrency ." ";      echo number_format($percent5Value,0); 
                  
                 ?>
                 
                 
             </p>
            
            
            <p class="text-end" id="totalPrice">
                
                
                
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
$xprice =session('formattedTotalPrice');
 $price = floatval(str_replace(',', '', $xprice));
if ($exchangeRate) {
    $price /= $exchangeRate;
    $decimalPlaces = 0;
    $formattedPrice = number_format($price, $decimalPlaces);
    
    $formattedPrice = str_replace(',', '', $formattedPrice);
    
?>

               
              
              <?php if($targetCurrency): ?>
            
              <?php echo e($targetCurrency); ?> 
             
              <?php else: ?>
             
              AED
             
              <?php endif; ?>
              
              <?php echo e(number_format($formattedPrice - $percent5Value,0)); ?>

             
             </span>

<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
    
      $formattedPrice = str_replace(',', '', $price);
?>

             
              
              <?php if($targetCurrency): ?>
            
              <?php echo e($targetCurrency); ?> 
             
              <?php else: ?>
             
              AED
             
              <?php endif; ?>
             <?php echo e(number_format($formattedPrice - $percent5Value,0)); ?>

         
<?php
}
?>
              
              </p>
            <p class="text-end" id="result" style="color:#FF3500">00</p>
            <p class="text-end"  style="color:#FF3500">
                
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
$xprice = session('formattedTotalPrice');
$price  = floatval(str_replace(',', '', $xprice));
 
if ($exchangeRate) {
    $totalSavings /= $exchangeRate;
    $decimalPlaces = 0;
    $xformattedPrice = number_format($totalSavings, $decimalPlaces);
?>

 <input type="hidden" value="<?php echo e($totalSavings); ?>" class="totalsavings" name="total_saving">
<input type ="hidden" class ="currencyName"value="<?php echo e($targetCurrency); ?>">

              
              
              <?php if($targetCurrency): ?>
            
              <?php echo e($targetCurrency); ?>  
             
              <?php else: ?>
             
              AED
             
              <?php endif; ?>
             
             <span id="totalsaving"><?php echo e($xformattedPrice); ?></span>
          

<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name','currency_main')->first();
?>

  <input type="hidden" value="<?php echo e($totalSavings); ?>" class="totalsavings" name="total_saving">
  
  
<input type ="hidden" class ="currencyName"  value="AED">

            
              
              <?php if($targetCurrency): ?>
            
              <?php echo e($targetCurrency); ?> 
             
              <?php else: ?>
             
              AED
             
              <?php endif; ?>
              
               <span id="totalsaving"><?php echo e($totalSavings); ?></span> 
             
<?php
}
?>
          
              </p>
          
       </div>
    </div>
       <div class="row mb-2 totl1">
        <div class="col-md-6 ">
          <h6 class="text-end text-bold">Grand Total</h6>
        </div>
      <div class="col-md-6 text-end">
    <h6 class="text-end "><b >
    
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
$xprice =session('formattedTotalPrice');
 $price = floatval(str_replace(',', '', $xprice));
 if ($exchangeRate) {
    $price /= $exchangeRate;
    $decimalPlaces = 0;
    $formattedPrice = number_format($price, $decimalPlaces);
    
    $formattedPrice = str_replace(',', '', $formattedPrice);
?>
  
     
 
       
        <input type="hidden" name="currency" value = "<?php echo e($targetCurrency); ?>">
            
        <input hidden="hidden" id="bookingPrice" value="<?php echo e($formattedPrice); ?>">
        
        
           
              
              <?php if($targetCurrency): ?>
            
              <?php echo e($targetCurrency); ?> 
             
              <?php else: ?>
             
              AED
             
              <?php endif; ?>
              <span class="updated-price"><?php echo e($formattedPrice); ?></span>  
              
             </span>

<?php
} else {
    
    
    $mainCurrency = DB::table('core_settings')->where('name','currency_main')->first();
    
    $formattedPrice = str_replace(',', '', $price);
    
   
?>

          
             
             <input  type="hidden"  id="bookingPrice" value="<?php echo e(number_format($price,0)); ?>">
             
             <input  type="hidden"  name="currency" value = "AED">
              
             <?php if($targetCurrency): ?>
            
                <?php echo e($targetCurrency); ?> 
             
                <?php else: ?>
             
                AED
             
                <?php endif; ?>
                
                   <span class="updated-price"> <?php echo e($formattedPrice); ?> </span>
             
          <?php
           }
           ?>
             
             </b>
             
             
             
             <?php if($targetCurrency == "USD"): ?>
             
              <input type="hidden" value="<?php echo e($formattedPrice); ?>" class="priceshow" name="price">
  
             <?php else: ?>
             
                <input type="hidden" value="<?php echo e(number_format($price,0)); ?>" class="priceshow" name="price">
             
             <?php endif; ?>
             
             
             
             </h6>
  
</div>
     </div>
    
 
</div>

  
    
</div>
</div>
<br>
<div class="col-md-12">
        <button type="submit" class="btn btn-primary Daily-btn col-md-2" style="background: #FF3500;
    float: right;
    right: 133px; border-radius:12px;">Process to Payment</button>
</div>

</form>
<script>
$(document).ready(function() {
    
    var initialPriceWithComma = $("#bookingPrice").val();
    var initialPrice = parseFloat(initialPriceWithComma.replace(/,/g, ''));

   
    $("#paymentLink").attr("href", "booking?price=" + initialPrice);

 
    function updatePaymentLink() {
        var updatedPriceWithComma = $("#bookingPrice").val();
        var updatedPrice = parseFloat(updatedPriceWithComma.replace(/,/g, ''));
        $("#paymentLink").attr("href", "booking?price=" + updatedPrice);
    }

  
    $("#bookingPrice").on("change", function() {
        updatePaymentLink();
    });
});
</script>


  <script>
   

$(document).ready(function() {
    $('#applyButton').on('click', function() {
        var code = $("#promoInput").val();
        
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
                    
                    
                    var subtotal = parseFloat($('.updated-price').html());
                    
                   
                    
                    var currency = $('.currencyName').val();
                    
                    discount = parseFloat(response.data.discount);
                    
                    var saving = parseFloat($("#totalsaving").html());
                   
                    
                    var xtotalsaving = saving + discount;
                    
                    $("#totalsaving").html(xtotalsaving)
                    
                    
                    $(".totalsavings").val(xtotalsaving);
                     
                     
                    
                    var totalsubtotal = subtotal - discount;
                    
                    
                    $('.priceshow').val(totalsubtotal);
                    
                    $('.updated-price').html(totalsubtotal)
                    
                    
                    $('#result').text(currency + ' ' + discount.toFixed(0));
                     
                    $('#promocodestatus').html("PROMOCODE APPLIED");
                    
                    $('#promocodestatus').css("color", "green");
                    
                    $('#promoinput').prop('disabled', true);
                    
                    
                    $('#applyButton').prop('disabled', true);

                } else {
                    
                    
                        $('#promocodestatus').html("PROMOCODE INVALID");
                        
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/themes/BC/Event/Views/frontend/activity-checkout.blade.php ENDPATH**/ ?>