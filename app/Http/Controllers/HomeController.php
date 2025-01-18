<?php
namespace App\Http\Controllers;

use App\User;
use Modules\Hotel\Models\Hotel;
use Modules\Location\Models\LocationCategory;
use Modules\Page\Models\Page;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\Tag;
use Modules\News\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Booking\Models\Booking;
use Modules\FrontendController;
use Modules\Hotel\Models\HotelRoom;
use Modules\Hotel\Models\HotelRoomBooking;
use Modules\Hotel\Models\HotelRoomDate;
use Omnipay\Omnipay;
use DB;
use Session;
use DateTime;
use Hash;
use DatePeriod;
use Validator;
use dateInterval;
use Str;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     
       protected $roomClass;
    /**
     * @var HotelRoomDate
     */
    protected $roomDateClass;

    /**
     * @var Booking
     */
    protected $bookingClass;
    protected $hotelClass;
    protected $currentHotel;
    protected $roomBookingClass;
    
   public function __construct()
    {
        // parent::__construct();
        // $this->roomClass = HotelRoom::class;
        // $this->roomDateClass = HotelRoomDate::class;
        // $this->bookingClass = Booking::class;
        // $this->hotelClass = Hotel::class;
        // $this->roomBookingClass = HotelRoomBooking::class;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home_page_id = setting_item('home_page_id');
        if($home_page_id && $page = Page::where("id",$home_page_id)->where("status","publish")->first())
        {
            $this->setActiveMenu($page);
            $translation = $page->translate();
            $seo_meta = $page->getSeoMetaWithTranslation(app()->getLocale(), $translation);
            $seo_meta['full_url'] = url("/");
            $seo_meta['is_homepage'] = true;
            $data = [
                'row'=>$page,
                "seo_meta"=> $seo_meta,
                'translation'=>$translation,
                'is_home' => true,
            ];
            return view('Page::frontend.detail',$data);

        }

        $model_News = News::where("status", "publish");
        $data = [
            'rows'=>$model_News->paginate(5),
            'model_category'    => NewsCategory::where("status", "publish"),
            'model_tag'         => Tag::query(),
            'model_news'        => News::where("status", "publish"),
            'breadcrumbs' => [
                ['name' => __('News'), 'url' => url("/news") ,'class' => 'active'],
            ],
            "seo_meta" => News::getSeoMetaForPageList()
        ];
        return view('News::frontend.index',$data);
    }

    public function checkConnectDatabase(Request $request){
        $connection = $request->input('database_connection');
        config([
            'database' => [
                'default' => $connection."_check",
                'connections' => [
                    $connection."_check" => [
                        'driver' => $connection,
                        'host' => $request->input('database_hostname'),
                        'port' => $request->input('database_port'),
                        'database' => $request->input('database_name'),
                        'username' => $request->input('database_username'),
                        'password' => $request->input('database_password'),
                    ],
                ],
            ],
        ]);
        try {
            DB::connection()->getPdo();
            $check = DB::table('information_schema.tables')->where("table_schema","performance_schema")->get();
            if(empty($check) and $check->count() == 0){
                return $this->sendSuccess(false , __("Access denied for user!. Please check your configuration."));
            }
            if(DB::connection()->getDatabaseName()){
                return $this->sendSuccess(false , __("Yes! Successfully connected to the DB: ".DB::connection()->getDatabaseName()));
            }else{
                return $this->sendSuccess(false , __("Could not find the database. Please check your configuration."));
            }
        } catch (\Exception $e) {
            return $this->sendError( $e->getMessage() );
        }
    }


  public function cartaddingfunction(request $request)
  {
    
$user_id = null;

if (auth()->check()) {
    $user_id = auth()->user()->id;
}

$current_datetime = new DateTime();

$cart = [];

foreach ($request->id as $index => $id) {
    $packageQuantity = $request->packageQuantity[$index];

    if ($packageQuantity != "0") {
        $cartId = DB::table('cart')->insertGetId([
            'user_id' => $user_id,
            'type' => $request->type[$index],
            'room_qty' => $packageQuantity,
            'product_id' => $request->product_id[$index],
            'package_id' => $id,
            'start_date' => $current_datetime->format('Y-m-d H:i:s.u'),
            'room_price' => $request->price[$index],
            'package_name' => $request->package_name[$index],
        ]);

        $cart[] = $cartId;
    }
}


    if (!empty($cart)) {
    return response()->json(['message' => 'Data added successfully', 'status' => true]);
    } else {
    return response()->json(['message' => 'Oops, something error', 'status' => false]);
    }

  }

 
public function cartDelete(request $request)
{
   $id = $request->cartId;
   $delete = DB::table('cart')->where('product_id',$id)->delete();

   if($delete)
  {
   
   return redirect()->back()->with('successdataadded','dataadded successfully');

  }else{

   return redirect()->back()->with('faileddata','data failed'); 
  }
}





public function getDatesData(Request $request)
{
    
    $id =  Session::get('rooms_id_session');
    
    if(!$id)
    {
        
        return response()->json(["session_out"=>"your session is end","status"=>"376"]);
    }
    
    $currentDate = new DateTime();


$nextThreeMonthsStartDate = $currentDate->format('Y-m-d\TH:i:sP');
$nextThreeMonthsEndDate = $currentDate->add(new DateInterval('P3M'))->format('Y-m-d\TH:i:sP');


    $start =$nextThreeMonthsStartDate;
    $end = $nextThreeMonthsEndDate;
  
        $room = HotelRoom::find($id);

        if(empty($room)){
            return $this->sendError(__('room not found'));
        }

        $is_single = $request->query('for_single');
        $query = HotelRoomDate::query();
        
        $query->where('target_id',$id);
        $query->where('start_date','>=',date('Y-m-d H:i:s',strtotime($start)));
        $query->where('end_date','<=',date('Y-m-d H:i:s',strtotime($end)));

        $rows =  $query->take(100)->get();
      
      
        $allDates = [];

        $period = periodDate($start,$end,false);
           
        foreach ($period as $dt){
            $date = [
                'id'=>rand(0,999),
                'active'=>0,
                'price'=> $room->price,
                'number'=> $room->number,
                'is_instant'=>0,
                'is_default'=>true,
                'textColor'=>'#2791fe'
            ];
            // $date['price_html'] = format_money($date['price']);
            
            $date['price_html'] = number_format($date['price'],0);
            
            if(!$is_single){
                // $date['price_html'] = format_money_main($date['price']);
                
                
                $date['price_html'] = number_format($date['price'],0);
            }
            $date['title'] = $date['event']  = $date['price_html'];
            $date['start'] = $date['end'] = $dt->format('Y-m-d');

            $date['active'] = 1;
            $allDates[$dt->format('Y-m-d')] = $date;
        }
        
        if(!empty($rows))
        {
            foreach ($rows as $row)
            {
                $row->start = date('Y-m-d',strtotime($row->start_date));
                $row->end = date('Y-m-d',strtotime($row->start_date));
                $row->textColor = '#2791fe';
                $price = $row->price;
                if(empty($price)){
                    $price = $room->price;
                }
                // $row->title = $row->event = format_money($price);
                
                $row->title = $row->event = number_format($price);
                
                
                if(!$is_single){
                    // $row->title = $row->event = format_money_main($price).' x '.$row->number;
                    $row->title = $row->event = number_format($price);
                }
                $row->price = $price;

                if(!$row->active)
                {
                    $row->title = $row->event = __('Block');
                    $row->backgroundColor = '#fe2727';
                    $row->classNames = ['blocked-event'];
                    $row->textColor = '#fe2727';
                    $row->active = 0;
                }else{
                    $row->classNames = ['active-event'];
                    $row->active = 1;
//                    if($row->is_instant){
//                        $row->title = '<i class="fa fa-bolt"></i> '.$row->title;
//                    }
                }

                $allDates[date('Y-m-d',strtotime($row->start_date))] = $row->toArray();

            }
        }
        $bookings = $room->getBookingsInRange($start,$end);


        if(!empty($bookings))
        {
            foreach ($bookings as $booking){
                $period = periodDate($booking->start_date,$booking->end_date,false);
                foreach ($period as $dt){
                    $date = $dt->format('Y-m-d');
                    if(isset($allDates[$date])){
                        $allDates[$date]['number'] -= $booking->number;
                        // $allDates[$date]['event'] = $allDates[$date]['title'] = format_money_main($allDates[$date]['price'] ). ' x '.$allDates[$date]['number'];
                        $allDates[$date]['event'] = $allDates[$date]['title'] = number_format($allDates[$date],0 );
                         if($allDates[$date]['number'] <=0 ){
                            $allDates[$date]['active'] = 0;
                            $allDates[$date]['event'] = __('Full Book');
                            $allDates[$date]['title'] = __('Full Book');
                            $allDates[$date]['classNames'] = ['full-book-event'];
                        }
                    }
                }
            }
        }
        
        $data = array_values($allDates);
           
        session(['dates_data' => $data]);

        return response()->json($data);

    }


public function alldatesPrice(Request $request)
{
    $id = Session::get('rooms_id_session');
    
    if (!$id) {
        return response()->json(["session_out" => "your session is end", "status" => "376"]);
    }
    
  $startFormatted= DateTime::createFromFormat('d/m/Y', $request->start_date);
  $endFormatted= DateTime::createFromFormat('d/m/Y', $request->end_date);


$xstart = $startFormatted->format('d-m-Y');
$xend = $endFormatted->format('d-m-Y');


    
    $start = new DateTime($xstart);
    $end =   new DateTime($xend);
    
    $end->modify('-1 day');
    
    $oneDayBefore = new DateTime($end->format('Y-m-d'));
    
    $storedData = session('dates_data');
    
    

$filteredData = [];
$totalPrice = 0;
$nightCount = 0;

foreach ($storedData as $data) {
    $dataStartDate = new DateTime($data['start']);
    $dataEndDate = new DateTime($data['end']);

    if ($dataStartDate >= $start && $dataStartDate <= $oneDayBefore) {
        if ($data['title'] === 'Block') {
            break;
        }

        $filteredData[] = $data;

        // Remove commas and extra zeroes from the price value
        $priceWithoutCommas = str_replace(',', '', $data['title']);
        
        // Convert the string to a float without extra zeroes
        $priceAsFloat = (float) $priceWithoutCommas;

        $totalPrice += $priceAsFloat;
        $nightCount++;
    }
}
  
    
    return response()->json([
        'filteredData' => $filteredData,
        'totalPrice' => $totalPrice,
        'nightCount' => $nightCount,
    ]);
    
}

public function bookingOrder(request $request)
{
    
    if($request->phone_no)
    {
        
      $validator = Validator::make($request->all(), [
         'price' => 'required|string',
         'phone_no' => 'required|string|regex:/^[0-9+\-]+$/',
         'email' => 'required|email', 
        
    ]);

    if ($validator->fails()) {
      
        return redirect()->back()->withErrors($validator)->withInput();
    }

$dateRange = $request->travellingdate;
list($checkinString, $checkoutString) = explode(' - ', $dateRange);

$checkin = DateTime::createFromFormat('d/m/Y', $checkinString)->format('Y-m-d 00:00:00');
$checkout = DateTime::createFromFormat('d/m/Y', $checkoutString)->format('Y-m-d 00:00:00');


$priceString = $request->price;
$matches = [];

if (preg_match('/\d+/', $priceString, $matches)) {
    $price = $matches[0];
} else {

    $price = 0; 
}

$payment_id = Str::random(32);


$travellers = [];

foreach ($request->adults as $index => $adultName) {
    $travellers[] = [
        'adults' => $adultName,
        'child_age' => $request->children_age[$index] ?? null,
    ];
}


$travellersJson = json_encode($travellers);


$submit = DB::table("bravo_bookings")->insert([
      
      'customer_id' => auth()->user()->id,
      'code'  => $payment_id,
      'object_id'   =>$request->object_id,
      'object_model' => $request->object_model,
      'package_id'  => $request->package_id,
      'object_name' => $request->object_name,
      'phone'       =>$request->phone_no,
      'std_code'    => $request->std_code,
      'total'    =>    $price,
      'status'   =>    "unpaid",
      'start_date' =>  $checkin,
      'end_date'   =>  $checkout,
      'travellers' =>  $travellersJson,
       'currency'    => $request->currency
     ]);

Session::put('model_type','hotel');


Session::put('payment_id',$payment_id);

Session::put('bookingTotalPrice',$price);


if($submit)
{
     
       
     return redirect('/payment'); 
    
}else{
    
    return response()->json(['something is error']);
    
  }
  
}else{
    
    if(isset($request->checkouttype))
    {
        
 $payment_id = Str::random(32);

 $request = $request->request->all(); 
 
 $valuesubmit = "";
 
foreach ($request['activityDAte'] as $key => $activityDate) {
    $traveldate = DateTime::createFromFormat('d/m/Y', $activityDate)->format('Y-m-d 00:00:00');
    
    $insertData = [
        'customer_id' => auth()->user()->id,
        'code' => $payment_id,
        'object_id' => $request['object_id'][$key],
        'object_model' => $request['object_modal'][$key], 
        'object_name' => $request['object_name'][$key],
        'total' => $request['price'][$key],             
        'status' => "unpaid",
        'start_date' => $traveldate,
        'end_date' => $traveldate,
        'travellers' => $request['travellers'][$key],  
        'total_saving' => $request['total_price'],           
        'currency' => $request['currency'][$key],       
    ];

   $valuesubmit =    DB::table("bravo_bookings")->insert($insertData);
 
}

Session::put('model_type','event');

Session::put('payment_id',$payment_id);

Session::put('bookingTotalPrice',$request['total_price']);

      
      if($valuesubmit)
{
     
     return redirect('/payment'); 
    
}else{
    
    return response()->json(['something is error']);
    
} 
           
        
    }
    
$traveldate = DateTime::createFromFormat('d/m/Y', $request->activityDAte)->format('Y-m-d 00:00:00');

$priceString = $request->price;

$payment_id = Str::random(32);

$submit = DB::table("bravo_bookings")->insert([
      'customer_id' => auth()->user()->id,
      'code'  => $payment_id,
      'object_id'   =>$request->object_id,
      'object_model' => $request->object_model,
      'package_id'  => $request->package_id,
      'total'    =>    $priceString,
      'status'   =>  "unpaid",
       'object_name' => $request->object_name,
      'start_date' =>$traveldate,
      'end_date'   => $traveldate,
      'travellers' => $request->travellers,
      'total_saving' =>$request->total_saving,
      'currency'    => $request->currency,
       ]);

Session::put('model_type','event');

Session::put('payment_id',$payment_id);

Session::put('bookingTotalPrice',$priceString);


if($submit)
{
     
     return redirect('/payment'); 
    
}else{
    
    return response()->json(['something is error']);
    
}
      
    }
    
    
    
    
    
    
    
    
    
 
}


public function successPayment()
{
    
$id = Session::get('payment_id');

$model = Session::get('model_type');


$senderemail = DB::table('core_settings')->where('name','email_from_address')->first();

$adminmail  = $senderemail->val;

 $usermail = auth()->user()->email;


if (!$id && !$model) { 
    return redirect()->back(); 
}
     
     $today_date = now();
     
     if($model == "event")
     { 
        $price = Session::get('bookingTotalPrice');
        $data = DB::table('bravo_bookings')->where('code',$id)->update([
         
            'status' => "paid",
         
         ]);
         
    $usercredential = DB::table('bravo_bookings')
    ->join('bravo_events', 'bravo_events.id', '=', 'bravo_bookings.object_id')
    -> select('travellers','paid','code','start_date','currency','title','total','bravo_bookings.id')
    ->where('code', $id)
    ->get();
 
 
 foreach($usercredential as $uu) 
 {  
     
       DB::table('bravo_bookings')
        ->where('id', $uu->id)
        ->update([
            'paid' => $uu->total,
        ]);
   
     $start_date = date('d-m-Y', strtotime($uu->start_date));
    
    
$traveller = json_decode($uu->travellers);

$count = count($traveller->quantityTotal);
$sum = 0;

foreach ($traveller->quantityTotal as $pp) {
    $sum += (int)$pp;
}
     
         $to = $usermail;
         $subject = "Payment Confirmed";
         
         $body = '
         
         <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,500;1,600&display=swap" rel="stylesheet">

  <style>
    body {
        
    font-family: "Poppins", sans-serif;
    
         }
 </style>

<div class="col-md-10 offset-md-1 mt-5 border mb-4" style="background:#b5afaf0a;">
    
     <center>
       <div class="row text-center">
        <div class="col-md-12">
          <div class="logo">
                <img src="https://roamiodeals.techdocklabs.com/image/logo-color.png" style="width: 30%; margin-top:40px;">
            </div>
         </div>
      </div>
    </center>
    <div class="row text-center mt-2">
      <center>  <div class="col-md-8 border offset-md-2" style="background:#FFFFFF;">
            <img src="https://roamiodeals.techdocklabs.com/image/Successfulpurchase-pana1.png"style="width: 47%;">
             <h4 class="text-center pt-3" style="font-weight:400; "><span style="color:black">Hii</span> <span  style="font-weight:700;color:#FF3500;">Mohammed</span></h4>
             <h2 class="text-center pt-3"><span  style="font-weight:700;color:#FF3500;">Payment Confirmed</span></h2>
            <h4 style="font-weight:700;">for Your Activities Entry Ticket</h4>
            <p>We hope this message finds you well and eagerly anticipating the exciting activities you have planned through Roamiodeals. We are delighted to confirm the successful payment for your entry ticket(s) to the selected activity. Thank you for choosing us to enhance your leisure experiences.</p>
            <p class="text-center">Here are the details of your payment:</p>
            
            <center><div clss="content" style="background:lightgray;  width:500px;">
                
             <p style="font-family: "Roboto Mono", monospace;">Booking Id: '.$id.'</p>

             <p style="font-family: "Roboto Mono", monospace;">Activity Name: '.$uu->title.'</p>

             <p style="font-family: "Roboto Mono", monospace;">Date Of Activity: '.$start_date.'</p>

             <p style="font-family: "Roboto Mono", monospace;">Number Of Tickets:'.$sum.'</p>
             
             <p style="font-family: "Roboto Mono", monospace;">Total Amount Paid:'.$uu->total.' '.$uu->currency.'</p
             
             <p style="font-family: "Roboto Mono", monospace;">Payment Method:online</p>
             
             <p style="font-family: "Roboto Mono", monospace;">Payment Date:'.$today_date.'</p>

            </div></center>
            
          <p><span href="" style="font-weight:700; color:#FF3500;" class="text-center pt-2">Kindly Note:</span>You will receive your Activity Entry Tickets on your email within 24 hours.
            </p> 
            
            <p>
                Please retain this email for your records as it serves as an official confirmation of your payment. Your payment has been processed, and your entry ticket(s) for '.$uu->title.' are now confirmed.
            </p>
            <p>
               We are excited to have you join us for this memorable experience. If you have any specific inquiries, need additional information about the activity, or require assistance with anything related to your booking, please do not hesitate to contact our customer support team at support@roamiodeals.com or [Customer Support Phone Number]. We are dedicated to ensuring your activity goes off without a hitch.
            </p>
            
            <p>
                  We appreciate your trust in Roamiodeals for your leisure and entertainment needs. Your satisfaction is paramount to us, and we are committed to providing you with exceptional service throughout your experience.
            </p>
   <h5 style="font-weight:bold;">We cannot wait to see you at '.$uu->title.'.
Prepare to create lasting memories and enjoy every moment. Should you need any further assistance, we are here to assist you.</p>
   <span  style="font-weight:400;color:#FF3500;">www.roamiodeals.com   &nbsp;   booking@roamiodeals.com &nbsp;   +971 5555 555 55</span>

        </div></center>
    </div>
  <center><p class="text-center pt-3">
    <img src="{{ asset("image/ic_baseline-facebook.svg")}}"> 
    <img src="{{ asset("image/mdi_twitter.png")}}"> 
    <img src="{{ asset("image/ri_instagram-fill.png")}}"> 
    </p></center>  
  <center>
      
       <p class="text-center pt-1" style="font-size:22px"> You are receiving this email because you signed up to Roamio Deals. Learn more about our
            <span style="font-weight:700;color:#FF3500;">Privacy Policy  </span>  or <span style="font-weight:700;color:#FF3500;">Terms & Conditions.</span></p>
            <p class="text-center">© 2023 Roamio Deals all rights reserved</p>
  </center> 
</div>
         
         ';
         
         $header  = "From: $adminmail \r\n";
         $header .= "Cc:   $adminmail \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail($to,$subject,$body,$header);
         
         
      Session::forget('payment_id');
     
      Session::forget('model_type');
     
 }
    
         
     }elseif($model == "hotel")
     
     {
         
        $price = Session::get('bookingTotalPrice');
        
        $data = DB::table('bravo_bookings')->where('code',$id)->update([
             'status' => "paid",
            'paid'  =>  $price
         
         ]);
         
         
         $usercredential = DB::table('bravo_bookings')->join('bravo_hotels','bravo_hotels.id','=','bravo_bookings.object_id')
         ->select('travellers','paid','code','start_date','end_date;','title')->where('code',$id)->first();
         
         
$start_date = date('d-m-Y', strtotime($usercredential->start_date));
$end_date = date('d-m-Y', strtotime($usercredential->end_date));
         
          if($data)
         {

         $to = $usermail;
         $subject = "Payment Confirmed";
        
         
            $body='
         
         <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,500;1,600&display=swap" rel="stylesheet">

  <style>
  
    body {
    font-family: "Poppins", sans-serif;
         }

   </style>


<div class="col-md-10 offset-md-1 mt-5 border mb-4" style="background:#b5afaf0a;">
   <center>
       
       <div class="row text-center">
        <div class="col-md-12">
            <div class="logo">
                <img src="https://roamiodeals.techdocklabs.com/image/logo-color.png" style="width: 20%; margin-top:10px;">
            </div>
        </div>
    </div>
   </center> 

    <div class="row text-center mt-2">
      <center>  <div class="col-md-8 border offset-md-2" style="background:#FFFFFF;">
            <img src="https://roamiodeals.techdocklabs.com/image/Successfulpurchase-pana1.png" style="width: 47%;">
             <h4 class="text-center pt-3" style="font-weight:400; "><span style="color:black">Hii</span> <span  style="font-weight:700;color:#FF3500;">Mohammed</span></h4>
             <h2 class="text-center pt-3"><span  style="font-weight:700;color:#FF3500;">Payment Confirmed</span></h2>
            <h5 style="font-weight:700;">For Your Staycation Booking!</h5>
            <p>We hope this message finds you well and excited about your upcoming staycation experience. We are thrilled to confirm the successful payment for your staycation booking on Roamiodeals. Thank you for choosing us to help you plan your relaxing getaway.</p>
            <p class="text-center">Here are the details of your payment:</p>
            
            <center><div clss="content" style="background:lightgray;  width:500px;">
                
              <p style="font-family: "Roboto Mono", monospace;">Booking ID: ['.$id.']</p>

                 <p style="font-family: "Roboto Mono", monospace;">Offer: ['.$usercredential->title.']</p>

             <p style="font-family: "Roboto Mono", monospace;">Reservation Dates: ['.$start_date.'] to ['.$end_date.']</p>

             <p style="font-family: "Roboto Mono", monospace;">Lead Guest Name:['.$usercredential.']</p>

           <p style="font-family: "Roboto Mono", monospace;">Total Amount Paid: ['.$usercredential->paid.']</p>

        <p style="font-family: "Roboto Mono", monospace;">Payment Method: [online]</p>

          <p style="font-family: "Roboto Mono", monospace;">Payment Date: ['.$today_date.']</p>

            </div></center>
            
            
           
            <p class="text-center pt-2"> <span  style="font-weight:700;color:#FF3500;">Kindly Note:</span> You will receive a confirmation email on your staycation booking details within 24 hours.</p>
            
            <p>
                Please retain this email for your records as it serves as an official confirmation of your payment. Rest assured, your payment has been processed, and your staycation reservation is secure.
            </p>
            <p>
                Our team is working diligently to ensure that everything is in order for your staycation. You can expect a memorable and relaxing experience. If you have any specific requests or require additional information about your stay, please feel free to reach out to our customer support team at support@roamiodeals.com or [Customer Support Phone Number]. We are here to assist you and make your staycation exceptional.
            </p>
            
            <p>
                  We sincerely appreciate your trust in Roamiodeals for your travel and leisure needs. Your satisfaction is our top priority, and we are committed to delivering the highest level of service.
            </p>
            <h5 style="font-weight:bold;">We look forward to welcoming you to your chosen staycation destination.
Enjoy your well-deserved break, and if you need anything else, do not hesitate to contact us.</h5>
<p>Best Regards, Team Roamio Deals</p>
<p>For any query, contact us on</p>
<span  style="font-weight:400;color:#FF3500;">www.roamiodeals.com   &nbsp;   booking@roamiodeals.com &nbsp;   +971 5555 555 55</span>

        </div></center>
    </div>
   <center><p class="text-center pt-3">
    <img src="{{ asset("image/ic_baseline-facebook.svg")}}"> 
    <img src="{{ asset("image/mdi_twitter.png")}}"> 
    <img src="{{ asset("image/ri_instagram-fill.png")}}"> 
    </p></center>  
   <center>
      
       <p class="text-center pt-1" style="font-size:22px"> You are receiving this email because you signed up to Roamio Deals. Learn more about our
            <span style="font-weight:700;color:#FF3500;">Privacy Policy  </span>  or <span style="font-weight:700;color:#FF3500;">Terms & Conditions.</span></p>
            <p class="text-center">© 2023 Roamio Deals all rights reserved</p>
   </center> 
 </div>

        ';
         
         $header  = "From:$adminmail \r\n";
         $header .= "Cc:  $adminmail \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail($to,$subject,$body,$header);
        
          Session::forget('payment_id');
     
          Session::forget('model_type'); 
     
          }
        
   
         
         
     }else{
         
        if($model == "visa") 
         {
             
             
          $uniquekey = Session::get('unique_key'); 
          $paiddata = DB::table('visa_booking_detail')->where('visakey',$uniquekey)->update([
             'payment_status' =>'paid'
           ]);  
             
        $gettotalprice = DB::table('visa_booking_detail')->where('visakey',$uniquekey)->get();
              
             
$totalPrice = 0; 

foreach ($gettotalprice as $pp) {
    $priceRecord = DB::table('visa_entry_details')->select('price')->where('id', $pp->entry_detail_id)->first();

    if ($priceRecord) {
       
        $priceString = $priceRecord->price;
        $numericPrice = floatval(preg_replace('/[^0-9.]/', '', $priceString));

       
        $totalPrice += $numericPrice;
    }
}

         $totalPriceWithSymbol = "AED " . number_format($totalPrice, 0); 

         if($paiddata)
          {
        
         $to = $usermail;
         
         $subject = "Payment Confirmed";
        
         $body='
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,500;1,600&display=swap" rel="stylesheet">

  <style>
    body {
        
    font-family: "Poppins", sans-serif;
    
         }
 </style>

<div class="col-md-10 offset-md-1 mt-5 border mb-4" style="background:#b5afaf0a;">
    
     <center>
       <div class="row text-center">
        <div class="col-md-12">
          <div class="logo">
                <img src="https://roamiodeals.techdocklabs.com/image/logo-color.png" style="width: 20%; margin-top:10px;">
            </div>
         </div>
      </div>
    </center>
    

    <div class="row text-center mt-2">
      <center>  <div class="col-md-8 border offset-md-2" style="background:#FFFFFF;">
            <img src="https://roamiodeals.techdocklabs.com/image/Successfulpurchase-pana1.png" style="width: 47%;">
             <h4 class="text-center pt-3" style="font-weight:400; "><span style="color:black">Hii</span> <span  style="font-weight:700;color:#FF3500;">Mohammed</span></h4>
             <h2 class="text-center pt-3"><span  style="font-weight:700;color:#FF3500;">Payment Confirmed</span></h2>
            <h4 style="font-weight:700;">For Your UAE Visa!</h4>
            <p>We hope this email finds you well. We are writing to confirm the successful payment for your UAE Visa application on Roamio Deals. We appreciate your trust in our services and are thrilled to assist you in your travel plans to the United Arab Emirates.</p>
            <p class="text-center">Here are the details of your payment:</p>
            
            <center><div clss="content" style="background:lightgray;  width:500px;">
                
             <p style="font-family: "Roboto Mono", monospace;">Transaction Id: ['.$uniquekey.']</p>

             <p style="font-family: "Roboto Mono", monospace;">Payment Amount: ['.$totalPriceWithSymbol.']</p>

             <p style="font-family: "Roboto Mono", monospace;">Payment Date: ['.$today_date.']</p>

             <p style="font-family: "Roboto Mono", monospace;">Payment Method:[online]</p>

            </div></center>
            
           <a href=""  style="font-weight:700; background:#FF3500; border-radius: 12px ; color:white; text-decoration:none; padding:12px;" class="text-center pt-2">Check Visa Status</a> 
            
            <p>
                Please keep this email for your records as it serves as your payment confirmation. Your payment has been processed, and our team is now working diligently to ensure a smooth and expedited processing of your UAE Visa application.
            </p>
            <p>
                If you have any questions or require further assistance regarding your visa application or any other travel-related queries, please do not hesitate to contact our customer support team at [Customer Support Email] or [Customer Support Phone Number]. Our dedicated team is available to assist you and address any concerns you may have.
            </p>
            
            <p>
                  We would like to take this opportunity to thank you for choosing Roamiodeals for your travel needs. We value your business and are committed to providing you with the best possible service throughout your journey.
            </p>
   <h5 style="font-weight:bold;">Safe travels, and we look forward to helping you make your trip to the UAE a memorable one!</p>
   <span  style="font-weight:400;color:#FF3500;">www.roamiodeals.com   &nbsp;   booking@roamiodeals.com &nbsp;   +971 5555 555 55</span>

        </div></center>
    </div>
  <center><p class="text-center pt-3">
    <img src="{{ asset("image/ic_baseline-facebook.svg")}}"> 
    <img src="{{ asset("image/mdi_twitter.png")}}"> 
    <img src="{{ asset("image/ri_instagram-fill.png")}}"> 
    </p></center>  
  <center>
      
       <p class="text-center pt-1" style="font-size:22px"> You are receiving this email because you signed up to Roamio Deals. Learn more about our
            <span style="font-weight:700;color:#FF3500;">Privacy Policy  </span>  or <span style="font-weight:700;color:#FF3500;">Terms & Conditions.</span></p>
            <p class="text-center">© 2023 Roamio Deals all rights reserved</p>
  </center> 
</div>

        ';
         
         $header  = "From:$adminmail \r\n";
         
         $header .= "Cc:$adminmail \r\n";
         
         $header .= "MIME-Version: 1.0\r\n";
         
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail($to,$subject,$body,$header);
         
               Session::forget('payment_id');
     
              Session::forget('model_type');
        
         }     
            
             
    }else{
            
             return "there is no booking please book any category";
         
        
    }
         
}
     
    
    
    
     return view('Hotel::frontend.paymentsuccess');
    
    
}




 public function verifyCaptcha(Request $request)
    {
        $secretKey = env('RECAPTCHA_SECRET_KEY');
        $captchaToken = $request->input('token');
        
        dd($captchaToken);
        
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $captchaToken,
        ]);
        
        $responseData = $response->json();
        
        if ($responseData['success']) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    
}


public function payment()
{
    
    
    $user_id = auth()->user()->id;
    
    $price = Session::get('bookingTotalPrice');
     $price = str_replace(',', '', $price); // Remove commas from the price

    $gateway = Omnipay::create('PayPal_Rest');
    $gateway->setClientId(config('paypal.paypal.client_id'));
    $gateway->setSecret(config('paypal.paypal.secret'));
    $gateway->setTestMode(config('paypal.paypal.mode') === 'sandbox');

    $parameters = [
        'amount' =>  $price,
        'currency' => 'USD',
        'returnUrl' => 'https://roamiodeals.techdocklabs.com/paymentSuccess', 
        'cancelUrl' => 'http://127.0.0.1:8000/cart',
      
    ];

    $response = $gateway->purchase($parameters)->send();


    if ($response->isRedirect()) {
       
        return redirect($response->getRedirectUrl());
    
        } else {
       
        $errorMessage = $response->getMessage();
       
         }
    
}








 public function email(){
 return view ('email');

}

}