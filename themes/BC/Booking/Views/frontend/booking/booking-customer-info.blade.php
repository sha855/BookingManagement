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
                        @if($usersdetail->first_name)
                        <div class="val">{{$usersdetail->first_name}}</div>
                        @endif
                    </li>
                    <li class="info-last-name">
                        <div class="label">{{__('Last name')}}</div>
                        @if($usersdetail->last_name)
                        <div class="val">{{$usersdetail->last_name}}</div>
                        @endif
                    </li>
                    <li class="info-email">
                        <div class="label">{{__('Email')}}</div>
                        @if($usersdetail->email)
                        <div class="val">{{$usersdetail->email}}</div>
                        @endif
                    </li>
                    <li class="info-phone">
                        <div class="label">{{__('Phone')}}</div>
                        @if($usersdetail->phone)
                        <div class="val">{{$usersdetail->phone}}</div>
                        @endif
                    </li>
                    <li class="info-address">
                        <div class="label">{{__('STD Code')}}</div>
                        
                          @if($booking->std_code)
                        
                         <div class="val">{{$booking->std_code}}</div>
                         
                         @else
                        
                         <div class="val">{{$usersdetail->stdcode}}</div>
                         
                         @endif
                        
                        
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
</div>
