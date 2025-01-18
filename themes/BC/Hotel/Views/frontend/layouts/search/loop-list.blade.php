


@php
    $translation = $row->translate();
@endphp
<div class="item-loop-list {{$wrap_class ?? ''}}">
    @if($row->is_featured == "1")
        <div class="featured">
            {{__("Featured")}}
        </div>
    @endif
    <div class="thumb-image">
       <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
        
           <?php
           
           
           $data = DB::table('media_files')->where('id',$row->banner_image_id)->select('file_path')->first();
           
           
           ?>
            
                @if(!empty($disable_lazyload))
                
              
                     {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$translation->title]) !!}
                @else
                     
                    
                    <img src="{{asset('uploads/'.$data->file_path)}}" class="img-responsive" alt="">
                 
                @endif
         
        </a>

<div class="service-wishlist {{$row->isWishList() ? 'active' : ''}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
    <i class="fa {{$row->isWishList() ? 'fa-heart red-heart' : 'fa-heart-o'}}" style="background: white;
    height: 30px;
    width: 30px;
    border-radius: 30px;
    padding: 8px 7px;
}"></i>
</div>


    </div>
    <div class="g-info">
        @if($row->star_rate)
            <div class="star-rate">
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        @for ($star = 1 ;$star <= $row->star_rate ; $star++)
                            <li><i class="fa fa-star"></i></li>
                        @endfor
                    </ul>
                </div>
            </div>
        @endif
        <div class="item-title">
            <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
                @if($row->is_instant)
                    <i class="fa fa-bolt d-none"></i>
                @endif
                    {{$translation->title}}
            </a>
        </div>
        @if(!empty($attribute = $row->getAttributeInListingPage()))
            @php
                $translate_attribute =  $attribute->translate();
                $termsByAttribute = $row->termsByAttributeInListingPage
            @endphp
            <div class="terms">
                <div class="g-attributes">
                    <span class="attr-title"><i class="icofont-medal"></i> {{$translate_attribute->name ?? ""}}: </span>
                    @foreach($termsByAttribute as $term )
                        @php $translate_term = $term->translate() @endphp
                        <span class="item {{$term->slug}} term-{{$term->id}}">{{$translate_term->name}}</span>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="location">
            @if(!empty($row->location->name))
                @php $location =  $row->location->translate() @endphp
                <i class="icofont-paper-plane"></i>
                {{$location->name ?? ''}}
            @endif
        </div>
    </div>
    <div class="g-rate-price">
        @if(setting_item('hotel_enable_review'))
            @php  $reviewData = $row->getScoreReview(); @endphp
            <div class="service-review-pc">
                <div class="head">
                    <div class="left">
                        <span class="head-rating">{{$reviewData['review_text']}}</span>
                        <span class="text-rating" style="color:#FF3500;">{{__(":number reviews",['number'=>$reviewData['total_review']])}}</span>
                    </div>
                    <div class="score" style="background:#FF3500;">
                        {{$reviewData['score_total']}}<span style="background:#FF3500;">/5</span>
                    </div>
                </div>
            </div>
        @endif
        <div class="g-price">
            <div class="prefix">
                <span class="fr_text" style="color: #FF3500;">{{__("from")}}</span>
            </div>
            <div class="price">
                <span class="text-price">{{ $row->display_price }} <span class="unit">{{__("/night")}}</span></span>
           
            </div>
            @if(!empty($reviewData['total_review']))
                <div class="text-review">
                    {{__(":number reviews",['number'=>$reviewData['total_review']])}}
                </div>
            @endif
        </div>
    </div>
</div>

<script>
$('document').ready(function() {
    $('.service-wishlist').click(function() {
        var $heartIcon = $(this).find('i');
        var isActive = $(this).hasClass('active'); // Check if it's active
        var object_id = $(this).data('id');
        var object_model = $(this).data('type');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: '/user/wishlist',
            type: 'post',
            data: {
                object_id: object_id,
                object_model: object_model
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                if (response.class === "active") {
                    if (!isActive) {
                        // Change from inactive to active
                        $heartIcon.removeClass('fa-heart-o').addClass('fa-heart red-heart');
                        $(this).addClass('active');
                    }
                } else if (response.class === "inactive") {
                    if (isActive) {
                        // Change from active to inactive
                        $heartIcon.removeClass('fa-heart red-heart').addClass('fa-heart-o');
                        $(this).removeClass('active');
                    }
                } else {
                    alert("Unexpected response status: " + response.status);
                }
            },
            error: function(xhr, status, error) {
                $('#login').modal('show');
            }
        });
    });
});
</script>
