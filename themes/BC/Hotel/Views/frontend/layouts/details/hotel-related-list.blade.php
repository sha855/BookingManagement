 
 
 
 
  <style>
 .text-item{
 color:#FF3500;
 font-size:19px; 
 }
 .text-item2{
text-decoration: line-through;
 }
 .inbtn{
    border-radius: 17px;
    width: 25px;
    border: 1px solid #FF3500;
 }
 .card-btn{
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color:white;
 
 }
 .btn-text{
    color:#FF3500;   
 }
#packagesForm{
    background: #eeeeee4a;
    width: 100% !important;
    border-radius: 16px;
    padding: 10px !important;
    position: relative;
    left: 32% !important;
</style>

{{-- @if(count($hotel_related) > 0) --}}



{{-- {{ dd ($hotel_related) }} --}}
    {{-- <div class="bravo-list-hotel-related-widget">
        <h3 class="heading">{{__("Related Hotel")}}</h3>
        <div class="list-item">
            @foreach($hotel_related as $k=>$item)
                @php
                    $translation_item = $item->translate();
                @endphp
                <div class="item">
                    <div class="media">
                        <div class="media-left">
                            <a href="{{$item->getDetailUrl(false)}}">
                                @if($item->image_url)
                                    @if(!empty($disable_lazyload))
                                        <img src="{{$item->image_url}}" class="img-responsive" alt="{{$translation_item->title}}">
                                    @else
                                        {!! get_image_tag($item->image_id,'thumb',['class'=>'img-responsive','alt'=>$translation_item->title]) !!}
                                    @endif
                                @endif
                            </a>
                        </div>
                        <div class="media-body">
                            @if($item->star_rate)
                                <div class="star-rate">
                                    @for ($star = 1 ;$star <= $item->star_rate ; $star++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                            @endif
                            <h4 class="media-heading">
                                <a href="{{$item->getDetailUrl(false)}}">
                                    {{$translation_item->title}}
                                </a>
                            </h4>
                            <div class="price-wrapper">
                                {{__("from")}}
                                <span class="price">{{ $item->display_price }}</span>
                                <span class="unit">{{__("/night")}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    {{--  --}}

    {{-- @endif --}}
   

   <?php

    $cc = request()->slug;

    $hotel = DB::table('bravo_hotels')->where('slug',$cc)->first();

    $room = DB::table('bravo_hotel_rooms')
    ->where('parent_id', $hotel->id)
    ->where('deleted_at', null)
    ->orderBy('price', 'asc') 
    ->get();
 
   ?>
   
 

  <form id ="packagesForm" class="mt-3">
    @csrf
               
<div class="bravo-list-hotel-related-widget">
        <h5  style="margin-top:-23px;">Packages</h5>
        @if(count($room) > 0)
        @foreach($room as $rooms)
            <div class="card mb-3">
                <div class="card-body">

                     <input type="hidden"    name="package_name[]" value="{{$rooms->title}}">

                    <input type="hidden"  name = "product_id[]" value="{{$hotel->id}}">

                    <input type ="hidden"  id="packagesId" name ="id[]" value="{{$rooms->id}}">

                    <input type ="hidden"  id = "parentnameofpackages" name ="type[]" value="event">

                    <input type ="hidden"  id = "xparentnameofpackages" name ="price[]" value="{{ number_format($rooms->price - $rooms->discount_price, 2) }}">

                    <p class="card-title">{{ $rooms->title }}</p>
                    <p class="card-text">
                        
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
    $exactprice =$rooms->price - $rooms->discount_price;
    $rooms->price /= $exchangeRate;
    $exactprice /= $exchangeRate;
    $decimalPlaces = 0;
    $formattedPrice = number_format( $exactprice, $decimalPlaces);
?>
  <span class="text-item2">{{ str_replace(',', '', number_format($rooms->price, 0)) }} USD</span>
<span class="text-black" style="font-size: 24px;
    color: #ff3500 !important;">{{ $formattedPrice }}</span>
<small>{{ $targetCurrency }}</small>

<input type ="text" style="display:none;" id = "xparentnameofpackages" name ="price[]" value="{{ $formattedPrice}}"> 

<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>
 <span class="text-item2">{{ str_replace(',', '', number_format($rooms->price, 0)) }} AED</span>
<input type ="text" style="display:none;" id = "xparentnameofpackages" name ="price[]" value="{{ number_format($rooms->price - $rooms->discount_price, 0) }}"> 


  <span class="text-black" style="font-size: 24px;
    color: #ff3500 !important;">{{str_replace(',', '', number_format($rooms->price - $rooms->discount_price, 0)) }}</span>
    
    
<small>{{ strtoupper($mainCurrency->val) }}</small>

<?php
}
?>
                       
                    </p>
                    <p>
                     
                    </p>

    <?php 
      
      if(auth()->check())
      {
       $user_id = auth()->user()->id;

      }else{

        $user_id = null;
      }
     
    ?>

       @if($user_id == null)

        <button type="button" class="btn btn-light w-100 card-btn mb-3" data-toggle="modal" data-target="#login">Select</button> 
          @else

   <a href="{{url('/staycation_booking_details/'.$rooms->id)}}" class=" btn btn-light w-100 card-btn mb-3">Select</a>

          @endif
      </div>
            </div>
        @endforeach


         </form>
       
    @else
        <p>No data found.</p>
    @endif
    
       
       
    </div>
    




<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
// $(document).ready(function() {
   
//     $("#cartSubmitButton").click(function(e) {
//         e.preventDefault(); 

//         $.ajax({
//             type: "POST", 
//             url: "/adding-to-cart", 
//             data: $("#packagesForm").serialize(), 
//             success: function(response) {
                

//                 if(response.status == true)
//                 {

//                   window.location.href ="/staycation_booking_details"

//                 }else if(response.status == false)
//                 {

//                     Swal.fire(
//   'No Quantity?',
//   'Please select at least one package qunatity',
//   'question'
// )

//                 }else{

//                     alert("Please sign In first for adding to cart");


//                 }

               
//             },
//             error: function(xhr, status, error) {
                
//                 console.error("Error submitting the form:", error);
//             }
//         });
//     });
// });
</script>
   


<script>
    $(function() {
	$('[data-decrease]').click(decrease);
	$('[data-increase]').click(increase);
	$('[data-value]').change(valueChange);
});

function decrease() {
  var value = $(this).parent().find('[data-value]');
  var currentValue = parseInt(value.val());

  if (currentValue > 1) {
    currentValue--;
  } else {
    currentValue = 0;
  }

  value.val(currentValue);
}

function increase() {
	var value = $(this).parent().find('[data-value]').val();
	if(value < 100) {
		value++;
		$(this).parent().find('[data-value]').val(value);
	}
}

function valueChange() {
	var value = $(this).val();
	if(value == undefined || isNaN(value) == true || value <= 0) {
		$(this).val(0);
	} else if(value >= 101) {
		$(this).val(100);
	}
}
</script>