@if(count($space_related) > 0)
    <div class="bravo-list-space-related">
        {{-- <h2 class="text-start">{{__("You might also like")}}</h2> --}}
        <div class="row">
            @foreach($space_related as $k=>$item)
                <div class="col-md-3">
                    @include('Space::frontend.layouts.search.loop-grid',['row'=>$item,'include_param'=>0])
                </div>
            @endforeach
        </div>
    </div>
@endif