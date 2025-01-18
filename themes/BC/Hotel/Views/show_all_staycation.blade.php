 
@extends('layouts.app')
<style>

     .fass {
     position: absolute;
    top: 12px;
    right: 10px;
    color: black;
    text-shadow: 1px 1px 27px black;
    left: 86% !important;
    height: 30px;
    width: 30px;
    background: white;
    padding: 9px 8px !important;
    border-radius: 30px;
    z-index: 2;
    font-size: 10px;
    font-size: 15px !important;
         
}
.Daily-btn{
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
color:white;
padding: 4px 4px;
font-size:10px;
border-radius:4px;
}
.red-heart{
    color:red;
}
</style>
@section('content')

<div class="container">
     <h3 class="pt-5" style="margin-left:15px; font-weight:700;">Search Result</h3>
   
        <div class="row mt-3" style="width: 100%;">
    @foreach ($hotelDatas as $hoteldatas)
    
        @php
            $hotel = $hoteldatas['hotel'];
            $banner_image_path = $hoteldatas['banner_image_path'];
        @endphp
        <div class="col-md-3 mb-3">
            <div class="card mb-3 h-100" style="border-radius: 10px; position: relative; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                <div class="Daily-Deals1" style="position: relative;">
                    <a href="#">
                        <img src="{{ asset($banner_image_path) }}" style="height: 200px; width: 100%; border-radius: 10px;">
                    </a
                    <input type="text" class="objectidgetclass{{ $hotel->id }}" style="display: none;" name="object_id" value="{{ $hotel->id }}">
                    <input type="text" class="objectmodalgetclass{{ $hotel->id }}" style="display: none;" name="object_model" value="hotel">
                    <span class="fa fa-heart-o fa-3x fass newhotelheartstatus{{ $hotel->id }} hotelwishlistaddingheart {{ $hotel->wishlist ? 'class' : '' }}" attr="{{ $hotel->id }}"></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $hotel->title }}</h5>
                    <p class="card-text">
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $hotel->address }}</span>
                    </p>
                    <p>
                        @if(isset($hotel->review_score))
                        <span class="Daily-btn">{{ $hotel->review_score }} <i class="fa fa-star"></i></span>
                        @endif
                        @if(isset($hotel->star_rate))
                        {{ $hotel->star_rate }}
                        <span> Excellent </span>
                        @endif
                    </p>
                    <p style="margin-top: -27px;">
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
                            $hotel->price /= $exchangeRate;
                            $decimalPlaces = 2;
                            $formattedPrice = number_format($hotel->price, $decimalPlaces);
                        ?>
                        <p style="position: relative; top: 36px;">
                            <span style="font-size: 24px; font-weight: 500; position: relative;">{{ intval($hotel->price - ($hotel->price * ($hotel->discount_percent / 100))) }}</span>
                            <span style="font-size: 24px;">{{ strtoupper($targetCurrency) }}</span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative; top: 24px;">{{ intval($hotel->price) }}</span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative; top: 24px;">{{ strtoupper($targetCurrency) }}</span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px; border-radius: 4px !important; position: relative; top: 24px;">{{ $hotel->discount_percent }} %</button>
                        <?php
                        } else {
                            $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
                        ?>
                        <p style="position: relative; top: 36px;">
                            <span style="font-size: 24px; font-weight: 500;">{{ intval($hotel->price - ($hotel->price * ($hotel->discount_percent / 100))) }}</span>
                            <span style="font-size: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
                        </p>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative; top: 24px;">{{ intval($hotel->price) }}</span>
                        <span style="font-size: 15px; color: black; font-weight: 700; text-decoration: line-through; position: relative; top: 24px;">{{ strtoupper($mainCurrency->val) }}</span>
                        <button class="Daily-btn btn btn-light" style="padding: 4px 5px; border-radius: 4px !important; position: relative; top: 24px; color:white; font-size: 11px;">{{ $hotel->discount_percent }} %</button>
                        <?php
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
    

     
</div>


<script>
$(document).ready(function() {
    var $heartIcons = $('.hotelwishlistaddingheart'); 
    
  
    function setHeartStatus() {
        $heartIcons.each(function() {
            var object_id = $(this).attr('attr');
            var savedStatus = localStorage.getItem('wishlist_' + object_id);
            var $heartIcon = $('.newhotelheartstatus' + object_id);
            
            if (savedStatus === 'active') {
                $heartIcon.removeClass('fa-heart-o').addClass('fa-heart red-heart');
            } else {
                $heartIcon.removeClass('red-heart').addClass('fa-heart-o');
            }
        });
    }
    
    setHeartStatus();
    
   
    $heartIcons.click(function() {
        var object_id = $(this).attr('attr');
        var object_model = 'hotel';
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var $heartIcon = $('.newhotelheartstatus' + object_id);
        
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
                    swal.fire("Wishlist Added successfully");
                    $heartIcon.removeClass('fa-heart-o').addClass('fa-heart red-heart');
                    localStorage.setItem('wishlist_' + object_id, 'active'); 
                } else if (response.class === "inactive") {
                    swal.fire("Item removed from wishlist");
                    $heartIcon.removeClass('red-heart').addClass('fa-heart-o');
                    localStorage.setItem('wishlist_' + object_id, 'inactive'); 
                } else {
                    alert("Unexpected response status: " + response.class);
                }
            },
            error: function(xhr, status, error) {
                $('#login').modal('show');
            }
        });
    });
});
</script>
@endsection


