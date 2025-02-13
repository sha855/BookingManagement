<?php
namespace Modules\Hotel\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Modules\Hotel\Models\Hotel;
use Illuminate\Http\Request;
use Modules\Location\Models\Location;
use Modules\Location\Models\LocationCategory;
use Modules\Review\Models\Review;
use Modules\Core\Models\Attributes;
use DB;
use Session;
use Modules\Hotel\Controllers\Event;

use Modules\User\Models\UserWishList;

use Carbon\Carbon;

class HotelController extends Controller
{
    protected $hotelClass;
    protected $locationClass;
    /**
     * @var string
     */
    private $locationCategoryClass;

    public function __construct(Hotel $hotel)
    {
        $this->hotelClass = $hotel;
        $this->locationClass = Location::class;
        $this->locationCategoryClass = LocationCategory::class;
    }
    public function callAction($method, $parameters)
    {
        if(!Hotel::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }
     

    public function index(Request $request)
    {

    
        $is_ajax = $request->query('_ajax');
        if(!empty($request->query('limit'))){
            $limit = $request->query('limit');
        }else{
            $limit = !empty(setting_item("hotel_page_limit_item"))? setting_item("hotel_page_limit_item") : 9;
        }

        $query = $this->hotelClass->search($request->input());
        $list = $query->paginate($limit);

        $markers = [];
        if (!empty($list)) {
            foreach ($list as $row) {
                $markers[] = [
                    "id"      => $row->id,
                    "title"   => $row->title,
                    "lat"     => (float)$row->map_lat,
                    "lng"     => (float)$row->map_lng,
                    "gallery" => $row->getGallery(true),
                    "infobox" => view('Hotel::frontend.layouts.search.loop-grid', ['row' => $row,'disable_lazyload'=>1,'wrap_class'=>'infobox-item'])->render(),
                    'marker' => get_file_url(setting_item("hotel_icon_marker_map"),'full') ?? url('images/icons/png/pin.png'),
                ];
            }
        }
        $limit_location = 15;
        if( empty(setting_item("hotel_location_search_style")) or setting_item("hotel_location_search_style") == "normal" ){
            $limit_location = 1000;
        }
        $data = [
            'rows'               => $list,
            'list_location'      => $this->locationClass::where('status', 'publish')->limit($limit_location)->with(['translation'])->get()->toTree(),
            'hotel_min_max_price' => $this->hotelClass::getMinMaxPrice(),
            'markers'            => $markers,
            "blank" => setting_item('search_open_tab') == "current_tab" ? 0 : 1 ,
            "seo_meta"           => $this->hotelClass::getSeoMetaForPageList()
        ];
        $layout = setting_item("hotel_layout_search", 'normal');
        if ($request->query('_layout')) {
            $layout = $request->query('_layout');
        }
        if ($is_ajax) {
            return $this->sendSuccess([
                'html'    => view('Hotel::frontend.layouts.search-map.list-item', $data)->render(),
                "markers" => $data['markers']
            ]);
        }
        $data['attributes'] = Attributes::where('service', 'hotel')->orderBy("position","desc")->with(['terms','translation'])->get();
        $data['layout'] = $layout;

        if ($layout == "map") {
            $data['body_class'] = 'has-search-map';
            $data['html_class'] = 'full-page';
            return view('Hotel::frontend.search-map', $data);
        }

        
        return view('Hotel::frontend.search', $data);
    }

     public function detail(Request $request, $slug)
     {
                    
        
         $row = $this->hotelClass::where('slug', $slug)->with(['location','translation','hasWishList'])->first();
    

         $id =$row->id;
       
     
        if ( empty($row) or !$row->hasPermissionDetailView()) {
            return redirect('/');
        }
        $translation = $row->translate();
        $hotel_related = [];
        $location_id = $row->location_id;
        if (!empty($location_id)) {
            $hotel_related = $this->hotelClass::where('location_id', $location_id)->where("status", "publish")->take(4)->whereNotIn('id', [$row->id])->with(['location','translation','hasWishList'])->get();
        }
        $review_list = $row->getReviewList();
        $data = [
            'row'          => $row,
            'translation'       => $translation,
            'hotel_related' => $hotel_related,
            'location_category'=>$this->locationCategoryClass::where("status", "publish")->with('location_category_translations')->get(),
            'booking_data' => $row->getBookingData(),
            'review_list'  => $review_list,
            'seo_meta'  => $row->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            'body_class'=>'is_single',
            'breadcrumbs'       => [
                [
                    'name'  => __('Staycation'),
                    'url'  => route('hotel.search'),
                ],
            ],
        ];
        $data['breadcrumbs'] = array_merge($data['breadcrumbs'],$row->locationBreadcrumbs());
        $data['breadcrumbs'][] = [
            'name'  => $translation->title,
            'class' => 'active'
        ];

   $this->setActiveMenu($row);

                  
   $limit = 3; // Specify the limit to 3
   $page = $request->page;
   $user_id = $request->id;

   //  $postsss = DB::table('bravo_hotels')->take(3)->get();


    $posts = DB::table('bravo_hotels')
    ->join('bravo_hotel_rooms', 'bravo_hotels.id', '=', 'bravo_hotel_rooms.parent_id')
    ->select('bravo_hotels.*', 'bravo_hotel_rooms.title', DB::raw('bravo_hotels.price - (bravo_hotels.price * bravo_hotels.discount_percent / 100) AS discounted_price'))
    ->limit($limit)
    ->where('bravo_hotel_rooms.parent_id', $id)
    ->get();

 
    $datas = [];
 
 foreach ($posts as $p) {
     $wishlist = DB::table('user_wishlist')
         ->where('object_id', $p->id)
         ->where('user_id', $user_id)
         ->where('object_model', 'hotel')
         ->first(); 
 
     $conditionwishlist = $wishlist ? true : false;
 
     $bannerImage = DB::table('media_files')
         ->where('id', $p->banner_image_id)
         ->select('file_path')
         ->first();
 
     if ($bannerImage) {
         $p->bannerImage = "uploads/$bannerImage->file_path";
     }
 
     $p->wishlist = $conditionwishlist;
 
     $datas[] = $p;
     }
 
 return view('Hotel::frontend.detail', $data ,compact('datas'));
    }

    public function checkAvailability(){
        $hotel_id = \request('hotel_id');
        if(\request()->input('firstLoad') == "false") {
            $rules = [
                'hotel_id'   => 'required',
                'start_date' => 'required:date_format:Y-m-d',
                'end_date'   => 'required:date_format:Y-m-d',
                'adults'     => 'required',
            ];
            $validator = \Validator::make(request()->all(), $rules);
            if ($validator->fails()) {
                return $this->sendError($validator->errors()->all());
            }

            if(strtotime(\request('end_date')) - strtotime(\request('start_date')) < DAY_IN_SECONDS){
                return $this->sendError(__("Dates are not valid"));
            }
            if(strtotime(\request('end_date')) - strtotime(\request('start_date')) > 30*DAY_IN_SECONDS){
                return $this->sendError(__("Maximum day for booking is 30"));
            }
        }

        $hotel = $this->hotelClass::find($hotel_id);
        if(empty($hotel_id) or empty($hotel)){
            return $this->sendError(__("Hotel not found"));
        }

        if(\request()->input('firstLoad') == "false") {
            $numberDays = abs(strtotime(\request('end_date')) - strtotime(\request('start_date'))) / 86400;
            if(!empty($hotel->min_day_stays) and  $numberDays < $hotel->min_day_stays){
                return $this->sendError(__("You must to book a minimum of :number days",['number'=>$hotel->min_day_stays]));
            }

            if(!empty($hotel->min_day_before_booking)){
                $minday_before = strtotime("today +".$hotel->min_day_before_booking." days");
                if(  strtotime(\request('start_date')) < $minday_before){
                    return $this->sendError(__("You must book the service for :number days in advance",["number"=>$hotel->min_day_before_booking]));
                }
            }
        }

        $rooms = $hotel->getRoomsAvailability(request()->input());

        return $this->sendSuccess([
            'rooms'=>$rooms
        ]);
    }



 public function Wishlist(Request $request){


    $query = UserWishList::query()
    ->where("user_wishlist.user_id",Auth::id())
    ->orderBy('user_wishlist.id', 'desc')
    ->paginate(10);


    $rows = [];
   foreach ($query as $item){
    $service = $item->service;
    if(empty($service)) continue;

    $item = $item->toArray();
    $serviceTranslation = $service->translate();
    $item['service'] = [
        'id'=>$service->id,
        'title'=>$serviceTranslation->title,
        'price'=>$service->price,
        'sale_price'=>$service->sale_price,
        'discount_percent'=>$service->discount_percent ?? null,
        'image'=>get_file_url($service->banner_image_id),
        'content'=>$serviceTranslation->content,
        'location' => Location::selectRaw("id,name")->find($service->location_id) ?? null,
        'is_featured' => $service->is_featured ?? null,
        'service_icon' => $service->getServiceIconFeatured() ?? null,
        'review_score' =>  $service->getScoreReview() ?? null,
        'service_type' =>  $service->getModelName() ?? null,
    ];
       $rows[] = $item;


}



    return view('Hotel::frontend.wishlist-list',compact('rows'));
 }



public function staycationexplore(){
    
    if (auth()->check()) {
    $user_id = auth()->user()->id;
  } else {
   $user_id = Null;
 }
    
   $top_reviewed_hotal = DB::table('bravo_hotels')
    ->whereBetween('review_score', [3.0, 5.0])
    ->orderBy('review_score', 'desc')
    ->get();

$data_review = [];

foreach ($top_reviewed_hotal as $hotel) {
    $hotelData = []; // Create an associative array for each event's data

    $wishlist = DB::table('user_wishlist')
        ->where('object_id', $hotel->id)
        ->where('object_model', 'hotel')
        ->select('id')
        ->first();

    $conditionwishlist = $wishlist ? true : false;

    $bannerId = $hotel->banner_image_id;
    $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();

    if ($hotel !== null && $bannerimage !== null) {
        $banner_image_path = "uploads/" . $bannerimage->file_path; // Store the banner image path in a separate variable
    }

    $hotel->wishlist = $conditionwishlist;

  
    $hotelData['banner_image_path'] = $banner_image_path ?? null;

   
    $hotelData['hotel'] = $hotel;

   
    $data_review[] = $hotelData;
}

$top_discount_hotal = DB::table('bravo_hotels')
    ->whereBetween('discount_percent', [70, 100])
    ->orderBy('discount_percent', 'desc')
    ->get();

$data_discount = [];

foreach ($top_discount_hotal as $hotel) {
    $hotelData = []; // Create an associative array for each event's data

    $wishlist = DB::table('user_wishlist')
        ->where('object_id', $hotel->id)
        ->where('object_model', 'hotel')
        ->select('id')
        ->first();

    $conditionwishlist = $wishlist ? true : false;

    $bannerId = $hotel->banner_image_id;
    $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();

    if ($hotel !== null && $bannerimage !== null) {
        $banner_image_path = "uploads/" . $bannerimage->file_path; // Store the banner image path in a separate variable
    }

    $hotel->wishlist = $conditionwishlist;

    $hotelData['banner_image_path'] = $banner_image_path ?? null;

    $hotelData['hotel'] = $hotel;

    $data_discount[] = $hotelData;
} 
    
    
   $top_selling = DB::table('bravo_bookings')
    ->select('bravo_hotels.*') // Include all columns of bravo_hotels
    ->join('bravo_hotels', 'bravo_bookings.object_id', '=', 'bravo_hotels.id')
    ->groupBy('bravo_hotels.id', 'bravo_hotels.title')
    ->where('object_model', 'hotel')->orderBy('id','DESC')->take(4)
    ->get();

$data_selling_hotel = [];

foreach ($top_selling as $hotel) {
    $hotelData = []; // Create an associative array for each hotel's data

    $wishlist = DB::table('user_wishlist')
        ->where('object_id', $hotel->id)
        ->where('object_model', 'hotel')
        ->select('id')
        ->first();

    $conditionwishlist = $wishlist ? true : false;

    $bannerId = $hotel->banner_image_id;
    $banner_image_path = null; // Initialize the variable

    if ($bannerId) {
        $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();

        if ($bannerimage !== null) {
            $banner_image_path = "uploads/" . $bannerimage->file_path;
        }
    }

    $hotel->wishlist = $conditionwishlist;
    
    $hotelData['banner_image_path'] = $banner_image_path;
    $hotelData['hotel'] = $hotel;

    $data_selling_hotel[] = $hotelData;
}
 
    
    
    


$terms = DB::table('bravo_terms')->where('id', '113')->get();
$budget = "";

foreach ($terms as $parent) {
    $name = $parent->name;
    $childData = DB::table('bravo_hotel_term')->where('term_id', $parent->id)->distinct()->get();
    $hotels = [];

    foreach ($childData as $child) {
        $id = $child->target_id;
        $hotelsData = DB::table('bravo_hotels')->where('id', $id)->where('deleted_at', NULL)->take(3)->get();
        
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

    $budget = [
        'id' => $parent->id,
        'parent_name'=> $name,
        'hotels' => $hotels,
    ];
}


if (auth()->check()) {
    $user_id = auth()->user()->id;
} else {
   $user_id = Null;
}



$terms = DB::table('bravo_terms')->where('id', '146')->get();

$topstaycation = "";

foreach ($terms as $parent) {
    $name = $parent->name;
    $childData = DB::table('bravo_hotel_term')->where('term_id', $parent->id)->distinct()->orderBy('id', 'DESC')->get();
    $hotels = [];

    foreach ($childData as $child) {
        $id = $child->target_id;
        $hotelsData = DB::table('bravo_hotels')->where('id', $id)->orderBy('id', 'DESC')->where('deleted_at', NULL)->get();
     
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

    $topstaycation = [
        'id' => $parent->id,
        'parent_name'=> $name,
        'hotels' => $hotels,
    ];
    
}

$terms = DB::table('bravo_terms')->where('id', '106')->get();

$bestDeal = "";

foreach ($terms as $parent) {
    $name = $parent->name;
    $childData = DB::table('bravo_hotel_term')->where('term_id', $parent->id)->distinct()->get();
    $hotels = [];

    foreach ($childData as $child) {
        $id = $child->target_id;
        $hotelsData = DB::table('bravo_hotels')->where('id', $id)->where('deleted_at', NULL)->get();
        
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

    $bestDeal = [
        'id' => $parent->id,
        'parent_name'=> $name,
        'hotels' => $hotels,
    ];
    
     
}
  

    $limit = 3; // Specify the limit to 3

    $posts = DB::table('bravo_hotels')->where('deleted_at',NULL)->take(6)->get();

    $datas = [];
 
 foreach ($posts as $p) {
     $wishlist = DB::table('user_wishlist')
         ->where('object_id', $p->id)
         ->where('user_id', $user_id)
         ->where('object_model', 'hotel')
         ->first(); // Retrieve only one result, if exists
 
     $conditionwishlist = $wishlist ? true : false;
 
     $bannerImage = DB::table('media_files')
         ->where('id', $p->banner_image_id)
         ->select('file_path')
         ->first();
 
     if ($bannerImage) {
         $p->bannerImage = "uploads/$bannerImage->file_path";
     }
 
     $p->wishlist = $conditionwishlist;
 
     $datas[] = $p;
     }
 
   return view('Hotel::staycationExplore' ,compact('datas','bestDeal','budget','data_discount','data_review','topstaycation','data_selling_hotel'));
  
 }


public function deals(Request  $request) {

if (auth()->check()) {
    $user_id = auth()->user()->id;
} else {
   $user_id = Null;
}



 $top_reviewed_hotal = DB::table('bravo_hotels')
    ->whereBetween('review_score', [3.0, 5.0])
    ->orderBy('review_score', 'desc')
    ->get();

$data_review = [];

foreach ($top_reviewed_hotal as $hotel) {
    $hotelData = []; // Create an associative array for each event's data

    $wishlist = DB::table('user_wishlist')
        ->where('object_id', $hotel->id)
        ->where('object_model', 'hotel')
        ->select('id')
        ->first();

    $conditionwishlist = $wishlist ? true : false;

    $bannerId = $hotel->banner_image_id;
    $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();

    if ($hotel !== null && $bannerimage !== null) {
        $banner_image_path = "uploads/" . $bannerimage->file_path; // Store the banner image path in a separate variable
    }

    $hotel->wishlist = $conditionwishlist;

  
    $hotelData['banner_image_path'] = $banner_image_path ?? null;

   
    $hotelData['hotel'] = $hotel;

   
    $data_review[] = $hotelData;
}

$top_discount_hotal = DB::table('bravo_hotels')
    ->whereBetween('discount_percent', [70, 100])
    ->orderBy('discount_percent', 'desc')
    ->get();

$data_discount = [];

foreach ($top_discount_hotal as $hotel) {
    $hotelData = []; // Create an associative array for each event's data

    $wishlist = DB::table('user_wishlist')
        ->where('object_id', $hotel->id)
        ->where('object_model', 'hotel')
        ->select('id')
        ->first();

    $conditionwishlist = $wishlist ? true : false;

    $bannerId = $hotel->banner_image_id;
    $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();

    if ($hotel !== null && $bannerimage !== null) {
        $banner_image_path = "uploads/" . $bannerimage->file_path; // Store the banner image path in a separate variable
    }

    $hotel->wishlist = $conditionwishlist;

    $hotelData['banner_image_path'] = $banner_image_path ?? null;

    $hotelData['hotel'] = $hotel;

    $data_discount[] = $hotelData;
} 
    
     $top_selling = DB::table('bravo_bookings')
    ->select('bravo_hotels.*') // Include all columns of bravo_hotels
    ->join('bravo_hotels', 'bravo_bookings.object_id', '=', 'bravo_hotels.id')
    ->groupBy('bravo_hotels.id', 'bravo_hotels.title')
    ->where('object_model', 'hotel')->orderBy('id','DESC')->take(4)
    ->get();

$data_selling_hotel = [];

foreach ($top_selling as $hotel) {
    $hotelData = []; // Create an associative array for each hotel's data

    $wishlist = DB::table('user_wishlist')
        ->where('object_id', $hotel->id)
        ->where('object_model', 'hotel')
        ->select('id')
        ->first();

    $conditionwishlist = $wishlist ? true : false;

    $bannerId = $hotel->banner_image_id;
    $banner_image_path = null; // Initialize the variable

    if ($bannerId) {
        $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();

        if ($bannerimage !== null) {
            $banner_image_path = "uploads/" . $bannerimage->file_path;
        }
    }

    $hotel->wishlist = $conditionwishlist;
    
    $hotelData['banner_image_path'] = $banner_image_path;
    $hotelData['hotel'] = $hotel;

    $data_selling_hotel[] = $hotelData;
}
 
  

 $terms = DB::table('bravo_terms')->where('attr_id','18')->where('status','1')->get();
 $dataff = [];

foreach ($terms as $parent) {
$name = $parent->name;
$childData = DB::table('bravo_hotel_term')->where('term_id', $parent->id)->distinct()->take(3)->get();
$hotels = [];

foreach ($childData as $child) {
    $id = $child->target_id;
    $hotelsData = DB::table('bravo_hotels')->where('id', $id)->take(3)->where('deleted_at', NULL)->get();
    
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

$dataff[] = [
    'id' => $parent->id,
    'parent_name' => $name,
    'hotels' => $hotels,
];

}

$datacat = DB::table('bravo_terms')->where('attr_id','22')->get();   
$fetch = []; 


foreach($datacat as $dd)
{
   $image = DB::table('media_files')->where('id',$dd->image_id)->first();
   $dd->banner_image ='/uploads/'. $image->file_path;
   $fetch[] = $dd;    
}



if (auth()->check()) {
    $user_id = auth()->user()->id;
} else {
   $user_id = Null;
}

$terms = DB::table('bravo_terms')->where('attr_id', '20')->where('status','1')->get();
$data = [];

foreach ($terms as $parent) {
$name = $parent->name;

$childData = DB::table('bravo_event_term')->where('term_id', $parent->id)->distinct()->get();



$hotels = [];

foreach ($childData as $child) {
    
    $id = $child->target_id;

    $hotel = DB::table('bravo_events')->where('id', $id)->where('deleted_at', NULL)->first();
    
    if($hotel)
    {
           $wishlist = DB::table('user_wishlist')
        ->where('object_id', $hotel->id)
       
        ->where('user_id', $user_id)
        ->where('object_model', 'event')
        ->select('id')
      
        ->first();
    
    $conditionwishlist = $wishlist ?true : false;
    
     $bannerId = $hotel->banner_image_id;
    $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();
    $hotel->banner_image = "uploads/$bannerimage->file_path";
    $hotel->wishlist = $conditionwishlist;
    $hotels[] = $hotel;
        
    }
   
}

$data[] = [
    'id' => $parent->id,
    'parent_name' => $name,
    'events' => $hotels,
];
}


if (auth()->check()) {
    $user_id = auth()->user()->id;
} else {
   $user_id = Null;
}

$terms = DB::table('bravo_terms')->where('id', '106')->get();

$bestDeal = "";

foreach ($terms as $parent) {
    $name = $parent->name;
    $childData = DB::table('bravo_hotel_term')->where('term_id', $parent->id)->distinct()->get();
    $hotels = [];

    foreach ($childData as $child) {
        $id = $child->target_id;
        $hotelsData = DB::table('bravo_hotels')->where('id', $id)->where('deleted_at', NULL)->get();
        
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

    $bestDeal = [
        'id' => $parent->id,
        'parent_name'=> $name,
        'hotels' => $hotels,
    ];
    
  
}

return view ('Hotel::frontend.Deals',compact('dataff','data','bestDeal','data_discount','data_review','data_selling_hotel'));

 }

 public function hasWishList()
 {
     return $this->hasOne($this->userWishListClass,'object_id', 'id')->where('object_model', $this->type)->where('user_id', Auth::id() ?? 0);
 }

 public function isWishList()
 {
     if (Auth::check()) {
         if (!empty($this->hasWishList) and !empty($this->hasWishList->id)) {
             return 'active';
         }
     }
     return '';
 }

 public function staycationCart(request $request){

     $data = DB::table('bravo_hotel_rooms')->where('id',$request->id)->get();

     Session::put('rooms_id_session',$request->id);


     return view('Hotel::frontend.staycationbookingdetail', compact('data'));
}


public function editTermsStatus(request $request)
{

  $checktermsStatus = DB::table('bravo_terms')->where('id',$request->id)->first();

  if($checktermsStatus->status == '0')
   {

    $term = DB::table('bravo_terms')->where('id',$request->id)->update([

         'status' => '1',
        ]);

    }else
    {
      $term = DB::table('bravo_terms')->where('id',$request->id)->update([
        
        'status' => '0',
     ]);

      }

   return redirect()->back()->with('TermsStausUpdatedSuccessfully','operation done');

}

public function showByKeyword($keyword)
{
    $keyword = urldecode($keyword); 
    $hotels = DB::table('bravo_hotels')
        ->where('title', 'LIKE', '%' . $keyword . '%')
        ->get();

    // Fetch wishlist data for each hotel
    $hotelDatas = []; // Initialize an array to hold hotel data
    foreach ($hotels as $hotel) {
        $wishlist = DB::table('user_wishlist')
            ->where('object_id', $hotel->id)
            ->where('object_model', 'hotel')
            ->select('id')
            ->first();

        $conditionwishlist = $wishlist ? true : false;

        $bannerId = $hotel->banner_image_id;
        $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();

        if ($bannerimage !== null) {
            $banner_image_path = "uploads/" . $bannerimage->file_path;
        } else {
            $banner_image_path = null;
        }

        $hotel->wishlist = $conditionwishlist;

        $hotelData = [];
        $hotelData['banner_image_path'] = $banner_image_path;
        $hotelData['hotel'] = $hotel;

        $hotelDatas[] = $hotelData; // Add each hotel data to the array
    }

    return view('Hotel::show_all_staycation', compact('hotelDatas'));
}



 

}