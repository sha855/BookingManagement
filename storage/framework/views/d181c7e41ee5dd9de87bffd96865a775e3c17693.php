  <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css" rel="stylesheet" />
<!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">-->
<style>
    
    .form-control:focus {
    color: #475F7B;
    background-color: #FFF;
    border-color: #5A8DEE;
    outline: 0;
    box-shadow: 0 3px 8px 0 rgb(0 0 0 / 10%);
}
.intl-tel-input,
.iti{
  width: 100%;
}
</style>

<div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content relative">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('')); ?></h4>
                <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa" onclick="hideModal()">
                        <img src="<?php echo e(url('images/ico_close.svg')); ?>" alt="close" style="height:17px;">
                    </i>
                </span>
            </div>
            <div class="modal-body relative">

                <h2 style="width: fit-content;
                margin: auto;">
                    <img src="<?php echo e(asset('uploads/0000/1/2023/05/11/logo.png')); ?>" style="height: 90px">
                     <p class="pt-3 text-center" style="font-size: 20px;">Login or Sign up</p>
                </h2>
                <?php echo $__env->make('Layout::auth/login-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>



<div class="modal fade login" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content relative">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('')); ?></h4>
                <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                        <img src="<?php echo e(url('images/ico_close.svg')); ?>" alt="close" style="height:17px;">
                    </i>
                </span>
            </div>
            <div class="modal-body">
                <h2 style="width: fit-content;
                margin: auto;">
                    <img src="<?php echo e(asset('uploads/0000/1/2023/05/11/logo.png')); ?>" style="height: 90px">
                     <p class="pt-3 text-center" style="font-size: 20px;">Login or Sign up</p>
                </h2>
             
             
    









<?php /**PATH /Users/pro/Desktop/readyForSell/BookingManagement/modules/Layout/parts/login-register-modal.blade.php ENDPATH**/ ?>