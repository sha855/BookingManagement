<?php
namespace Modules\Hotel\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Hotel\Models\Hotel;
use Modules\Location\Models\Location;
use DB;
class ListHotel extends BaseBlock
{

    protected $hotelClass;
    public function __construct(Hotel $hotelClass)
    {
        $this->hotelClass = $hotelClass;
    }

    public function getName()
    {
        return __('Hotel: List Items');
    }

    public function getOptions()
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
                    'label'     => __('Number Item'),
                    "default" => "5",
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
                    ],
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
                    ],
                    "selectOptions"=> [
                        'hideNoneSelectedText' => "true"
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
                            'url'      => route('hotel.admin.getForSelect2'),
                            'dataType' => 'json'
                        ],
                        'width'       => '100%',
                        'multiple'    => "true",
                        'placeholder' => __('-- Select --')
                    ],
                    'pre_selected' => route('hotel.admin.getForSelect2', [
                        'pre_selected' => 1
                    ])
                ],
            ],
            'category'=>__("Service Hotel")
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


      $terms = DB::table('bravo_terms')?->where('status','1')?->where('attr_id', '18')->get();
      $datas = [];



   foreach ($terms as $parent) {
    $name = $parent->name;
    $childData = DB::table('bravo_hotel_term')->where('term_id', $parent->id)->distinct()->take(3)->orderBy('id','DESC')->get();
    $hotels = [];

    foreach ($childData as $child) {
        $id = $child->target_id;
        $hotelsData = DB::table('bravo_hotels')->where('id', $id)->where('deleted_at',NULL)->take(3)->get();

        foreach ($hotelsData as $hotel) {
            $wishlist = DB::table('user_wishlist')
                ->where('object_id', $hotel->id)
                // ->where('user_id', $user_id)
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

    $datas[] = [
        'id' => $parent->id,
        'parent_name' => $name,
        'hotels' => $hotels,
    ];
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





 return view('Hotel::frontend.blocks.list-hotel.index',$data, compact('fetch','datas','data_discount','data_review'));

    }

    public function contentAPI($model = []){
        $rows = $this->query($model);
        $model['data']= $rows->map(function($row){
            return $row->dataForApi();
        });
        return $model;
    }

    public function query($model){
        $hotelClass = $this->hotelClass->search($model);
        $limit = $model['number'] ?? 5;
        return $hotelClass->paginate($limit);
    }
}
