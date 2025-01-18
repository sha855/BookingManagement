<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// use Artisan;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
    
     Route::get('paymentSuccess','HomeController@successPayment');
  
  
  Route::post('/verify-captcha', 'HomeController@verifyCaptcha')->name('verify.captcha');
    
Route::post('/booking','HomeController@bookingOrder');
    
Route::get('/intro','LandingpageController@index');

Route::get('/', 'HomeController@index');

Route::get('email', 'HomeController@email');


Route::get('/home', 'HomeController@index')->name('home');

Route::post('/install/check-db','HomeController@checkConnectDatabase');

// Social Login
Route::get('social-login/{provider}', 'Auth\LoginController@socialLogin');

Route::get('social-callback/{provider}', 'Auth\LoginController@socialCallBack');

// Logs
Route::get(config('admin.admin_route_prefix').'/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware(['auth', 'dashboard','system_log_view'])->name('admin.logs');

Route::get('/install','InstallerController@redirectToRequirement')->name('LaravelInstaller::welcome');

Route::get('/install/environment','InstallerController@redirectToWizard')->name('LaravelInstaller::environment');


Route::get('/clearcache',function(){
    
    Artisan::call('optimize:clear');
    echo "cache clear";
    
});


Route::get('/get_dates_data', 'HomeController@getDatesData');


Route::get('get_all_calculate_price','HomeController@alldatesPrice');



Route::post('adding-to-cart','HomeController@cartaddingfunction');



Route::get('deleteCart/{cartId}','HomeController@cartDelete');


Route::post('promo',function(request $request){


$data = DB::table('promo_code')->where('promo_name', $request->promoCode)->get();

if ($data->isEmpty()) {
    return response()->json(['status' => 0, 'data' => null, 'message' => 'Data not found']);
} else {
    
    return response()->json(['status' => 1, 'message' => 'Data retrieved successfully', 'data' => $data[0]]);
}

});



Route::post("password-reset",'HomeController@reset');



Route::get("payment",'HomeController@payment');









