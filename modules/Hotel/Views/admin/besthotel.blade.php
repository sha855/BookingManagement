@extends('admin.layouts.app')
<div class ="main-content">
 <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{!empty($recovery) ? __('Recovery') : __("All daily/best Staycation deals")}}</h1>
            <div class="title-actions">
                @if(empty($recovery))
                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn btn-primary">{{__("Add new Staycation")}}</a>
                @endif
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
                                <option value="draft">{{__("Move to Draft ")}}</option>
                                <option value="pending">{{__("Move to Pending")}}</option>
                                <option value="delete">{{__(" Delete ")}}</option>
                            @endif

                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
            <style>
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 0 !Important;
    width: 100vw;
    height: 100vh;
    background-color: #000;
}
</style>


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
              

  @if($errors->count())
  @foreach ($errors->all() as $error)
  <p class="yellow-text font lato-normal center">{{ $error }}</p>
  <br>
  <br>
  @endforeach
  @endif


  

                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th> {{ __('Staycation Image')}}</th>
                            <th width="200px"> {{ __('Staycation Name')}}</th>
                            <th width="200px"> {{ __('Check out time')}}</th>
                            <th width="180px"> {{ __('Check in time')}}</th>
                            <th width="100px">{{ __('Price')}}</th>
                            <th width="100px">{{ __('Discount Percent')}}</th>
                            <th width="100px">{{ __('Condition')}}</th>
                            <th width="100px">{{ __('location')}}</th>
                            <th width="100px">{{ __('action')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                                @foreach($data as $d)
                                  <tr class="">
                                   <td><img attr="{{asset($d->bannerImage)}}" class="imageclass{{$d->id}}" src="{{asset($d->bannerImage)}}" style="height:100px;"></td>
                                    <td class="lnktd{{$d->id}}">{{$d->title}}</td>
                                    <td class="checkout_time{{$d->id}}">{{$d->check_out_time}}</td>
                                    <td class="check_time{{$d->id}}">{{$d->check_in_time}}</td>
                                    <td class="price{{$d->id}}">{{$d->price}}</td>
                                    <td class="discountpercent{{$d->id}}">{{$d->discount_percent}}</td>

                                    <td class="jjcondition{{$d->id}}">{{$d->condition}}</td>
                                 
                                    <td class="locate{{$d->id}}">{{$d->location_id}}</td>


                                    <td style="display: flex;"><button class="btn btn-primary editbutton" data-toggle="modal" data-target="#editmodal" attr="{{$d->id}}">Edit</button>&nbsp;&nbsp;<button attr="{{$d->id}}" data-toggle="modal" data-target="#deletemodal" class="btn btn-danger deletebutton">Delete</button></td>
                                   
                                </tr>
                                @endforeach
                        
                        </tbody>
                    </table>
                    </div>
                 </div>
       </div>
  </div>

</div>



<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Staycations</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
<form id="formget" method="post"  enctype="multipart/form-data" action="{{route('hotel.admin.updatebesttoday')}}">
   @csrf

    <div class="col-md-12" >
   <div class="row">     
    <input type="text" name="id" value="" style="display:none;" class="formx">
<div class="form-group">
    <label for="bannerImage">Banner Image:</label>
   <center><img id="flah" class="d-block imagechange" src="https://www.pngarts.com/files/10/Default-Profile-Picture-PNG-Transparent-Image.png" alt="First slide" style="height:160px; width:300px;"></center>
  </div>

  <div class="form-group col-md-6">
    <label for="bannerImage">Banner Image:</label>

    <input type="file" name="bannerImage" class="form-control" onchange="document.getElementById('flah').src = window.URL.createObjectURL(this.files[0])" placeholder="select picture for slider" id="banner">
  </div>


  <div class="form-group col-md-6">
    <label for="link">Staycation Name</label>
    <input type="text" name="title" class="form-control" placeholder="Type Staycation Name" id="link">
  </div>

 <div class="form-group col-md-6">
    <label for="link">Check Out</label>
    <input type="time" name="check_out_time" value="" class="form-control" placeholder="Type Check out image" id="check_out_time">
  </div>
   <div class="form-group col-md-6">
    <label for="link">Check In</label>
    <input type="time" name="check_in_time" class="form-control" placeholder="Type check in time" id="check_in_time">
  </div>
   <div class="form-group col-md-6">
    <label for="link">Price(AED)</label>
    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  name="price" class="form-control" placeholder="type price" id="price" required>
  </div>
   <div class="form-group col-md-6">
    <label for="link">Discount %</label>
    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  name="discount_percent" class="form-control" placeholder="type discount" id="discount" required>
  </div>
   <div class="form-group col-md-6">
    <label for="sel1">Select condition:</label>
  <select name="condition" class="form-control" required>
    <option class="" id="ggcondition">select condition</option>
   
    <option value="bestdeal">Best Deals Staycation</option>
    <option value="todaydeal">Today Deals Staycation</option>
     
  </select>
  </div>

   <div class="form-group col-md-6">
    <label for="sel1">Select location:</label>
  <select name="location_id" class="form-control" id="location_id" required>
    <option class="" >select location</option>
    @foreach($location as $l)
    <option value="{{$l->id}}">{{$l->name}}</option>
     @endforeach
  </select>
  </div>
  </div>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
        
<div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>





<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Staycation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
<form id="formget" method="post"  enctype="multipart/form-data" action="{{route('hotel.admin.besttoday')}}">
   @csrf

    <div class="col-md-12" >
   <div class="row">     
  
<div class="form-group">
    <label for="bannerImage">Banner Image:</label>
   <center><img id="xflah" class="d-block imagechange" src="https://www.pngarts.com/files/10/Default-Profile-Picture-PNG-Transparent-Image.png" alt="First slide" style="height:160px; width:300px;"></center>
  </div>

  <div class="form-group col-md-6">
    <label for="bannerImage">Banner Image:</label>

    <input type="file" name="bannerImage" class="form-control" onchange="document.getElementById('xflah').src = window.URL.createObjectURL(this.files[0])" placeholder="select picture for slider" id="banner" required>
  </div>


  <div class="form-group col-md-6">
    <label for="link">Staycation Name</label>
    <input type="text" name="title" class="form-control" placeholder="Type Staycation Name" id="link" required>
  </div>

 <div class="form-group col-md-6">
    <label for="link">Check Out</label>
    <input type="time" name="check_out_time" class="form-control" placeholder="Type Check out Time" >
  </div>
   <div class="form-group col-md-6">
    <label for="link">Check In</label>
    <input type="time" name="check_in_time" class="form-control" placeholder="Type Check In time" >
  </div>
   <div class="form-group col-md-6">
    <label for="link">Price(AED)</label>
    <input type="text" name="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  class="form-control" placeholder="type price " required>
  </div>
   <div class="form-group col-md-6">
    <label for="link">Discount %</label>
    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  name="discount_percent" class="form-control" placeholder="type discount" >
  </div>
   <div class="form-group col-md-6">
    <label for="sel1">Select condition:</label>
  <select name="condition" class="form-control" id="sel1" required>
    <option class="">select condition</option>
   
    <option value="bestdeal">Best Deals Staycation</option>
    <option value="todaydeal">Today Deals Staycation</option>
     
  </select>
  </div>

   <div class="form-group col-md-6">
    <label for="sel1">Select location:</label>
  <select name="location_id" class="form-control" id="sel1" required>
    <option class="">select location</option>
    @foreach($location as $l)
    <option value="{{$l->id}}">{{$l->name}}</option>
     @endforeach
  </select>
  </div>
  </div>
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




<div class="modal fade" id="deletemodal" >
    <div class="modal-dialog modal-sm-6">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">delete Staycations</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
<form id="formget" method="post" action="{{route('hotel.admin.deletebesttoday')}}">
         @csrf

         <h5>Are you sure want to delete this Staycation??</h5>

        <input type="text" name="id" class="form-control" style="display:none;" id="deletefield" value="">

         <button type="submit" class="btn btn-primary">Yes delete</button>

  </form>

     </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>

 $('document').ready(function(){
  
  $('.editbutton').click(function(){
       var id = $(this).attr('attr');
        $('.formx').val(id);

        var lnk = $('.lnktd'+id).html();
        var outtime =$('.checkout_time'+id).html();
        var intime =$('.check_time'+id).html();
        var price =$('.price'+id).html();
        var dispercent =$('.discountpercent'+id).html();
        var xcondition =$('.jjcondition'+id).html();
        var locate =$('.locate'+id).html();

      
   
        $('#link').val(lnk);
        $('#check_out_time').val(outtime);
        $('#check_in_time').val(intime);
        $('#price').val(price);
        $('#discount').val(dispercent);
        $('#ggcondition').html(xcondition);
        $('#location_id').val(locate);





       var image = $('.imageclass'+id).attr('attr');
       $('.imagechange').attr('src',image); 
  });

$('.deletebutton').click(function(){

    var id = $(this).attr('attr');

    $('#deletefield').val(id);

});

});


    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 @if(\Session::has('bannerdeleted'))  


<script>
    
Swal.fire({
  icon: 'success',
  title: 'operation success',
  text: 'banner deleted successfully'
});   
  
</script>

 @endif 


 @if(\Session::has('hoteladded'))  


<script>
    
Swal.fire({
  icon: 'success',
  title: 'operation success',
  text: 'Staycation added successfully'
});   
  
</script>

 @endif 





 @if(\Session::has('hotelupdated'))  


<script>
    
Swal.fire({
  icon: 'success',
  title: 'operation success',
  text: 'hotel detail updated successfully'
});   
  
</script>

 @endif 
 
 
 
 
 @if(\Session::has('datadeleted'))  


<script>
    
Swal.fire({
  icon: 'success',
  title: 'operation success',
  text: 'Staycation deleted successfully'
});   
  
</script>

 @endif 

