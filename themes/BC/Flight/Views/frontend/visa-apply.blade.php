{{-- @extends('layouts.app')
@push('css')
 <link href="{{ asset('css/page-apply.css') }}" rel="stylesheet">
 

@endpush
@section('content')


<div class="container">

  <div class="row d-flex justify-content-center">
    <h4 class="text-center py-5">UAE Visa Application</h4>
  </div>


  <div class="row">
    <div class="">
      <div class="br-wizard" style="margin-bottom: -10%;" collapsed="collapsed" step="1">
        <div class="wizard-progress">
          <button class="wizard-progress-btn"  title="Dados Pessoais"><span class="info">Visa Application</span></button>
          <button class="wizard-progress-btn"  title="Validar Dados" active="active"><span class="info">Visa Type</span></button>
          <button class="wizard-progress-btn"  title="Habilitar Cadastro" active="active"><span class="info">Upload Document</span></button>
        </div>
         
        <form action="{{ url('visa_booking') }}" enctype="multipart/form-data" method="post">
             @csrf

        <div class="wizard-form">
          <div class="wizard-panel" style="top: 100px;
         position: relative;" active="active">
            <div >
              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  
                  <select id="nationalitySelect" name="nationality" class="form-control" required>
                      <option>--Nationality--</option>
                      <option>India</option>
                      <option>Bangladesh</option>
                      <option>Sri Lanka</option>
                      <option>Malaysia</option>
                      <option>Singapore</option>
                      <option>Uzbekistan</option>
                      <option>Afghanistan</option>
                      <option>Phillipines</option>
                      <option>Bankok</option>
                      <option>Britain</option>
                   </select>

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
                    <select id="rangeSelect" name="adult" class="form-control" required>
                      <option>--Number of Traveller (Adults)--</option>
                       <option value="0">0</option>
                      <option value="1">1 </option>
                      <option value="2">2 </option>
                      <option value="3">3 </option>
                      <option value="4">4 </option>
                      <option value="5">5 </option>
                      <option value="6">6 </option>
                      <option value="7">7 </option>
                      <option value="8">8 </option>
                      <option value="9">9 </option>
                      <option value="10">10 </option>

                    </select>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                      <select id="childSelect" name="child" class="form-control" required>
                        <option>--Number of Traveller (Childs)--</option>
                        <option value="0">0</option>
                        <option value="1">1 </option>
                        <option value="2">2 </option>
                        <option value="3">3 </option>
                        <option value="4">4 </option>
                        <option value="5">5 </option>
                        <option value="6">6 </option>
                        <option value="7">7 </option>
                        <option value="8">8 </option>
                        <option value="9">9 </option>
                        <option value="10">10 </option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="wizard-panel-btn" >
              <button class="br-button wizard-btn-canc" type="button">Cancel
              </button>
          <button class="btn btn-primary nextButtonform wizard-btn-next" onclick="printDivs()" type="button" style="background:#FF3500;display:none;">Next</button>

            </div>
          </div>



          <div class="wizard-panel">
            <div class="">


              @foreach($visadata as $visa)

                    <input type="hidden" id="check{{$visa->id}}" name="entry_id" value="{{$visa->id}}">


              <button type="button" class="accordion">{{$visa->entry}}</button>
              <div class="panel" style="display: flex; flex-direction: column;">

                <div class="container" style="margin-top:10px; margin-bottom:10px;">
                  <div class="row">
                  @foreach ($visa->visa_entry_details as $item)
<div class="col-4">
  <div class="card" style="background: var(--light-orange, #FFF3E3); border-radius:10px;">
    <div style="padding:10px;">
      <div style="display: flex; justify-content: flex-end;">
        <input type="radio" class="form-check-input" style="" id="check{{$item->id}}" name="entry_detail_id" value="{{$item->id}}">
      </div>
      <h5>{{$item->days}}</h5>
      <h6>{{$item->title}}</h6>
      <p>{!! $item->discription !!}</p>
      <h4>{{$item->price}}</h4>
    </div>
  </div>
</div>
@endforeach
                  </div>
                </div>

              </div>
              @endforeach
            </div>
            <div class="wizard-panel-btn">
              <button class="br-button wizard-btn-canc" type="button">Cancel
              </button>

              <button class="btn btn-primary  wizard-btn-next" type="button" style="background:#FF3500;">Next
              </button>

              <button style="left: -8px;
                 position: relative; border: navajowhite;" class="br-button secondary wizard-btn-prev" type="button">previous
              </button>
            </div>
          </div>

         <div class="wizard-panel">

          <div class="" id="userRegisterForm">

              <div id="divContainer"></div>
           
           </div>
                
             <div class="wizard-panel-btn">
              <a href="{{url('visa-page')}}" class="btn btn-danger br-button wizard-btn-canc" type="button">Cancel
              </a>

               @if(auth()->user())


               <button class="btn btn-primary wizard-btn-next" type="submit" style="background:#FF3500;">Proceed 
               </button>

               @else
          
            <button data-toggle="modal" data-target="#login" class="br-button primary wizard-btn" type="button" style="background:#FF3500;">Proceed to Booking
              </button>

              @endif

            </div>
          </div>

        </div>

        </form>


      </div>
    </div>
  </div>
</div>


<br><br><br><br>


@endsection --}}