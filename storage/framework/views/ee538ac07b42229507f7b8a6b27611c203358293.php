<style>
    .popup{
    display: none;
    position: fixed;
    top: 85%;
    width: 75% !important;

    left: 50%;
    transform: translate(-50%, -50%);
    background-color:#FFF5E9;
     /*background-color: rgba(255, 245, 233, 0.7) !important;*/
    /* background-color: rgba(255, 245, 233, 0.1); */
    border: 1px solid #ccc;
    padding: 20px;
   border-radius:10px;
    z-index: 999;
    height: 240px;
    color:black !important;
    
}
button.close-btn {
    height: 21px;
    width: 21px;
  border:none;
  font-size: :14px;
  /*background-color:#FFF5E9;*/
}

.heading-text{
    
color: var(--black, #282828);
leading-trim: both;
text-edge: cap;
font-family: Poppins;
font-size: 36px;
font-style: normal;
font-weight: 600;
line-height: normal;
text-transform: capitalize;
}

.card{
    
    border-radius: 15px !important;
}

.overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4); /* Dark overlay */
        display: none; /* Hide overlay by default */
        z-index: 999;
    }
    
    
 @media screen and (max-width: 1200px) {
  .download{
   border:1px solid green;
  }
}
</style>

 
 
 
  

 <div class="container helloo" >
        <div class="col-md-10 w-100 card-item justify-content-center offset-md-1">
            <div class="row  text-center" style="height: 130px;">
            
                <div class="col-md-3 py-2 border-right ">
                   <a href="<?php echo e(url('explore-staycation')); ?>"  style="text-decoration: none;"><img src="<?php echo e(asset('icon/Vector.svg')); ?>" alt="" style="position: relative;
     top: 16px;">
                    <div class="card-body">
                      <h6 style="color:#FF3500; font-weight:700;position: relative;
    top: 10px;"> Staycations </h6>
                    </div>
                </a>
                </div>



                
                <div class="col-md-3  border-right">
                    <a href="<?php echo e(url('explore-activity')); ?>" style="text-decoration: none;"><img src="<?php echo e(asset('icon/Juggler.svg')); ?>" alt="" srcset=""  style="position: relative;
    top: 26px;">
                    <div class="card-body" 
                    >
                      <a href="<?php echo e(url('explore-activity')); ?>"   style="text-decoration: none;"><h6 style="color:#FF3500; font-weight:700;position: relative;
    top: 17px;">Activities</h6></a>
                    </div></a>
                </div>
         
                <div class="col-md-3 border-right">
                    <a href="<?php echo e(url('deals')); ?>" style="text-decoration: none;"><img src="<?php echo e(asset('icon/Hot deal.svg')); ?>" alt=""  style="position: relative;
    top: 26px;">
                    <div class="card-body">
                       <h6 style="color:#FF3500; font-weight:700;position: relative;
    top: 16px;">Deals</h6>
                    </div>
                  </a>
                </div>
                
                <div class="col-md-3 ">
                    <a href="<?php echo e(url('visa-page')); ?>" style="text-decoration: none;"><img src="<?php echo e(asset('icon/visa.svg')); ?>" alt="" style="position: relative;
    top: 25px;">
                    <div class="card-body">
                       <h6 style="color:#FF3500; font-weight:700; position: relative;
    top: 16px;">Visa </h6>
                    </div>
                  </a>
                </div>
            </div>
        </div>
    </div>
    
    
<?php 
$qr =DB::table('bravo_coupons')->first();

?>
    
     <div class="overlay" id="overlay"></div>
 <div class="popup" id="offerPopup" >
       <div class="row">
           
             
       </div>
  <button class="close-btn" onclick="hidePopup()" style="float: right;
    font-size: 35px !important;
    background: rgba(255, 245, 233, 0.7) !important;
    position: relative;
    top: -21px;">&times;</button>
   
  <div class="row">
  
    <div class="col-lg-8  mx-auto border-green" >
      <div class="cardbox mb-3">

        <div class="row g-0">
        
          <div class="col-md-3">
          <img src="<?php echo e(asset('images/home-screen(Approved).svg')); ?>"  alt="..." style="position: relative;
            top: -119px;
        height:330px ;
        left: -58px;">
          </div>
          <div class="col-md-9  pt-2 ">
          <div class="card-body " >
                <h6 class="text-end download"  style="
    margin-top: -49px;left: 280px;
    position: relative;font-weight:600">Download App</h6> 
    
            <h6 class="card-title" style="font-weight:800; font-size:23px;position: relative;left:10px;"><?php echo e($qr->name); ?></h6>
            <p class="card-text mt-2" style=" font-size:17px; position: relative;left:10px;" >
           Use the code <?php echo e($qr->code); ?>  to avail the discount
            </p>
          </div>
          </div>
        </div>
        </div>
     

    </div>

<div class="col-md-2 text-center mb-2 py-2">
  

<p class="card-text pt-1" style="font-weight: 700;
    font-size: 15px;
    position: relative;
    left: 6px;
   ">IOS</p>
        <img src="<?php echo e(asset('images/image_8.svg')); ?>" style="height: 75px;">
         <p class="pt-2  mb-3" ><img src="<?php echo e(asset('images/playstore.png')); ?>"></p>
        </div>
     
   
    <div class="col-md-2 text-center mb-2 py-2">
      <p class="card-text  pt-1" style="font-weight: 700;
    font-size: 15px;
    text-align: center !important;
    
    position: relative;
    left: 6px;
   ">Android</p>
        <img src="<?php echo e(asset('images/image_8.svg')); ?>" style="height: 75px;">
         <p class="pt-2 mb-3"><img src="<?php echo e(asset('images/app-store.png')); ?>"></p>
              
    </div>
</div>
    
    
  </div>
  
   <script>
    function hidePopup() {
        const overlay = document.getElementById("overlay");
        const popup = document.getElementById("offerPopup");
        overlay.style.display = "none";
        popup.style.display = "none";
    }

    function showPopup() {
        const overlay = document.getElementById("overlay");
        const popup = document.getElementById("offerPopup");
        overlay.style.display = "block";
        popup.style.display = "block";
        setTimeout(hidePopup, 15000); // Hide the popup after 5 seconds
    }

    document.addEventListener("DOMContentLoaded", function() {
        const overlay = document.getElementById("overlay");
        const popup = document.getElementById("offerPopup");

        showPopup(); // Initial display
    });
</script>
   <?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/themes/BC/Flight/Views/frontend/layouts/search/form-search.blade.php ENDPATH**/ ?>