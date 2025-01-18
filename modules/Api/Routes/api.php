<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;
// use TextBlob\TextBlob;
// // use DB;
// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */
// /* Config */



Route::get('configs','BookingController@getConfigs')->name('api.get_configs');

Route::get('nationality','BookingController@nationality');
/* Service */
Route::get('services','SearchController@searchServices')->name('api.service-search');

Route::post('search/','SearchController@search');

Route::get('/attrget','SearchController@attrtermsget');

Route::get('/nearhotel','SearchController@hotelnear');

Route::get('detail/','SearchController@detail')->name('api.detail');
Route::get('{type}/availability/{id}','SearchController@checkAvailability')->name('api.service.check_availability');
Route::get('boat/availability-booking/{id}','SearchController@checkBoatAvailability')->name('api.service.checkBoatAvailability');

Route::get('{type}/filters','SearchController@getFilters')->name('api.service.filter');
Route::get('{type}/form-search','SearchController@getFormSearch')->name('api.service.form');


Route::get('banner','BookingController@mobilebannerpanel');


Route::post('bestandtodayhotel','BookingController@besthotelfunction');


Route::Post('visaStausupdate','BookingController@visaStatus');



Route::group(['middleware' => 'api'],function(){
    
    Route::post('{type}/write-review/{id}','ReviewController@writeReview')->name('api.service.write_review');
    
});


Route::get('hotelroomdetailget','SearchController@roompricedetail');


/* Layout HomePage */

Route::get('home-page','BookingController@getHomeLayout')->name('api.get_home_layout');

/* Register - Login */
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login')->middleware(['throttle:login']);
    Route::post('resendOtp','AuthController@OtpResend');
    Route::post('verify','AuthController@otpVerify');
    Route::post('emailphonelogin','AuthController@emailphonelog');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('me', 'AuthController@updateUser');
    Route::post('userupdate','AuthController@updateUser');
    Route::post('change-password', 'AuthController@changePassword');
});

/* User */

Route::get('visa_get','BookingController@visaget');

Route::post('visa_update','BookingController@updateVisa');

Route::post('visa_delete','BookingController@deletevisa');

Route::post('booked_visa','BookingController@BookedVisa');

Route::post('cart','BookingController@addTocart');


Route::get('visa_data','BookingController@visadatabookingdata');

Route::post('/visa_booking','BookingController@visasubmit');

Route::group(['prefix' => 'user', 'middleware' => ['api'],], function ($router) {
    Route::get('booking-history', 'UserController@getBookingHistory')->name("api.user.booking_history");
    Route::post('/wishlist','UserController@handleWishList')->name("api.user.wishList.handle");
    Route::get('/wishlist','UserController@indexWishlist')->name("api.user.wishList.index");
    Route::post('/permanently_delete','UserController@permanentlyDelete')->name("user.permanently.delete");
});

/* Location */
Route::get('locations','LocationController@search')->name('api.location.search');
Route::get('location/{id}','LocationController@detail')->name('api.location.detail');

// Booking
Route::group(['prefix'=>config('booking.booking_route_prefix')],function(){
    Route::post('/addToCart','BookingController@addToCart')->name("api.booking.add_to_cart");
    Route::post('/addEnquiry','BookingController@addEnquiry')->name("api.booking.add_enquiry");
    Route::post('/doCheckout','BookingController@doCheckout')->name('api.booking.doCheckout');
    Route::get('/confirm/{gateway}','BookingController@confirmPayment');
    Route::get('/cancel/{gateway}','BookingController@cancelPayment');
    Route::get('/{code}','BookingController@detail');
    Route::get('/{code}/thankyou','BookingController@thankyou')->name('booking.thankyou');
    Route::get('/{code}/checkout','BookingController@checkout');
    Route::get('/{code}/check-status','BookingController@checkStatusCheckout');
});

// Gateways
Route::get('/gateways','BookingController@getGatewaysForApi');

// News
Route::get('news','NewsController@search')->name('api.news.search');
Route::get('news/category','NewsController@category')->name('api.news.category');
Route::get('news/{id}','NewsController@detail')->name('api.news.detail');

/* Media */
Route::group(['prefix'=>'media','middleware' => 'auth:sanctum'],function(){
    Route::post('/store','MediaController@store')->name("api.media.store");
});


/* activity */


Route::get('dataActivity','ActivityDataController@search');

Route::get('attrData','ActivityDataController@attrtermsget');

Route::get('bannerActivity','ActivityDataController@bannerImageActivity');

Route::get('activitydetail','ActivityDataController@detail');

Route::get('viewallHotels','SearchController@viewAll');


Route::get('viewallactivity','ActivityDataController@viewAll');


Route::get('deletecart','BookingController@deleteCart');


Route::post ('order','BookingController@OrderItem');

Route::get  ('upcomingpas','BookingController@upcomingpast');


Route::get('activityCategory',function(){
    
    
    $data = DB::table('bravo_terms')->where('attr_id','22')->get();
    
    $fetch = [];
    
    foreach($data as $dd)
    {
       $image = DB::table('media_files')->where('id',$dd->image_id)->first();
       $dd->banner_image ='/uploads/'. $image->file_path;
       $fetch[] = $dd;
        
    }
    
    if ($fetch){
         return response()->json(['message'=>'data get successfully','status'=>1,'category'=>$fetch]);
        
    }else{
        
         return response()->json(['message'=>'data get successfully','status'=>0,'category'=>[]]);
    }
   
    
    
});




Route::get ('allReview',function(request $request){
    
    $id = $request->id;
    
    $type = $request->type;
    
    
   $review = DB::table('bravo_review')->where('object_id',$id)->where('object_model',$type)->limit(10)->get();
   
   $user_review = [];

foreach ($review as $rr) {
    $user = DB::table('users')->select('first_name', 'last_name', 'images')->where('id', $rr->user_id)->first();
    $rr->user = $user;
    $user_review[] = $rr;
}
   
    
    return response()->json(['message'=>'data get successfully','review'=>$user_review]);
    
});

Route::get('searchhotel',function(request $request){
 
$searchTerm = $request->hotel;

$user_id    = $request->id;

$hotels = DB::table('bravo_hotels')
    ->where('title', 'like', '%'.$searchTerm.'%')
    ->get();
    
$hotelsWithImages = [];

foreach ($hotels as $hotel) {
    $image = DB::table('media_files')->where('id', $hotel->banner_image_id)->first();
    
      $wishlist = DB::table('user_wishlist')
                ->where('object_id', $hotel->id)
                ->where('user_id', $user_id)
                ->where('object_model', 'hotel')
                ->select('id')
                ->first();
                
      $hotel->wishlist= $wishlist ? true : false;
    
    if ($image) {
        $hotel->banner_image = '/uploads/'.$image->file_path;
        
    }
    
    $hotelsWithImages[] = $hotel;
}

return response()->json(['message' => 'Hotels retrieved successfully', 'data' => $hotelsWithImages]);
});



Route::get('searchactivity',function(request $request){
 
 $searchTerm = $request->hotel;
 $user_id    = $request->id;

$hotels = DB::table('bravo_events')
    ->where('title', 'like', '%'.$searchTerm.'%')
    ->get();
    
$hotelsWithImages = [];

foreach ($hotels as $hotel) {
    
    $image = DB::table('media_files')->where('id',$hotel->banner_image_id)->first();
    
     $wishlist = DB::table('user_wishlist')
                ->where('object_id', $hotel->id)
                ->where('user_id', $user_id)
                ->where('object_model', 'event')
                ->select('id')
                ->first();
                
     $hotel->wishlist = $wishlist ? true : false;
    
    if ($image) {
        $hotel->banner_image = '/uploads/'.$image->file_path;
       
    }
    
    $hotelsWithImages[] = $hotel;
}

return response()->json(['message' => 'Hotels retrieved successfully', 'data' => $hotelsWithImages]);
    
    
});


Route::get('cartitem',function(request $request){
    
    $data = DB::table('cart')->where('user_id',$request->user_id)->where('status',null)->get();
    
    $total = (string)$data->sum('total_price');

    
    return response()->json(['message'=>'data get successfully','data'=>$data,'total_price'=>$total]);
});


Route::get('promo',function(request $request){
   
   $data = DB::table('promo_code')->where('promo_name', $request->promo_code)->get();

if ($data->isEmpty()) {
    return response()->json(['status' => 0, 'data' => null, 'message' => 'Data not found']);
} else {
    return response()->json(['status' => 1, 'message' => 'Data retrieved successfully', 'data' => $data[0]]);
}

});


Route::get('staycationBanner',function(){
   
  $data = DB::table('sliderbanner')->where('condition','staycation')->get();
   
   return response()->json(['message'=>'data get successfull','data'=>$data]);
    
});


Route::get('visaterm_condition',function(){
    
  $terms = DB::table('visa_term_condition')->where('id','1')->get();
    
  return response()->json(['data'=>$terms[0]]);
    
});



Route::get('bestdeals',function(request $request){
    
$user_id = $request->id;
$terms = DB::table('bravo_terms')->where('id', '106')->get();
$data = "";

foreach ($terms as $parent) {
    $name = $parent->name;
    $childData = DB::table('bravo_hotel_term')->where('term_id', $parent->id)->distinct()->get();
    $hotels = [];

    foreach ($childData as $child) {
        $id = $child->target_id;
        $hotelsData = DB::table('bravo_hotels')->where('id', $id)->get();
        
        foreach ($hotelsData as $hotel) {
            $wishlist = DB::table('user_wishlist')
                ->where('object_id', $hotel->id)
                ->where('user_id', $user_id)
                ->where('object_model', 'hotel')
                ->select('id')
                ->first();
            
            $conditionwishlist = $wishlist ? true : false;
            $bannerId = $hotel->banner_image_id;
            $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();
            $hotel->banner_image = "uploads/$bannerimage->file_path";
            $hotel->wishlist = $conditionwishlist;
            $hotels[] = $hotel;
        }
    }

    $data = [
        'id' => $parent->id,
        'parent_name'=> $name,
        'hotels' => $hotels,
    ];
}
   return $data;
     
});

Route::get('budgetDeals',function(request $request){

$user_id = $request->id;
$terms = DB::table('bravo_terms')->where('id', '113')->get();
$data = "";

foreach ($terms as $parent) {
    $name = $parent->name;
    $childData = DB::table('bravo_hotel_term')->where('term_id', $parent->id)->distinct()->get();
    $hotels = [];

    foreach ($childData as $child) {
        $id = $child->target_id;
        $hotelsData = DB::table('bravo_hotels')->where('id', $id)->get();
        
        foreach ($hotelsData as $hotel) {
            $wishlist = DB::table('user_wishlist')
                ->where('object_id', $hotel->id)
                ->where('user_id', $user_id)
                ->where('object_model', 'hotel')
                ->select('id')
                ->first();
            
            $conditionwishlist = $wishlist ? true : false;
            $bannerId = $hotel->banner_image_id;
            $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();
            $hotel->banner_image = "uploads/$bannerimage->file_path";
            $hotel->wishlist = $conditionwishlist;
            $hotels[] = $hotel;
        }
    }

    $data = [
        'id' => $parent->id,
        'parent_name'=> $name,
        'hotels' => $hotels,
    ];
}
   return $data;
});

