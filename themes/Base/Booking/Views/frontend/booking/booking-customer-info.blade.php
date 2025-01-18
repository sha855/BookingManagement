
<?php


$usersdetail = DB::table('users')->where('id', $booking->customer_id)->first();

?>


<div class="booking-review">
    <h4 class="booking-review-title">{{__('Your Information')}}</h4>
    <div class="booking-review-content">
        <div class="review-section">
            <div class="info-form">
                <ul>
                    <li class="info-first-name">
                        <div class="label">{{__('First name')}}</div>
                        <div class="val">{{$usersdetail->first_name}}</div>
                    </li>
                    <li class="info-last-name">
                        <div class="label">{{__('Last name')}}</div>
                        <div class="val">{{$usersdetail->last_name}}</div>
                    </li>
                    <li class="info-email">
                        <div class="label">{{__('Email')}}</div>
                        <div class="val">{{$usersdetail->email}}</div>
                    </li>
                    <li class="info-phone">
                        <div class="label">{{__('Phone')}}</div>
                        <div class="val">{{$usersdetail->phone}}</div>
                    </li>
                    <li class="info-address">
                        <div class="label">{{__('Address line 1')}}</div>
                        <div class="val">{{$usersdetail->std_code}}</div>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
</div>
