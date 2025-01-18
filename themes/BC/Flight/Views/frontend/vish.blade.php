@extends('layouts.app')
@push('css')
    <link href="{{ asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/ion_rangeslider/css/ion.rangeSlider.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/fotorama/fotorama.css') }}"/>
  

    <!-- Latest compiled and minified CSS -->

     <style>
       
        .img{
            width: 100%;
        }
        .background{
        background:#FFF5E9;   
        }
      .UAE-Img{
            margin-top:30px;
            height: 48px;
            width: 15%;
        }
        .card-item{
        background:white;
        box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
       

    margin-top: -46px;
    width: 100%;
    text-align: center;
    border-radius: 10px;
        }
    </style>
 @endpush
 @section('content')
 
   <div class="container mt-4 pt-4">
    <div class="row">
        <div class="container mt-3">
            <div class="row">
               <img src="{{ asset('images\divitem-bg.png')}}" style="height: 400px; height: 400px;
    width: 95%;
  
    margin-left: 33px;"> 
         </div> 
     </div>
    </div>
    <div class="container">
        <div class="col-md-10 w-100 card-item justify-content-center offset-md-1">
            <div class="row  text-center" style="height: 132px;">
                
                       @if(auth()->user())
                <div class="col-md-4 py-4">
                   <a href="{{ url('apply-visa-page')}}" style="text-decoration: none; "><img src="{{ asset('images\list-check_2.svg')}}" alt="" >
                    <div class="card-body">
                       <p style="color:#FF3500;font-weight:700">Apply UAE Visa<p>
                    </div>
                </a>
                </div>
                @else
              
                <div class="col-md-4 py-4">
                   <a href="#" data-toggle="modal" data-target="#login" style="text-decoration: none;"><img src="{{ asset('images\list-check_2.svg')}}" alt="">
                    <div class="card-body">
                      <p style="color:#FF3500; font-weight:700"> Apply UAE Visa</p>
                    </div>
                </a>
                </div>

                @endif
                
                 @if(auth()->user())
                <div class="col-md-4 py-4">
                    <a href="{{url('visa-details')}}" style="text-decoration: none;"><img src="{{ asset('images\info-circle_1.svg')}}" alt="" srcset="" style="position: relative;
                     top: 6px;">
                    <div class="card-body" 
                    >
                      <a href="{{url('visa-details')}}"   style="text-decoration: none;"><p style="color:#FF3500; font-weight:700; position: relative;
                  top: 2px;">Check Visa Status</p></a>
                    </div></a>
                </div>
                 @else
                 <div class="col-md-4 py-4">
                  <!--  <a href="{{url('visa-details')}}" style="text-decoration: none;"><img src="{{ asset('images\info-circle_1.svg')}}" alt="" srcset="" style="position: relative;-->
                  <!--   top: 6px;">-->
                  <!--  <div class="card-body" -->
                  <!--  >-->
                  <!--    <a href="{{url('visa-details')}}"   style="text-decoration: none;"><p style="color:#FF3500; font-weight:700; position: relative;-->
                  <!--top: 2px;">Check Visa Status</p></a>-->
                  <!--  </div></a>-->
                  <a href="#" data-toggle="modal" data-target="#login" style="text-decoration: none;"><img src="{{ asset('images\list-check_2.svg')}}" alt="">
                    <div class="card-body">
                      <p style="color:#FF3500; font-weight:700">Check Visa Status</p>
                    </div>
                </a>
                </div>
                 @endif
         
                <div class="col-md-4 py-4">
                    <a href="{{ url('visa-status')}}" style="text-decoration: none;"><img src="{{ asset('images\hand-index-thumb_3.svg')}}" alt="">
                    <div class="card-body">
                       <p style="color:#FF3500; font-weight:700"> Important Terms & Conditions</p>
                    </div>
                  </a>
                </div>
            </div>
        </div>
    </div>
    

   <div class="container">
    <div class="row d-flex justify-content-center">
        <h4 class="text-center py-5">How to apply Visa for UAE</h4>
    </div>

    <div class="row">
        <div class="col-md-4">
         <p>Select your nationality, travel date and number of passengers</p>
          <img src="{{ asset('images/Completed steps-pana (1).png')}}"  class="img">
        </div>
       <div class="col-md-4">
           <img src="{{ asset('images/Vector_132.png')}}"  class="img">
        
       </div>
       <div class="col-md-4">
        <p>Select visa type </p>
        <img src="{{ asset('images/visa-type.png')}}"  class="img">
       </div>
    </div>

    <div class="row pt-2">
        <div class="col-md-4">
         <p>finish payment and there you go</p>
          <img src="{{ asset('images/payment.png')}}"  class="img">
        </div>
       <div class="col-md-4">
        <img src="{{ asset('images/Vector _134.png')}}"  class="img" style="width: 237px;
    top: 28px;
    position: relative;
    left: 18px;">
       </div>
       <div class="col-md-4">
        <p>enter your personal details and upload travel documents </p>
        <img src="{{ asset('images/New entries-pana.png')}}"  class="img">
       </div>
    </div>
</div>
<div class="background mt-5"> 
    <div class="container">
        <div class="row d-flex justify-content-start">
            <h4 class="text-center py-5">Why get UAE Visa from us!</h4>
        </div>
        <div class="row  d-flex justify-content-center">
            <div class="col-md-4 text-center">
                <div class="card1">
                    <img class="card-img-top UAE-Img" src="{{asset('images/Complete_6.svg')}}" alt="Card image cap">
                    <div class="card-body py-2">
                      <h5 class="card-title">Simple & hassle free process</h5>
                      <p class="card-text">Our visa application process is designed to be easy and straightforward. You can complete the application form in just a few minutes</p>

                    </div>
                  </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card1 ">
                    <img class="card-img-top UAE-Img" src="{{asset('images/Complete_7.png')}}" alt="Card image cap">
                    <div class="card-body py-2">
                      <h5 class="card-title">Best Price Guaranteed</h5>
                      <p class="card-text">We offer competitive pricing for our visa services, and we are committed to providing the best value for our customers.</p>
                      
                    </div>
                  </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="card1">
                    <img class="card-img-top UAE-Img" src="{{asset('images/Complete_8.png')}}" alt="Card image cap">
                    <div class="card-body py-2">
                      <h5 class="card-title">Check Visa Status</h5>
                      <p class="card-text">You can easily check the status of your visa application at any time. Simply enter your visa reference number, and you will be able to see the progress of your application.</p>
                  
                    </div>
                  </div>
            </div>
           
        </div>
    </div>
</div>





                                                                                        


<div class="container mt-5">
    <div class="row">
        <h4 class="text-left py-3"> FAQs <span style="font-size:20px;">(Frequently Asked Questions)</span></h4>
    </div>
    <div class="row">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       Q. Why should I apply for a UAE Visa from Roamio Deals?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Ans -  It is an easy and convenient way to apply for your UAE visa from our website / app. Simply provide the required information, documents and pay the visa fee online without having to send documents by email or visiting the office in person. Once your visa application is approved, you will receive an approved e-Visa copy via email or on your whatsapp number.
                        </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     
                        Q. Can I extend my UAE visa on arrival?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                     <p>Ans - Yes. You can extend your Dubai visa on arrival for an additional 14 days but you will have to pay a renewal fee.</>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                       Q. Does a UAE visa  get rejected?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <p>Ans - Yes, if the Dubai visa application form is incorrectly filled or the submitted documents are unclear or if the officials find any discrepancies in the Dubai visa application, then your Dubai visa can get rejected.</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="fourThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                       Q. Can I work in the UAE with a tourist visa?
                    </button>
                </h2>
                <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="fourThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <p>
Ans - No. If you are planning to work in Dubai or UAE, you require a Dubai work visa which your employer will sponsor and pay for. You cannot work in any of the emirates of UAE with a Dubai tourist visa or Dubai visit visa.
</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="fiveThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                       Q. How will I receive my UAE visit visa physically?
                    </button>
                </h2>
                <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="fiveThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                     <p>
Ans - UAE visa is electronic visas – eVisa, which are issued over email. You simply need to carry a printout of it along with your other relevant travel documents such as flight tickets and passport.</p>
                    </div>
                </div>
            </div>

            
            <div class="accordion-item">
                <h2 class="accordion-header" id="sixThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsefive">
                     Q. Is the UAE visa cost inclusive of taxes?
                    </button>
                </h2>
                <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="sixThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                     <p>Ans - Yes, the Dubai visa price includes taxes, along with consulate fees, medical insurance and our service charges.</p>
                    </div>
                </div>
            </div>


            
            <div class="accordion-item">
                <h2 class="accordion-header" id="sevenThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                        Q. What is the difference between a Dubai visa and UAE visa?
                    </button>
                </h2>
                <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="sevenThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                     <p>Ans - There is no difference. Dubai visa and UAE visa are one and the same thing. The UAE visa is commonly called the Dubai visa.
</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="EightThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                       Q. Do I need a Dubai visa if I have a valid US visa?
                    </button>
                </h2>
                <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="EightThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                     <p>Ans - If you have a valid US visa or a valid US green card, then you can easily get a 14 days Dubai visa on arrival in the UAE.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
 </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 @endsection