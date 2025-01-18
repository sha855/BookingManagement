@extends('Email::layout')
@section('content')

<style>
    
    .col-md-8 .offset-md-2 .mt-5 .border .mb-4{
        
    background: #b5afaf0 !important;
    padding: 12px !important;
    border-radius: 12px !important;
        
    }
</style>

    <div class="b-container" style="left:10px;position:relative;">
        <div class="b-panel">
            @switch($to)
                @case ('admin')
                    <h3 class="email-headline"><strong>{{__('Hello Administrator')}}</strong></h3>
                    <p>{{__('New booking has been made')}}</p>
                @break
                @case ('vendor')
                    <h3 class="email-headline"><strong>{{__('Hello :name',['name'=>$booking->vendor->nameOrEmail ?? ''])}}</strong></h3>
                    <p>{{__('Your service has new booking')}}</p>
                @break

                @case ('customer')
                    <h3 class="email-headline"><strong>{{__('Hello :name',['name'=>$booking->first_name ?? ''])}}</strong></h3>
                    <p>{{__('Thank you for booking with us. Here are your booking information:')}}</p>
                @break

            @endswitch

            @include($service->email_new_booking_file ?? '')
        </div>
       {{--  @include('Booking::emails.parts.panel-customer') --}}
        @include('Booking::emails.parts.panel-passengers')
    <br></br>
@endsection
