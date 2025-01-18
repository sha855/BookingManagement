@extends('layouts.app')
@push('css')
<link href="{{ asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/ion_rangeslider/css/ion.rangeSlider.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('libs/fotorama/fotorama.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
  .cancel{
    color:#FF3500;
    background: #FFF5E9;
    float: right;
    left: -17px;
    position: relative;
  }

  .proced{
    color:white;
    background: #FF3500;
    float: right;
  }
</style>

@endpush
@section('content')


<div class="container d-flex justify-content-center">
  <div class="row">
      <h4 class="text-center pt-5">
          <span><img src="{{ asset('images/Flag_of_the_United_Arab_Emirates_1.png')}}"></span> UAE Visa Application
      </h4>
  </div>
</div>
 
 
 @if(isset($datas))
 
 <div class="container card mt-3 pt-3">
  <div class="row">
    <h6 class="text-center py-3">
        <span>Confirm Traveler Details
        </h6>
    </div>


    @if($datas)
    
    
    @php
    $totalPrice = 0;
    
    @endphp
    
  @foreach($datas as $confirm_visa)
  <div class="card mt-3 pt-3" style="background:#FAFAFA;">
    <div class="row py-3">
      <div class="col-md-12">
        <h5 class="py-2 mx-3">
           Traveler {{ $loop->iteration }}
          <span style="float:right; color:red;">
              
            <a href="{{url('draftvisaeditpage/'.$confirm_visa->id)}}" style="text-decoration:none; color:red"> <i class="fa fa-edit"></i> Edit </a>

            <span>
             <a href="{{url('deleteProceedVisa/'.$confirm_visa->id)}}" style="text-decoration:none; color:red"> <i style="left: -122px;
             position: relative;" class="fa fa-trash" aria-hidden="true"></i></a>
            </span>
          </span>
          
          <?php
          
          $entrydetail = DB::table('visa_entry_details')->where('id',$confirm_visa->entry_detail_id)->first();
          

          ?>
          
     <span style="color:red; left: 47px; position:relative;">{{$entrydetail->price}}</span> 
          
          
        @php
   $price = (float) preg_replace('/[^0-9.]/', '', $entrydetail->price);
    $totalPrice += $price; // Add the current price to the total
  @endphp
 
         
        </h5>
      </div>
    </div> 
  
    
      <div class="row py-3">
      
          <div class="col-md-4 text-center">
              <p class="card-text">First Name</p>
              <h6 class="card-text">{{ $confirm_visa->firstname }}</h6>
              <p class="card-text">Email</p>
              <h6 class="card-text">{{ $confirm_visa->email }}</h6>
              <p class="card-text">Passport Number</p>
              <h6 class="card-text">{{ $confirm_visa->passport_no }}</h6>
              <p class="card-text">Passport Size Photo</p>
              @if ($confirm_visa->passport_size_photo)
                  <img src="{{ $confirm_visa->passport_size_photo }}" alt="Passport Size Photo"
                      style="height:150px;width:150px;border-radius:10px;">
              @else
                  <h6 class="card-text">No photo available</h6>
              @endif
          </div>
          <div class="col-md-4 text-center">
              <p class="card-text">Last Name</p>
              <h6 class="card-text">{{ $confirm_visa->lastname }}</h6>
              <p class="card-text">Contact Number</p>
              <h6 class="card-text">+{{$confirm_visa->contact_std_code}} {{ $confirm_visa->contact_no }}</h6>
              <p class="card-text">Passport Expiry Date</p>
              <h6 class="card-text">{{ $confirm_visa->passport_expiry }}</h6>
              <p class="card-text">Passport First Page</p>
              @if ($confirm_visa->passport_first_page)
                  <img src="{{ $confirm_visa->passport_first_page }}" alt="Passport First Page"
                      style="height:150px;width:150px;border-radius:10px;">
              @else
                  <h6 class="card-text">No image available</h6>
              @endif
          </div>
          <div class="col-md-4 text-center">
              <p class="card-text">Date of Birth</p>
              <h6 class="card-text">{{ $confirm_visa->dob }}</h6>
              <p class="card-text">Gender</p>
              <h6 class="card-text">{{ $confirm_visa->alternate_number }}</h6>
              <p class="card-text">Place of Issue</p>
              <h6 class="card-text">{{ $confirm_visa->place_issues }}</h6>
              <p class="card-text">Passport Second Page</p>
              @if ($confirm_visa->passport_second_page)
                  <img src="{{ $confirm_visa->passport_second_page }}" alt="Passport Second Page"
                      style="height:150px;width:150px;border-radius:10px;">
              @else
                  <h6 class="card-text">No image available</h6>
              @endif
          </div>
      </div>
    
  </div>
  
  <div class="footer-card-btn py-4">
    
     <strong style="color:red;">Total Price:</strong> {{ number_format($totalPrice, 2) }}
   <a href="https://roamiodeals.techdocklabs.com/payment-visa?price={{ $totalPrice }}&code={{ $confirm_visa->visakey}}" class="btn btn-light proced">Proceed to Payment</a>

    <button class="btn btn-light cancel">Cancel</button>
</div>


@endforeach

@else

<center><span style="color:red;">No Visa Applied,Please Apply to review Here</span></center>
<br>

@endif



</div>
 
 @else

<div class="container card mt-3 pt-3">
  <div class="row">
    <h6 class="text-center py-3">
        <span>Confirm Traveler Details
        </h6>
    </div>

<?php


$data = session()->get('visa_key');


$visas = DB::table('visa_booking_detail')->where('visakey',$data)->get();



?>
    @if($data)
    @php
    $totalPrice = 0;
    
    @endphp
    
  @foreach($visas as $confirm_visa)
  <div class="card mt-3 pt-3" style="background:#FAFAFA;">
    <div class="row py-3">
      <div class="col-md-12">
        <h5 class="py-2 mx-3">
           Traveler {{ $loop->iteration }}
          <span style="float:right; color:red;">
              
            <a href="{{url('visaeditpage/'.$confirm_visa->id)}}" style="text-decoration:none; color:red"> <i class="fa fa-edit"></i> Edit </a>

            <span>
             <a href="{{url('deleteProceedVisa/'.$confirm_visa->id)}}" style="text-decoration:none; color:red"> <i style="left: -122px;
             position: relative;" class="fa fa-trash" aria-hidden="true"></i></a>
            </span>
          </span>
          
          <?php
          
          $entrydetail = DB::table('visa_entry_details')->where('id',$confirm_visa->entry_detail_id)->first();
          

          ?>
          
          <span style="color:red; left: 47px; position:relative;">{{$entrydetail->price}}</span>
          
          
          @php
   $price = (float) preg_replace('/[^0-9.]/', '', $entrydetail->price);
    $totalPrice += $price; // Add the current price to the total
  @endphp
         
        </h5>
      </div>
    </div> 
  
    
      <div class="row py-3">
      
          <div class="col-md-4 text-center">
              <p class="card-text">First Name</p>
              <h6 class="card-text">{{ $confirm_visa->firstname }}</h6>
              <p class="card-text">Email</p>
              <h6 class="card-text">{{ $confirm_visa->email }}</h6>
              <p class="card-text">Passport Number</p>
              <h6 class="card-text">{{ $confirm_visa->passport_no }}</h6>
              <p class="card-text">Passport Size Photo</p>
              @if ($confirm_visa->passport_size_photo)
                  <img src="{{ $confirm_visa->passport_size_photo }}" alt="Passport Size Photo"
                      style="height:150px;width:150px;border-radius:10px;">
              @else
                  <h6 class="card-text">No photo available</h6>
              @endif
          </div>
          <div class="col-md-4 text-center">
              <p class="card-text">Last Name</p>
              <h6 class="card-text">{{ $confirm_visa->lastname }}</h6>
              <p class="card-text">Contact Number</p>
              <h6 class="card-text">+{{$confirm_visa->contact_std_code}} {{ $confirm_visa->contact_no }}</h6>
              <p class="card-text">Passport Expiry Date</p>
              <h6 class="card-text">{{ $confirm_visa->passport_expiry }}</h6>
              <p class="card-text">Passport First Page</p>
              @if ($confirm_visa->passport_first_page)
                  <img src="{{ $confirm_visa->passport_first_page }}" alt="Passport First Page"
                      style="height:150px;width:150px;border-radius:10px;">
              @else
                  <h6 class="card-text">No image available</h6>
              @endif
          </div>
          <div class="col-md-4 text-center">
              <p class="card-text">Date of Birth</p>
              <h6 class="card-text">{{ $confirm_visa->dob }}</h6>
              <p class="card-text">Gender</p>
              <h6 class="card-text">{{ $confirm_visa->alternate_number }}</h6>
              <p class="card-text">Place of Issue</p>
              <h6 class="card-text">{{ $confirm_visa->place_issues }}</h6>
              <p class="card-text">Passport Second Page</p>
              @if ($confirm_visa->passport_second_page)
                  <img src="{{ $confirm_visa->passport_second_page }}" alt="Passport Second Page"
                      style="height:150px;width:150px;border-radius:10px;">
              @else
                  <h6 class="card-text">No image available</h6>
              @endif
          </div>
      </div>
    
  </div>
@endforeach


<div class="footer-card-btn py-4">
    
     <strong style="color:red;">Total Price:</strong> {{ number_format($totalPrice, 2) }}
   <a href="payment-visa?price={{ $totalPrice }}&code={{ $data }}" class="btn btn-light proced">Proceed to Payment</a>

    <button class="btn btn-light cancel">Cancel</button>
</div>

@else



<center><span style="color:red;">No Visa Applied,Please Apply to review Here</span></center>
<br>

@endif



</div>

@endif

<script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@if(Session::get('visa_deleted'))

<script>
    
Swal.fire('Visa Application deleted successfully')
    
</script>

<?php

session()->forget('visa_deleted');

?>

@endif


@if(Session::get('visa_updated_processing'))

<script>
    
Swal.fire('Visa Application Updated successfully')
    
</script>

<?php

session()->forget('visa_updated_processing');

?>

@endif




<!--<script type="text/javascript">-->
<!--    $(function() {-->
<!--        var jsonData;-->
<!--        var access_code = "";-->
<!--        var amount = "6000.00";-->
<!--        var currency = "INR";-->

<!--        $.ajax({-->
<!--            url: 'https://secure.ccavenue.ae/transaction/transaction.do?command=getJsonData&access_code=' +-->
<!--                access_code + '&currency=' + currency + '&amount=' + amount,-->
<!--            dataType: 'jsonp',-->
<!--            jsonp: false,-->
<!--            jsonpCallback: 'processData',-->
<!--            success: function(data) {-->
<!--                jsonData = data;-->
              
<!--                processData(data);-->
               
<!--                $.each(jsonData, function(index, value) {-->
<!--                    if (value.Promotions != undefined && value.Promotions != null) {-->
<!--                        var promotionsArray = $.parseJSON(value.Promotions);-->
<!--                        $.each(promotionsArray, function() {-->
<!--                            var promotions =-->
<!--                                "<option value=" + this['promoId'] + ">" +-->
<!--                                this['promoName'] + " - " + this['promoPayOptTypeDesc'] + "-" + this[-->
<!--                                    'promoCardName'] + " - " + currency + " " + this['discountValue'] + "  " +-->
<!--                                this['promoType'] + "</option>";-->
<!--                            $("#promo_code").find("option:last").after(promotions);-->
<!--                        });-->
<!--                    }-->
<!--                });-->
<!--            },-->
<!--            error: function(xhr, textStatus, errorThrown) {-->
<!--                alert('An error occurred! ' + (errorThrown ? errorThrown : xhr.status));-->
<!--            }-->
<!--        });-->

<!--        $(".payOption").click(function() {-->
<!--            var paymentOption = "";-->
<!--            var cardArray = "";-->
<!--            var payThrough, emiPlanTr;-->
<!--            var emiBanksArray, emiPlansArray;-->

<!--            paymentOption = $(this).val();-->
<!--            $("#card_type").val(paymentOption.replace("OPT", ""));-->
          
<!--            $("#card_name").append("<option value=''>Select</option>");-->
<!--            $("#emi_div").hide();-->

<!--            $.each(jsonData, function(index, value) {-->
<!--                if (paymentOption != "OPTEMI") {-->
<!--                    if (value.payOpt == paymentOption) {-->
<!--                        cardArray = $.parseJSON(value[paymentOption]);-->
<!--                        $.each(cardArray, function() {-->
<!--                            $("#card_name").find("option:last").after("<option class='" + this[-->
<!--                                'dataAcceptedAt'] + " " + this['status'] + "'  value='" + this[-->
<!--                                'cardName'] + "'>" + this['cardName'] + "</option>");-->
<!--                        });-->
<!--                    }-->
<!--                }-->

<!--                if (paymentOption == "OPTEMI") {-->
<!--                    if (value.payOpt == "OPTEMI") {-->
<!--                        $("#emi_div").show();-->
<!--                        $("#card_type").val("CRDC");-->
<!--                        $("#data_accept").val("Y");-->
<!--                        $("#emi_plan_id").val("");-->
<!--                        $("#emi_tenure_id").val("");-->
<!--                        $("span.emi_fees").hide();-->
<!--                        $("#emi_banks").children().remove();-->
<!--                        $("#emi_banks").append("<option value=''>Select your Bank</option>");-->
<!--                        $("#emi_tbl").children().remove();-->

<!--                        emiBanksArray = $.parseJSON(value.EmiBanks);-->
<!--                        emiPlansArray = $.parseJSON(value.EmiPlans);-->
<!--                        $.each(emiBanksArray, function() {-->
<!--                            payThrough = "<option value='" + this['planId'] + "' class='" + this['BINs'] +-->
<!--                                "' id='" + this['subventionPaidBy'] + "' label='" + this['midProcesses'] +-->
<!--                                "'>" + this['gtwName'] + "</option>";-->
<!--                            $("#emi_banks").append(payThrough);-->
<!--                        });-->

<!--                        emiPlanTr =-->
<!--                            "<tr><td>&nbsp;</td><td>EMI Plan</td><td>Monthly Installments</td><td>Total Cost</td></tr>";-->

<!--                        $.each(emiPlansArray, function() {-->
<!--                            emiPlanTr = emiPlanTr +-->
<!--                                "<tr class='tenuremonth " + this['planId'] + "' id='" + this['tenureId'] +-->
<!--                                "' style='display: none'>" +-->
<!--                                "<td> <input type='radio' name='emi_plan_radio' id='" + this['tenureMonths'] +-->
<!--                                "' value='" + this['tenureId'] + "' class='emi_plan_radio' > </td>" +-->
<!--                                "<td>" + this['tenureMonths'] + "EMIs. <label class='merchant_subvention'>@ <label class='emi_processing_fee_percent'>" +-->
<!--                                this['processingFeePercent'] + "</label>&nbsp;%p.a</label>" +-->
<!--                                "</td>" +-->
<!--                                "<td>" + this['currency'] + "&nbsp;" + this['emiAmount'].toFixed(2) +-->
<!--                                "</td>" +-->
<!--                                "<td><label class='currency'>" + this['currency'] + "</label>&nbsp;" +-->
<!--                                "<label class='emiTotal'>" + this['total'].toFixed(2) + "</label>" +-->
<!--                                "<label class='emi_processing_fee_plan' style='display: none;'>" +-->
<!--                                this['emiProcessingFee'].toFixed(2) + "</label>" +-->
<!--                                "<label class='planId' style='display: none;'>" + this['planId'] +-->
<!--                                "</label>" +-->
<!--                                "</td>" +-->
<!--                                "</tr>";-->
<!--                        });-->
<!--                        $("#emi_tbl").append(emiPlanTr);-->
<!--                    }-->
<!--                }-->
<!--            });-->
<!--        });-->

<!--        $("#card_name").click(function() {-->
<!--            if ($(this).find(":selected").hasClass("DOWN")) {-->
<!--                alert("Selected option is currently unavailable. Select another payment option or try again later.");-->
<!--            }-->
<!--            if ($(this).find(":selected").hasClass("CCAvenue")) {-->
<!--                $("#data_accept").val("Y");-->
<!--            } else {-->
<!--                $("#data_accept").val("N");-->
<!--            }-->
<!--        });-->

        
<!--        $("#emi_banks").on("change", function() {-->
<!--            if ($(this).val() != "") {-->
<!--                var cardsProcess = "";-->
<!--                $("#emi_tbl").show();-->
<!--                cardsProcess = $("#emi_banks option:selected").attr("label").split("|");-->
<!--                $("#card_name").children().remove();-->
<!--                $("#card_name").append("<option value=''>Select</option>");-->
<!--                $.each(cardsProcess, function(index, card) {-->
<!--                    $("#card_name").find("option:last").after("<option class=CCAvenue value='" + card +-->
<!--                        "' >" + card + "</option>");-->
<!--                });-->
<!--                $("#emi_plan_id").val($(this).val());-->
<!--                $(".tenuremonth").hide();-->
<!--                $("." + $(this).val()).show();-->
<!--                $("." + $(this).val()).find("input:radio[name=emi_plan_radio]").first().attr("checked", true);-->
<!--                $("." + $(this).val()).find("input:radio[name=emi_plan_radio]").first().trigger("click");-->

<!--                if ($("#emi_banks option:selected").attr("id") == "Customer") {-->
<!--                    $("#processing_fee").show();-->
<!--                } else {-->
<!--                    $("#processing_fee").hide();-->
<!--                }-->
<!--            } else {-->
<!--                $("#emi_plan_id").val("");-->
<!--                $("#emi_tenure_id").val("");-->
<!--                $("#emi_tbl").hide();-->
<!--            }-->

<!--            $("label.emi_processing_fee_percent").each(function() {-->
<!--                if ($(this).text() == 0) {-->
<!--                    $(this).closest("tr").find("label.merchant_subvention").hide();-->
<!--                }-->
<!--            });-->
<!--        });-->

<!--        $(".emi_plan_radio").on("click", function() {-->
<!--            var processingFee = "";-->
<!--            $("#emi_tenure_id").val($(this).val());-->
<!--            processingFee =-->
<!--                "<span class='emi_fees' >" +-->
<!--                "Processing Fee:" + $(this).closest('tr').find('label.currency').text() + "&nbsp;" +-->
<!--                "<label id='processingFee'>" + $(this).closest('tr').find('label.emi_processing_fee_plan').text() +-->
<!--                "</label><br/>" +-->
<!--                "Processing fee will be charged only on the first EMI." +-->
<!--                "</span>";-->
<!--            $("#processing_fee").children().remove();-->
<!--            $("#processing_fee").append(processingFee);-->

            
<!--            if ($("#processingFee").text() == 0) {-->
<!--                $(".emi_fees").hide();-->
<!--            }-->
<!--        });-->

<!--        $("#card_number").focusout(function() {-->
            <!--/*-->
            
            <!--*/-->
<!--            if ($('input[name="payment_option"]:checked').val() == "OPTEMI") {-->
<!--                if (!($("#emi_banks option:selected").hasClass("allcards"))) {-->
<!--                    if (!$('#emi_banks option:selected').hasClass($(this).val().substring(0, 6))) {-->
<!--                        alert("Selected EMI is not available for entered credit card.");-->
<!--                    }-->
<!--                }-->
<!--            }-->
<!--        });-->

      
<!--        function processData(data) {-->
<!--            var paymentOptions = [];-->
<!--            var creditCards = [];-->
<!--            var debitCards = [];-->
<!--            var netBanks = [];-->
<!--            var cashCards = [];-->
<!--            var mobilePayments = [];-->
<!--            $.each(data, function() {-->
              
<!--                console.log(this.error);-->
<!--                paymentOptions.push(this.payOpt);-->
<!--                switch (this.payOpt) {-->
<!--                    case 'OPTCRDC':-->
<!--                        var jsonData = this.OPTCRDC;-->
<!--                        var obj = $.parseJSON(jsonData);-->
<!--                        $.each(obj, function() {-->
<!--                            creditCards.push(this['cardName']);-->
<!--                        });-->
<!--                        break;-->
<!--                    case 'OPTDBCRD':-->
<!--                        var jsonData = this.OPTDBCRD;-->
<!--                        var obj = $.parseJSON(jsonData);-->
<!--                        $.each(obj, function() {-->
<!--                            debitCards.push(this['cardName']);-->
<!--                        });-->
<!--                        break;-->
<!--                    case 'OPTNBK':-->
<!--                        var jsonData = this.OPTNBK;-->
<!--                        var obj = $.parseJSON(jsonData);-->
<!--                        $.each(obj, function() {-->
<!--                            netBanks.push(this['cardName']);-->
<!--                        });-->
<!--                        break;-->
<!--                    case 'OPTCASHC':-->
<!--                        var jsonData = this.OPTCASHC;-->
<!--                        var obj = $.parseJSON(jsonData);-->
<!--                        $.each(obj, function() {-->
<!--                            cashCards.push(this['cardName']);-->
<!--                        });-->
<!--                        break;-->
<!--                    case 'OPTMOBP':-->
<!--                        var jsonData = this.OPTMOBP;-->
<!--                        var obj = $.parseJSON(jsonData);-->
<!--                        $.each(obj, function() {-->
<!--                            mobilePayments.push(this['cardName']);-->
<!--                        });-->
<!--                        break;-->
<!--                }-->
<!--            });-->

<!--            console.log(creditCards);-->
<!--            console.log(debitCards);-->
<!--            console.log(netBanks);-->
<!--            console.log(cashCards);-->
<!--            console.log(mobilePayments);-->
<!--        }-->
<!--    });-->
<!--</script>-->

 @endsection