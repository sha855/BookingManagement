<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' =>  ['required', new Recaptcha],
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register',['page_title'=> __("Sign Up")]);
    }

   
  
    // protected function create(array $data)
    // {  
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'g-recaptcha-response' =>$data['g-recaptcha-response'],
    //         'password' => Hash::make($data['password']),
    //         'status'=>'publish'
    //     ]);
    // }
    
   protected function create(array $data)
{

    
    try {
        $recaptchaSecretKey = "6LfRG9gnAAAAAAFYscTGwYpVmXDOzY_DAXzgAYaz";
        $recaptchaResponse = $data['g-recaptcha-response'];

        $response = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecretKey,
            'response' => $recaptchaResponse,
        ]);

        $responseData = $response->json();

        if (!$responseData['success']) {
            return redirect()->back()->withErrors(['captcha' => 'reCAPTCHA verification failed'])->withInput();
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'stdcode'=> $data['stdcode'],
            'password' => Hash::make($data['password']),
            'status' => 'publish'
        ]);
    } catch (\Exception $e) {
        // Handle the exception here
        return redirect()->back()->withErrors(['error' => 'An error occurred'])->withInput();
    }
}


}
