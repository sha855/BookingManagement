<style>
    .Daily-btn {
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color: white;
    padding: 6px 6px !important;
}

.red-heart{
    color:red !important;
}
.bravo_wrap .bravo_search_event .bravo-list-item .list-item .item-loop .thumb-image .service-wishlist {
    color: black;
    cursor: pointer;
    /*padding: 10px;*/
    position: absolute;
    right: 5px;
    top: 0;
    z-index: 10;
}

.btn:hover{
 color:white !important   
}

.ff{
    color:black;
}
#heart-icon {
    transition:  0.3s ease-in-out;
     transform: translateY(0px);
}

#heart-icon.clicked {
    transform: translateY(0px);
    /* Adjust the value as needed */
}

.bravo_wrap .bravo_search_hotel .bravo-list-item .list-item .item-loop .thumb-image .service-wishlist.active i {
    color: red;
    top: -50px !important;
    position: relative;
}

</style>

<?php
    $translation = $row->translate();
?>


<div class="item-loop <?php echo e($wrap_class ?? ''); ?> h-70">
    <?php if($row->is_featured == "1"): ?>
        <div class="featured">
            <?php echo e(__("Featured")); ?>

        </div>
    <?php endif; ?>
    <div class="thumb-image " style="height:200px !important; ">
        
     <?php
     
       $gget = DB::table('media_files')->where('id',$row->banner_image_id)->get();
     
     
     ?>
       <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e(url('activity/'.$row->slug)); ?>">
            <?php if($row->banner_image_id): ?>
                <?php if(!empty($disable_lazyload)): ?>
                    <img src="<?php echo e($row->image_url); ?>" class="img-responsive" alt="" >
                <?php else: ?>
                
               <?php $__currentLoopData = $gget; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ggg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                 <img src="<?php echo e(asset('/uploads/'.$ggg->file_path)); ?>" class="img-responsive" alt="">
                 
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                <?php endif; ?>
            <?php endif; ?>
        </a> 
<div class="service-wishlist <?php echo e($row->isWishList()); ?>"  data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
           
    <i class="fa fa-heart-o ff" id="heart-icon" style="background: white;
    height: 30px;
    width: 30px;
    border-radius: 30px;
    top:10px;
    padding: 8px 7px; position: relative;"></i>
</div>
        <?php if($row->discount_percent): ?>
            <div class="sale_info"><?php echo e($row->discount_percent); ?></div>
        <?php endif; ?>
    </div>
   
    <div class="item-title mt-2 pt-2">
       <h6 > <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl($include_param ?? true)); ?>">
            <?php if($row->is_instant): ?>
                <i class="fa fa-bolt d-none"></i>
            <?php endif; ?>
                <?php echo e($translation->title); ?>

        </a></h6>
    </div>

    <div class="location mb-3" style="color:black; margin-top:3px;">
     <span>
    <?php if(!empty($row->location->name)): ?>
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <?php $location =  $row->location->translate() ?>
        <?php echo e($location->name ?? ''); ?>

    <?php endif; ?>
</span>


    </div>
    <?php if(setting_item('space_enable_review')): ?>
    <?php
    $reviewData = $row->getScoreReview();
    $score_total = $reviewData['score_total'];
    ?>
        <div class="service-review mb-4">
            <span class="rate">
             <span class="Daily-btn text-white w-30" style="padding: 4px 6px !important; font-size: 10px; border-radius: 6px; <?php if($reviewData['total_review'] == 0): ?> display: none; <?php endif; ?>">
    <?php if($reviewData['total_review'] > 0): ?>
        <?php echo e($score_total); ?> <i class="fa fa-star"></i>
    <?php endif; ?>
</span>



              &nbsp; &nbsp;&nbsp;<span class="rate-text" style="color:black; margin-left:-10px;"><?php echo e($reviewData['review_text']); ?></span>
            </span>
            
        </div>
    <?php endif; ?>
    
    <div class="info mt-3">
        
        
        <div class="g-price text-start mb-1" style="position: relative;
    top: 10px;">
            <div class="prefix" style="font-size: 20px;">
                <span class="fr_text"></span>
            </div>
             <!--display_-->
            
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
    $row->price /= $exchangeRate;
    $decimalPlaces = 0;
    $formattedPrice = number_format($row->price, $decimalPlaces);
    $discountpercent= DB::table('bravo_events')->select('discount')->where('id',$row->id)->get();
    $discountData = json_decode($discountpercent);
    
?>



  <?php $__currentLoopData = $discountData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <?php
     
  $ff->discount /= $exchangeRate;
  $discountformattedPrice = number_format($ff->discount, $decimalPlaces);
       
  $doriginalPrice = intval($row->price);
  $ddiscountAmount = $ff->discount;

 
  if ($doriginalPrice != 0) {
    $dddiscountedPrice = $doriginalPrice - $ddiscountAmount;
    $dddiscountPercentage = ($dddiscountedPrice / $doriginalPrice) * 100;
  } else {
    
    $dddiscountPercentage = 0;
  }
    ?>
  
 <p style="position: relative;
   top: 9px;margin-top: -18px;">
  <span style="font-size: 25px; color: black; font-weight: 700;"><?php echo e($discountformattedPrice); ?></span>
       <span style="font-size: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
      </p>
 <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;"><?php echo e($formattedPrice); ?></span>
 <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;"><?php echo e($targetCurrency); ?></span>
 <div class="btn btn-light Daily-btn" style="position: relative;top:-3px; font-size:10px; border-radius:4px;"><?php echo e(number_format($dddiscountPercentage,0)); ?>% off</div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
    $discountpercent= DB::table('bravo_events')->select('discount')->where('id',$row->id)->get();

    $xdiscountData = json_decode($discountpercent);
    
    
?>

 <?php $__currentLoopData = $xdiscountData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
  $doriginalPrice = intval($row->price);
  $ddiscountAmount = $ff->discount;

 
  if ($doriginalPrice != 0) {
    $dddiscountedPrice = $doriginalPrice - $ddiscountAmount;
    $dddiscountPercentage = ($dddiscountedPrice / $doriginalPrice) * 100;
  } else {
    
    $dddiscountPercentage = 0;
  }
?>
<p style="position: relative; top: 9px; margin-top: -18px;">
  <span style="font-size: 25px; color: black; font-weight: 700;"><?php echo e($ff->discount); ?></span>
  <span style="font-size: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
</p>

<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;"><?php echo e($row->price); ?></span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>

<div class="btn btn-light Daily-btn" style="position: relative;top:-3px;font-size:10px; border-radius:4px;">
  <?php if($dddiscountPercentage): ?>
    <?php echo e(number_format($dddiscountPercentage,0)); ?>% off
  <?php endif; ?>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php
}
?> &nbsp;


             
   <div class="price">
                 
                
              
            </div>
        </div>
    </div>
</div>

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
      'X-CSRF-TOKEN': csrfToken // Set the CSRF token in the request headers
    },
   success: function(response) {
  if (response.class === "active") {

      $('.newhotelheartstatus' +id).addClass('class');
    
  
  } else if (response.class === "inactive") {
    
    $('.newhotelheartstatus' +id).removeClass('class');
  
    
  } else {

    alert("Unexpected response status: " + response.status);
   
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
    
    document.addEventListener("DOMContentLoaded", function () {
    const heartIcon = document.getElementById("heart-icon");
    
    heartIcon.addEventListener("click", function () {
        heartIcon.classList.toggle("clicked");
    });
});
</script>



<?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/themes/BC/Event/Views/frontend/layouts/search/loop-grid.blade.php ENDPATH**/ ?>