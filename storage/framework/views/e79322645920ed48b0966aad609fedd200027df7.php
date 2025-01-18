<style>
    .text-item{
    color:#FF3500;
    font-size:19px; 
    }
    .text-item2{
   text-decoration: line-through;
    }
    .inbtn{
       border-radius: 17px;
       width: 25px;
       border: 1px solid #FF3500;
    }
    .card-btn{
       background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
       color:white;
    
    }
    .btn-text{
       color:#FF3500;   
    }
    .swal2-styled.swal2-confirm {
    border: 0;
    border-radius: .25em;
    background: initial;
    background-color: #ff3500;;
    color: #fff;
    font-size: 1em;
}

.bravo_wrap .bravo_detail_event .bravo_single_book {
 
    border: 1px solid #d7dce3;
    border-radius: 0 0 4px 4px;
    border-top: 5px solid #5191fa;
    position: relative;
    width: 100%;
    border-radius: 12px;
}
 .ssDIV{
  margin-left: 43px;   
 background:#b9afaf14 !important;  
 margin-top:10px !important;
 border-radius:10px;
}

.bravo-list-hotel-related-widget {
    width: 70%;
    position: relative;
    left: 22px;
}
#bravo_event_book_app {
    width: 122%;
}
   </style>


<div class="bravo_single_book_wrap <?php if(setting_item('event_enable_inbox')): ?> has-vendor-box <?php endif; ?>">
    <div class="bravo_single_book"  style="border:#FF3500;">
        <div id="bravo_event_book_app" v-cloak>
         


    <?php

    $cc = request()->slug;

    $hotel = DB::table('bravo_events')->where('slug',$cc)->first();

    $room = DB::table('activity_packages')->where('parent_id',$hotel->id)->orderBy('price', 'desc')->get();
  
    ?>
             <form id ="xpackagesForm" method="post" action="<?php echo e(url('Quick-Checkout')); ?>" class="ssDIV">
                        <?php echo csrf_field(); ?>
               
<div class="bravo-list-hotel-related-widget" style="width:88%;">
        <h5 class="pt-3"  style="margin-top:-9px;">Packages</h5>
        <?php if(count($room) > 0): ?>
        
        
    <?php
    
    $sortedRooms = $room->sortBy('price');
?>

        
        
        <?php $__currentLoopData = $sortedRooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rooms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-3">
                <div class="card-body">
                    
                <input type="hidden"  name="package_name[]" value="<?php echo e($rooms->title); ?>">
                
                <input type="hidden" name = "product_id[]" value="<?php echo e($hotel->id); ?>">

               <input type ="hidden" id="packagesId" name ="id[]" value="<?php echo e($rooms->id); ?>">

               <input type ="hidden" id = "parentnameofpackages" name ="type[]" value="event"> 

            


                    <p class="card-title"><?php echo e($rooms->title); ?></p>
                    <p class="card-text" style="display:inline;">
                  
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
    $exactprice =$rooms->price - $rooms->discount_price;
    $exactprice /= $exchangeRate;
    
    $rooms->price /= $exchangeRate;
    
    $decimalPlaces = 0;
    $formattedPrice = number_format( $exactprice, $decimalPlaces);
?>
<div class="row">
<div class="col-md-4" style="display:inline-flex;">
<div style="white-space: nowrap;">
<span class="text-item2"><?php echo e(str_replace(',', '', number_format($rooms->price, 0))); ?> USD</span>
<h3 style="
    padding-left: 60px;
    margin-top: -26px;" class="text-black"><span style="color: rgb(255, 53, 0) !important;"><?php echo e(str_replace(',', '', number_format($formattedPrice, 0))); ?></span> <small style="margin-left: 41%;
    margin-top: -11%; margin-left: -10px;">  &nbsp;<?php echo e($targetCurrency); ?></small></h3>

</div>
</div>
</div>


<input type ="text" style="display:none;" id = "xparentnameofpackages" name ="price[]" value="<?php echo e(str_replace(',', '', number_format($formattedPrice, 0))); ?>"> 

<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>
<div class="row">
<input type ="hidden"  id = "xparentnameofpackages" name ="price[]" value=" <?php echo e(str_replace(',', '', number_format($rooms->price - $rooms->discount_price, 0))); ?>"> 

<div style="white-space: nowrap;">
    <span class="text-item2"><?php echo e(str_replace(',', '', number_format($rooms->price, 0))); ?> AED</span>
    <h3 class="text-black" style="display: inline; color: rgb(255, 53, 0) !important; padding-left: 0px; margin-top: -26%; margin-right: 10px;"> <?php echo e(str_replace(',', '', number_format($rooms->price - $rooms->discount_price, 0))); ?></h3>
    <small style="display: inline; margin-top: -11%; margin-left: -10px;"><?php echo e(strtoupper($mainCurrency->val)); ?></small>
</div>
</div>
<?php
}
?>        </p>
                    <p>
        <div class="container">
        <button type="button" data-decrease class="inbtn">-</button>
        <input name="packageQuantity[]" data-value type="text" value="0" data-room="<?php echo e($rooms->id); ?>" style="width: 21px; border: none;">
        <button type="button" data-increase class="inbtn">+</button>
        <small>Quantity</small>
    </div>
                    </p>

    <?php 
      
      if(auth()->check())
      {
       $user_id = auth()->user()->id;

      }else{

        $user_id = null;
      }
     
    ?>
    
        </div>
    </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

        
          <?php if($user_id == null): ?>

          <button type="button" class="btn btn-light w-100 card-btn mb-3" data-toggle="modal" data-target="#login">Add To Cart</button> 
        
          <?php else: ?>
         
          <button type="submit" href="#" data-room-id="<?php echo e($rooms->id); ?>"  class="btn btn-light w-100 mb-3" style="border-radius: 10px; border: 1px solid #FFF5E9; background: var(--light, #FFF5E9);">Quick Checkout</button>
         
          <button type="button" href="#" data-room-id="<?php echo e($hotel->id); ?>"     class="btn btn-light w-100 card-btn mb-3 cartSubmitButton">ADD TO CART</button>

          <?php endif; ?>


         </form>
    <?php else: ?>
        <p>No data found.</p>
    <?php endif; ?>
    
    </div>
    
            <div class="form-send-enquiry" v-show="enquiry_type=='enquiry'">
                <button class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">
                    <?php echo e(__("Contact Now")); ?>

                </button>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make("Booking::frontend.global.enquiry-form",['service_type'=>'event'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php if(Session::get('error')): ?>


<script>
     Swal.fire(
  'Please select atleast One Quantity',
 
)
    
    
</script>

<?php endif; ?> 

<script>
$(document).ready(function() {
   
    $(".cartSubmitButton").click(function(e) {
        e.preventDefault(); 

        $.ajax({
            type: "POST", 
            url: "/adding-to-cart", 
            data: $("#xpackagesForm").serialize(), 
            success: function(response) {
              
                if(response.status == true)
                {

                  window.location.href ="/user-cart"

                  
                }else if(response.status == false)
                {

                    
                  Swal.fire(
  'No Quantity?',
  'Please select at least one package qunatity',
  'question'
)

                }else{

                        alert("Please sign In first for adding to cart");
                }
            },
            error: function(xhr, status, error) {
                
                console.error("Error submitting the form:", error);
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
  var value = $(this).parent().find('[data-value]');
  var currentValue = parseInt(value.val());

  if (currentValue > 1) {
    currentValue--;
  } else {
    currentValue = 0;
  }

  value.val(currentValue);
}

function increase() {
    var value = $(this).parent().find('[data-value]').val();
    if(value < 100) {
        value++;
        $(this).parent().find('[data-value]').val(value);
    }
}

function valueChange() {
    var value = $(this).val();
    if(value == undefined || isNaN(value) == true || value <= 0) {
        $(this).val(0);
    } else if(value >= 101) {
        $(this).val(100);
    }
}
</script><?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/themes/BC/Event/Views/frontend/layouts/details/form-book.blade.php ENDPATH**/ ?>