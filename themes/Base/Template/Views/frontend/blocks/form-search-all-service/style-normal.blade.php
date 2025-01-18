<style>

@media only screen and  (max-width: 600px) {
  .slider_home {
    width:100% !important;
   
    
  }
  .text-heading{
       font-size: 25px !important;    
  }
  .sub-heading{
  position: relative !important;
    top: 105px !important;
    left: -9px !important;
    padding: 10px !important;
}   
.fass {
      margin-left: -10px !important;  
}
.title {
   
}
  }




   @media only screen and (max-width: 600px) {
    .helloo{
 display: none !important;
  }
  .mailchimp{
    display: none !important; 
  }
 
} 

 .text-heading{
    font-size:18px;
  }

  @media only screen and (min-width: 1400px) {
   
   .category{
  display:none;
   }
  

 }

 @media only screen and (min-width: 1300px) {
   
   .category{
  display:none;
   }
 
 
 }
 @media only screen and (min-width: 1200px) {
   
   .category{
  display:none;
   }
 
 }
 @media only screen and (min-width: 1000px) {
   
   .category{
  display:none;
   }
 
 }

 @media only screen and (min-width: 900px) {
   
    .headdd-item{
        margin-top: -214px;
    }
          
  .category{
    left: 57px;
    top: 198px;
    position: relative;
  }

  .card-item{
 background:white;
box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    margin-top: -46px;
    width: 100%;
    text-align: center;
    border-radius: 10px;
}

 }

  @media only screen and (max-width: 899px) {
   
    .headdd-item{
        top: -43px;
    }
      
  .category{
    left: 57px;
    top: 198px;
    position: relative;
  }

  .card-item{
 background:white;
box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    margin-top: -46px;
    width: 100%;
    text-align: center;
    border-radius: 10px;
}
}

@media only screen and (max-width: 767px) {
   
    .headdd-item{
        position: relative !important;
    top: -15px !important;
    text-align: start;
    }
     
 .category{
    left: 0px;
   top: 100px;
   position: relative;
 }

 .card-item{
background:white;
box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
   margin-top: -46px;
   width: 100%;
   text-align: center;
   border-radius: 10px;
   margin-bottom: 140px;
   width: 80% !important;
    left: 52px !important; 
}
.btn_exp{
    left: 2px !important;   
}
}



@media  screen and (max-width: 1020) {
    .helloo{
 display: none !important;
 
  }
  .tabpanel{
    display: none !important;  
  }
}

@media  screen and (max-width: 999px) {
  .helloo{
 display: none !important;
 
  }
  .tabpanel{
    display: none !important;  
  }
}


@media  screen and (max-width: 1199px) {
.gii{
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color: white;
    border-radius: 10px;
    position: relative !important;
    top: -8px !important;
    font-size: 9px !important;
    padding: 2px 52px !important;
    text-align: center !important;
}

}
</style>




@if(!empty($style) and $style == "carousel" and !empty($list_slider))
    <div class="effect slider_home" style="

    width: 96% !important;
    left: 23px;">
        <div class="owl-carousel">
            @foreach($list_slider as $item)
                @php $img = get_file_url($item['bg_image'],'full') @endphp
                <div class="item">
                    <div class="item-bg" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{$img}}') !important"></div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<div class="container">
    <div class="row headdd-item" style="margin-top:-100px;">
        {{-- {{$title}} --}}
        {{-- {{$sub_title}} --}}
        <div class="col-lg-12 " style="left: 50px;">
            <div class="row headdd-item" style="
    top: 96px;
    position: relative;
">
             <div class="col-md-4">
                <h4 class="text-heading"  style="font-size: 35px; font-weight:600; font-family:'poppins';position: relative;
                top: 105px; "> {{$title}}</h4>
                <div class="sub-heading mb-3" style="position: relative;
                top: 105px;">{{$sub_title}}</div>
              <a href="{{ url('deals')}}"><button class="btn btn-light btn_exp" style="position: relative;
                top: 105px;">Explore</button></a>
                </div>   
            </div>
           
            @if(empty($hide_form_search))
                <div class="g-form-control">
                    <ul class="nav nav-tabs" role="tablist">
                        @if(!empty($service_types))
                            @php $number = 0; @endphp
                            @foreach ($service_types as $service_type)
                                @php
                                    $allServices = get_bookable_services();
                                    if(empty($allServices[$service_type])) continue;
                                    $module = new $allServices[$service_type];
                                @endphp
                                <li role="bravo_{{$service_type}}">
                                    <a href="#bravo_{{$service_type}}" class="@if($number == 0) active @endif" aria-controls="bravo_{{$service_type}}" role="tab" data-toggle="tab">
                                        <i class="{{ $module->getServiceIconFeatured() }}"></i>
                                        {{ !empty($modelBlock["title_for_".$service_type]) ? $modelBlock["title_for_".$service_type] : $module->getModelName() }}
                                    </a>
                                </li>
                                @php $number++; @endphp
                            @endforeach
                        @endif
                    </ul> 
                    <div class="col-md-10 w-100 helloo" style="left: 95px;">
                        <div role="tabpanel" class="tab-pane active" id="bravo_flight" style="width:92%;top: 186px;position: relative; border-radius:10%">
                            @include(ucfirst("flight").'::frontend.layouts.search.form-search')
                        </div> 
                    </div>


                   
                </div>
            @endif
        </div>
    </div>
</div>



<div class="category">
    <div class="container">
        <div class="col-md-10 w-100 card-item justify-content-center">
            <div class="row  text-center p-3">
                <div class="col-md-3 py-4 border-bottom">
                    <a href="{{url('visa-page')}}" style="text-decoration: none;"><img src="{{asset('icon/visa.svg')}}" alt="" srcset="">
                    <div class="card-body" 
                    >
                        <p style="color:#FF3500; font-weight:700">Visa</p>
                    </div> </a>
                </div>
              
                <div class="col-md-3 py-4 border-bottom">
                   <a href="{{ url('staycation')}}" style="text-decoration: none;"><img src="{{ asset('icon/Vector.svg')}}" alt="">
                    <div class="card-body">
                       <p style="color:#FF3500;font-weight:700">StayCation<p>
                    </div>
                </a>
                </div>
              
              
                <div class="col-md-3 py-4 border-bottom">
                   <a href="{{ url('deals')}}"  data-toggle="modal" data-target="#login" style="text-decoration: none;"><img src="{{ asset('icon\Hot deal.svg')}}"  alt="">
                    <div class="card-body">
                      <p style="color:#FF3500; font-weight:700"> Deals
                    </p>
                    </div>
                </a>
                </div>
                <div class="col-md-3 py-4 border-bottom">
                    <a href="{{ url('explore-activity')}}" style="text-decoration: none;"><img src="{{ asset('icon\Juggler.svg')}}" alt="">
                    <div class="card-body">
                       <p style="color:#FF3500; font-weight:700">Activities</p>
                    </div>
                  </a>
                </div>
            </div>
        </div>
    </div>
    
</div>
