<?php
namespace Modules\Event\Controllers;

use App\Http\Controllers\Controller;
use Modules\Event\Models\Event;
use Illuminate\Http\Request;
use Modules\Location\Models\Location;
use Modules\Location\Models\LocationCategory;
use Modules\Review\Models\Review;
use Modules\Core\Models\Attributes;
use DB;
use Session;

class EventController extends Controller
{
    protected $eventClass;
    protected $locationClass;
    /**
     * @var string
     */
    private $locationCategoryClass;

    public function __construct(Event $eventClass, Location $locationClass,LocationCategory $locationCategoryClass)
    {
        $this->eventClass = $eventClass;
        $this->locationClass = $locationClass;
        $this->locationCategoryClass = $locationCategoryClass;
    }

    public function callAction($method, $parameters)
    {
        if(!$this->eventClass::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); 
    }
    public function index(Request $request)
    {

        $is_ajax = $request->query('_ajax');

        if(!empty($request->query('limit'))){
            $limit = $request->query('limit');
        }else{
            $limit = !empty(setting_item("event_page_limit_item"))? setting_item("event_page_limit_item") : 20;
        }
        
        $query = $this->eventClass->search($request->input());
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
                    "infobox" => view('Event::frontend.layouts.search.loop-grid', ['row' => $row,'disable_lazyload'=>1,'wrap_class'=>'infobox-item'])->render(),
                    'marker' => get_file_url(setting_item("event_icon_marker_map"),'full') ?? url('images/icons/png/pin.png'),
                ];
            }
        }
        $limit_location = 15;
        if( empty(setting_item("event_location_search_style")) or setting_item("event_location_search_style") == "normal" ){
            $limit_location = 1000;
        }
        $data = [
            'rows'               => $list,
            'list_location'      => $this->locationClass::where('status', 'publish')->limit($limit_location)->with(['translation'])->get()->toTree(),
            'event_min_max_price' => $this->eventClass::getMinMaxPrice(),
            'markers'            => $markers,
            "blank" => setting_item('search_open_tab') == "current_tab" ? 0 : 1 ,
            "seo_meta"           => $this->eventClass::getSeoMetaForPageList()
        ];
        $layout = setting_item("event_layout_search", 'normal');
        if ($request->query('_layout')) {
            $layout = $request->query('_layout');
        }
        $data['layout'] = $layout;
        if ($is_ajax) {
            return $this->sendSuccess([
                'html'    => view('Event::frontend.layouts.search-map.list-item', $data)->render(),
                "markers" => $data['markers']
            ]);
        }
        $data['attributes'] = Attributes::where('service', 'event')->orderBy("position","desc")->with(['terms','translation'])->get();

        if ($layout == "map") {
            $data['body_class'] = 'has-search-map';
            $data['html_class'] = 'full-page';
            return view('Event::frontend.search-map', $data);
        }
        return view('Event::frontend.search', $data);
    }

    public function detail(Request $request, $slug)
    {
        $row = $this->eventClass::where('slug', $slug)->with(['location','translation','hasWishList'])->first();;
        if ( empty($row) or !$row->hasPermissionDetailView()) {
            return redirect('/');
        }
        $translation = $row->translate();
        $event_related = [];
        $location_id = $row->location_id;
        if (!empty($location_id)) {
            $event_related = $this->eventClass::where('location_id', $location_id)->where("status", "publish")->take(4)->whereNotIn('id', [$row->id])->with(['location','translation','hasWishList'])->get();
        }
        $review_list = $row->getReviewList();
        $data = [
            'row'          => $row,
            'translation'       => $translation,
            'event_related' => $event_related,
            'location_category'=>$this->locationCategoryClass::where("status", "publish")->with('location_category_translations')->get(),
            'booking_data' => $row->getBookingData(),
            'review_list'  => $review_list,
            'seo_meta'  => $row->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            'body_class'=>'is_single',
            'breadcrumbs'       => [
                [
                    'name'  => __('Event'),
                    'url'  => route('event.search'),
                ],
            ],
        ];
        $data['breadcrumbs'] = array_merge($data['breadcrumbs'],$row->locationBreadcrumbs());
        $data['breadcrumbs'][] = [
            'name'  => $translation->title,
            'class' => 'active'
        ];
        $this->setActiveMenu($row);
        return view('Event::frontend.detail', $data);
    }

  

public function activitycheckout(){
    return view('Event::frontend.activity-checkout');
}

   
public function Cart(Request $request){
    $user_id = auth()->check() ? auth()->user()->id : null;

    $data = DB::table('cart')->where('user_id', $user_id)->whereNull('status')->get();
    
    $groupedData = $data->groupBy('package_id')->map(function ($items) {
        return [
            'package_id' => $items->first()->package_id,
            'room_qty' => $items->sum('room_qty'),
            'package_name'=>$items->first()->package_name,
            'room_price'=>$items->first()->room_price,
            'type'=>$items->first()->type,
            'product_id'=>$items->first()->product_id,
            'start_date' =>$items->first()->start_date,
        ];
    })->values(); 

    return view('Event::frontend.cart', compact('groupedData'));
}




public function activityCart(request $request){
         
     $data = DB::table('activity_packages')->where('id',$request->id)->first();
     
    return view('Event::frontend.activity-checkout', compact('data'));
}

public function ActivityExp(Request $request) {
    
    $top_selling_event = DB::table('bravo_bookings')
    ->select('bravo_events.*') // Include all columns of bravo_hotels
    ->join('bravo_events', 'bravo_bookings.object_id', '=', 'bravo_events.id')
    ->groupBy('bravo_events.id', 'bravo_events.title')
    ->where('object_model', 'event') ->where('bravo_bookings.status', 'paid')->orderBy('id','DESC')->take(4)
    ->get();

$top_event = [];

foreach ($top_selling_event as $hotel) {
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

    $top_event[] = $hotelData;
}
    
  $top_reviewed_events = DB::table('bravo_events')->where('deleted_at',NULL)
    ->whereBetween('review_score', [3.0, 5.0])
    ->orderBy('review_score', 'desc')
    ->get();

$data_review = [];

foreach ($top_reviewed_events as $event) {
    $eventData = []; // Create an associative array for each event's data

    $wishlist = DB::table('user_wishlist')
        ->where('object_id', $event->id)
        ->where('object_model', 'event')
        ->select('id')
        ->first();

    $conditionwishlist = $wishlist ? true : false;

    $bannerId = $event->banner_image_id;
    $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();

    if ($event !== null && $bannerimage !== null) {
        $banner_image_path = "uploads/" . $bannerimage->file_path; // Store the banner image path in a separate variable
    }

    $event->wishlist = $conditionwishlist;

  
    $eventData['banner_image_path'] = $banner_image_path ?? null;

   
    $eventData['event'] = $event;

   
    $data_review[] = $eventData;
}


$top_discount_events = DB::table('bravo_events')
    ->whereBetween('discount', [70, 100])
    ->orderBy('discount', 'desc')
    ->get();

$data_discount = [];

foreach ($top_discount_events as $event) {
    $eventData = []; // Create an associative array for each event's data

    $wishlist = DB::table('user_wishlist')
        ->where('object_id', $event->id)
        ->where('object_model', 'event')
        ->select('id')
        ->first();

    $conditionwishlist = $wishlist ? true : false;

    $bannerId = $event->banner_image_id;
    $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();

    if ($event !== null && $bannerimage !== null) {
        $banner_image_path = "uploads/" . $bannerimage->file_path; // Store the banner image path in a separate variable
    }

    $event->wishlist = $conditionwishlist;

    $eventData['banner_image_path'] = $banner_image_path ?? null;

    $eventData['event'] = $event;

    $data_discount[] = $eventData;
}

    $datacat = DB::table('bravo_terms')->where('attr_id','22')->get();   
    $fetch = []; 
    foreach($datacat as $dd)
    {
       $image = DB::table('media_files')->where('id',$dd->image_id)->first();
       $dd->banner_image ='/uploads/'. $image->file_path;
       $fetch[] = $dd;    
    }
    
$user_id = auth()->user()->id ??  '';

$terms = DB::table('bravo_terms')->where('status','1')->where('attr_id', '20')->get();


$data = [];

foreach ($terms as $parent) {
    $name = $parent->name;
    $childData = DB::table('bravo_event_term')->where('term_id', $parent->id)->distinct()->get();
    $hotels = [];
    
    foreach ($childData as $child) {
        
         $id = $child->target_id;
        
         $hotel = DB::table('bravo_events')->where('id', $id)->where('deleted_at',NULL)->first();
          
          if($hotel)
         {
             
              $wishlist = DB::table('user_wishlist')
            ->where('object_id', $hotel->id)
            ->where('user_id', $user_id)
            ->where('object_model','event')
            ->select('id')
            ->first();
             
             $conditionwishlist = $wishlist ?true : false;
             
         $bannerId = $hotel->banner_image_id;
         $bannerimage = DB::table('media_files')->where('id', $bannerId)->first();
          $hotel->wishlist = $conditionwishlist;
         $hotels[] = $hotel;
         }
        
       
        if ($hotel !== null && $bannerimage !== null) {
    
       $hotel->banner_image = "uploads/" . $bannerimage->file_path;
              }
        
    }
    
    

    $data[] = [
        'id' => $parent->id,
        'parent_name' => $name,
        'events' => $hotels,
    ];
}

return view('Event::frontend.explore-activity',compact('fetch','data','data_review','data_discount','top_event'));
}


 public function deleteEventdata(request $request)
 {
     $deleteEventdata = DB::table('activity_packages')->where('id',$request->id)->delete();

     if($deleteEventdata)
    {
              return redirect()->back()->with('eventdataDeletedSuccessfully','event data deleted');
        
    }else{

         return redirect()->back()->with('errorsomething','something is wrong data not deleted');
    }
  }
 
 
 
public function checkoutquic(Request $request)
{
   
$product =      $request->input('product_id');
$prices =       $request->input('price');
$quantity =     $request->input('packageQuantity');
$packageNames = $request->input('package_name');

$finalQuantity = [];
$totalPrice = 0;
$adultQuantity = 0;
$childQuantity = 0;
$adultTotalPrice = 0; 
$childTotalPrice = 0; 

foreach ($quantity as $index => $qq) {
    $qty = intval($qq);
    if ($qty > 0) {
        $finalQuantity[$index] = $qty;
        if ($packageNames[$index] === "1 adult") {
            $adultQuantity += $qty;
            $adultTotalPrice += floatval($prices[$index]) * $qty;
        } elseif ($packageNames[$index] === "child") {
            $childQuantity += $qty;
            $childTotalPrice += floatval($prices[$index]) * $qty;
        }
        $totalPrice += floatval($prices[$index]) * $qty;
    }
}

if (empty($finalQuantity)) {
    return redirect()->back()->with('error', 'No items selected. Please select items.');
}

$formattedTotalPrice = number_format($totalPrice, 2);

Session::put('formattedTotalPrice', $formattedTotalPrice);
Session::put('product', $product);

Session::put('totalpersons', $request->package_name);
Session::put('totalPrice',$request->price);

Session::put('quantitytotal',$request->packageQuantity);

return redirect('activity_booking_detail');

    
}

 
 
 
 

}