@extends('layouts.app')

@push('css')
    <link href="{{ asset('dist/frontend/module/event/css/event.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/ion_rangeslider/css/ion.rangeSlider.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
       
        .totl {
            background: #FFF3E3;
        }
        .fa-trash {
            color: #FF3500;
        }
        .price {
            float: right;
            color: #FF3500;
        }
        .fa-calendar{
            
             color: #FF3500;
        }
        .fa-users{
            color: #FF3500;
            
        }
        .text {
            color: black;
            font-size: 12px;
        }

        .input-container {
    display: flex;
    align-items: center;
  }

  .input-container img {
    width: 15px;
    height: 15px;
    margin-right: 10px;
    position: relative;
    left:10px;
  }

  .input-container input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  #calendar {
    max-width: 384px;
    height: 300px;
    margin: 0 auto;
  }

  .fc-toolbar h2 {
    font-size: 0.999em;
    margin: 0;
}

  .fc-dayGridMonth-view .fc-day-grid {
    width: 100%; /* Adjust the grid cell width */
  }

  .fc-dayGridMonth-view .fc-day-grid .fc-day {
    width: 25px; /* Adjust the grid cell size */
    height: 25px; /* Adjust the grid cell size */
  }
  
  .fc-title{

    background: #FF3500 !Important;
    border: none !important;
  }
   .fc-event, .fc-event-dot {
      background: #FF3500 !Important;
    border: none !important;
      }
   
    .fc-dayGrid {
    border: none;
  }

    #calendar {
       border-radius: 10px;
    }

.fc-day:hover {
    background-color: #f0f0f0;
    cursor: pointer;
    border-radius:12px;
  }

  .fc-dayGridMonth-view .fc-day-grid .fc-day {
    width: 25px;
    height: 25px;
    border: none;
}
.img_media{
  padding:20px;
 
      padding: 12px;
      border-radius: 33px !important;
    width: 100%;
    height: 227px;
  
   
}
.custom-select {
    position: relative;
    display: inline-block;
  }

  .custom-select select {
    display: none;
  }

  .custom-select .select-text {
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 6px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .custom-select .select-text img {
    max-width: 24px;
    max-height: 24px;
    margin-right: 8px;
  }

  .custom-select select option {
    background: white;
  }
  
  .ui-datepicker {
    bottom: auto !important;
    top: 100% !important;
    z-index:99999 !important;
}
.datepicker{
    
    z-index:99999 !important;
}
    </style>


@endpush

@section('content')
<div class="container mt-3 pt-5">
    
</div>
<div class="container mt-3 card" style="width: 85%;">
      
      
    <form method= "post" action= "{{url('booking')}}">
        @csrf
     
@if($groupedData->isEmpty())
       <br>
    <center><h3 style="color:red;">No Activity in Cart</h3></center> 
       <br>
@else
    
    
    @php
$totalAmount = 0;
$ztotalAmount = 0;

$discounting =[];
$totalallget =[];
@endphp
    
    @foreach ($groupedData->groupBy('product_id') as $product_id => $productData)
    
    <?php 
    
     $parentTitle =    DB::table('bravo_events')->where('id',$product_id)->first();
     
     $imagefie = DB::table('media_files')->where('id',$parentTitle->banner_image_id)->first();
    
    ?>

    <div class="card mb-3  totl mt-3" style="border:none;">
        <div class="row">
            
            @if($imagefie)
            
             <div class="col-md-4 mb-3 ">
              <img src="{{ asset('uploads/' . $imagefie->file_path) }}" class="img-fluid img_media">
             </div>
             
            @else
          
            <div class="col-md-4 mb-3 ">
                <img src="https://roamiodeals.techdocklabs.com/uploads/0000/1/2023/05/19/landscape-nature-tahiti-sunset-wallpaper-preview.jpeg" class="img-fluid img_media">
            </div>
            
            @endif
            
         
            
            
                 <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">
                        <span style="font-size: 24px;
                        font-weight: 700;">{{$parentTitle->title}}</span>
                       <a href="{{url('deleteCart/'.$product_id)}}"> <span class="text-end" style="float:right;"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                    </h5>
                    <p class="card-text" style="font-size: 15px;
                    font-weight: 500;"><i class="fa fa-calendar" aria-hidden="true"></i>  <span>
                        <input type="text" placeholder="choose date " name="activityDAte[]" class="form-control cartdatepicker" style="width: 208px;
                       margin-left: 23px;
                       margin-top: -27px;
                       border-radius: 12px;
                       height: 35px;" required>
          
                    </span></p>
                        
                         @php
                         
                          $productTotalAmount = 0;
                          
                           $persons = [];   
    
                           $price = [];
    
                           $quatitytoatl= [];
                           
                           
                         
                         @endphp
                        
                         @foreach ($productData as $item)
                         
                          @php
                          $discountxx = DB::table('activity_packages')->select('discount_price')->where('id', $item['package_id'])->first();
                         
                          @endphp
                         
                          <p class="card-text mt-3"><small><i class="fa fa-users" aria-hidden="true"></i>    <span style="font-size: 15px;
                          font-weight: 500;">{{ $item['room_qty'] }}  x {{ $item['package_name'] }}</span></small></p>
                          
                        <?php
                        
                          $itemTotal = $item['room_price'] * $item['room_qty'];
                          $productTotalAmount += $itemTotal;
                        
                        ?>
                        
                        
                              <?php
    
    $persons[] =    $item['package_name'];
    
    $price[] =      $productTotalAmount;
    
    $quatitytoatl[] = $item['room_qty'];
    
                  ?>
                        
    
                        @endforeach
                        
          <?php     
    $data = [
    'persons' => $persons,
    'price' => $price,
    'quantityTotal' => $quatitytoatl
    ];
  
 $travellerdata = json_encode($data);
         
         ?>      
         
         
         
          <input type="hidden" name="travellers[]" value="{{$travellerdata}}">
         
          <input type="hidden" name="object_id[]" value="{{$parentTitle->id}}">
         
          <input type="hidden" name="object_modal[]" value="event">
         
          <input type="hidden" name="object_name[]" value="{{$parentTitle->title}}">
         
         
         
                       
  @php
  
 $totalallget[] = $productTotalAmount;
     
 $actualPrice = $productTotalAmount;
 
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
$price =session('formattedTotalPrice');
if ($exchangeRate) {
    $actualPrice /= $exchangeRate;
    $decimalPlaces = 0;
    $formattedPrice = number_format($actualPrice, $decimalPlaces);
@endphp
       
       
       
            <h5 class="card-text price  pricex{{$product_id}}" style="position: relative;
           top: 30px;">{{ str_replace(',', '',$formattedPrice)}} <span class="text" style="font-size:15px; font-weight:600;"> 
           
           
           <input type="hidden" name="price[]" value="{{ str_replace(',', '',$formattedPrice)}}">
           
           <input type="hidden" name="currency[]" value="{{$targetCurrency}}">
              
              @if($targetCurrency)
            
              {{$targetCurrency}} 
             
              @else
             
              AED
             
              @endif
             </span></h5>
    
             
            

@php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
    
  @endphp

              <input type="hidden" name="price[]" value="{{ $actualPrice}}">
           
              <input type="hidden" name="currency[]" value="{{__('AED')}}">
           
           
              
    <h5 class="card-text price  pricex{{$product_id}}" style="position: relative;
    top: 30px;">{{$actualPrice}}<span class="text" style="font-size:15px; font-weight:600;">  @if($targetCurrency)
            
              {{$targetCurrency}} 
             
              @else
             
              AED
             
              @endif
             </span></h5>
    
    @php
   }
   @endphp
    
                </div>
            </div>
        </div>
        
    </div>
 
    
  @endforeach
  
  
  
  
 <?php
 
 
 $totalarray = array_sum($totalallget);
 
 ?>

  @php
    $grandTotalPrice = 0;
@endphp

@foreach ($groupedData->groupBy('product_id') as $product_id => $productData)
    @php
        $productTotalAmount = 0;
    @endphp

    @foreach ($productData as $key => $item)
        @php
            $discountPriceArray = DB::table('activity_packages')->select('discount_price')->whereIn('id', [$item['package_id']])->get();
            $discountPrice = $discountPriceArray->pluck('discount_price')->first() ?? 0;
            $itemTotalDiscount = $item['room_qty'] * $discountPrice;
            $productTotalAmount += $itemTotalDiscount;
        @endphp

       {{--  <p class="card-text mt-3"><small><i class="fa fa-users" aria-hidden="true"></i>
            <span style="font-size: 15px; font-weight: 500;">{{ $item['room_qty'] }} * {{ $discountPrice }}</span>
            @if ($discountPrice > 0)
                Discount Price: {{ $itemTotalDiscount }}
            @endif
        </small></p> --}}
    @endforeach

    @php
        $grandTotalPrice += $productTotalAmount;
    @endphp
@endforeach

{{-- <p>Grand Total Discounted Amount: {{ $grandTotalPrice }}</p> --}}

    <div class="card mb-3  mb-3"style="border:none; border-radius:10px;">
      <div class="row d-flex justify-content-center">
          <div class="col-md-5">
              


            <div class="form p-3">
              <div class="input-container" style="border: 1px solid #dae1e7; border-radius:10px; width: 94%; margin-top: -20px;">
                <img src="{{asset(url('images/Group.png'))}}" alt="Image">
                <input type="text" placeholder="promo code" style="border: 1px solid white;" id ="promoInput">
                <button type="button" id ="applyButton" style="color:#FF3500;border:none;background:transparent;position: relative;
                  left: 143px;">Apply</button>
                </div>
                <span id="promocodestatus"></span>
            </div>
         </div>
          
        <div class="col-md-7 ">
              <div class="card-body totl" style="border-radius: 10px;">
                <div class="row">
                  <div class="col-md-6">
                      <p class="text-start">VAT</p>
                    <p class="text-start">Total</p>
                       <p class="text-start">Promo Code</p>
                    <p class="text-start">Total Saving</p>
                    </div>
                  <div class="col-md-6">
                      
                      
                        <p class="text-end" id="vatprice">
                
                
            <?php
          
 
            $percent5Value =   $totalarray  * 0.05;
                
                if ($exchangeRate) {
                    
              $percent5Value /= $exchangeRate;
              
                   }
                   
              echo $targetCurrency ." ";      echo number_format($percent5Value,0); 
                  
                 ?>
                 
                 
             </p>
             
             
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
$price =session('formattedTotalPrice');
if ($exchangeRate) {
    $totalarray /= $exchangeRate;
    $decimalPlaces = 0;
    $xformattedPrice = number_format($totalarray, $decimalPlaces);
?>
       
       
       <p class="text-end" >@if($targetCurrency)
            
              {{$targetCurrency}} 
             
              @else
             
              AED
             
              @endif {{ number_format($xformattedPrice,0) }} </p>
       
<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>

 <p class="text-end" >AED {{ number_format($totalarray-$percent5Value,0) }} </p>
             
              
<?php
}
?>
                    
         <p class="text-end promocode" style="color:#FF3500">00</p>
                   
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
$price =session('formattedTotalPrice');
if ($exchangeRate) {
    
    $data = $grandTotalPrice;
    
    $data /= $exchangeRate;
    $decimalPlaces = 0;
    $ddformattedPrice = number_format($data, $decimalPlaces);
?>
       
       
      <p class="text-end " id="totalsaving" style="color:#FF3500">USD {{$ddformattedPrice}} </p>
             
<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>

<p class="text-end " id="totalsaving" style="color:#FF3500">AED {{$grandTotalPrice}} </p>
             
              
<?php
}
?>
             
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <p class="text-start" style="font-size:19px; font-weight:600;">Grand Total</p>
                  </div>
                  <div class="col-md-6">
                      
                      
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
$price =session('formattedTotalPrice');
if ($exchangeRate) {
    
    $Priceusd = $totalarray;
    $Priceusd /= $exchangeRate;
    $decimalPlaces = 0;
    $xformattedPrice = number_format($Priceusd, $decimalPlaces);
?>  

 
         <input type ="hidden" class="currencyName" value="{{$targetCurrency}}">
      
      
         <p class="text-end price "  style="font-size:19px; font-weight:600;"><span style="font-size:15px; font-weight:600; color:black">@if($targetCurrency)
            
              {{$targetCurrency}} 
             
              @else
             
              AED
             
              @endif</span><span class="updated-price">{{ number_format($totalarray,0)}} </span></p>
                    
<input type="hidden" name="total_price" value="{{ number_format($totalarray,0)}}">

<?php
} else {
    $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
?>

 <input type ="hidden" class="currencyName" value="{{$targetCurrency}}">
 
 
      <p class="text-end price updated-price"  style="font-size:19px; font-weight:600;"><span style="font-size:15px; font-weight:600; color:black">AED</span>  &nbsp; {{ $totalarray }}</p>
                 
             <input type="hidden" name="total_price" value="{{ $totalarray}}">
<?php
}
?>
         
         
         <input type="hidden"   name= "checkouttype" value="cart-checkout">
               </div>
                </div>

              </div>
              <br>
               <button type="submit" class="btn btn-success" style="float:right; color:white ; background:#FF3500; border-radius:12px;">Proceed</button>
    
           <br>
    
            </div> 
          </div>
    </div>
    
    @endif
    
    @if(!$groupedData)
    
      <h3 style="color:red;">No item added in cart</h3>
    
    @endif
    
    </form>
  </div>
 


 
<script>
 const select = document.querySelector('.custom-select select');
  const selectText = document.querySelector('.custom-select .select-text');

  select.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const selectedImage = selectedOption.getAttribute('data-image');
    selectText.innerHTML = `<img src="${selectedImage}" alt="Selected Image">${selectedOption.textContent}`;
  });
</script>  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include jQuery UI library -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function() {
        $(".cartdatepicker").datepicker({
            dateFormat: "yy-mm-dd",
            beforeShowDay: function(date) {
                var today = new Date();
                return { enabled: date >= today };
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
    $('#applyButton').on('click', function() {
        var code = $("#promoInput").val();
        
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: '/promo',
            type: 'POST',
            data: { promoCode: code },
            success: function(response) {
                var discount = 0; // Default discount is 0 if response.data is null or undefined

                if (response.data !== null && response.data !== undefined) {
                   
                  
                   
                   
                     var subtotal = parseFloat($('.updated-price').html());
                     
                   
                     
                     var currency = $('.currencyName').val();
                    
                     discount = parseFloat(response.data.discount);
                    
                    
                    var content = $("#totalsaving").html();


                      var numericPart = content.match(/\d+(\.\d+)?/);


                      var saving = parseFloat(numericPart);


                      var xtotalsaving = saving + discount;
                     
                     $("#totalsaving").html(currency + ' '+ xtotalsaving )
                    
                    var totalsubtotal = subtotal - xtotalsaving;
                    
                    $('.updated-price').html(totalsubtotal)
                    
                    $('.promocode').text(currency + ' '+ discount.toFixed(0)  );
                     
                    $('#promocodestatus').html("PROMOCODE APPLIED");
                         
                    $('#promocodestatus').css("color", "green");
                    
                    $('#promoinput').prop('disabled', true);
                    
                    $('#applyButton').prop('disabled', true);

                   
                } else {
                    
                    
                        $('#promocodestatus').html("PROMOCODE INVALID");
                        
                        $('#promocodestatus').css("color", "red");
                      
                    
                     
                }

                
            },
            error: function(error) {
                console.error('Error:', error);
                // Handle the error if the server request fails
            }
        });
    });
});

</script>
   

@if(Session::get('successdataadded'))
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>

 Swal.fire('Item Deleted Successfully')

</script>


<?php

Session::forget('successdataadded');


?>


@endif

@endsection

