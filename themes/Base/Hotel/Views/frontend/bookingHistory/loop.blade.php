<tr>
    <td class="booking-history-type">
       {{--  @if(isset($booking->service))
       @if($service = $booking->service)
        
            <i class="{{$service->getServiceIconFeatured()}}"></i>
            
        @endif 
        @endif --}}
        <p>
            
            <?php 
              
              if($booking->object_model == "hotel")
             {
                
                echo "staycation";
                
            }else{
                
               
               echo $booking->object_model;
            
            }
            
            ?>
            
            
            </p>
    </td>
    <td>
         
      @if (isset($booking->service))
    @php
        $translation = $booking->service->translate();
    @endphp
    {{--  <a target="_blank" href="{{$booking->service->getDetailUrl()}}">
        {{$translation->title}}
    </a> --}}
    
    <p target="_blank">
        {{$translation->title}}
    </p>
@else
    <?php
    $itemname = DB::table('bravo_hotels')->where('id', $booking->object_id)->first();
    ?>

    @if ($itemname)
        <p target="_blank">
            {{$itemname->title}}
        </p>
    @else
        {{__("[Deleted]")}}
    @endif
@endif

    </td>
    <td class="a-hidden">{{display_date($booking->created_at)}}</td>
    <td class="a-hidden">
        {{__("Check in")}} : {{display_date($booking->start_date)}} <br>
        {{__("Check out")}} : {{display_date($booking->end_date)}} <br>
         @if(isset($booking->duration_nights)) 
        @if($booking->duration_nights <= 1)
            {{__(':count night',['count'=>$booking->duration_nights])}}
        @else
            {{__(':count nights',['count'=>$booking->duration_nights])}}
        @endif
        @endif
    </td>
    <td>{{intval($booking->total)}}</td>
    <td>{{intval($booking->paid)}}</td>
    <td>{{$booking->currency}}</td>
    <td class="{{$booking->status}} a-hidden">{{$booking->status}}</td>
    <td width="2%">
       {{-- @if($service = $booking->service)
            <a class="btn btn-xs btn-primary btn-info-booking" data-ajax="{{route('booking.modal',['booking'=>$booking])}}" data-toggle="modal" data-id="{{$booking->id}}" data-target="#modal_booking_detail">
                <i class="fa fa-info-circle"></i>{{__("Details")}}
            </a>
        @endif --}}
        <a href="{{route('user.booking.invoice',['code'=>$booking->code])}}" class="btn btn-xs btn-primary btn-info-booking open-new-window mt-1" onclick="window.open(this.href); return false;">
            <i class="fa fa-print"></i>{{__("Invoice")}}
        </a>
        @if($booking->status == 'unpaid')
            <a href="" class="btn btn-xs btn-primary btn-info-booking open-new-window mt-1">
                {{__("Pay now")}}
            </a>
        @endif
    </td>
</tr>
