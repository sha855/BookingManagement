@extends('admin.layouts.app')
<div class ="main-content">
 <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{!empty($recovery) ? __('Recovery') : __("Staycation Booking")}}</h1>
            <div class="title-actions">
               {{--  @if(empty($recovery))
                <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModal" class="btn btn-primary">{{__("Add new today deals Staycation")}}</a>
                @endif --}}
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{route('hotel.admin.bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            {{--<option value="clone">{{__(" Clone ")}}</option>--}}
                            @if(!empty($recovery))
                                <option value="recovery">{{__(" Recovery ")}}</option>
                                <option value="permanently_delete">{{__("Permanently delete")}}</option>
                            @else
                                <option value="publish">{{__(" Publish ")}}</option>
                                <option value="draft">{{__(" Move to Draft ")}}</option>
                                <option value="pending">{{__("Move to Pending")}}</option>
                                <option value="delete">{{__(" Delete ")}}</option>
                            @endif

                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
          {{--  <div class="col-left dropdown">
                <form method="get" action="{{ !empty($recovery) ? route('hotel.admin.recovery') : route('hotel.admin.index')}} " class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    
                        <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search by name')}}" class="form-control">
                        <div class="ml-3 position-relative">
                            <button class="btn btn-secondary dropdown-toggle bc-dropdown-toggle-filter" type="button" id="dropdown_filters">
                                {{ __("Advanced") }}
                            </button>
                            <div class="dropdown-menu px-3 py-3 dropdown-menu-right" aria-labelledby="dropdown_filters">
                                @include("Core::admin.global.advanced-filter")
                            </div>
                        </div>
                 
                    <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Search')}}</button>
                </form>
            </div> --}}
        </div>
        
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="60px"><input type="checkbox" class="check-all"></th>
                            <th> {{ __('Staycation')}}</th>
                            <th width="200px"> {{ __('Checkin/Checkout')}}</th>
                            <th width="130px"> {{ __('Paid Amount')}}</th>
                            <th width="100px"> {{ __('Lead Name')}}</th>
                            <th width="100px"> {{ __('Reviews')}}</th>
                            <th width="100px"> {{ __('Status')}}</th>
                            <th width="100px"></th>
                        </tr>
                        </thead>
                        <tbody>
                       
                                  <tr class="">
                                    <td><input type="checkbox" name="ids" class="check-item" value="}">
                                    </td>
                                    <td class="title">
                                    
                                        <a href="">title</a>
                                    </td>
                                    <td>helloo</td>
                                   
                                            {{__("[Author Deleted]")}}
                                       
                                 
                                    <td><span class="badge badge">hello</span></td>
                                    <td>
                                        <a target="_blank" href="" class="review-count-approved">
                                            
                                        </a>
                                    </td>
                                    <td> hello </td>
                                    <td>
                                        @if(empty($recovery))
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{__("Action")}}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="">{{__("Edit Staycation")}}</a>
                                                    <a class="dropdown-item" href="">{{__("Manage Rooms")}}</a>
                                                    <a class="dropdown-item" href="">{{__("Manage Rooms Availability")}}</a>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                        
                        </tbody>
                    </table>
                    </div>
                </form>
          </div>

      </div>
  </div>

</div>




<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Staycations For daily deals</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
          <form id="formget" action="/action_page.php">

<div class="form-group">
    <label for="bannerImage">Staycation Image:</label>
   <center><img id="flah" class="d-block " src="https://www.pngarts.com/files/10/Default-Profile-Picture-PNG-Transparent-Image.png" alt="First slide" style="height:160px; width:420px;"></center>
  </div>

  

  <div class="form-group">
    <label for="link">Link(optional):</label>
    <input type="text" name="link" class="form-control" placeholder="Enter password" id="link">
  </div>


  <div class="form-group">
    <label for="link">Link(optional):</label>
    <input type="text" name="link" class="form-control" placeholder="Enter password" id="link">
  </div>



  <div class="form-group">
    <label for="link">Link(optional):</label>
    <input type="text" name="link" class="form-control" placeholder="Enter password" id="link">
  </div>


  <div class="form-group">
    <label for="link">Link(optional):</label>
    <input type="text" name="link" class="form-control" placeholder="Enter password" id="link">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


<script>


$('document').ready(function(){

  $('formget').submit(function(){



  });

});




</script>