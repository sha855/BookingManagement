<style>
    .Daily-btn {
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color: white;
    padding: 4px 5px !important;
}

.btn:hover{
    color:white !important;
}
.service-wishlist.active {
    color: red !important;
}
.service-wishlist.inactive{
    color:black !important;
}

@media screen and (max-width: 600px){
.btn-light {
    color: #FF3500;
    font-weight: 800;
    background: white;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
    border-radius: 10px;
    position: relative;
    left: 3px !important;
    font-size: 9px !important;
}
|}
.service-wishlist i.fa-heart-o {
 
    height: 28px;
    width: 28px;
    background: white;
    padding: 7px 6px;
    border-radius: 30px;
    color: black;
    margin-top: -6px;
    text-shadow: 1px 1px 27px black;
    background:white;
}

.service-wishlist.active i.fa-heart-o {
    /* Styling for the active state (color red) */
    color: red;
}

 

   .service-wishlist i.fa-heart{
    height: 28px;
    width: 28px;
    background: ;
    padding: 7px 6px;
    border-radius: 30px;
    color: black;
    margin-top: -6px;
    text-shadow: 1px 1px 27px black;
    background: white;
   
   }



</style>




<?php
    $translation = $row->translate();
?>
<div class="item-loop <?php echo e($wrap_class ?? ''); ?> h-80" >
    <?php if($row->is_featured == "1"): ?>
        <div class="featured">
            <?php echo e(__("Featured")); ?>

        </div>
    <?php endif; ?>
    <div class="thumb-image ">
        <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl()); ?>">
            
          
           <?php
           
           
           $data = DB::table('media_files')->where('id',$row->banner_image_id)->select('file_path')->first();  
           ?>
            
            
           
                <?php if(!empty($disable_lazyload)): ?>
                
              
                     <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$translation->title]); ?>

                <?php else: ?>
                     
                    
                    <img src="<?php echo e(asset('uploads/'.$data->file_path)); ?>" class="img-responsive" alt="">
                 
                <?php endif; ?>
         
        </a>
        <?php if($row->star_rate): ?>
            <div class="star-rate">
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        <?php for($star = 1 ;$star <= $row->star_rate ; $star++): ?>
                            <li><i class="fa fa-star"></i></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        
    
   
<div class="service-wishlist <?php echo e($row->isWishList() ? 'active' : ''); ?>"
     data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
    <i class="fa <?php echo e($row->isWishList() ? 'fa-heart red-heart' : 'fa-heart-o'); ?>"
       style="">
    </i>
</div>

        
        
    </div>
    <div class="item-title">
       <h5 style="font-size: 17px;"> <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl()); ?>">
            <?php if($row->is_instant): ?>
                <i class="fa fa-bolt d-none"></i>
            <?php endif; ?>
                <?php echo e($translation->title); ?>

        </a></h5>
        <?php if($row->discount_percent): ?>
            <div class="sale_info"><?php echo e($row->discount_percent); ?></div>
        <?php endif; ?>
    </div>
    <div class="location">
        <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>   <?php if(!empty($row->location->name)): ?>
            <?php $location =  $row->location->translate() ?>
            <?php echo e($location->name ?? ''); ?>

        <?php endif; ?>
    </div>
    <?php if(setting_item('hotel_enable_review')): ?>
    <?php
    $reviewData = $row->getScoreReview();
    $score_total = $reviewData['score_total'];
    ?>
    <div class="service-review">
        <span class="rate">
           <span class="Daily-btn text-white w-30" style="padding: 4px 6px !important; font-size: 10px; border-radius: 6px; <?php if($reviewData['total_review'] == 0): ?> display: none; <?php endif; ?>">
    <?php if($reviewData['total_review'] > 0): ?>
        <?php echo e($score_total); ?> <i class="fa fa-star"></i>
    <?php endif; ?>
</span>
    
    
    &nbsp;<span class="rate-text" style="color:black"><?php echo e($reviewData['review_text']); ?></span>
        </span>
        
        
         
        <span class="review">
             <?php if($reviewData['total_review'] > 1): ?>
                <?php echo e(__(":number Reviews",["number"=>$reviewData['total_review'] ])); ?>

            <?php else: ?>
                <?php echo e(__(":number Review",["number"=>$reviewData['total_review'] ])); ?>

            <?php endif; ?>
        </span>
    </div>
    <?php endif; ?>
    <div class="info mt-4 mb-1">
        <div class="g-price">
            <div class="prefix">
            </div> 
            <div class="price"  style="position: relative;
    top: 16px;">
                
   <?php
$currency = DB::table('core_settings')->where('name', 'extra_currency')->first();

$forex = json_decode($currency->val);
$targetCurrency = strtoupper(Session::get('bc_current_currency'));

$fexchangeRate = null;

foreach ($forex as $item) {
    $dataRate = $item->currency_main;

    if ($dataRate === Session::get('bc_current_currency')) {
        $fexchangeRate = $item->rate;
        break;
    }
}

 
   
    
if ($fexchangeRate) {
    
    $usdPrice = $row->price;
     
    $row->price /= $fexchangeRate;
    $decimalPlaces = 0;
    $formattedPrice = number_format($row->price, $decimalPlaces);
    $discountpercent= DB::table('bravo_hotels')->select('discount_percent')->where('id',$row->id)->first();
    
  $discountpercent->discount_percent /= $fexchangeRate;
   
  $newdiscountformattedPrice = number_format($discountpercent->discount_percent, $decimalPlaces);
   
  $originalPrice = intval($row->price);
  
  $discountAmount = $discountpercent->discount_percent;
  
  $discountedPrice = $originalPrice - $discountAmount;
  
  $discountPercentage = ($discountedPrice / $originalPrice) * 100;
  
  
    
?>
  
 <p style="position: relative;
  top: 9px;">
 <span style="font-size: 25px; color: black; font-weight: 700;"><?php echo e($newdiscountformattedPrice); ?></span>
       <span style="font-size: 24px;"><?php echo e(strtoupper($targetCurrency)); ?></span>
      </p>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;"><?php echo e(intval($usdPrice)); ?></span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;"><?php echo e($targetCurrency); ?></span>
 <div class="btn btn-light Daily-btn" style="position: relative;top:-3px;border-radius: 4px;
    font-size: 10px;padding: 3px 8px !important"><?php echo e(number_format($discountPercentage,0)); ?>% off</div>
  
  
<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
    $discountpercent= DB::table('bravo_hotels')->select('discount_percent')->where('id',$row->id)->get();

    $discountData = json_decode($discountpercent);
    
    
    
?>
 <?php $__currentLoopData = $discountData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
 <?php
 
  $originalPrice = intval($row->price);
  
  $discountAmount = $ff->discount_percent;
  
  $discountedPrice = $originalPrice - $discountAmount;
  
  $discountPercentage = ($discountedPrice / $originalPrice) * 100;
 
 
 ?>
<p style="position: relative;
   top: 9px;">
  <span style="font-size: 25px; color: black; font-weight: 700;"><?php echo e($ff->discount_percent); ?></span>
       <span style="font-size: 24px;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
      </p>

<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;"><?php echo e(intval($row->price)); ?></span>
<span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through;"><?php echo e(strtoupper($mainCurrency->val)); ?></span>
 
  <div class="btn btn-light Daily-btn" style="position: relative;top:-3px;border-radius: 4px;
    font-size: 10px;    padding: 3px 8px !important;"><?php echo e(number_format($discountPercentage,0)); ?>% off</div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
         
 
<?php
}
?> &nbsp;
   
   
 
              
            </div>
        </div>
    </div>
</div>




<script>
    $('document').ready(function() {
        $('.service-wishlist').click(function() {
            var $heartIcon = $(this).find('i');
            var isActive = $(this).hasClass('active'); // Check if it's active
            var object_id = $(this).data('id');
            var object_model = $(this).data('type');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            
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
                        if (!isActive) {
                            // Change from inactive to active
                            $heartIcon.removeClass('fa-heart-o').addClass('fa-heart red-heart');
                            $(this).addClass('active');
                        }
                    } else if (response.class === "inactive") {
                        if (isActive) {
                            // Change from active to inactive
                            $heartIcon.removeClass('fa-heart red-heart').addClass('fa-heart-o');
                            $(this).removeClass('active');
                        }
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
<?php /**PATH /Users/pro/Desktop/readyForSell/BookingManagement/themes/BC/Hotel/Views/frontend/layouts/search/loop-grid.blade.php ENDPATH**/ ?>