 @if(count($event_related) > 0)
    <div class="bravo-list-space-related">
        <h2 style="text-align:start">{{__("You might also like")}}</h2>
        <div class="row">
            @foreach($event_related as $k=>$item)
                <div class="col-md-3">
                    @include('Event::frontend.layouts.search.loop-grid',['row'=>$item,'include_param'=>0])
                </div>
            @endforeach
        </div>
    </div>
@endif

