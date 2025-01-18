@extends('layouts.user')
@section('content')
    <h2 class="title-bar no-border-bottom">
        {{__("Booking History")}}
    </h2>
    @include('admin.message')
    <div class="booking-history-manager">
        <div class="tabbable">
            <ul class="nav nav-tabs ht-nav-tabs">
                <?php $status_type = Request::query('status'); ?>
                <li class="@if(empty($status_type)) active @endif">
                    <a href="{{route("user.booking_history")}}">{{__("All Booking")}}</a>
                </li>
                
                
@if(!empty($statues))
    @php
    $hiddenStatuses = ['confirmed', 'cancelled', 'partial_payment'];
    @endphp



    @foreach($statues as $status)
        @if(in_array($status, $hiddenStatuses))
            @continue
        @endif
        
         <li class="@if(!empty($status_type) && $status_type == $status) active @endif">
            
            @if($status == 'processing')
                <a href="{{ route("user.booking_history", ['status' => $status]) }}"> Upcoming </a>
            @else
                <a href="{{ route("user.booking_history", ['status' => $status]) }}">{{ booking_status_to_text($status) }}</a>
            @endif
            
        </li>
        
    @endforeach
@endif
            </ul>
            
            <?php
            
             $activestatus = request()->status;
             
            ?>
            
                             @if($activestatus == 'processing')
                                
                                <?php 
                                $todayDate = now();
                                
                               $upcomingBooking = DB::table('bravo_bookings')
                              ->where('status', 'paid')
                              ->where('deleted_at',NULL)
                              ->where('customer_id',auth()->user()->id)
                              ->where('start_date', '>', $todayDate)
                              ->paginate(10);
                                
                                ?>
                                
                                
                                
            @if(!empty($upcomingBooking) and $upcomingBooking->total() > 0)
                <div class="tab-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-booking-history">
                            <thead>
                            <tr>
                                <th width="2%">{{__("Type")}}</th>
                                <th>{{__("Title")}}</th>
                                <th class="a-hidden">{{__("Order Date")}}</th>
                                <th class="a-hidden">{{__("Execution Time")}}</th>
                                <th>{{__("Total")}}</th>
                                <th>{{__("Paid")}}</th>
                                <th>{{__("Currency")}}</th>
                                <th class="a-hidden">{{__("Status")}}</th>
                                <th>{{__("Action")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($upcomingBooking as $booking)
                           
                                @include(ucfirst($booking->object_model).'::frontend.bookingHistory.loop')
                                
                            @endforeach 
                            
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="bravo-pagination">
                        {{$bookings->appends(request()->query())->links()}}
                    </div>
                </div>
              @else
                {{__("No Booking History")}}
              @endif
                              
             @elseif($activestatus == 'completed')
             
              
                                <?php 
                                
                               $todayDate = now();
                               $upcomingBooking = DB::table('bravo_bookings')
                              ->where('status', 'paid')
                              ->where('deleted_at',NULL)
                              ->where('customer_id',auth()->user()->id)
                              ->where('start_date', '<', $todayDate)
                              ->paginate(10);
                                
                                ?>
                                
                                
                                
            @if(!empty($upcomingBooking) and $upcomingBooking->total() > 0)
                <div class="tab-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-booking-history">
                            <thead>
                            <tr>
                                <th width="2%">{{__("Type")}}</th>
                                <th>{{__("Title")}}</th>
                                <th class="a-hidden">{{__("Order Date")}}</th>
                                <th class="a-hidden">{{__("Execution Time")}}</th>
                                <th>{{__("Total")}}</th>
                                <th>{{__("Paid")}}</th>
                                <th>{{__("Currency")}}</th>
                                <th class="a-hidden">{{__("Status")}}</th>
                                <th>{{__("Action")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($upcomingBooking as $booking)
                           
                                @include(ucfirst($booking->object_model).'::frontend.bookingHistory.loop')
                                
                            @endforeach 
                            
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="bravo-pagination">
                        {{$bookings->appends(request()->query())->links()}}
                    </div>
                </div>
              @else
                {{__("No Booking History")}}
              @endif
                              
             
           
             
             
             
             
             @else
             
             
             
                                
            
            @if(!empty($bookings) and $bookings->total() > 0)
                <div class="tab-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-booking-history">
                            <thead>
                            <tr>
                                <th width="2%">{{__("Type")}}</th>
                                <th>{{__("Title")}}</th>
                                <th class="a-hidden">{{__("Order Date")}}</th>
                                <th class="a-hidden">{{__("Execution Time")}}</th>
                                <th>{{__("Total")}}</th>
                                <th>{{__("Paid")}}</th>
                                <th>{{__("Currency")}}</th>
                                <th class="a-hidden">{{__("Status")}}</th>
                                <th>{{__("Action")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                
                            @foreach($bookings as $booking)
                           
                                @include(ucfirst($booking->object_model).'::frontend.bookingHistory.loop')
                                
                            @endforeach 
                            
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="bravo-pagination">
                        {{$bookings->appends(request()->query())->links()}}
                    </div>
                </div>
            @else
                {{__("No Booking History")}}
            @endif
            
            @endif
        </div>
        <div class="modal" tabindex="-1" id="modal_booking_detail">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Booking ID: #')}} <span class="user_id"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">{{__("Loading...")}}</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        $('#modal_booking_detail').on('show.bs.modal',function (e){
            var btn = $(e.relatedTarget);
            $(this).find('.user_id').html(btn.data('id'));
            $(this).find('.modal-body').html('<div class="d-flex justify-content-center">{{__("Loading...")}}</div>');
            var modal = $(this);
            $.get(btn.data('ajax'), function (html){
                    modal.find('.modal-body').html(html);
                }
            )
        })
    </script>
@endpush

