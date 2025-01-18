





@php
    $review = DB::table('bravo_review')->limit(10)->get();

    $user_review = [];

    foreach ($review as $rr) {
        $user = DB::table('users')->select('first_name', 'last_name', 'images')->where('id', $rr->user_id)->first();
        $rr->user = $user;
        $user_review[] = $rr;
    }
@endphp

<style>
    .carousel-control-prev-icon {
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3e%3c/svg%3e);
        background-color: black;
    }

    .carousel-control-next-icon {
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3e%3c/svg%3e);
        background-color: black;
    }
</style>
{{--
<div>
    @if(!empty($user_review))
        <div id="testimonial-carousel" class="carousel slide bravo-testimonial" data-ride="carousel">
            <div class="container">
                <h3>{{$title}}</h3>
                <div class="carousel-inner">
                    @php $active = true; @endphp
                    @foreach(array_chunk($user_review, 3) as $chunk)
                        <div class="carousel-item {{$active ? 'active' : ''}}">
                            <div class="row">
                                @foreach($chunk as $item)
                                    <div class="col-md-4">
                                        <div class="item has-matchHeight">
                                            <div class="author">
                                                @if(!empty($item->user->images))
                                                    <img src="/image/{{$item->user->images}}" alt="{{$item->user->first_name}}">
                                                @else
                                                    <img src="/default-image.jpg" alt="Default Image">
                                                @endif
                                                <div class="author-meta">
                                                    @if(!empty($item->user->first_name) && !empty($item->user->last_name))
                                                        <h4>{{$item->user->first_name}} {{$item->user->last_name}}</h4>
                                                    @endif
                                                    @if(!empty($item->rate_number))
                                                        <div class="star">
                                                            @for($i = 0; $i < $item->rate_number; $i++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <p>
                                                {{$item->content}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @php $active = false; @endphp
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#testimonial-carousel" role="button" style="color:black;" data-slide="prev">
                    <span style="color:black;" class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#testimonial-carousel" style="color:black;"  role="button" data-slide="next">
                    <span style="color:black;" class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    @endif
</div>
--}}

<div class="container mt-5 pt-5 mb-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="card1">
                <img src="images/Frame_1.svg" class="card-img-top" alt="...">
                
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card1">
                <img src="images/Frame_2.png" class="card-img-top" alt="...">
               
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card1">
                <img src="images/Group2608634.svg" class="card-img-top" alt="..." style="height:64px">
                <div class="card-body">
                    <h5 class="card-title pt-3" style="font-weight:900">Best Offer</h5>
                    <p class="card-text">Best Recommendations according to your Interest and offers.</p>
                </div>
            </div>
        </div>
    </div>
</div>
