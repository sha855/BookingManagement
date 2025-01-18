<style>
    
    
    .irs-to{
        
        background: orangered;
    }
</style>


<div class="row mt-5 pt-5">
    <div class="col-lg-3 col-md-12">
        @include('Event::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item" style="position: relative;
    left: -14px;">
            <div class="topbar-search">
                
                @php
    $terms = request('terms'); 
   
    $lastTermId = null;

    if ($terms && is_array($terms) && count($terms) > 0) {
        $lastTermId = end($terms);
        
        $name = DB::table('bravo_terms')->where('id',$terms)->first();
    
    }
@endphp

                  
                <h5 class="text" style="font-size: 22px !important;">
                    @if($rows->total() > 1)
                    
     
                      
                   
                    @if(isset($name))
                    
                    {{ __(":count Activities in $name->name Found", ['count' => $rows->total()]) }}
                    
                     
                    
                    @else
                    
                     {{ __(":count Activities Found",['count'=>$rows->total()]) }}
                    
                    @endif
                        
                        
                        
                    @else
                        {{ __(":count Activities in $name->name Found", ['count'=>$rows->total()]) }}
                    @endif
                   
                    
                    

                  
                </h5>
                <div class="control">
                    @include('Event::frontend.layouts.search.orderby')
                </div>
            </div>
            <div class="list-item">
                <div class="row">
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            <div class="col-lg-4 col-md-6">
                                @include('Event::frontend.layouts.search.loop-grid')
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            {{__("activity not found")}}
                        </div>
                    @endif
                </div>
            </div>
      
            <div class="bravo-pagination">
                {{$rows->appends(request()->query())->links()}}
                @if($rows->total() > 0)
                    <span class="count-string">{{ __("Showing :from - :to of :total activity ",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                @endif
            </div>
          
        </div>
    </div>
</div>
