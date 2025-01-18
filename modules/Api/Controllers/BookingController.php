<?php
namespace Modules\Api\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Booking\Models\Booking;
use Modules\Booking\Models\Enquiry;
use Modules\Template\Models\Template;
use Illuminate\Support\Facades\Validator;
use DB;

class BookingController extends \Modules\Booking\Controllers\BookingController
{
    public function __construct(Booking $booking, Enquiry $enquiryClass)
    {
        parent::__construct($booking, $enquiryClass);
        $this->middleware('auth:sanctum')->except([
            'detail','getConfigs','getHomeLayout','getTypes','cancelPayment','thankyou','besthotelfunction','mobilebannerpanel','visaget','nationality','visasubmit','visadatabookingdata','updateVisa','deletevisa','visaStatus','BookedVisa','addTocart','deleteCart','upcomingpast',
        ]);
    }
    public function getTypes(){
        $types = get_bookable_services();

        $res = [];
        foreach ($types as $type=>$class) {
            $obj = new $class();
            $res[$type] = [
                'icon'=>call_user_func([$obj,'getServiceIconFeatured']),
                'name'=>call_user_func([$obj,'getModelName']),
                'search_fields'=>[

                ],
            ];
        }
        return $res;
    }

    public function getConfigs(){
        $languages = \Modules\Language\Models\Language::getActive();
        $template = Template::find(setting_item('api_app_layout'));
        $res = [
            'languages'=>$languages->map(function($lang){
                return $lang->only(['locale','name']);
            }),
            'booking_types'=>$this->getTypes(),
            'country'=>get_country_lists(),
            'app_layout'=>$template? json_decode($template->content,true) : [],
            'is_enable_guest_checkout'=>(int)is_enable_guest_checkout(),
            'service_search_forms' => [],
            'locale'=>  session('website_locale',app()->getLocale()),
            'currency_main'=> \App\Currency::getCurrent('currency_main'),
            'currency' => $this->getCurrency()
        ];
        $all_service = get_bookable_services();
        foreach ( $all_service as $key => $class){
            $res['service_search_forms'][$key] = call_user_func([$class,'getFormSearch'],request());
        }
        return $this->sendSuccess($res);
    }

    public function getHomeLayout(){
        $res = [];
        $template = Template::find(setting_item('api_app_layout'));
        if(!empty($template)){
            $translate = $template->translate();
            $res = $translate->getProcessedContentAPI();
        }
        return $this->sendSuccess(
            [
                "data"=>$res
            ]
        );
    }


    protected function validateCheckout($code){

        $booking = $this->booking::where('code', $code)->first();

        $this->bookingInst = $booking;

        if (empty($booking)) {
            abort(404);
        }

        return true;
    }

    public function detail(Request $request, $code)
    {

        $booking = Booking::where('code', $code)->first();
        if (empty($booking)) {
            return $this->sendError(__("Booking not found!"))->setStatusCode(404);
        }

        if ($booking->status == 'draft') {
            return $this->sendError(__("You do not have permission to access"))->setStatusCode(404);
        }
        $data = [
            'booking'    => $booking,
            'service'    => $booking->service,
        ];
        if ($booking->gateway) {
            $data['gateway'] = get_payment_gateway_obj($booking->gateway);
        }
        return $this->sendSuccess(
            $data
        );
    }

    protected function validateDoCheckout(){

        $request = \request();
        /**
         * @param Booking $booking
         */
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('', ['errors' => $validator->errors()]);
        }
        $code = $request->input('code');
        $booking = $this->booking::where('code', $code)->first();
        $this->bookingInst = $booking;

        if (empty($booking)) {
            abort(404);
        }

        return true;
    }

    public function checkStatusCheckout($code)
    {
        $booking = $this->booking::where('code', $code)->first();
        $data = [
            'error'    => false,
            'message'  => '',
            'redirect' => ''
        ];
        if (empty($booking)) {
            $data = [
                'error'    => true,
                'redirect' => url('/')
            ];
        }

        if ($booking->status != 'draft') {
            $data = [
                'error'    => true,
                'redirect' => url('/')
            ];
        }
        return response()->json($data, 200);
    }

    public function getGatewaysForApi(){
        $res = [];
        $gateways = $this->getGateways();
        foreach ($gateways as $gateway=>$obj){
            $res[$gateway] = [
                'logo'=>$obj->getDisplayLogo(),
                'name'=>$obj->getDisplayName(),
                'desc'=>$obj->getApiDisplayHtml(),
            ];
            if($option = $obj->getForm()){
                $res[$gateway]['form'] = $option;
            }
            if($options = $obj->getApiOptions()){
                $res[$gateway]['options'] = $options;
            }
        }

        return $this->sendSuccess($res);
    }

    public function thankyou(Request $request, $code)
    {

        $booking = Booking::where('code', $code)->first();
        if (empty($booking)) {
            abort(404);
        }

        if ($booking->status == 'draft') {
            return redirect($booking->getCheckoutUrl());
        }

        $data = [
            'page_title' => __('Booking Details'),
            'booking'    => $booking,
            'service'    => $booking->service,
        ];
        if ($booking->gateway) {
            $data['gateway'] = get_payment_gateway_obj($booking->gateway);
        }
        return view('Booking::frontend/detail', $data);
    }

    public function getCurrency(){
        $list = \App\Currency::getActiveCurrency();
        foreach ($list as &$item)
        {
            $currency = \App\Currency::getCurrency($item['currency_main']);
            $item['symbol'] = $currency['symbol'];
        }
        return $list;
    }

      public function besthotelfunction(request $request)
     {
         
         if($request->condition == 'bestdeal')
         {
             
             $data = DB::table('bravo_hotels')->whereNotNull('bannerImage')->where('condition','bestdeal')->get();
             
              return response()->json(['message'=>'data fetch successfully','data'=>$data]);
         }else{
             
              $data = DB::table('bravo_hotels')->whereNotNull('bannerImage')->where('condition','todaydeal')->get();
             
              return response()->json(['message'=>'data fetch successfully','data'=>$data]);
             
         }

     }


    public function mobilebannerpanel()
    {

        $data = DB::table('sliderbanner')->where('condition','hotel')->get();
       
        return response()->json(['message'=>'data fetch successfully','data'=>$data]);

    }
    
    public function nationality()
    {
        
        
            $get = DB::table('nationality')->get();
            
            return response()->json(["message"=>"success", "nations"=>$get]);
        
     }
    
    
    public function visaget()
    {
      
    $data = DB::table('visa_entry')->get();
$visadata = [];

foreach ($data as $dt) {
    $details = DB::table('visa_entry_details')->where('entry_id', $dt->id)->get();
    $dt->visa_entry_details = $details;
    $visadata[] = $dt;
}

return response()->json(['message' => "Visa get successfully", 'data' => $visadata]);
     
        
    }
    
    public function visasubmit(request $request)
     {
         
           $passportfirst = date('mdYHis').uniqid().'.'.$request->passport_first_page->extension();
            $request->passport_first_page->move(public_path('visa'),$passportfirst);
      
            $passportsecond = date('mdYHis').uniqid().'.'.$request->passport_second_page->extension();
           $request->passport_second_page->move(public_path('visa'),$passportsecond);
      
            $passportphoto = date('mdYHis').uniqid().'.'.$request->passport_size_photo->extension();
            $request->passport_size_photo->move(public_path('visa'),$passportphoto);
         
            $data = DB::table('visa_booking_detail')->insertGetId([
             
             'user_id' =>$request->user_id,
             'entry_id' =>$request->entry_id,
              'entry_detail_id'=>$request->entry_detail_id,
             'price' =>$request->price,
             'nationality' =>$request->nationality,
             'email' =>$request->email,
             'alternate_number'=>$request->alternate_number,
             'place_issues'=>$request->place_issues,
             'child'=>$request->child,
             'adult'=>$request->adult,
             'firstname' =>$request->firstname,
             'lastname' =>$request->lastname,
             'dob' =>$request->dob,
             'passport_no' =>$request->passport_no,
             'passport_expiry' => $request->passport_expiry,
             'contact_no' =>$request->contact_no,
             'passport_first_page' =>'/visa/'.$passportfirst,
             'passport_second_page' =>'/visa/'.$passportsecond,
             'passport_size_photo' =>'/visa/'.$passportphoto,
             'visa_status' => "pending",
             'payment_status'=>"unpaid",
           ]);
           
         
          $insertVisa = DB::table('visa_status')->insert([
         'user_id' =>  $request->user_id,
         'visa_id' => $data,
         'title' => "pending",
         'status' => "true",
         'discription' =>"Your Visa Is Submitted, Soon we update processing Status;"
         ]);
          
          
           
           if($data)
          {
              
               return response()->json(['message'=>'data submitted successfully','status'=>1]);
              
          }else{
               return response()->json(['message'=>'something error','status'=>0]);
              
              
          }
        
        
    }
    
    
    public function visadatabookingdata(request $request)
    {
        $id = $request->user_id;
        
        $data = DB::table('visa_booking_detail')->where('user_id',$id)->where('payment_status','unpaid')->get();
        
         
         
         $totalAmount = 0;

          foreach ($data as $item) {
    
            $amount = (float) preg_replace("/[^0-9.]/", "", $item->price);
            $totalAmount += $amount;
          }

          if($data)
         {
            
            return response()->json(['message'=>'data get successfully','status'=>1,'data'=>$data,'total'=>number_format($totalAmount, 2)]);
         }else
         {
            
            return response()->json(['message'=>'no data found','status'=>0,'data'=>[]]);
         }
        
        
    }
    
    
public function updateVisa(Request $request)
{
    
  $id = $request->id;

$update = DB::table('visa_booking_detail')->where('id', $id)->first();

if ($update->visa_status == "rejected") {
    DB::table('visa_booking_detail')->where('id', $id)->update([
        "visa_status" => "pending",
    ]);
}

$passportfirst = null;
$passportsecond = null;
$passportphoto = null;
$discriptionphoto = null;

if ($request->hasFile('passport_first_page')) {
    $passportfirst = $request->file('passport_first_page')->store('visa');
}

if ($request->hasFile('passport_second_page')) {
    $passportsecond = $request->file('passport_second_page')->store('visa');
}

if ($request->hasFile('passport_size_photo')) {
    $passportphoto = $request->file('passport_size_photo')->store('visa');
}

if ($request->hasFile('discriptionImage')) {
    $discriptionphoto = $request->file('discriptionImage')->store('visa');
}

$discript = $request->discription ?? "NULL";

$updateData = [
    'email' => $request->email,
    'alternate_number' => $request->alternate_number,
    'place_issues' => $request->place_issues,
    'firstname' => $request->firstname,
    'lastname' => $request->lastname,
    'dob' => $request->dob,
    'passport_no' => $request->passport_no,
    'passport_expiry' => $request->passport_expiry,
    'contact_no' => $request->contact_no,
    'discription' => $discript,
];

if ($passportfirst) {
    $updateData['passport_first_page'] = $passportfirst;
}

if ($passportsecond) {
    $updateData['passport_second_page'] = $passportsecond;
}

if ($passportphoto) {
    $updateData['passport_size_photo'] = $passportphoto;
}

if ($discriptionphoto) {
    $updateData['discriptionImage'] = $discriptionphoto;
}

$update = DB::table('visa_booking_detail')->where('id', $id)->update($updateData);

if ($update) {
    return response()->json(['message' => 'Data updated successfully', 'status' => 1]);
} else {
    return response()->json(['message' => 'No changes', 'status' => 1]);
}

}

    public function deletevisa(request $request)
    {   
        
       $id = $request->id;
       
       $dlete = DB::table('visa_booking_detail')->where('id',$id)->delete();
       
       if($dlete)
       {
        return response()->json(['message'=>'data deleted successfully','status'=>1]);
           }else{
           return response()->json(['message'=>'something error','status'=>0]);
           }
    }
    
      public function visaStatus(request $request)
      {
           $id =   $request->user_id;
         $payID  = $request->transaction_id;
         $payment = $request->payment_status;
         $paid = $request->total_price;
         $update = DB::table('visa_booking_detail')->where('user_id',$id)->update([
                 "payment_status" => $payment,
                 "transaction_id"  =>$payID,
                //  "visa_status" =>"pending"
             ]);
             $transaction = DB::table('visa_transaction')->insert([
                   "user_id"=>$id,
                   "total_amount"=>$paid
                 ]);
             
      
        if($update)
        {
         return response()->json(['message'=>"successfully paid","status"=>1]);
        }else{
            return response()->json(['message'=>"successfully paid","status"=>0]);
            }
        }
    
   public function BookedVisa(request $request)
   {
       
$id = $request->user_id;

$data = DB::table('visa_booking_detail')
    ->where('user_id', $id)
    ->where('payment_status', 'paid')
    ->get();

$status = [];

foreach ($data as $dt) {
    $statusData = DB::table('visa_status')
        ->where('visa_id', $dt->id)
        ->get();

    $dt->status = $statusData; // Add the status data to the `$dt` object
    
    $status[] = $dt;
}

if ($status) {
    return response()->json(['message' => "successfully paid", "data" => $status]);
} else {
    return response()->json(['message' => "no user found", "status" => 0]);
}

   }
   
   public function addTocart(request $request)
   {
       
       if (!$request->user_id || !$request->product_id || !$request->product_name) {
    return response()->json(['message' => "please provide required information", 'status' => 0]);
          }
       
     
       
       $data = DB::table('cart')->insert([
          'user_id' =>$request->user_id,
           'type' => $request->type,
          'product_id' =>$request->product_id,
          'product_name' =>$request->product_name,
          'room_qty' =>$request->room_qty,
          'package_name' =>$request->package_name,
          'room_price' =>$request->room_price,
          'total_price' => $request->total_price,
          'start_date' => $request ->start_date,
           'booking_time' => $request->booking_time,
          'end_date' => $request->end_date,
          'lead_guest_name' => $request->lead_guest_name,
          'age' => $request->age,
          'mobile_no' => $request->mobile_no,
          'no_of_child' => $request->no_of_child,
          'no_of_adult' => $request->no_of_adult,
          'promo_code' => $request->promo_code,
          ]);

         if($data)
         {
             return response()->json(['message'=>"data added successfull",'status'=>1]);
             
         }else{
             
              return response()->json(['message'=>"Oopss something error",'status'=>0]);
         }
      
   }
   public function deleteCart(request $request)
   {
       $delete = DB::table('cart')->where('id',$request->id)->delete();
       
       if($delete)
       {
           return response()->json(['message'=>"dataDeleted",'status'=>1]);
           
       }else{
           
            return response()->json(['message'=>"cart id not found",'status'=>0]);
         }
       
   }
   
   
   public function OrderItem(request $request)
   {
          $id = $request->user_id;
       
          $data = DB::table('cart')->where('user_id',$id)->where('status',null)->update([
               'status' => "paid",
               'transaction_id' => $request->transaction_id,
           ]);
            
            $data = DB::table('order')->insert([
                'status' => $request->status,
                'transaction_id' => $request->transaction_id,
                'total' =>$request->total,
                'booking_time' => $request->booking_time,
               ]);
             
             $update = DB::table('cart')->where('transaction_id',$request->transaction_id)->update([
                 'booking_time' =>   $request->booking_time
                 ]);  
             
       
       if($data)
       {
           return response()->json(['message'=>"amount paid successfully",'status'=>1]);
       }else{
           
           return response()->json(['message'=>"user id not found or something error",'status'=>0]);
           }
   }
   
   
   public function upcomingpast(request $request)
   {
       $id = $request->id;
       
       if(!$id)
       {
           return response()->json(['message' => "user Id is required"]);
       }
       
$currentDateTime = date('Y-m-d H:i:s');
$time = DB::table('cart')
    ->where('status', 'paid')->where('user_id',$id)
    ->orderBy('start_date', 'asc')
    ->get();

$pastData = [];
$upcomingData = [];

foreach ($time as $row) {
    if ($row->end_date >= $currentDateTime) {
        $upcomingData[] = $row;
    } else {
        $pastData[] = $row;
    }
}

$response = [
    'pastData' => $pastData,
    'upcomingData' => $upcomingData
];

return response()->json($response);


   }
    
   
    
}
