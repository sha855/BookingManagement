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
  .iti--allow-dropdown input, .iti--allow-dropdown input[type=text], .iti--allow-dropdown input[type=tel], .iti--separate-dial-code input, .iti--separate-dial-code input[type=text], .iti--separate-dial-code input[type=tel] {
    padding-right: 6px;
    padding-left: 195px !important;
    margin-left: 0;
}
</style>

@endpush
@section('content')




<div class="container d-flex justify-content-center">
  <div class="row">
      <h4 class="text-center pt-5">
          <span><img src="{{ asset('images/Flag_of_the_United_Arab_Emirates_1.png')}}"></span> Edit Draft Visa Application
      </h4>
  </div>
</div>


  <center> <div class="card col-md-10" >
<center>
  <div class="h5 py-3">Traveller</div>
  <div class="col-md-10">
      
      <form method = "post" action="{{url('updatedraftVisaPage/'.$data->id)}}" enctype = "multipart/form-data">
          @csrf
      
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="firstName" style="color : #FF3500;"><b>First Name</b></label>
          <input type="text" class="form-control" value="{{$data->firstname}}" name="firstname" id="firstName" aria-describedby="emailHelp" placeholder="First Name" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="lastName" style="color : #FF3500;"><b>Last Name</b></label>
          <input type="text" class="form-control" value="{{$data->lastname}}" name="lastname" id="lastName" aria-describedby="emailHelp" placeholder="Last Name" required>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="DOB" style="color : #FF3500;"><b>Date of Birth</b></label>
          <input type="date" class="form-control"  name="dob" id="DOB" aria-describedby="emailHelp" placeholder="Date of birth" required @if($data->dob)
      value="{{ date('Y-m-d', strtotime($data->dob)) }}"
    @endif
    >
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="email" style="color : #FF3500;"><b>Email</b></label>
          <input type="email" class="form-control" value="{{$data->email}}" name="email" id="email" aria-describedby="emailHelp" placeholder="Email" required>
        </div>
      </div>
    </div>

    <div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="contact" style="color : #FF3500;"><b>Contact Number</b></label>
      <input type="text" class="form-control contact-input" value="{{$data->contact_no}}" name="contact" id="contact" placeholder="Contact Number" required>
      
      <input type="text" style="display:none;" class="form-control stdcodeinput" value="{{$data->contact_std_code}}" name="contact_std_code"  placeholder="Contact Number" required>
      
      
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="alternate" style="color : #FF3500;"><b>Gender</b></label>
      
      
      <select class="form-control" name="alternate_number" required>
          
          <option value="{{$data->alternate_number}}">{{$data->alternate_number}}</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
      </select>
    </div>
  </div>
</div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="passportNumber" style="color : #FF3500;"><b>Passport Number</b></label>
          <input type="text" class="form-control" value="{{$data->passport_no}}" name="passportnumber" id="passportNumber" aria-describedby="emailHelp" placeholder="Passport Number" required>
        </div>
      </div>
      <div class="col-md-6">
  <div class="form-group">
    <label for="passportExpiryDate" style="color : #FF3500;"><b>Passport Expiry Date</b></label>
    <input type="date" class="form-control passportExpiryDate" name="passport_expiry" id="passportExpiryDate" aria-describedby="emailHelp" placeholder="Passport Expiry Date" required
    @if($data->passport_expiry)
      value="{{ date('Y-m-d', strtotime($data->passport_expiry)) }}"
    @endif
    >
  </div>
</div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="placeOfIssue" style="color : #FF3500;"><b>Place of Issue</b></label>
          <input type="text" class="form-control" name="place_issues" value="{{$data->place_issues}}" id="placeOfIssue" aria-describedby="emailHelp" placeholder="Place of Issue" required>
        </div>
      </div>
    <div class="col-md-6">
  <div class="form-group uploadinput">
    <label for="passportfirst" style="color : #FF3500;"><b>Passport First Page</b></label>
    <input type="file" name="passport_first_page" class="form-control" id="passportfirst" aria-describedby="emailHelp" placeholder="passport first page" accept=".pdf,.jpeg,.jpg,.png"> <!-- Set the appropriate file formats here in the accept attribute -->
    @if($data->passport_first_page)
      <small>Current File: {{$data->passport_first_page}}</small>
    @else
      <small>No file selected.</small>
    @endif
  </div>
</div>
    </div>

    <div class="row inputfolter">
     <div class="col-md-6">
  <div class="form-group uploadinput">
    <label for="passportfirst" style="color : #FF3500;"><b>Passport Second Page</b></label>
    <input type="file" name="passport_second_page" class="form-control" id="passportfirst" aria-describedby="emailHelp" placeholder="passport second  page" accept=".pdf,.jpeg,.jpg,.png"> <!-- Set the appropriate file formats here in the accept attribute -->
    @if($data->passport_first_page)
      <small>Current File: {{$data->passport_second_page}}</small>
    @else
      <small>No file selected.</small>
    @endif
  </div>
</div>

<div class="col-md-6">
  <div class="form-group uploadinput">
    <label for="passportfirst" style="color : #FF3500;"><b>Passport Size Photo</b></label>
    <input type="file" name="passport_size_page" class="form-control" id="passportfirst" aria-describedby="emailHelp" placeholder="passport size photo" accept=".pdf,.jpeg,.jpg,.png"> <!-- Set the appropriate file formats here in the accept attribute -->
    @if($data->passport_size_photo)
      <small>Current File: {{$data->passport_size_photo}}</small>
    @else
      <small>No file selected.</small>
    @endif
  </div>
</div>

<center><button type="submit" class="btn btn-primary" style="background: #FF3500;
    width: auto;
    margin-left: 2%; margin-bottom:10px;">Update</button></center>
<br>
<br>
</form>
  
    </div>

  </div>
</center>
</div> </center>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.js"></script>
<script>
  const inputElements = document.getElementsByClassName('contact-input');
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

 
  for (let i = 0; i < inputElements.length; i++) {
    const input = inputElements[i];
    
    const iti = window.intlTelInput(input, {
      excludedCountries: excludedCountries,
      initialCountry: 'auto', // Automatically detect user's country
      separateDialCode: true, // Show the country code separate from the phone number
    });

    input.addEventListener('countrychange', function() {
      const dialCode = iti.getSelectedCountryData().dialCode || '';
      const phoneNumber = input.value.replace(/\D/g, '');
       $('.stdcodeinput').val(dialCode);
      input.value = dialCode + phoneNumber;
    });

    // Ensure the initial value of the input field includes the std code
    const dialCode = iti.getSelectedCountryData().dialCode || '';
    const phoneNumber = input.value.replace(/\D/g, '');
    input.value = dialCode + phoneNumber;
  }
</script>






 @endsection