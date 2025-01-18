<?php

namespace Modules\Api\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Booking\Models\Service;
use Modules\Flight\Controllers\FlightController;
use DB;

class SearchController extends Controller
{
    
public function search(request $request){
          
          
$limit = $request->limit;
$page = $request->page;
$user_id = $request->id;

$posts = DB::table('bravo_hotels')->whereNull('deleted_at')->offset($page)->limit($limit)->get();

$data = [];

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
    
    $data[] = $p;
}

if (!empty($data)) {
    return response()->json(['message' => "success", 'data' => $data, 'status' => 200]);
} else {
    return response()->json(['message' => "fail", 'data' => [], 'status' => 0]);
}


    }
    
    
    public function hotelnear(request $request)
    {
        
      
$centerLatitude = $request->map_lat;
$centerLongitude = $request->map_lng;
$user_id = $request->id;

$radius = 10;

if (!empty($centerLatitude) && !empty($centerLongitude)) {
    $hotels = DB::table('bravo_hotels')
        ->select('bravo_hotels.id', 'title', 'map_lat', 'map_lng', 'price', 'discount_percent', 'location_id', 'banner_image_id', 'star_rate')
        ->selectRaw("(6371 * acos(cos(radians($centerLatitude)) * cos(radians(map_lat)) * cos(radians(map_lng) - radians($centerLongitude)) + sin(radians($centerLatitude)) * sin(radians(map_lat)))) AS distance")
        ->having('distance', '<', $radius)
        ->orderBy('distance')
        ->get();

    $data = [];
    $images = [];

    foreach ($hotels as $hotel) {
        
          $wishlist = DB::table('user_wishlist')->where('object_id', $hotel->id)->where('user_id', $user_id)->where('object_model','hotel')->first();
    
          $conditionwishlist = $wishlist ? true : false;
    
        $location = DB::table('bravo_locations')->where('id', $hotel->location_id)->first();
        $image    =    DB::table('media_files')->where('id', $hotel->banner_image_id)->first();

        $hotelData    = (array)$hotel;
        
        $locationData = (array)$location;

        $hotelData['location'] = $locationData;
        $hotelData['image_path'] = "uploads/$image->file_path";
        $hotelData['wishlist']= $hotel->wishlist = $conditionwishlist;
     
       
     
        $data[] = $hotelData;
        // $data[] = $hotel->wishlist;
    }

    if ($data) {
        return response()->json(['message' => 'Data fetched successfully', 'status' => 1, 'data' => $data]);
    } else {
        return response()->json(['message' => 'Not found', 'data' => [], 'status' => 0]);
    }
} else {
    return response()->json(['message' => 'No latitude and longitude found', 'data' => [], 'status' => 0]);
}

    }
    
    
    public function attrtermsget(request $request)
    {
        
$user_id = $request->id;

$terms = DB::table('bravo_terms')->where('attr_id', '18')->get();
$data = [];

foreach ($terms as $parent) {
    $name = $parent->name;
    $childData = DB::table('bravo_hotel_term')->where('term_id', $parent->id)->distinct()->take(10)->get();
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

    $data[] = [
        'id' => $parent->id,
        'parent_name' => $name,
        'hotels' => $hotels,
    ];
}
return $data;

        
    }


    public function searchServices(){
        if(!empty(request()->query('limit'))){
            $limit = request()->query('limit');
        }else{
            $limit = 9;
        }
          $query = new Service();
          $rows =  $query->search(request()->input())->paginate($limit);
          $total = $rows->total();
           return   $this->sendSuccess(
            [
                'total'=>$total,
                'total_pages'=>$rows->lastPage(),
                'data'=>$rows->map(function($row){
                    return $row->dataForApi();
                }),
            ]
        );
    }

    public function getFilters($type = ''){
        
        $type = $type ? $type : request()->get('type');
        
        if(empty($type))
        {
            return $this->sendError(__("Type is required"));
        }
        $class = get_bookable_service_by_id($type);
        if(empty($class) or !class_exists($class)){
            return $this->sendError(__("Type does not exists"));
        }
        $data = call_user_func([$class,'getFiltersSearch'],request());
        return $this->sendSuccess(
            [
                'data'=>$data
            ]
        );
        
        
    }

    public function getFormSearch($type = ''){
        $type = $type ? $type : request()->get('type');
        if(empty($type))
        {
            return $this->sendError(__("Type is required"));
        }
        $class = get_bookable_service_by_id($type);
        if(empty($class) or !class_exists($class)){
            return $this->sendError(__("Type does not exists"));
        }
        $data = call_user_func([$class,'getFormSearch'],request());
        return $this->sendSuccess(
             [
                'data'=>$data
             ]
        );
    }

    public function detail(request $request)
    {
         $type= $request->type;
         $id  = $request->id;
         $user_id = $request->user_id;
        
        if($type == null)
        {
            return response()->json(['message'=>"please give type parameter"]);
         }
        
       $image = DB::table('bravo_hotels')->select('gallery','title','slug','banner_image_id','star_rate','review_score')->where('id',$id)->first();
       
       if(!$image)
       {
           
           return response()->json(['message'=>"no data found",'status'=>0]);
       }
       
       
       $values = explode(',', $image->gallery);
      
        $result = array_filter($values);
        
        $result = array_values($result);
        
        $number=[];
        
       foreach ($result as $gg) {
       $ss = DB::table('media_files')->where('id', $gg)->first();
       if($ss) {
           $number[] = "uploads/$ss->file_path";
          }
        }
         $class = get_bookable_service_by_id($type);
        
         $row = $class::find($id);

       $termsdata = DB::table('bravo_terms')->where('attr_id','5')->get();
       
       
       $price = DB::table('bravo_hotels')->select('id','price','discount_percent','extra_price','content','address')->where('id',$id)->first();
       
        if(!$price)
       {
           
           return response()->json(['message'=>"no data found",'status'=>0]);
       }
       
       
          $wishlist = DB::table('user_wishlist')
            ->where('object_id', $price->id)
            ->where('user_id', $user_id)
            ->where('object_model','hotel')
            ->select('id')
            ->first();
            
        
      $conditionwishlist = $wishlist ?true : false;
      
      $banner = $image->banner_image_id;
       
      $data = DB::table('media_files')->where('id',$banner)->first();
       
      $imagebanner = "uploads/$data->file_path";
       
      $viewName = $res = '';
       
      $lever =  $image->review_score;
       
      $fever = intval($lever);
        
      
       switch ($fever) {
            case 5:
               $res = "excellent";
                 break;
            case 4:
               $res ="very good";
                break;
            case 3:
                $res ="average";
                break;
            case 2:
                $res = "good";
                break;
            case 1:
            case 0:
               $res = "poor";
                break;
            default:
                $res = "not rated";
                break;
        }
        
 $review = DB::table('bravo_review')->where('object_id',$id)->where('object_model','hotel')->limit(10)->get();

$user_review = [];

foreach ($review as $rr) {
    $user = DB::table('users')->select('first_name', 'last_name', 'images')->where('id', $rr->user_id)->first();
    $rr->user = $user;
    $user_review[] = $rr;
    }

       return $this->sendSuccess([
             'data' => $image,
             'wishlist'=> $conditionwishlist,
             'star_text'=>$res,
             'features'=>$termsdata,
             'banner' =>$imagebanner,
             'price' =>$price,
             'gallery'=>$number,
             'review' => $user_review
             ]);

    }
    

    public function checkAvailability(Request $request ,$type = '',$id = ''){
        if(empty($type)){
            return $this->sendError(__("Resource is not available"));
        }
        if(empty($id)){
            return $this->sendError(__("Resource ID is not available"));
        }
        $class = get_bookable_service_by_id($type);
        if(empty($class) or !class_exists($class)){
            return $this->sendError(__("Type does not exists"));
        }
        $classAvailability = $class::getClassAvailability();
        $classAvailability = app()->make($classAvailability);
        $request->merge(['id' => $id]);
        if($type == "hotel"){
            $request->merge(['hotel_id' => $id]);
            return $classAvailability->checkAvailability($request);
        }
        return $classAvailability->loadDates($request);
    }

    public function checkBoatAvailability(Request $request ,$id = ''){
        if(empty($id)){
            return $this->sendError(__("Boat ID is not available"));
        }
        $class = get_bookable_service_by_id('boat');
        $classAvailability = $class::getClassAvailability();
        $classAvailability = app()->make($classAvailability);
        $request->merge(['id' => $id]);
        return $classAvailability->availabilityBooking($request);
     }
     
     
     
     public function viewAll(request $request)
     {
         
         $parentId = $request->id;
         $user_id = $request->user_id;
         
$data = "";

    $childData = DB::table('bravo_hotel_term')->where('term_id', $parentId)->distinct()->get();
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


if($hotels)
{
    return response()->json(['status'=>1,'message'=>"data get successfully",'hotels'=>$hotels]);
    
}else{
     return response()->json(['status'=>0,'message'=>"no data",'hotels'=>[]]);
    
}
         
         
     }
     
    public function roompricedetail(request $request)
    { 
      $id = $request->id;

      $xdata = DB::table('bravo_hotel_rooms')->where('parent_id', $id)->get();

      $alldata = [];

     foreach ($xdata as $room) {
      $roomDates = DB::table('bravo_hotel_room_dates')->where('target_id', $room->id)->get();
      $room->roomDates = $roomDates;
      $alldata[] = $room;
      }  

      if($alldata)
       {

         return response()->json(['rooms'=>$alldata,'status'=>1]);

       }else{

         return response()->json(['rooms'=>'room not available','status'=>0]);
        
       }

    }
     
     
}
