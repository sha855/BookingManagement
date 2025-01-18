  
  <?php $__env->startSection('content'); ?>
     <style>
    
    
    .iti__country-list{
        
        z-index:999;
    }
    
    <style>



.g-recaptcha {
    margin: 10px 0;
}


#ximage{
   font-size: 18px;
    margin-top: -20px;
    top: 0px;
    position: relative;
   /*font-family: 'Qwitcher Grypen', cursive;*/

     color: #333; /* Customize the color */
     
}
#user-input{
    /*box-shadow: 1px 1px 1px 1px gray;*/
    width:auto;
       margin-right: 10px;
    padding: 10px;
    padding-bottom: 0px;
    height: 40px;
       border:  2px solid lightgray;
}
input{
    border:1px black solid;
}
.inline{
    display:inline-block;
}
#btn{
    box-shadow: 5px 5px 5px grey;
    color: aqua;
    margin: 10px;
    background-color: brown;
}
.hideceptch{
    padding:10px !important;
        position: relative !important;
    top: -10px !important;
}

.btn_login_gg_link:hover{
  color:red;  
  border:1px solid red;
}
.btn_login_fb_link:hover{
  color:navy;  
  border:1px solid navy;
}
.btn-light:hover{
  color:white !important;   
}
</style>



<!-- JavaScript -->



<div class="container">
    <div class="row justify-content-center bravo-login-form-page bravo-login-page">
        <div class="col-md-5 mb-3"  style="background-color: rgba(255, 245, 233, 0.1) !important; border:1px solid #FFF5E9; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; border-radius:10px;">
            <div class="">
                <h4 class="form-title text-center mt-3"><?php echo e(__('Register')); ?></h4>
                
                
<form class="form bravo-form-register" method="post" action="<?php echo e(route('auth.register.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="row" style="width: 103%;
    position: relative;
    left: 7px;">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" style="left: -10px;
    position: relative;" name="first_name" autocomplete="off" placeholder="<?php echo e(__("First Name")); ?>">
                <i class="input-icon field-icon icofont-waiter-alt"></i>
                <span class="invalid-feedback error error-first_name"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <input type="text" style="left: 10px;
    position: relative;" class="form-control" name="last_name" autocomplete="off" placeholder="<?php echo e(__("Last Name")); ?>">
                <i class="input-icon field-icon icofont-waiter-alt"></i>
                <span class="invalid-feedback error error-last_name"></span>
            </div>
        </div>
    </div>
    
      <div class="form-group">
          
          
    <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number" name="phone"   style="display: block;
    width: 100%;
    height: auto;
    padding: 15px 19px;
    font-size: 1rem;
    line-height: 1.4;
    color: #475F7B;
    background-color: #FFF;
    border: 1px solid #DFE3E7;
    border-radius: .267rem;
    -webkit-transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; height:46px;">
    
    <input type="hidden" id="xstdcode" placeholder="std code" name="stdcode" class="form-control">
     </div>
     
     
    <div class="form-group">
        <input type="email" class="form-control" name="email" autocomplete="off" placeholder="<?php echo e(__('Email address')); ?>">
        <i class="input-icon field-icon icofont-mail"></i>
        <span class="invalid-feedback error error-email"></span>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="xpassword" name="password" autocomplete="off" placeholder="<?php echo e(__('Password')); ?>">
           <i class="input-icon fa fa-fw fa-eye field_icon toggle-password" style="color:black;"></i>
        <span class="invalid-feedback error error-password"></span>
    </div>

     
     
     <div id="user-input" class="inline" style="border-radius: 8px; height: 62px;">
    <input type="text" id="xcaptchaInput" style="height: 26px; 
    top: -3px;
    position: relative;
    border: 1px solid lightgray;
    
    padding: 22px 10px;"   placeholder="Captcha code" />
    &nbsp;&nbsp;
    
    
<div class="inline"  onclick="xgenerateCaptcha()">
    <i class="fa fa-refresh" id="refreshIcon"></i>
</div>
&nbsp;
&nbsp;
<div id="ximage" class="inline" selectable="false">
</div>
    
</div>
<p id="xkey" ></p>

      
    <?php if(setting_item("user_enable_register_recaptcha")): ?> 
        <div class="form-group">
            <?php echo e(recaptcha_field($captcha_action ?? 'register')); ?>

        </div>
        <div><span class="invalid-feedback error error-g-recaptcha-response"></span></div>
   <?php endif; ?>
    
    <div class="form-group">
        <label for="term">
            <input id="term" type="checkbox" name="term" class="mr5" >
            <?php echo __("I have read and accept the <a href=':link' target='_blank' >Terms and Privacy Policy</a>",['link'=>get_page_url(setting_item('booking_term_conditions'))]); ?>

            <span class="checkmark fcheckbox"></span>
        </label>
        <div><span class="invalid-feedback error error-term"></span></div>
    </div>
    
   
    
    
    <div class="error message-error invalid-feedback"></div>
    <div class="form-group">
        <button type="submit" id="submitButtonsignup" style="background:#FF3500 ;" class="btn disabled btn-primary form-submit">
            <?php echo e(__('Sign Up')); ?>

            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button>
    </div>
    
        <div class="advanced" >
            <p class="text-center f14 c-grey"><?php echo e(__("or continue with")); ?></p>
          <div class="" style="display:flex;">
              
                  <div class="col-md-6 ">
                        <a href="<?php echo e(url('/social-login/facebook')); ?>" style="border-radius:12px;" class="btn btn_login_fb_link"
                           data-channel="facebook">
                            <i class="input-icon fa fa-facebook"></i>
                            <?php echo e(__('Facebook')); ?>

                        </a>
                    </div>
                    
                    &nbsp;
               
                    <div class="col-md-6 ">
                        <a href="<?php echo e(url('social-login/google')); ?>" style="border-radius:12px;" class="btn btn_login_gg_link" data-channel="google">
                            <i class="input-icon fa fa-google"></i>
                            <?php echo e(__('Google')); ?>

                        </a>
                    </div> 
            </div>
           
        </div>
    
    <div class="c-grey f14 text-center mb-3 pt-2">
       <?php echo e(__(" Already have an account?")); ?>

        <a  href="#login" data-toggle="modal" data-target="#login"  style="color:#FF3500;"><?php echo e(__("Log In")); ?></a>
    </div>
</form>

 </div>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script>
          
          $(document).on('click', '.toggle-password', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    
    var input = $("#xpassword");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
            });
      </script>
     
   
   
   <script>
    let xcaptcha;
     
     function xgenerateCaptcha() {
        xcaptcha = document.getElementById("ximage");
        let uniquechar = "";

        const randomchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (let i = 1; i < 5; i++) {
            uniquechar += randomchar.charAt(Math.floor(Math.random() * randomchar.length));
        }

        xcaptcha.innerHTML = uniquechar;

        // Reset visibility of elements when refreshing captcha
        const refreshIcon = document.getElementById("refreshIcon");
        const inputField = document.getElementById("submit");
        const loginButton = document.getElementById("loginButton");

        refreshIcon.style.display = "block"; // Show refresh icon
      
      
    }

  
    xgenerateCaptcha();
    
    
    $('#xcaptchaInput').on('input',function(){
         
        const usr_input = document.getElementById("xcaptchaInput").value;
        const refreshIcon = document.getElementById("refreshIcon");
        const inputField = document.getElementById("xcaptchaInput");
        const image = document.getElementById("ximage");
        const keyElement = document.getElementById("xkey"); 
        const loginButton = document.getElementById("submitButtonsignup");
       

     if (!usr_input || usr_input !== xcaptcha.innerHTML) {
     keyElement.innerHTML = "Captcha Not Matched";
     keyElement.classList.remove("text-success"); 
     keyElement.classList.add("text-danger"); 
     loginButton.addClass = "disabled"; 
     return;
     }
             
       $('#submitButtonsignup').removeClass("disabled");
     
        keyElement.innerHTML = "Captcha Matched";
        keyElement.classList.remove("text-danger"); 
        keyElement.classList.add("text-success");
        refreshIcon.style.display = "none"; 
        inputField.disabled = true; 
        image.style.display = "none"; 

});

</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var $j = jQuery.noConflict();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
<script>
    var $j = jQuery.noConflict(); // Define $j as an alias for jQuery

    $j(document).ready(function() {
       
        var mobileCodeInput = $j("#mobile_code").intlTelInput({
            initialCountry: "ae",
            separateDialCode: true,
        });

     
        var selectedDialCode = mobileCodeInput.intlTelInput("getSelectedCountryData").dialCode;
        $j("#xstdcode").val(selectedDialCode);

        
        mobileCodeInput.on("countrychange", function(e) {
            var newDialCode = e.dialCode;
            $j("#xstdcode").val(newDialCode);
        });
        
        
        
            mobileCodeInput.on("countrychange", function() {
            var selectedCountryData = mobileCodeInput.intlTelInput("getSelectedCountryData");
            var newDialCode = selectedCountryData.dialCode;
            $j("#xstdcode").val(newDialCode);
        });
        
        
    });
</script>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/modules/Layout/auth/register-form.blade.php ENDPATH**/ ?>