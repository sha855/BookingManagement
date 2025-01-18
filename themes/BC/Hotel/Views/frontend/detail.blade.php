 <style>
 .red-heart{
     color:red !important;
 }
    .Daily-btn{
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
   color:white;
padding: 3px 6px;
}
.fass {
 top: 10px;
                  right: 10px;
                  color: black;
                  text-shadow: 1px 1px 27px black;
                  left: 292px;
                  height: 30px;
                  width: 30px;
                  background: white;
                  padding: 6px 6px;
                  border-radius:30px;">
}

@media screen and (min-width: 1400px) {  
  .fass{
   position: absolute;
   top: 10px;
   right: 10px;
   color: black;
   text-shadow: 1px 1px 27px black;
   left: 352px !important;
   height: 30px;
   width: 30px;
   background: white;
   padding: 6px 6px;
   border-radius: 30px; 
   } 
   }
 </style>


@extends('layouts.app')
@push('css')
    <link href="{{ asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endpush
@section('content')
    <div class="bravo_detail_hotel">
        @include('Layout::parts.bc')
        @include('Hotel::frontend.layouts.details.hotel-banner')
        <div class="bravo_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        @php $review_score = $row->review_data @endphp
                        @include('Hotel::frontend.layouts.details.hotel-detail')
                        @include('Hotel::frontend.layouts.details.hotel-review')
                    </div>
                    <div class="col-md-12 col-lg-3">
                        @include('Tour::frontend.layouts.details.vendor')
                        @include('Hotel::frontend.layouts.details.hotel-form-enquiry')
                        @include('Hotel::frontend.layouts.details.hotel-related-list')
                        <div class="g-all-attribute is_pc">
                            @include('Hotel::frontend.layouts.details.hotel-attributes')
                        </div>
                    </div>
                </div>
               
        
                    

                  
                     
                        <div class="row" style="margin-left:12px;">
                           <h4 class="title mb-4" style="margin-top: 43px; font-weight:600">Recently Viewed Deals<a href="{{ url('staycation') }}"><span style="float:right; color:#FF3500; font-size:15px;">View All</span></a></h4>
                        </div>
                        <div class="row" style="margin-left:12px;">
                         
                            @foreach ($datas as $hotel)
                           <div class="col-md-4">
                              <div class="card mb-3" style="border-radius: 10px;  position: relative; height:93%;">
                                 <div class="Daily-Deals1" style="position: relative;">
                                    <img src="{{ asset($hotel->bannerImage) }}" style="height:200px; width:100%; border-radius: 10px;">
                                   
                                    <span class="fa fa-heart-o fa-3x fass newhotelheartstatus{{ $hotel->id }} hotelwishlistaddingheart {{ $hotel->wishlist ? 'red-heart' : '' }}" attr="{{ $hotel->id }}" style="top: 14px; position: absolute;right: 10px;font-size: 17px;padding: 8px 8px;margin-left: 11px;border-radius: 30px;"></span>
                                 </div>
                                 <div class="card-body">
                                    <h5 class="card-title">{{ $hotel->title}}</h5>
                                      @if($hotel->address)
                                      <p class="card-text mb-2" style="margin-top: -4px;">
                                       <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{  $hotel->address}} </span>
                                      </p>
                                    @else
                                     <span style="display:none;"></span>
                                         @endif
                                    
                                    <p style="  margin-top: -3px;">
                                        
                                        @if($hotel->review_score)
                                       <span class="btn btn-light Daily-btn "  style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
                                       color:white;
                                  padding: 3px 6px;
    font-size: 10px;
    border-radius: 6px;"> {{  $hotel->review_score}} <i class="fa fa-star"></i></span>
    @else
    
    <span style="display:none;"></span>
    @endif
                                     
                                    </p>
                                    <p style="position: relative;
    top: 21px;">
                                       <span style="font-size:25px; color:black;font-weight: 600;">{{  intval($hotel->price)}}</span>
                                       <span style="font-size:25px;"> AED </span>
                                       <span class="btn btn-light Daily-btn" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
                                       color:white;
                                   padding: 3px 6px;
    font-size: 10px;
    border-radius: 6px; 
    margin-top: -9px;
">{{  $hotel->discount_percent}} % OFF</span>
                                    </p>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     
                    </div>
                  
        </div>
        @include('Hotel::frontend.layouts.details.hotel-form-enquiry-mobile')
    </div>
@endsection

@push('js')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {
                            iconUrl:"{{get_file_url(setting_item("hotel_icon_marker_map"),'full') ?? url('images/icons/png/pin.png') }}"
                        }
                    });
                }
            });
            @endif
        })
    </script>
    <script>
        var bravo_booking_data = {!! json_encode($booking_data) !!}
        var bravo_booking_i18n = {
			no_date_select:'{{__('Please select Start and End date')}}',
            no_guest_select:'{{__('Please select at least one guest')}}',
            load_dates_url:'{{route('space.vendor.availability.loadDates')}}',
            name_required:'{{ __("Name is Required") }}',
            email_required:'{{ __("Email is Required") }}',
        };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/hotel/js/single-hotel.js?_ver='.config('app.asset_version')) }}"></script>



<script>
$(document).ready(function() {
    var $heartIcons = $('.hotelwishlistaddingheart'); // Select all heart icons
    
    // Function to set the red-heart class based on the local storage
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
    
    // Set initial heart status on page load
    setHeartStatus();
    
    // Handle heart icon click
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
                    $heartIcon.removeClass('fa-heart-o').addClass('fa-heart red-heart');
                    localStorage.setItem('wishlist_' + object_id, 'active'); // Save status in local storage
                } else if (response.class === "inactive") {
                    $heartIcon.removeClass('red-heart').addClass('fa-heart-o');
                    localStorage.setItem('wishlist_' + object_id, 'inactive'); // Save status in local storage
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
@endpush
