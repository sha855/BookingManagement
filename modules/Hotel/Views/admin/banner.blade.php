@extends('admin.layouts.app')
<div class ="main-content">
 <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{!empty($recovery) ? __('Recovery') : __("All Banners")}}</h1>
            <div class="title-actions">
                @if(empty($recovery))
                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn btn-primary">{{__("Add new Banner")}}</a>
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
                            
                            <th> {{ __('Image Name')}}</th>
                            <th width="200px"> {{ __('Link')}}</th>
                            <th width="200px"> {{ __('Created_at')}}</th>
                            <th width="180px"> {{ __('updated_at')}}</th>
                            <th width="100px">{{ __('action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                                @foreach($data as $d)
                                  <tr class="">
                            <td><img attr="{{asset($d->bannerImage)}}" class="imageclass{{$d->id}}" src="{{asset($d->bannerImage)}}" style="height:100px;"></td>
                                    <td class="lnktd{{$d->id}}">{{$d->link}}</td>
                                    <td>{{$d->created_at}}</td>
                                 
                                    <td>{{$d->updated_at}}</td>
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




<div class="modal fade" id="editmodal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Banner Image</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
<form id="formget" method="post"  enctype="multipart/form-data" action="{{route('hotel.admin.updateslider')}}">
         @csrf
<div class="form-group">

    <input type= "text" name="id" class="formx" style="display:none;" value="">
    <label for="bannerImage">Banner Image:</label>
   <center><img id="xflah" class="d-block imagechange" src="" alt="First slide" style="height:160px; width:420px;"></center>
  </div>

  <div class="form-group">
    <label for="bannerImage">Banner Image:</label>

    <input type="file" name="bannerImage"  class="form-control" onchange="document.getElementById('xflah').src = window.URL.createObjectURL(this.files[0])" placeholder="select picture for slider" id="banner">
  </div>


  <div class="form-group">
    <label for="link">Link(optional):</label>
    <input type="text" name="link" class="form-control" placeholder="type link of this image" id="link">
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




<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Banner</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
<form id="formget" method="post"  enctype="multipart/form-data" action="{{route('hotel.admin.upload')}}">
         @csrf
<div class="form-group">
    <label for="bannerImage">Banner Image:</label>
   <center><img id="flah" class="d-block imagechange" src="https://www.pngarts.com/files/10/Default-Profile-Picture-PNG-Transparent-Image.png" alt="First slide" style="height:160px; width:300px;"></center>
  </div>

  <div class="form-group">
    <label for="bannerImage">Banner Image:</label>

    <input type="file" name="bannerImage" class="form-control" onchange="document.getElementById('flah').src = window.URL.createObjectURL(this.files[0])" placeholder="select picture for slider" id="banner">
  </div>


  <div class="form-group">
    <label for="link">Link(optional):</label>
    <input type="text" name="link" class="form-control" placeholder="type link of this image" id="link">
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










<div class="modal fade" id="deletemodal" style="display: block;
    width: 40%;
    padding-right: 135px;
    left: 437px;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">delete Banner</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
<form id="formget" method="post" action="{{route('hotel.admin.deleteslider')}}">
         @csrf

         <h5>Are you sure want to delete this banner??</h5>

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
   
        $('#link').val(lnk);

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


 @if(\Session::has('bannerupdated'))  


<script>
    
Swal.fire({
  icon: 'success',
  title: 'operation success',
  text: 'banner detail updated successfully'
});   
  
</script>

 @endif 

