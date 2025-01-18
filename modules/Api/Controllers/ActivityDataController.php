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

use DB;

use Session;

class ActivityDataController extends Controller
{
    
public function search(request $request){
          
$limit = $request->limit;
$page = $request->page;
$user_id = $request->id;

$posts = DB::table('bravo_events')->whereNull('deleted_at')->offset($page)->limit($limit)->get();

$data = [];

foreach ($posts as $p) {
    
    $wishlist = DB::table('user_wishlist')->where('object_id', $p->id)->where('user_id', $user_id)->where('object_model','event')->first();
    
    $conditionwishlist = $wishlist ? true : false;
    
    $bannerImage = DB::table('media_files')->where('id', $p->banner_image_id)->select('file_path')->first();
    
    if ($bannerImage) {
        $p->bannerImage = "/uploads/$bannerImage->file_path";
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
    
    
  public function attrtermsget(request $request)
    {

$user_id = $request->id;

$terms = DB::table('bravo_terms')->where('attr_id', '20')->get();
$data = [];

foreach ($terms as $parent) {
    $name = $parent->name;
    $childData = DB::table('bravo_event_term')->where('term_id', $parent->id)->distinct()->get();
    $hotels = [];

    foreach ($childData as $child) {
        $id = $child->target_id;
        $hotel = DB::table('bravo_events')->where('id', $id)->first();
        
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

    $data[] = [
        'id' => $parent->id,
        'parent_name' => $name,
        'events' => $hotels,
    ];
}

return $data;


    }


public function bannerImageActivity()
{
    
    $dimage = DB::table('sliderbanner')->where('condition','activity')->get();
    
    if($dimage)
    {
        return response()->json(['message'=>'banner get successfully','data'=>$dimage]);
        
    }else{
        
         return response()->json(['message'=>'no banner foun','bannerImage'=>[],'status'=>0]);
        
    }
    
}


    public function detail(request $request)
    {
         $type= "event";
         $id  = $request->id;
         $user_id = $request->user_id;
         if($type == null)
        {
            return response()->json(['message'=>"please give type parameter"]);
            }
        if($id == null)
        {
            return response()->json(['message'=>"please give type parameter"]);
         }
     $image = DB::table('bravo_events')->select('gallery','title','slug','banner_image_id','review_score','duration','start_time','extra_price')->where('id',$id)->first();
      if($image->gallery !== NULL)
       {
             $values = explode(',', $image->gallery);
           $result = array_filter($values);
          $result = array_values($result);
       }
     $number=[];
        
       foreach ($result as $gg) {
       $ss = DB::table('media_files')->where('id', $gg)->first();
       if($ss) {
           $number[] = "uploads/$ss->file_path";
          }
        }
         $class = get_bookable_service_by_id($type);
        
        $row = $class::find($id);

    //   $termsdata = DB::table('bravo_terms')->where('attr_id','20')->get();
       
       $price = DB::table('bravo_events')->select('id','price','discount','content','address')->where('id',$id)->first();
       
        $wishlist = DB::table('user_wishlist')
            ->where('object_id', $price->id)
            ->where('user_id', $user_id)
            ->where('object_model', 'event')
            ->select('id')
            ->first();
         $conditionwishlist = $wishlist ?true : false;
            
       
     $aatribute = $termsdata = DB::table('bravo_terms')->where('attr_id','11')->get();
       
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
        
      $review = DB::table('bravo_review')->where('object_id',$id)->where('object_model','event')->limit(10)->get();

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
              'features'=>$aatribute,
              'banner' =>$imagebanner,
              'price' =>$price,
              'gallery'=>$number,
              'review' =>$user_review
             
        ]);

    }
    
      public function viewAll(request $request)
     {
         
         $parentId = $request->id;
         $user_id = $request->user_id;
         
$data = "";

    $childData = DB::table('bravo_event_term')->where('term_id',$parentId)->distinct()->get();
    $hotels = [];
    foreach ($childData as $child) {
        $id = $child->target_id;
        $hotelsData = DB::table('bravo_events')->where('id', $id)->get();
        
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
        'activity' => $hotels,
    ];

    return $data;
}
    
}
