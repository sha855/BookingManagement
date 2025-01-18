





<?php
    $review = DB::table('bravo_review')->limit(10)->get();

    $user_review = [];

    foreach ($review as $rr) {
        $user = DB::table('users')->select('first_name', 'last_name', 'images')->where('id', $rr->user_id)->first();
        $rr->user = $user;
        $user_review[] = $rr;
    }
?>

<style>
    .carousel-control-prev-icon {
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3e%3c/svg%3e);
        background-color: black;
    }

    .carousel-control-next-icon {
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3e%3c/svg%3e);
        background-color: black;
    }
</style>


<div class="container mt-5 pt-5 mb-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="card1">
                <img src="images/Frame_1.svg" class="card-img-top" alt="...">
                
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card1">
                <img src="images/Frame_2.png" class="card-img-top" alt="...">
               
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card1">
                <img src="images/Group2608634.svg" class="card-img-top" alt="..." style="height:64px">
                <div class="card-body">
                    <h5 class="card-title pt-3" style="font-weight:900">Best Offer</h5>
                    <p class="card-text">Best Recommendations according to your Interest and offers.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/pro/Desktop/readyForSell/BookingManagement/themes/BC/Tour/Views/frontend/blocks/testimonial/index.blade.php ENDPATH**/ ?>