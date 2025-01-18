<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="<?php echo e($html_class ?? ''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php event(new \Modules\Layout\Events\LayoutBeginHead()); ?>
    <?php
        $favicon = setting_item('site_favicon');
    ?>
    <?php if($favicon): ?>
        <?php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        ?>
        <?php if(!empty($file)): ?>
            <link rel="icon" type="<?php echo e($file['file_type']); ?>" href="<?php echo e(asset('uploads/'.$file['file_path'])); ?>" />
        <?php else: ?>
            <link rel="icon" type="image/png" href="<?php echo e(url('images/favicon.png')); ?>" />
        <?php endif; ?>
    <?php endif; ?>

    <?php echo $__env->make('Layout::parts.seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
  

    <link href="<?php echo e(asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('libs/ion_rangeslider/css/ion.rangeSlider.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('libs/fotorama/fotorama.css')); ?>" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="<?php echo e(asset('libs/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/icofont/icofont.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/notification.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/app.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/daterange/daterangepicker.css")); ?>" >
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&display=swap" rel="stylesheet">
    
    <link rel='stylesheet' id='google-font-css-css'  href='https://fonts.googleapis.com/css?family=Poppins%3A300%2C400%2C500%2C600&display=swap' type='text/css' media='all' />
    <?php echo \App\Helpers\Assets::css(); ?>

    <?php echo \App\Helpers\Assets::js(); ?>

    <?php echo $__env->make('Layout::parts.global-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Styles -->
    <?php echo $__env->yieldPushContent('css'); ?>
    
    <link href="<?php echo e(route('core.style.customCss')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/carousel-2/owl.carousel.css')); ?>" rel="stylesheet">
    <?php if(setting_item_with_lang('enable_rtl')): ?>
        <link href="<?php echo e(asset('dist/frontend/css/rtl.css')); ?>" rel="stylesheet">
    <?php endif; ?>
    <?php if(!is_demo_mode()): ?>
        <?php echo setting_item('head_scripts'); ?>

        <?php echo setting_item_with_lang_raw('head_scripts'); ?>

    <?php endif; ?>
   <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   
    <link rel="stylesheet" href="<?php echo e(asset('libs/fullcalendar-4.2.0/core/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libs/fullcalendar-4.2.0/daygrid/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libs/daterange/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libs/fullcalendar-4.2.0/core/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libs/fullcalendar-4.2.0/daygrid/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libs/daterange/daterangepicker.css?_ver='.config('app.asset_version'))); ?>">
    
  

</head>

<style>
.btn-light:hover {
    /* color: #212529; */
    background-color: #ff3500 !important;
    border-color: #dae0e5;
}
 .p{
 font-family: 'Poppins';
  }
  h1, h2, h3, h4, h5 {
  font-family: 'Poppins', sans-serif;
}
.main-footer{
  background-image: url('images/footer-img1.png');
}



.card{
    
    border-radius: 15px !important;
}

.whatsapp-logo {
   position: fixed;
   bottom: 20px; 
   right: 100px; 
   z-index: 1000;
   
}

</style>


<body class="frontend-page <?php echo e(!empty($row->header_style) ? "header-".$row->header_style : "header-normal"); ?> <?php echo e($body_class ?? ''); ?> <?php if(setting_item_with_lang('enable_rtl')): ?> is-rtl <?php endif; ?> <?php if(is_api()): ?> is_api <?php endif; ?>">
    <?php if(!is_demo_mode()): ?>
        <?php echo setting_item('body_scripts'); ?>

        <?php echo setting_item_with_lang_raw('body_scripts'); ?>

    <?php endif; ?>
    <div class="bravo_wrap">
        
        
        <?php if(!is_api()): ?>
            <?php echo $__env->make('Layout::parts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Layout::parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        
         <a href="https://api.whatsapp.com/send?phone=+919773715399&text=hello ji" target="_blank" class="whatsapp-logo" style="position:fixed;">
         <img style="height:86px;" src="<?php echo e(asset('images/WhatsApp Chat.png')); ?>" alt="WhatsApp">
         </a>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('Layout::parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php if(!is_demo_mode()): ?>
        <?php echo setting_item('footer_scripts'); ?>

        <?php echo setting_item_with_lang_raw('footer_scripts'); ?>

    <?php endif; ?>
   
   
   
  


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
     <!--<script src="<?php echo e(asset('libs/jquery.min.js')); ?>"></script>-->
    <script src="<?php echo e(asset('libs/moment.min.js')); ?>"></script>
     
    <script src="<?php echo e(asset('libs/fullcalendar-4.2.0/core/main.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/fullcalendar-4.2.0/interaction/main.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/fullcalendar-4.2.0/daygrid/main.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/daterange/daterangepicker.min.js?_ver=' . config('app.asset_version'))); ?>"></script>

   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">-->
   <!--<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.js"></script>-->
   
   


    
  <script>

  var input = document.getElementById("travelDateInput");

  input.addEventListener("focus", function() {
  input.setAttribute("data-placeholder", input.getAttribute("placeholder"));
  input.removeAttribute("placeholder");
  });

  input.addEventListener("blur", function() {
  input.setAttribute("placeholder", input.getAttribute("data-placeholder"));
  input.removeAttribute("data-placeholder");
  });


</script>
<script>
    $(document).ready(function() {
       
        $('.entry-detail-card').on('click', function() {
           
            $(this).find('.entry-detail-radio').trigger('click');
        });
        $('.entry-detail-radio').on('click', function(e) {
           
            e.stopPropagation();
            $('input[name="entry_detail_id"]').not(this).prop('checked', false);
        });
    });
</script>


<script>
   function validateForm() {
       
    var adultSelect = document.getElementById("rangeSelect");
    
    var adultCount =  parseInt(adultSelect.value);

    var childSelect = document.getElementById("childSelect");
    
    var childCount =  parseInt(childSelect.value);

    var nextButton =  document.querySelector('.wizard-btn-next');

    if (adultCount > 0 || childCount > 0) {
      nextButton.style.display = 'block';
    } else {
      nextButton.style.display = 'none';
    }
  }
  document.getElementById("rangeSelect").addEventListener('change', validateForm);
  document.getElementById("childSelect").addEventListener('change', validateForm);
  validateForm();
</script>



 <script>
  function handleFileInputChange(event, inputId) {
    var input = event.target;
    var fileName = input.files[0].name;

    var inputText = input.parentNode.querySelector('input[type="text"]');
    inputText.value = fileName;
  }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src=https://www.gov.br/ds/assets/govbr-ds-dev-core/dist/core-init.js></script>



<script>
// JavaScript/jQuery
// JavaScript/jQuery
$(document).ready(function() {
  // Listen for changes in the number of travelers (adults) dropdown
  $('#number-of-travellers').change(function() {
    var numberOfTravelers = parseInt($(this).val());

    // Clear existing traveler forms
    $('#traveller-details-container').empty();

    // Generate traveler forms for each traveler
    for (var i = 1; i <= numberOfTravelers; i++) {
      // Clone the userRegisterForm
      var userRegisterFormClone = $('#userRegisterForm').clone();

      // Update the ID of the cloned form to avoid duplication
      userRegisterFormClone.attr('id', 'userRegisterForm-' + i);

      // Update the traveler number in the header
      userRegisterFormClone.find('.h4').text('Traveler ' + i);

      // Append the cloned form to the container
      $('#traveller-details-container').append(userRegisterFormClone);
    }
  });
});


</script>

    <script>
        $(document).ready(function() {
             var today = new Date();
    // Add one day to today's date to make it selectable from tomorrow
    today.setDate(today.getDate() + 1);

    // Initialize the datepicker with the startDate option
    $('#travelDateInput').datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        autoclose: true,
        startDate: today, // Set the minimum selectable date to tomorrow
        placeholder: 'Date of Booking'
    });
            
            
         
         $('#activityBookDate').datepicker({
    format: 'dd/mm/yyyy',
    todayHighlight: true,
    autoclose: true,
    startDate: 'today', // Set the start date to today
    placeholder: 'Date of Booking'
           });

        });

    </script>
    




</body>
</html><?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/modules/Layout/app.blade.php ENDPATH**/ ?>