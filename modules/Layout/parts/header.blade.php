  <style>
 .btn-light:hover{
     color:white !important;
 }

@media screen and (min-width: 1400px) {    
 .login-btnss{
   position: relative !important;
    top: -6px !important; 
 }
 .gii{
      position: relative !important;
    top: -13px !important;   
 }
 .signssssbtn{
  position: relative !important;
    top: -6px !important;     
 }
.logni_sign{
    float: right;
    right: -182% !important;
    position: relative !important;
   top: -125px !important;
    
}  
.input_search{
       left: -75% !important;
    width: 184% !important;
    top: 9px !important;
}
    
.wish_list{
    color: #FF3500;
      left: 131% !important;
    position: relative;
    top: -24px !important;
    font-size: 15px;
    font-weight: 600;
} 
.cart_list{
  color: #CDCFD0;
     left: 178% !important;
    position: relative !important;
    top: -68px !important;
    font-size: 15px;
    font-weight: 600;
}


}
@media screen and (max-width: 1200px) {
    .input_search {
        left: -129% !important;
    width: 133% !important;
    top: 10px !important;
    }
    .logni_sign{
        position: relative;
    top: -122px !important;
    display: flex !important;
    margin: auto !important;
    text-align: end !important;
    padding: 10px 9px !important;
    right: -110% !important;
    font-size: 10px !important;
   
}  
   .wish_list{
    color: #FF3500;
   
    position: relative;
    top: -22px;
    font-size: 15px;
    font-weight: 600;
    left: 15% !important;
   } 
    
   .cart_list{
    color: #CDCFD0;
    left: 73% !important;
    position: relative;
    top: -67px;
    font-size: 15px;
    font-weight: 600;
}

.login-btnss{
    position: relative !important;
    left: -40px !important;
}
.signssssbtn{
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color: white;
    border-radius: 10px;
    font-size: 15px !important;
    width: 144% !important;
    position: relative !important;
    left: -26px;
}

}
@media screen and (max-width: 991px){
 .input_search{
    width: 121% !important;
    font-size: 6px !important;
    position: relative;
    left: -266px !important;
 }
 .topbar-items{
    position: relative;
    left: -39px; 
 }

 .wish_list{
    top: -22px;
    font-size: 11px !important;
    font-weight: 600;
    left: 30px !important;
    position: relative !important;
    /* left: 47px; */
    left: -58px !important;
 }

 .cart_list{
    color: #CDCFD0;
    left: 15% !important;
    position: relative !important;
    top: -67px;
    font-size: 11px !important;
    font-weight: 600;
 
}
.logni_sign{
    position: relative !important;
    left: 82px !important;
}
.btn-light{
    color: #FF3500;
    font-weight: 800;
    background: white;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
    border-radius: 10px;
    position: relative;
    left: 46px !important;
    font-size: 9px !important;
} 
.signssssbtn{
    background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color: white;
    border-radius: 10px;
    font-size: 8px !important;
}
}
@media screen and (max-width: 1399px){
.check-in-wrapper{
    position: relative;
    left: -12% !important;

}
.deals{
    position: relative;
    bottom: -40px;
    left: 34px !important;
    top: 57px;
    font-size: 18px;
    color: #FF3500;
    font-weight: 900;   
}

 
}

 .login-btnss:hover{
    color: #FF3500 !important;  
 }

</style>
<div class="bravo_header" style="background:white;">
   <div class="{{$container_class ?? 'container'}} "  
>
       <div class="content ">
           <div class="header-left">
               <a href="{{url(app_get_locale(false,'/'))}}" class="bravo-logo">
                   @php
                       $logo_id = setting_item("logo_id");
                       if(!empty($row->custom_logo)){
                       
                           $logo_id = $row->custom_logo;
                       }
                   @endphp
                   @if($logo_id)
                       <?php $logo = get_file_url($logo_id,'full') ?>
                       
                       <img src="{{$logo}}" style="height: 56px; left: 4px;
                        position: relative;" alt="{{setting_item("site_title")}}">
                   @endif
               </a> 
            
       <div class="bravo_topbar" style="height: 94px;">
       <div class="container">
       <div class="content">
           <div class="topbar-left">
                <ul class="topbar-items">
                   <div style="position: relative !important;
    left: -313px !important;
    top: 39px; !important;">
                   @include('Core::frontend.currency-switcher')
                   
                   {{-- @include('Language::frontend.switcher') --}}
                   </div>
      
       
        <div class="col-md-12 mx-auto">
    <div class="input-group  input_search" style="left: -97%; width: 151%; top: 10px;">
        <input class="form-control border-end-0 border" type="search" id="example-search-input"  placeholder="What are you looking for?" style="background:#F6F6F6;">
        <span class="input-group-append" style="margin-bottom: 0px; border-bottom: 1px solid #dae1e7;">
            <button class="btn btn-outline-secondary search-button border-start-0 border-bottom-0 border ms-n5" type="button" id="search-button" style="height: 39px;background:#F6F6F6;">
                <i class="fa fa-search"></i>
            </button>
        </span>
      
    </div>
</div>
       
        <?php  
          $hdata = DB::table('bravo_hotels')->where('deleted_at',NULL)->get();
        ?>
        
        
       <?php
       
        $edata = DB::table('bravo_events')->where('deleted_at',NULL)->get();
        
        $hdata = DB::table('bravo_hotels')->where('deleted_at',NULL)->get();
        
        $combinedData = $edata->merge($hdata);
        
       
       ?>
 

       <?php

       $user_id = null;
      
           if(auth()->check())
           {
          
             $user_id = auth()->user()->id;
           }
      
           
         $cartdata = DB::table('cart')
    ->select('product_id')
    ->where('user_id', $user_id)
    ->whereNull('status')
    ->distinct()
    ->get();
           
      
                ?>
      
            
<div class="col-md-12">
    @if(Auth::check())
        <a href="{{ url('hotel-wish-list') }}">
            <p class="wish_list" style="color: #FF3500; left: 70%; position:relative; top:-22px; font-size:15px; font-weight:600;">
                <span><i class="fa fa-heart-o" aria-hidden="true" style="font-size: 19px;
    position: relative;
    top: 3px;"></i></span>&nbsp; <span style="position: relative;
    top: 2px;">Wishlist</span>
            </p>
        </a>
        <a href="{{ url('user-cart') }}">
            <p class="cart_list" style="color: #FF3500; left: 125%; position: relative; top: -67px; font-size:15px; font-weight:600;">
               
                <span>
                      <img src="{{ asset('image/Vector45.png')}}" style="height: 25px;
    position: relative;
    top: -3px;">&nbsp; &nbsp; &nbsp; Cart
                    <span class="badge bg-danger" style="width: 30px; height: 30px; padding: 15.2px 7.8px; font-size: 27px; border-radius: 26px; transform: perspective(0px) translate(-12px) rotate(0deg) scale(0.50); transform-origin: top;  padding-right: 0; padding-top: 1px; padding-left: 0.2px; left: -53px; top:0px; position: relative; text-align: center; border-width: 48px;">
                        {{ count($cartdata) }}
                    </span>
                </span>
            </p>
        </a>
    @else
        <a  href="#login" data-toggle="modal" data-target="#login">
            <p class="wish_list" style="color: #CDCFD0; left: 70%; position:relative; top:-22px; font-size:15px; font-weight:600;">
                <span><i class="fa fa-heart-o" aria-hidden="true" style="font-size: 20px;
    position: relative;
    top: 3px;
    left: 1px;
"></i></span>&nbsp; <span style="position: relative;
    top: 2px;">Wishlist</span>
            </p>
        </a>
        <a   href="#login" data-toggle="modal" data-target="#login" >
            <p class="cart_list" style="color: #CDCFD0; left: 125%; position: relative; top: -69px; font-size:15px; font-weight:600;">
                <span>
                   <img src="{{ asset('image/Vector44.png')}}" style="height: 21px;
    top: -2px;
    position: relative;">&nbsp; &nbsp; &nbsp; Cart
                    <span class="badge bg-danger" style="width: 30px; height: 30px; padding: 15.2px 7.8px; font-size: 27px; border-radius: 26px; transform: perspective(0px) translate(-12px) rotate(0deg) scale(0.50); transform-origin: top; padding-right: 0; padding-top: 1px; padding-left: 0.2px; left: -53px; top:0px; position: relative; text-align: center; border-width: 48px;">
                        {{ count($cartdata) }}
                    </span>
                </span>
            </p>
        </a>
    @endif
</div>

             
              
              
      <div  class="logni_sign" style="float: right;
          right: -119%;
       position: relative;
       top: -122px;
      ">
          
           
           
           
          
          
               @if(!Auth::check())
                       <li class=" btn btn -light login-item login-btnss">
                           <a href="#login" data-toggle="modal" data-target="#login" class="login btn btn-light" style="color:#FF3500;font-weight:900; background:white; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px; border-radius: 10px; 
                           position: relative;
                           left: 20px;
                       ">{{__('Login')}}</a>
                       </li>
                       @if(is_enable_registration())
                           <li class="signup-item">
                               <a href="register" class="btn btn-primary signssssbtn" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);color:white; border-radius: 10px;" class="signup">{{__('Sign Up')}}</a>
                           </li>
                           <!--data-toggle="modal" data-target="#register" -->
                       @endif
                   @else
                       @include('Layout::parts.notification')
                       @php
    $fullName = Auth::user()->getDisplayName();
    $firstName = explode(' ', $fullName)[0];
@endphp
                       <li class="login-item dropdown ">
                           <a href="#" data-toggle="dropdown"  class="login btn btn-light gii" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);color:white; border-radius: 10px;     position: relative; top: -18px; ">{{ __("Hi, :name", ['name' => $firstName]) }}
                               <!--{{__("Hi, :name",['name'=>Auth::user()->getDisplayName()])}}-->
                               <i class="fa fa-angle-down"></i>
                           </a>
                           <ul class="dropdown-menu dropdown-menu-user text-left" style="width:140px;">
                               @if(empty( setting_item('wallet_module_disable') ))
                                   <li class="credit_amount">
                                       <a href="{{route('user.wallet')}}"><i class="fa fa-money"></i> {{__("Credit: :amount",['amount'=>auth()->user()->balance])}}</a>
                                   </li>
                               @endif
                            @if(is_vendor())
                              {{-- <li class="menu-hr"><a href="{{route('vendor.dashboard')}}" class="menu-hr"><i class="icon ion-md-analytics"></i> {{__("Vendor Dashboard")}}</a></li> --}}
                              
                              
                               
                               
                               @endif 
                               
                               @if(!Auth::user()->hasPermission('dashboard_vendor_access')) 
                               
                                <li class="@if(is_vendor()) menu-hr @endif">
                                    
                                    <a href="{{route('user.profile.index')}}"><i class="icon ion-md-construct"></i> {{__("My profile")}}</a>
                                    
                                </li> 
                               
                                <li class="menu-hr"><a href="{{route('user.booking_history')}}"><i class="fa fa-clock-o"></i> {{__("Booking History")}}</a></li>
                                
                                <li class="menu-hr"><a href="{{route('user.change_password')}}"><i class="fa fa-lock"></i> {{__("Change password")}}</a></li>
                               
                               
                               @endif
                               
                              
                               
                               
                               @if(setting_item('inbox_enable'))
                               <li class="menu-hr">
                                   <a href="{{route('user.chat')}}"><i class="fa fa-comments"></i> {{__("Messages")}}
                                       @if($count = auth()->user()->unseen_message_count)
                                           <span class="badge badge-danger">{{$count}}</span>
                                       @endif
                                   </a>
                               </li>
                               @endif
                                

                              @if(is_admin())
                                   <li class="menu-hr"><a href="{{route('admin.index')}}"><i class="icon ion-ios-ribbon"></i> {{__("Admin Dashboard")}}</a></li>
                               @endif 
                               <li class="menu-hr">
                                   <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();"><i class="fa fa-sign-out"></i> {{__('Logout')}}</a>
                               </li>
                           </div>
                           </ul>
                           <form id="logout-form-topbar" action="{{ route('logout') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                           </form>
                       </li>
                   @endif
               </ul> 
           </div>
       </div>
   </div>
</div> 
</div>

{{--
         <div class="header-right" >
             <div class="col-md-12 mx-auto">
             <div class="input-group" style="left: -303%; width: 151%; top: 34px;">
             <input class="form-control border-end-0 border" type="search" id="example-search-input"  placeholder="What are you looking for?" style="background:#F6F6F6;">
             <span class="input-group-append" style="margin-bottom: 0px; border-bottom: 1px solid #dae1e7;">
            <button class="btn btn-outline-secondary search-button border-start-0 border-bottom-0 border ms-n5" type="button" id="search-button" style="height: 39px;background:#F6F6F6;">
                <i class="fa fa-search"></i>
            </button>
        </span>
      
    </div>
</div>
            
               @if(!empty($header_right_menu))
                   <ul class="topbar-items">
                       <div style="left: -1118px;
    position: relative;
    top: 3px;">
                            @include('Core::frontend.currency-switcher')
                             @include('Language::frontend.switcher') 
                       </div>
                      
                       
                       @if(!Auth::check())
                           <li class="login-item" style="position: relative;
                          top: -27px;">
                               <a href="#login" data-toggle="modal" data-target="#login" class="login btn btn-light">{{__('Login')}}</a>
                           </li>
                           @if(is_enable_registration())
                               <li class="signup-item" style="position: relative;
                                     top: -27px;">
                                   <a href="#register" data-toggle="modal" data-target="#register" class="signup btn btn-light">{{__('Sign Up')}}</a>
                               </li>
                           @endif
                       @else
                           <li class="login-item dropdown">
                               <a href="#" data-toggle="dropdown" class="is_login">
                                   @if($avatar_url = Auth::user()->getAvatarUrl())
                                       <img class="avatar" src="{{$avatar_url}}" alt="{{ Auth::user()->getDisplayName()}}">
                                   @else
                                       <span class="avatar-text">{{ucfirst( Auth::user()->getDisplayName()[0])}}</span>
                                   @endif
                                   {{__("Hi, :Name",['name'=>Auth::user()->getDisplayName()])}}
                                   <i class="fa fa-angle-down"></i>
                               </a>
                               <ul class="dropdown-menu text-left">

                                  
                                   <li class="@if(Auth::user()->hasPermission('dashboard_vendor_access')) menu-hr @endif">
                                       <a href="{{route('user.profile.index')}}"><i class="icon ion-md-construct"></i> {{__("My profile")}}</a>
                                   </li>
                                   @if(setting_item('inbox_enable'))
                                   <li class="menu-hr"><a href="{{route('user.chat')}}"><i class="fa fa-comments"></i> {{__("Messages")}}</a></li>
                                   @endif
                                   <li class="menu-hr"><a href="{{route('user.booking_history')}}"><i class="fa fa-clock-o"></i> {{__("Booking History")}}</a></li>
                                   <li class="menu-hr"><a href="{{route('user.change_password')}}"><i class="fa fa-lock"></i> {{__("Change password")}}</a></li>
                                   @if(Auth::user()->hasPermission('dashboard_access'))
                                       <li class="menu-hr"><a href="{{route('admin.index')}}"><i class="icon ion-ios-ribbon"></i> {{__("Admin Dashboard")}}</a></li>
                                   @endif
                                    <a href="{{route('user.profile.index')}}">
                           <i class="icon ion-md-construct"></i> {{__("My profile")}}
                               </a> 
                                   <li class="menu-hr">
                                       <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> {{__('Logout')}}</a>
                                   </li>
                               </ul>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                               </form>
                           </li>
                       @endif
                   </ul>
               @endif
            
              
               <button class="bravo-more-menu">
                   <i class="fa fa-bars"></i>
               </button>
           </div>
           --}}
          
       </div>
   </div>


   <div class="bravo-menu-mobile" style="display:none;">
       <div class="user-profile">
           <div class="b-close"><i class="icofont-scroll-left"></i></div>
           <div class="avatar"></div>
           

           <ul style="width:100%;">
               @if(!Auth::check())
                   <li>
                       <a href="#login" data-toggle="modal" data-target="#login" class="login">{{__('Login')}}</a>
                   </li>
                   @if(is_enable_registration())
                       <li>
                           <a href="#register" data-toggle="modal" data-target="#register" class="signup">{{__('Sign Up')}}</a>
                       </li>
                   @endif
               @else
                   <li>
                       <a href="{{route('user.profile.index')}}" class="btn btn-light" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);color:white;">
                           <i class="icofont-user-suited"></i> {{__("Hi, :Name",['name'=>Auth::user()->getDisplayName()])}}
                       </a>
                   </li>
                 
                   @if(Auth::user()->hasPermission('dashboard_access'))
                       <li>
                           <a href="{{route('admin.index')}}"><i class="icon ion-ios-ribbon"></i> {{__("Admin Dashboard")}}</a>
                       </li>
                   @endif
                   <li>
                       <a href="{{route('user.profile.index')}}">
                           <i class="icon ion-md-construct"></i> {{__("My profile")}}
                       </a>
                   </li>
                   <li>
                       <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                           <i class="fa fa-sign-out"></i> {{__('Logout')}}
                       </a>
                       <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
                       </form>
                   </li>

               @endif
           </ul>

            <a href="{{url('hotel-wish-list')}}"><p style="color:gray;left: 20px; position:relative; "><span><i class="fa fa-heart" aria-hidden="true"></i></span>WishList</p></a>
        <a href="{{url('user-cart')}}"> <p style="color: gray;
         left: 20px;
         position: relative;
         ;"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>  cart </p></a>



           <ul class="multi-lang">
               @include('Core::frontend.currency-switcher')
           </ul>
           <ul class="multi-lang">
               @include('Language::frontend.switcher')
           </ul>   
       </div>
       <div class="g-menu">
           <?php generate_menu('primary') ?>
       </div>
   </div>
</div>


 


<script>
    const searchInput = document.getElementById('example-search-input');
    const searchButton = document.getElementById('search-button'); // Add this line to select the search button

    // Clear previous options and set selectedHotelId to null
    let selectedHotelId = null;

    searchInput.addEventListener('input', function () {
        searchInput.setAttribute('list', 'filteredData');
    });

    searchButton.addEventListener('click', function () {
        const keyword = searchInput.value.trim().toLowerCase();
        const url = `staycation-search/${keyword}`;
        window.location.href = url;
    });

    searchInput.addEventListener('change', function () {
        const selectedOption = [...dataList.options].find(option => option.value === searchInput.value);
        if (selectedOption) {
            selectedHotelId = selectedOption.getAttribute('data-id'); // Set the selectedHotelId
            const keyword = searchInput.value.trim().toLowerCase();
            const url = `staycation-search/${keyword}`;
            window.location.href = url;
        }
    });

    // Create dataList and append to the body
    const dataList = document.createElement('datalist');
    dataList.id = 'filteredData';
    document.body.appendChild(dataList);

    // Fetch hotel data and populate dataList
    const hotelData = <?php echo json_encode($hdata); ?>;
    hotelData.forEach(hotel => {
        const option = document.createElement('option');
        option.value = hotel.title;
        option.setAttribute('data-id', hotel.id);
        dataList.appendChild(option);
    });
</script>




    




