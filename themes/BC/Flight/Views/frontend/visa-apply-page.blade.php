
 @extends('layouts.app')

@push('css')
  <!--<link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet">-->
<style>

input[type="radio"]:checked:before {
    background-color: #ff3500;
    border-radius: 50px;
    content: "•";
    font-size: 24px;
    height: 6px;
    line-height: 16px;
    margin: 4px;
    text-indent: -9999px;
    width: 6px;
}

.form-check-input:checked {
    background-color: #ff3500;
    border-color: #ff3500;
}

.form-check-input{
    
height: 20px;
    width: 20px;
    order: 1;
    color: #ff3500;
    background: orangered;
    border: orangered;
}
.swal2-styled{
    
    background: orangered !important;
    display: inline-block;  
    
}
.imageClass{
position: relative;
    float: right;
    top: -38px;
    left: -3px;
    background: #FFF3E3;
    padding: 1px 5px;
    border-radius: 10px;
}

.uploadinput{
    position: relative;
    top: -31px;
 } 

 .inputfolter{
    position: relative;
    top: -84px;
 }
     .accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
    border-radius:12px;
  }

  .form-control[type=file]:not(:disabled):not([readonly]) {
    cursor: pointer;
    padding: 8px;
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);


   }
.card{

  cursor: pointer;
}

  .active,
  .accordion:hover {
    /* background-color: #ccc; */
  }

  .accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
  }

  .active:after {
    content: none;
  }

  .panel {
    padding: 0 18px;
    background-color: #f8f9fa;;
    max-height: 0;
    overflow: hidden;
    border-radius:12px;
    transition: max-height 0.2s ease-out;
  }

 .card {
	
	 border-radius: 10px;
	 box-shadow: 0 0 5px rgba(255, 255, 255, .04588);
}
 .card-header {
	 padding: 40px;
	 border-bottom: 0px solid #d5d0d0;
	 background-color: transparent;
	 height:120px;
}
 .card-header .steps {
 position: relative;
    left: 137px;
    display: flex;
    column-count: 3;
    justify-content: center;
    align-items: center;
    margin: 36px;
    top: -35px;
}
 .card-header .steps .step {
	 text-align: center;
    border-bottom: 3px solid #FF3500;
    line-height: 0.1em;
    margin: 10px 0 20px;
    width: 282px;
}
 .card-header .steps .step span {
     padding: 11px 19px;
    border: 2px solid #FF3500 !important;
    border-radius: 25px;
    background: #fff;
    position: relative;
    left: -89px;
}
	 /* box-shadow: 0px 3px 0px 0px #FF3500; */

 .card-header .steps .step.active span {
background: #FF3500;
    color: white;
    border: 1px solid #FF3500;
    border-radius: 50%;
    z-index: 999;
}
 .card-body {
	 padding: 16px;
	 min-height: 250px;
	 display: flex;
	 justify-items: center;
	 background: #f8f9fa;
	 align-items: center;
}
 .card-body .tabs {
	 width: 100%;
	 height: 100%;
	 justify-content: center;
	 /* display: flex; */
	 align-items: center;
}
 .card-body .tabs .tab {
	 display: none;
}
 .card-body .tabs .tab.active {
	 display: block !important;
}
 .card-footer {
	 padding: 16px;
	 border-top: 0px solid #d5d0d0;
	 background-color: transparent;
}

.panel-open {
  max-height: initial;
  overflow: initial;
  border-radius:12px;
}


.Next{
    float: right;
    padding: 9px 32px;
    width: 150px;
    margin: 10px auto;
    border: none;
    border-radius: 16px;
    font-weight: 800;
    font-size: 18px;
    color: white;
    background: #FF3500;
    left: 10px;
    position: relative;
    /* background: #FF3500;     */
}
.Cancel{
    float: right;
    padding: 9px 32px;
    width: 150px;
    margin: 10px auto;
    border: none;
    border-radius: 16px;
    font-weight: 800;
    font-size: 18px;
    color: #FF3500;
    background:#FFF5E9; 
    
}
 .card-footer button:active {
	 outline: none;
	 transform: translate(0px, 5px);
	 -webkit-transform: translate(0px, 5px);
	 box-shadow: 0px 1px 0px 0px;
}
 @media only screen and (max-width: 420px) {
	 .card-footer button {
		 width: 100%;
	}
}
 
.heading-step{
    top: 37px;
    position: relative;
    font-size: 15px;
    left: -158px;
}
/* Your CSS styles */
@media (max-width: 576px) {
    .card-header .steps {
        left: 0;
    }

    .card-header .steps .step span {
        left: -45px;
    }
    .card-header{
    display:none;
}
}

.mailchimp{
 display:none;   
}

}

.select2-selection select2-selection--single{
    height:40px !important;
</style>
@endpush

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
   <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.js"></script>


<!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->


<div class="container d-flex justify-content-center">
    <div class="row">
        <h4 class="text-center pt-5">
            <span><img src="{{ asset('images/Flag_of_the_United_Arab_Emirates_1.png')}}"></span> UAE Visa Application
        </h4>
    </div>
</div>

<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <div class="steps">
                <div class="step active">
                    <span>1</span>
                    <small class="heading-step">Visa Application</small>
                </div>
                <div class="step">
                    <span>2</span>
                    <small class="heading-step">Visa Type</small>
                </div>
                <div class="step" style="border: none;">
                    <span>3</span>
                    <small class="heading-step">Upload Document</small>
                </div>
            </div>
        </div>
       
        <form action="{{ url('visa-booking') }}" enctype="multipart/form-data" id="bookingvisha" method="post">
            @csrf
            <div id="cardBody" class="card-body">
                <div class="tabs w-100">
                    <div id="first" class="tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                
                                        <select id="nationalitySelect" class="form-control js-example-basic-single" name="nationality"  style="height:40px;"></select>
                                         
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="traveldate" class="form-control" id="travelDateInput" aria-describedby="emailHelp" placeholder="Travel Dates" pattern="\d{2}/\d{2}/\d{4}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="rangeSelect" name="adult" class="form-select" aria-label="Default select example" required>
                                        <option value="0" selected>Number of Travelers (Adults)</option>
                                      
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="childSelect" name="child"  class="form-select" aria-label="Default select example" required>
                                        <option value="0" selected>Number of Travelers (Children)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
     $currency = DB::table('core_settings')->where('name', 'extra_currency')->first();
    $forex = json_decode($currency->val);
    $targetCurrency = strtoupper(Session::get('bc_current_currency'));
    
        $exchangeRate = null;

    foreach ($forex as $forexItem) {
        $dataRate = $forexItem->currency_main;

        if ($dataRate === Session::get('bc_current_currency')) {
            $exchangeRate = (float)$forexItem->rate; // Convert to float
            break;
        }
    }
    
    
                    ?>
                    
                    <div id="second" class="tab">
                        @foreach($visadata as $visa)
                        
                        
                           <input type="hidden" style="height: 20px; width: 20px; order: 1;" id="check{{$visa->id}}" name="entry_id" value="{{$visa->id}}">
                           <button type="button" class="accordion">{{$visa->entry}}</button>
                         <div class="panel" style="display: flex; flex-direction: column;">
                            <div class="container" style="margin-top:10px; margin-bottom:10px;">
                              <div class="row">
                                @if ($visa->visa_entry_details && count($visa->visa_entry_details) > 0)
                                  @foreach ($visa->visa_entry_details as $item)
                                  <div class="col-4">
                                  <div class="card entry-detail-card" style="background: var(--light-orange, #FFF3E3); border-radius:10px;">
                                  <div style="padding:10px;">
                                  <div style="display: flex; justify-content: flex-end;">
                
                                  <input type="radio" class="form-check-input entry-detail-radio" style="height: 20px; width: 20px; order: 1; " id="check{{$item->id}}" name="entry_detail_id" value="{{$item->id}}">
                                      </div>
                                    <h5>{{$item->days}}</h5>
                                    <h6>{{$item->title}}</h6>
                                    <p>{!! $item->discription !!}</p>
                                    
    <?php
    
     $priceString = $item->price;


    if ($exchangeRate) {
  

$numericPart = preg_replace("/[^0-9.]/", "", $priceString);


$itemPrice = floatval($numericPart);

$itemPrice /= $exchangeRate;
    
    $decimalPlaces = 0;
    $formattedPrice = number_format($itemPrice, $decimalPlaces);
    
        ?>
        <h4> {{$targetCurrency ? : AED ;}} {{$formattedPrice}} </h4>
        <?php
    } else {
        $mainCurrency = DB::table('core_settings')->where('name', 'currency_main')->first();
        ?>
        
      <h4> {{$priceString}}</h4>

        <?php
    }
    ?>
                                   </div>
                                </div>
                             </div>
                             
                             
                                  @endforeach
                                @else
                                  <p>No visa entry details available for this visa.</p>
                                @endif
                               </div>
                            </div>
                        </div>
                        @endforeach
                      </div>
                <div id="third" class="tab">
                     <div class="row" id="userRegisterForm">
                        <div id="divContainer"></div>
                         </div>
                </div>
         </div>
    </div>
                
               <div class="card-footer" style="height: 88px;">
                  <button id="nextBtn" type="submit"  class="Next nextButtonform wizard-btn-next" onclick="next(1); printDivs();">Proceed to next traveler details</button>
                <button id="prevBtn" type="button"  class="Cancel" onclick="next(-1)">Back</button>
              </div>
           </form>
        </div>
   </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('libs/select2/js/select2.min.js')}}"></script>


<script>
  // Get all the accordion elements
  var acc = document.getElementsByClassName("accordion");
  var panels = document.getElementsByClassName("panel");
  var i;

  // Set the first panel to be open by default
  if (panels.length > 0) {
    panels[0].style.maxHeight = panels[0].scrollHeight + "316px";
    acc[0].classList.add("active");
  }

  // Add event listeners to handle accordion behavior
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");

      // Find the corresponding radio button and toggle its checked state
      var radioBtn = this.nextElementSibling.querySelector("input[type='radio']");
      radioBtn.checked = !radioBtn.checked;

      // Change the background color of the radio button when it is active

      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        // Close all panels first
        for (var j = 0; j < panels.length; j++) {
          if (acc[j] !== this) {
            acc[j].classList.remove("active");
            panels[j].style.maxHeight = null;
          }
        }

        // Then set maxHeight for the clicked panel
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    });
  }
</script>

<script>
(function($) {
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
})(jQuery);
</script>

  <script>
    $(document).ready(function () {
        $.getJSON("https://restcountries.com/v3.1/all", function (data) {
            var countrySelect = $("#nationalitySelect");
            
            var excludedCountries = [
                    "Bangladesh",
                    "Algeria",
                    "Angola",
                    "Benin",
                    "Botswana",
                    "Burkina Faso",
                    "Burundi",
                    "Cabo Verde",
                    "Cameroon",
                    "Central African Republic",
                    "Chad",
                    "Comoros",
                    "Congo (Brazzaville)",
                    "Congo (Kinshasa)",
                    "Cote d'Ivoire (Ivory Coast)",
                    "Djibouti",
                    "Equatorial Guinea",
                    "Eritrea",
                    "Eswatini (formerly Swaziland)",
                    "Ethiopia",
                    "Gabon",
                    "Gambia",
                    "Ghana",
                    "Guinea",
                    "Guinea-Bissau",
                    "Kenya",
                    "Lesotho",
                    "Liberia",
                    "Libya",
                    "Madagascar",
                    "Malawi",
                    "Mali",
                    "Mauritania",
                    "Mauritius",
                    "Morocco",
                    "Mozambique",
                    "Namibia",
                    "Niger",
                    "Nigeria",
                    "Rwanda",
                    "Sao Tome and Principe",
                    "Senegal",
                    "Seychelles",
                    "Sierra Leone",
                    "Somalia",
                    "South Sudan",
                    "Sudan",
                    "Tanzania",
                    "Togo",
                    "Tunisia",
                    "Uganda",
                    "Zambia",
                    "Zimbabwe"
                ];

            var countryGroups = {};

            $.each(data, function (index, country) {
                var countryName = country.name.common;
                if (excludedCountries.indexOf(countryName) === -1) {
                    var firstLetter = countryName.charAt(0).toUpperCase();
                    if (!countryGroups[firstLetter]) {
                        countryGroups[firstLetter] = [];
                    }
                    countryGroups[firstLetter].push(countryName);
                }
            });

            // Sort the groups alphabetically by the first letter
            var sortedFirstLetters = Object.keys(countryGroups).sort();

            // Append countries in sorted order
            $.each(sortedFirstLetters, function (index, letter) {
                var countries = countryGroups[letter].sort();
                $.each(countries, function (index, countryName) {
                    countrySelect.append(new Option(countryName, countryName));
                });
            });
        });
    });
</script>


<script>



var currentTab = 0;
var fieldValues = {}; // Object to store field values

showTab(currentTab);

function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";

    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }

    if (n == x.length - 1) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }

    fixStepIndicator(n);
}

function next(n) {
    var x = document.getElementsByClassName("tab");
    var prevTab = currentTab;

    // Check if the current step is the third step
    if (currentTab === 2 && n > 0) {
        
        submitForm();
        return false;
    }

    // Store the existing values of input fields in the current tab
    storeFieldValues(x[currentTab]);

    currentTab = currentTab + n;

    if (currentTab < 0) {
        currentTab = 0;
    }

    x[prevTab].style.display = "none";

    if (currentTab == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }

    if (currentTab >= x.length) {
        
    }

    showTab(currentTab);
}

// Function to store the values of input fields in a tab
function storeFieldValues(tab) {
    var fields = tab.querySelectorAll("[name]");
    fields.forEach(function (field) {
        fieldValues[field.name] = field.value;
    });
}

// Function to restore the values of input fields in a tab
function restoreFieldValues(tab) {
    var fields = tab.querySelectorAll("[name]");
    fields.forEach(function (field) {
        if (fieldValues.hasOwnProperty(field.name)) {
            field.value = fieldValues[field.name];
        }
    });
}





function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");

    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }

    x[n].className += " active";
}



function submitForm(event) {
    
    event.preventDefault();
   
    
    var form = document.getElementById("bookingvisha");
    var formData = new FormData(form);

    var isValid = true;
    var requiredFields = form.querySelectorAll("[required]");
    var savedValues = {}; 

    for (var i = 0; i < requiredFields.length; i++) {
        var field = requiredFields[i];
        var value = field.value.trim();

        if (!value) {
            isValid = false;
            break;
        }

        if (field.type === "email" && !isValidEmail(value)) {
            isValid = false;
            
            
            Swal.fire(
                'Invalid Email',
                'Please enter a valid email address.',
                'error'
            );
            break; 
         }

        savedValues[field.name] = value; 
    }

    if (!isValid) {
        
        for (var fieldName in savedValues) {
            if (savedValues.hasOwnProperty(fieldName)) {
                var field = form.querySelector('[name="' + fieldName + '"]');
                if (field) {
                    field.value = savedValues[fieldName];
                 }
            }
        }

        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open(form.method, form.action);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                Swal.fire('Visa submitted successfully')
                window.location.href = '/confirm-visa';
            } else {
                console.log("Form submission failed");
                showTab(currentTab); // Show the current step
            }
        }
    };
    
    xhr.send(formData);
}

function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}


  
  
    
  
</script>



<!--<script>-->
<!--document.addEventListener("DOMContentLoaded", function () {-->
<!--    var currentTab = 0;-->

<!--    showTab(currentTab);-->

 
<!--    var form = document.getElementById("bookingvisha");-->
<!--    form.addEventListener("submit", function (event) {-->
<!--        var x = document.getElementsByClassName("tab");-->
<!--        var requiredFields = x[currentTab].querySelectorAll("[required]");-->
<!--        var isValid = true;-->

<!--        for (var i = 0; i < requiredFields.length; i++) {-->
<!--            if (!requiredFields[i].value.trim()) {-->
<!--                isValid = false;-->
<!--                break;-->
<!--            }-->
<!--        }-->

<!--        if (!isValid) {-->
            <!--event.preventDefault(); -->
<!--            Swal.fire(-->
<!--                'Missing Something?',-->
<!--                'Please fill all the details',-->
<!--                'question'-->
<!--            );-->
<!--        }-->
<!--    });-->
<!--});-->
<!--</script>-->


<script>

 function printDivs() {
  
  var adultSelect = document.getElementById("rangeSelect");
  var adultCount = parseInt(adultSelect.value);

  var childSelect = document.getElementById("childSelect");
  var childCount = parseInt(childSelect.value);

  var totalCount = adultCount + childCount;

  var divContainer = document.getElementById("divContainer");
  divContainer.innerHTML = ""; 

 var adultIndex = 1; 
var childIndex = 1; 

for (var i = 1; i <= totalCount; i++) {
    
   
    
  var xtravelerType = i <= adultCount ? "Adult" : "Child";
  
  if (xtravelerType === "Adult") {
    travelerType = "Adult Traveller " + adultIndex; 
    adultIndex++; 
  } else {
    travelerType = "Child Traveller " + childIndex; 
    childIndex++; 
  }


  var div = document.createElement("div");
    div.innerHTML = `
      <div class="h5 py-3">${travelerType}</div>
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="firstname[]" id="firstName${i}" aria-describedby="emailHelp" placeholder="First Name" required>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="lastname[]" id="lastName${i}" aria-describedby="emailHelp" placeholder="Last Name" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="dob[]" id="DOB${i}" aria-describedby="emailHelp" placeholder="Date of birth" required>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <input type="email" class="form-control" name="email[]" id="email${i}" aria-describedby="emailHelp" placeholder="Email" required>
               <div class="error-message" id="email-error-${i}" style="color: red;"></div>
            </div>
          </div>
        </div>


      <div class="row">
  <div class="col-md-6">
    <div class="form-group"> 
      <input type="text" class="form-control dcontact-input" name="contact[]" id="contact_${i}" aria-describedby="emailHelp" placeholder="Contact Number" required>
      <input type="text" style="display:none;" name="contact_std_code[]" id="contact_std_code_${i}">
    </div>
  </div>
  
  
  <div class="col-md-6">
    <div class="form-group">
    
       <select class="form-select" aria-label="Default select example"  name="alternate_number[]" id="alternate_${i}" placeholder = "type your gender">
       <option disable>Gender</option>
       <option value="Male">Male</option>
       <option value="Female">Female</option>
        
       </select>
    </div>
  </div>
  
</div>

      <div class="row">
       <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" name="passportnumber[]" id="passportNumber${i}" aria-describedby="emailHelp" placeholder="Passport Number">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control passportExpiryDate" name="passport_expiry[]" id="passportExpiryDate${i}" aria-describedby="emailHelp" placeholder="Passport Expiry Date">
          </div>
        </div>
       
      </div>
      
          <div class="row">

         <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" name="place_issues[]" id="placeOfIssue${i}" aria-describedby="emailHelp" placeholder="Place of Issue" required>
          </div>
         </div>
       
       
      <div class="col-md-6">
          <div class="form-group uploadinput">
            <input type="file" name="passport_first_page[]" class="custom-file-input" id="passportfirst${i}" onchange="handleFileInputChange(event, 'passportfirst${i}')" aria-describedby="emailHelp" accept=".jpeg, .jpg, .png" placeholder="passport first page" style="top: 25px;
    position: relative;
    " required>
             <input type="text" class="form-control showFileInput" placeholder="Passport first page Photo" readonly>
             <img src ={{asset('images/btn.svg')}} class="imageClass">
          </div>
         </div>
        </div>

   <div class="row inputfolter">
     <div class="col-md-6">
      <div class="form-group">
      <input type="file" class="custom-file-input" name="passport_second_page[]" id="passportsecond${i}" aria-describedby="emailHelp" accept=".jpeg, .jpg, .png" onchange="handleFileInputChange(event, 'passportsecond${i}')" style="top: 25px;
    position: relative;
" required>
    <input type="text" class="form-control showFileInput" placeholder="Passport second page Photo" readonly>
    <img src = {{asset('images/btn.svg')}} class="imageClass">
     
    </div>
    </div>
    <div class="col-md-6">
     <div class="form-group">
      <input type="file" class="custom-file-input" name="passport_size_photo[]" id="passportphoto${i}" accept=".jpeg, .jpg, .png" aria-describedby="emailHelp" onchange="handleFileInputChange(event, 'passportphoto${i}')" style="top: 25px;
    position: relative;
   " required>
       <input type="text" class="form-control showFileInput" placeholder="Passport Size Photo" readonly>
       <img src =  {{asset('images/btn.svg')}} class="imageClass">
      
    </div>
    </div>
    </div>

    `;

divContainer.appendChild(div);

const contactInput = document.getElementById("contact_" + i);

const alternateInput = document.getElementById("alternate_" + i);

const excludedCountries = [
  "BD", // Bangladesh
  "DZ", // Algeria
  "AO", // Angola
  "BJ", // Benin
  "BW", // Botswana
  "BF", // Burkina Faso
  "BI", // Burundi
  "CV", // Cabo Verde
  "CM", // Cameroon
  "CF", // Central African Republic
  "TD", // Chad
  "KM", // Comoros
  "CG", // Congo (Brazzaville)
  "CD", // Congo (Kinshasa)
  "CI", // Cote d'Ivoire (Ivory Coast)
  "DJ", // Djibouti
  "GQ", // Equatorial Guinea
  "ER", // Eritrea
  "SZ", // Eswatini (formerly Swaziland)
  "ET", // Ethiopia
  "GA", // Gabon
  "GM", // Gambia
  "GH", // Ghana
  "GN", // Guinea
  "GW", // Guinea-Bissau
  "KE", // Kenya
  "LS", // Lesotho
  "LR", // Liberia
  "LY", // Libya
  "MG", // Madagascar
  "MW", // Malawi
  "ML", // Mali
  "MR", // Mauritania
  "MU", // Mauritius
  "MA", // Morocco
  "MZ", // Mozambique
  "NA", // Namibia
  "NE", // Niger
  "NG", // Nigeria
  "RW", // Rwanda
  "ST", // Sao Tome and Principe
  "SN", // Senegal
  "SC", // Seychelles
  "SL", // Sierra Leone
  "SO", // Somalia
  "SS", // South Sudan
  "SD", // Sudan
  "TZ", // Tanzania
  "TG", // Togo
  "TN", // Tunisia
  "UG", // Uganda
  "ZM", // Zambia
  "ZW"  // Zimbabwe
];




(function (i) {
    const defaultCountryCode = 'US'; // Replace 'US' with your desired default country code

    const itiContact = window.intlTelInput(contactInput, {
        initialCountry: defaultCountryCode, // Set the default country code here
        separateDialCode: true,
        excludeCountries: excludedCountries, // Exclude specified countries
        utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js',
    });

    // Set the default STD code when initializing
    $('#contact_std_code_' + i).val(itiContact.getSelectedCountryData().dialCode);

    contactInput.addEventListener('countrychange', function () {
        const currentInputValue = contactInput.value;
        const dialCode = itiContact.getSelectedCountryData().dialCode;
        const phoneNumber = currentInputValue.replace(/\D/g, '');
        $('#contact_std_code_' + i).val(dialCode);
    });
})(i);



  (function (index) {
    const emailInput = document.getElementById("email" + index);
    const emailError = document.getElementById("email-error-" + index);
    
    emailInput.addEventListener('blur', function () {
      const email = emailInput.value;
      if (!isValidEmail(email)) {
        emailError.textContent = "Invalid email format.";
      } else {
        emailError.textContent = "";
      }
    });
  })(i);
  
$('#DOB' + i).datepicker({
  format: 'dd/mm/yyyy',
  todayHighlight: true,
  autoclose: true,
  placeholder: 'Date of Booking',
  startDate: (xtravelerType === 'Child') ? '-18y' : '-100y',
  endDate: (xtravelerType === 'Child') ? '-1y' : '-18y'
});




var currentDate = new Date();
var sixMonthsLater = new Date();
sixMonthsLater.setMonth(currentDate.getMonth() + 6);


var sixMonthsLaterFormatted = sixMonthsLater.getDate() + '/' + (sixMonthsLater.getMonth() + 1) + '/' + sixMonthsLater.getFullYear();


$('#passportExpiryDate' + i).datepicker({
  format: 'dd/mm/yyyy',
  todayHighlight: true,
  autoclose: true,
  startDate: sixMonthsLaterFormatted, 
  placeholder: 'Date of Booking'
});
  }
  
  function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
 }

}

</script>





@endsection


