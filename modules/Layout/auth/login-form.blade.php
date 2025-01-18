<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@400;700&display=swap" rel="stylesheet">
<style>



.g-recaptcha {
    margin: 10px 0;
}

#image{
    font-size: 48px;
    margin-top: -20px;
    top: 0px;
    position: relative;
   /*font-family: 'Qwitcher Grypen', cursive;*/

     color: #333; /* Customize the color */
     
}
#user-input{
    /*box-shadow: 1px 1px 1px 1px gray;*/
    width:auto;
       margin-right: 10px;
    padding: 10px;
    padding-bottom: 0px;
    height: 40px;
       border:  2px solid lightgray;
}
input{
    border:1px black solid;
}
.inline{
    display:inline-block;
}
#btn{
    box-shadow: 5px 5px 5px grey;
    color: aqua;
    margin: 10px;
    background-color: brown;
}
.hideceptch{
    padding:10px !important;
        position: relative !important;
    top: -10px !important;
}

</style>

<form class="bravo-form-login" method="POST" action="{{ route('login') }}" id="login-form">
  
        <div id="login-error" style="display: none; color: red;"></div>
    
      @csrf
    <div class="form-group">
        <input type="text" class="form-control" id="email" name="email" autocomplete="off" placeholder="{{__('Email address')}}">
        <i class="input-icon icofont-mail"></i>
        <span class="invalid-feedback error error-email"></span>
    </div>
    
    
    <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" autocomplete="off"
          placeholder="{{__('Password')}}">
        <i class="input-icon fa fa-fw fa-eye field_icon toggle-password" style="color:black;"></i>
        <span class="invalid-feedback error error-password"></span>
    </div>
    
<br>
<p id="key" ></p>
      
     
    <div class="form-group">
        <div class="d-flex justify-content-between">
            <label for="remember-me" class="mb0">
                <input type="checkbox" name="remember" id="remember-me" value="1"> {{__('Remember me')}} <span class="checkmark fcheckbox"></span>
            </label>
            <a href="{{ route("password.request") }}" style="color: #0379bc;">{{__('Forgot Password?')}}</a>
        </div>
    </div>
    
    @if(setting_item("user_enable_login_recaptcha"))
        <div class="form-group">
            {{recaptcha_field($captcha_action ?? 'login')}}
        </div>
    @endif
    
    
    <div class="error message-error invalid-feedback"></div>
    
    
    <div class="form-group">
        <button class="btn btn-primary form-submit" id="loginButton"  type="submit">
            {{ __('Login') }}
            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button>
      
</button>
    </div>
    
    
    <div class="form-group">
        <p> By signing up, you’re agree to our <span style="color:#FF3500;"><a href="{{ url('page/terms-and-condition')}}">Terms & Conditions</a></span> and <span style="color:#FF3500;" ><a href="{{ url('page/privacy-policy')}}">Privacy Policy</a></span></p>
        </div>
    @if(setting_item('facebook_enable') or setting_item('google_enable') or setting_item('twitter_enable'))
        <div class="advanced">
            <p class="text-center f14 c-grey">{{__('or continue with')}}</p>
            <div class="row">
                
                
                
                @if(setting_item('facebook_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('/social-login/facebook')}}"class="btn btn_login_fb_link" data-channel="facebook">
                            <i class="input-icon fa fa-facebook"></i>
                            {{__('Facebook')}}
                        </a>
                    </div>
                @endif
                
                
                @if(setting_item('google_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('social-login/google')}}" class="btn btn_login_gg_link" data-channel="google">
                            <i class="input-icon fa fa-google"></i>
                            {{__('Google')}}
                        </a>
                    </div>
                @endif
                
                @if(setting_item('twitter_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('social-login/twitter')}}" class="btn btn_login_tw_link" data-channel="twitter">
                            <i class="input-icon fa fa-twitter"></i>
                            {{__('Twitter')}}
                        </a>
                    </div>
                @endif
                
            </div>
        </div>
    @endif
    
    
    @if(is_enable_registration())
        <div class="c-grey font-medium f14 text-center"> {{__('Do not have an account?')}} <a href="https://roamiodeals.techdocklabs.com/register" >{{__('Sign Up')}}</a></div>
    @endif
    
</form>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script>
          
          $(document).on('click', '.toggle-password', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    
    var input = $("#password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
            });
      </script>
     







     