<?php
namespace Modules\Api\Controllers;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Matrix\Exception;
use Modules\User\Events\SendMailUserRegistered;
use Modules\User\Resources\UserResource;
use Validator;

class AuthController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['login','register','otpVerify','emailphonelog','OtpResend']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     */
    public function login(Request $request)
    {
        
           if($request->email == null)
           {
               
               return response()->json(['status'=>'0' , 'message'=> 'email field is required']);
           }elseif($request->password == null)
          {
              
               return response()->json(['status'=>'0' , 'message'=> 'password field is required']);
             
          }else{
              
               if($request->device_name == null)
              {
                  
                   return response()->json(['status'=>'0' , 'message'=> 'device_name field is required']);
                  
              }else{
                  
                    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                   'email' => 'email',
            ]);
        
        
        if ($validator->fails()) {
            return $this->sendError('',['errors'=>$validator->errors()]);
        }

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->sendError(__("Password is not correct"),['code'=>'invalid_credentials']);
        }

        return [
            'token'=>$user->createToken($request->device_name)->plainTextToken,
            'status'=>1,
            'data'=>$user
        ];
       
                  
                  
              }
             
          }
          
          
    }
    
   
   
   public function otpVerify(request $request)
   {
       if($request->phone !== null)
        {
            
            $user = User::where('phone',$request->phone)->where('otp',$request->otp)->first();
             
        if($user)
        {
            return [
            'token'=>$user->createToken($request->device_name)->plainTextToken,
            'user'=> new UserResource($user),
            'status'=>1
        ];
           
        }else{
            
            if(!$user)
            {
                return response()->json(['message'=>'wrong otp',"status"=>0]);
                
                
            }
            
            else{
                
                return response()->json(['message'=>'something went wrong try again',"status"=>2]);
                
            }
        }
        
        }
        
        elseif($request->email !== null){
          
            $user = User::where('email', $request->email)->where('otp',$request->otp)->first();
             
        if($user)
        {
           
             return [
             
            'token'=>$user->createToken($request->device_name)->plainTextToken,
            'status'=>1,
            'data'=>$user
        ];
         
            
        }else{
            
            if(!$user)
            {
                return response()->json(['message'=>'wrong otp',"status"=>0]);
             }
            
            else{
                
                return response()->json(['message'=>'something went wrong try again',"status"=>2]);
               
            }
            
        }
        
       }else{
             return response()->json(['message'=>'wrong credential',"status"=>2]);
            
        }
   } 
        
  
    
    
    public function  emailphonelog(request $request)
    {
         
         $otp = rand(999999,111111);
         
        if($request->email !== null)
        {
             $user = User::where('email', $request->email)->first();
        
        if(!$user)
        {
            
               return response()->json(['message'=>'no user found','status'=>0,'data'=>$user]);
            
        }else{
            
         $to = $request->email;
         $subject = "OTP Login";
        
         $body='
         
         <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
   
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We are thrilled to have you here! Get ready to dive into your new account. </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#0769d9" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#0769d9" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 48px; font-weight: 400; margin: 2;">RoamioDeals!</h1> 
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
        
                          <tr>
                        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;text-align:center;"><b>Congratulation</b> Your OTP for login in RoamioDeals is <b>'.$otp.'</b></p>
                        </td>
                    </tr>
                    
                  
                   <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If you have any questions, just reply to this email—we are always happy to help out.</p>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;"><a href="#" style="color: #0769d9;"></a></p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Regards to,<br>RoamioDeals Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ec0900" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #fff; margin: 0;">RoamioDeals</h2>
                            <p style="margin: 0;"><a href="#" target="_blank" style="color: #FFF;font-size:12px;text-decoration:none;">Copyright © 2014 - 2021 RoamioDeals All Rights Reserved.</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>
        ';
         
         
         $header  = "From:dev@techdocklabs.com \r\n";
        //  $header .= "Cc:hr@techdocklabs.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail($to,$subject,$body,$header);
        
         $update = User::where('email', $request->email)->update([
                   
                   'otp' =>$otp
             
             ]);
       
           return response()->json(['message'=>'otp send successfully to your email','status'=>1,'otp'=>$otp]);
           
        }      
         }elseif($request->phone !== null)
        {
           
           
           $user = User::where('phone',$request->phone)->first();
           
           if($user)
           {
               
                 $update = User::where('phone', $request->phone)->update([
                   
                   'otp' =>$otp
             ]);

       return [
            'token'=>$user->createToken($request->device_name)->plainTextToken,
            'data' => $user,
            'message' =>'authentication successfull',
            'status'=>1
        ];

             
           }else{
               
               return response()->json(['message'=>'no user found','status'=>0,'data'=>$user]);
               
               }
            
        }else{
            
            return response()->json(['message'=>'wrong credential','status'=>2]);
            
            }
         
         
     }
    
    
    
    
    public function OtpResend(Request $request )
    {
        $otp = rand(999999,111111);
        
        if($request->email !== null)
        {
            
           
            
        $user = User::where('email', $request->email)->first();
        
        if(!$user)
        {
            
               return response()->json(['message'=>'no user found','status'=>0,'data'=>$user]);
            
        }else{
            
               $to = $request->email;
         $subject = "OTP Login";
        
         $body='
         
         <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
   
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We are thrilled to have you here! Get ready to dive into your new account. </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#0769d9" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#0769d9" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 48px; font-weight: 400; margin: 2;">RoamioDeals!</h1> 
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
        
                          <tr>
                        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;text-align:center;"><b>Congratulation</b> Your OTP for login in RoamioDeals is <b>'.$otp.'</b></p>
                        </td>
                    </tr>
                    
                  
                   <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If you have any questions, just reply to this email—we are always happy to help out.</p>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;"><a href="#" style="color: #0769d9;"></a></p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Regards to,<br>RoamioDeals Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ec0900" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #fff; margin: 0;">RoamioDeals</h2>
                            <p style="margin: 0;"><a href="#" target="_blank" style="color: #FFF;font-size:12px;text-decoration:none;">Copyright © 2014 - 2021 RoamioDeals All Rights Reserved.</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>';
         
         
         $header  = "From:dev@techdocklabs.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail($to,$subject,$body,$header);
        
       
         return response()->json(['message'=>'otp send successfully to your email','status'=>1,'otp'=>$otp]);
            
        }
            
                
      
           
        }elseif($request->phone !== null)
        {
          
              
          $user = User::where('phone',$request->phone)->first();
           
          if($user)
          {
               
              return response()->json(['message'=>'authentication successfull','status'=>1,'data'=>$user]);
               
          }else{
               
              return response()->json(['message'=>'no user found','status'=>0,'data'=>$user]);
               
          }
            
            
        }else{
            
             return response()->json(['message'=>'wrong credential','status'=>2]);
            
        }
        
    }
    

    public function register(Request $request)
    {
        
        
        $user = User::where('email',$request->email)->first();
        
        if($user)
        {
            
           return response()->json(['message'=>'email has been taken','status'=>0]); 
            
        }
        
       
        if(!is_enable_registration()){
            return $this->sendError(__("You are not allowed to register"));
        }
        $rules = [
            'first_name' => [
                'required',
                'string',
                'max:255'
            ],
            'last_name'  => [
                'required',
                'string',
                'max:255'
            ],
            'email'      => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password'   => [
                'required',
                'string'
            ],
            'term'       => ['required'],
        ];
        $messages = [
            'email.required'      => __('Email is required field'),
            'email.email'         => __('Email invalidate'),
            'password.required'   => __('Password is required field'),
            'first_name.required' => __('The first name is required field'),
            'last_name.required'  => __('The last name is required field'),
            'phone.required'      => __('The phone is required field'),
            'term.required'       => __('The terms and conditions field is required'),
        ];
        
        
        
        
        
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        } else {
            $user = \App\User::create([
                'first_name' => $request->input('first_name'),
                'last_name'  => $request->input('last_name'),
                'email'      => $request->input('email'),
                'otp'        => rand(999999,111111),
                'password'   => Hash::make($request->input('password')),
                'publish'    => $request->input('publish'),
                'phone'      => $request->input('phone'),
            ]);
            
            event(new Registered($user));
             
            try {
                event(new SendMailUserRegistered($user));
            } catch (Exception $exception) {
                Log::warning("SendMailUserRegistered: " . $exception->getMessage());
            }
            $user->assignRole(setting_item('user_role'));
            
         
            
        return response()->json(['message'=>'user register successfully','data'=>Auth::loginUsingId($user->id),'status'=>1,'token'=>$user->createToken($request->device_name)->plainTextToken]);
            
            // return $this->sendSuccess(__('Register successfully'));
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth()->user();

        if(!empty($user['avatar_id'])){
            $user['avatar_url'] = get_file_url($user['avatar_id'],'full');
            
            $user['avatar_thumb_url'] = get_file_url($user['avatar_id']);
        }

        return $this->sendSuccess([
            'data'=>$user
        ]);
    }

    public function updateUser(Request $request){
         
         if($request->profile_pic == null)
         {
             
              $updatedata = User::where('id',$request->id)->update([
               
                 'gender' =>$request->gender,
                 'first_name' => $request->first_name,
                 'last_name' =>$request->last_name,
                  'dob' =>$request->dob
            ]);
          
         $user = User::where('id',$request->id)->first();
         
         
         return response()->json(['status'=>1,'message'=>'data updated successfully','data'=>$user]);
             
             
             
         }else{
             
              $productImage =date('mdYHis').uniqid().'.'.$request->profile_pic->extension();
      
       $request->profile_pic->move(public_path('image'),$productImage);
       
        $updatedata = User::where('id',$request->id)->update([
               
                 'gender' =>$request->gender,
                 'first_name' => $request->first_name,
                 'last_name' =>$request->last_name,
                 'images' =>$productImage,
                  'dob' =>$request->dob
            ]);
          
         $user = User::where('id',$request->id)->first();
         
         
     return response()->json(['status'=>1,'message'=>'data updated successfully','data'=>$user]);
             
         }
     
     
      
     
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out','status'=>1]);
    }

    public function changePassword(Request $request){

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
             'current_password' =>'required',
            'new_password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            
             return $this->sendError('',['errors'=>$validator->errors()]);
            }
            
            
        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return $this->sendError(__("Current password is not correct"),['code'=>'invalid_current_password']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        $user->tokens()->delete();

        return $this->sendSuccess(['message'=>__("Password updated. Please re-login"),'code'=>"need_relogin"]);
    }
    
    
      public function refresh(Request $request)
      {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(['token' => $user->createToken($user->name)->plainTextToken]);
      }
      
      
    
     
     
}
