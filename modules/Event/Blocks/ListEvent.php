<?php
namespace Modules\Event\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Event\Models\Event;
use Modules\Location\Models\Location;
use DB;
class ListEvent extends BaseBlock
{

    protected $eventClass;
    public function __construct(Event $eventClass)
    {
        $this->eventClass = $eventClass;
    }

    public function getName()
    {
        return __('Event: List Items');
    }
    public function getOptions(): array
    {
        return [
            'settings' => [
            [
                'id'        => 'title',
                'type'      => 'input',
                'inputType' => 'text',
                'label'     => __('Title')
            ],
            [
                'id'        => 'desc',
                'type'      => 'input',
                'inputType' => 'text',
                'label'     => __('Desc')
            ],
            [
                'id'        => 'number',
                'type'      => 'input',
                'inputType' => 'number',
                'label'     => __('Number Item')
            ],
            [
                'id'            => 'style',
                'type'          => 'radios',
                'label'         => __('Style'),
                'values'        => [
                    [
                        'value'   => 'normal',
                        'name' => __("Normal")
                    ],
                    [
                        'value'   => 'carousel',
                        'name' => __("Slider Carousel")
                    ]
                ]
            ],
            [
                'id'      => 'location_id',
                'type'    => 'select2',
                'label'   => __('Filter by Location'),
                'select2' => [
                    'ajax'  => [
                        'url'      => route('location.admin.getForSelect2'),
                        'dataType' => 'json'
                    ],
                    'width' => '100%',
                    'allowClear' => 'true',
                    'placeholder' => __('-- Select --')
                ],
                'pre_selected'=>route('location.admin.getForSelect2',['pre_selected'=>1])
            ],
            [
                'id'            => 'order',
                'type'          => 'radios',
                'label'         => __('Order'),
                'values'        => [
                    [
                        'value'   => 'id',
                        'name' => __("Date Create")
                    ],
                    [
                        'value'   => 'title',
                        'name' => __("Title")
                    ],
                ]
            ],
            [
                'id'            => 'order_by',
                'type'          => 'radios',
                'label'         => __('Order By'),
                'values'        => [
                    [
                        'value'   => 'asc',
                        'name' => __("ASC")
                    ],
                    [
                        'value'   => 'desc',
                        'name' => __("DESC")
                    ],
                ]
            ],
            [
                'type'=> "checkbox",
                'label'=>__("Only featured items?"),
                'id'=> "is_featured",
                'default'=>true
            ],
            [
                'id'           => 'custom_ids',
                'type'         => 'select2',
                'label'        => __('List by IDs'),
                'select2'      => [
                    'ajax'        => [
                        'url'      => route('event.admin.getForSelect2'),
                        'dataType' => 'json'
                    ],
                    'width'       => '100%',
                    'multiple'    => "true",
                    'placeholder' => __('-- Select --')
                ],
                'pre_selected' => route('event.admin.getForSelect2', [
                    'pre_selected' => 1
                ])
            ],
        ],
            'category'=>__("Service Event")
        ];
    }

    public function content($model = [])
    {
        $list = $this->query($model);
        $data = [
            'rows'       => $list,
            'style_list' => $model['style'],
            'title'      => $model['title'],
            'desc'       => $model['desc'],
        ];
        
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



$top_selling_event = DB::table('bravo_bookings')
    ->select('bravo_events.*') // Include all columns of bravo_hotels
    ->join('bravo_events', 'bravo_bookings.object_id', '=', 'bravo_events.id')
    ->groupBy('bravo_events.id', 'bravo_events.title')
    ->where('object_model', 'event')->orderBy('id','DESC')->take(4)
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
 
        
        return view('Event::frontend.blocks.list-event.index', $data, compact('data_review' ,'data_discount','data_selling_hotel','top_event'));
    }

    public function contentAPI($model = []){
        $rows = $this->query($model);
        $model['data']= $rows->map(function($row){
            return $row->dataForApi();
        });
        return $model;
    }

    public function query($model){
        $listCar = $this->eventClass->search($model);
        $limit = $model['number'] ?? 5;
        return $listCar->paginate($limit);
    }
}
