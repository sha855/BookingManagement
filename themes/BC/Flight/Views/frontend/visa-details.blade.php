@extends('layouts.app')
@push('css')
<link href="{{ asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/ion_rangeslider/css/ion.rangeSlider.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('libs/fotorama/fotorama.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
   .img_style{
   height:50px; width:100px; border-radius:10px;  background:white;     margin-top: 19px;
    margin-bottom: 19px;
   }
   .page-link{
       
       background: #FF3500;
   }
</style>
@endpush
@section('content')
<div class="container mt-2 pt-3 py-4">
   <div class="row d-flex justify-content-center">
      <h4 class="text-center py-3"><img src="{{ asset('images/Flag_of_the_United_Arab_Emirates_1.png')}}">   <span class="mt-2">UAE Visa Status</span> </h4>
   </div>
</div>
<div class="container">
   <div class="row">
      <div class="dropdown">
         <button class="btn btn-light" type="button"  id="AppliedBtn" data-toggle="dropdown" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color: white;
    padding: 12px 27px;
    font-weight: bold;border-radius: 12px;">Applied
         </button>
         <button class="btn btn-light" id="DraftBtn" type="button" data-toggle="dropdown" style="background: linear-gradient(180deg, #FE9000 0%, #FF3500 100%);
    color: white;
    padding: 12px 27px;
    font-weight: bold;border-radius: 12px;">
         Draft</button>
      </div>
   </div>
     <div class="row mt-3 pt-3" id="AppliedContent" style="">
      <div id="no-more-tables">
        <table class="col-md-12 table-bordered table-striped table-condensed cf" id="example">
    <thead class="cf">
       <tr class="text-center">
          <th style="color:#FF3500;">S.no</th>
          <th style="color:#FF3500;">Visa Type</th>
          <th style="color:#FF3500;">Person Name</th>
          <th style="color:#FF3500;">Date Of Birth</th>
          <th style="color:#FF3500;">Passport Size Photo</th>
          <th style="color:#FF3500;">Passport First Page</th>
          <th style="color:#FF3500;">Passport Second Page</th>
          <th style="color:#FF3500;">Status</th>
          <th style="color:#FF3500;">File</th>
       </tr>
    </thead>
  
    <tbody>
        @if($applied->isEmpty())
        <tr>
            <td colspan="8" class="text-center">No data found</td>
        </tr>
        @else
        @foreach($applied as $key => $details_p)
            <tr class="text-center">
                <td>{{$key+1 }}</td>
                <td>{{$details_p->entry }}</td>
                <th>{{$details_p->firstname }} {{$details_p->lastname }}</th>
                <th>{{ date('d-m-Y', strtotime($details_p->dob)) }}</th>
                <td>
                    @if($details_p->passport_second_page)
                        <img src="{{$details_p->passport_second_page}}" class="img_style">
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1024px-User-avatar.svg.png" class="img_style">
                    @endif
                </td>
                <td>
                    @if($details_p->passport_first_page)
                        <img src="{{$details_p->passport_first_page}}" class="img_style">
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1024px-User-avatar.svg.png" class="img_style"> 
                    @endif
                </td>
                <td>
                    @if($details_p->passport_size_photo)
                        <img src="{{$details_p->passport_size_photo}}" class="img_style">
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1024px-User-avatar.svg.png" class="img_style">
                    @endif  
                </td>
                <td>
                    <button class="btn btn-light" style="background:rgb(215, 240, 215);padding: 3px 12px; color: green;">Applied</button>
                </td>
                
                
                
                <td data-title="High" class="numeric">
                   
                   
                    @if($details_p->discriptionImage)
                    <a href="{{url($details_p->discriptionImage)}}" class="btn btn-watarning"
                            style="background:#852f19;padding: 3px 12px;" download>
                        <i class="fa fa-download text-white"></i>
                    </a>
                    
                    @else
                
                      <a class="btn btn-watarning"
                            style="background:#852f19;padding: 3px 12px;">
                        <i class="fa fa-download text-white"></i>
                      </a>
                    
                    
                    @endif
                </td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>
      </div>
      
       @if(!$applied->isEmpty())
    <div class="pagination-container">
        {{ $applied->links() }}
    </div>
    @endif
    
    </div>
    
      <div class="row mt-3 pt-3" id="DraftContent" style="display: none;">
         <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped   table-condensed cf" >
               <thead class="cf">
                  <tr class="text-center">
                  <th style="color:#FF3500;">S.no</th>
                  <th style="color:#FF3500;">Visa Type</th>
                  <th style="color:#FF3500;">Person Name</th>
                  <th style="color:#FF3500;">Date Of Birth</th>
                  <th style="color:#FF3500;">Passport Size Photo</th>
                  <th style="color:#FF3500;">Passport First Page</th>
                  <th style="color:#FF3500;">Passport Second Page</th>
                  <th style="color:#FF3500;">Status</th>
                  <th style="color:#FF3500;">Options</th>
                  </tr>
               </thead>
               <tbody>
                @if($details->isEmpty())
                <tr>
                    <td colspan="8" class="text-center">No data found</td>
                </tr>
                @else
            
                  @foreach( $details as $key=> $details_p)
                  
                  <tr class="text-center">
                     <td>{{$key+1 }}</td>
                     <td>{{$details_p->entry }}</td>
                     <th>{{$details_p->firstname }} {{$details_p->lastname }}</th>
                     <th>{{ date('d-m-Y',strtotime($details_p->dob)) }}</th>
                     <td>
                        @if($details_p->passport_second_page)
                        <img src="{{$details_p->passport_second_page}}"class="img_style">
                        @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1024px-User-avatar.svg.png" class="img_style">
                        @endif
                     </td>
                     <td>
                        @if($details_p->passport_first_page)
                        <img src="{{$details_p->passport_first_page}}"class="img_style">
                        @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1024px-User-avatar.svg.png" class="img_style"> 
                        @endif
                     </td>
                     <td>
                        @if($details_p->passport_size_photo)
                        <img src="{{$details_p->passport_size_photo}}"class="img_style">
                        @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1024px-User-avatar.svg.png" class="img_style">
                        @endif  
                     </td>
                     <td>
                        <button class="btn btn-light" style="background:#c7523b;padding: 3px 12px; color:white;">Draft</button>
                     </td>
                     <td data-title="High" class="numeric"><a href="" class="btn btn-danger" style=" padding: 3px 12px;
                        ">Delete</a> <a href="{{url('payforvisa/'.$details_p->booking_detail_id)}}" class="btn btn-success" style=" padding: 3px 12px;
                        ">Pay</a> </td>
                  </tr>
                  @endforeach
                  @endif
            </table>
         </div>
         @if(!$details->isEmpty())
    <div class="pagination-container">
        {{ $details->links() }}
    </div>
    @endif
    
 </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Attach a click event handler to all download buttons with class "downloadButton"
    $(".downloadButton").click(function() {
        // Get the data attributes from the button's parent row
        var fileUrl = $(this).data('file-url');
        var fileName = $(this).data('file-name');

        // Create a hidden anchor element
        var downloadLink = document.createElement('a');
        downloadLink.href = fileUrl;
        downloadLink.download = fileName;

        // Trigger a click event on the anchor element to initiate the download
        document.body.appendChild(downloadLink);
        downloadLink.click();

        // Clean up by removing the anchor element
        document.body.removeChild(downloadLink);
    });
});
</script>



<script>
    // JavaScript (jQuery) code to toggle the content when the "DraftBtn" button is clicked
    $(document).ready(function() {
       $("#DraftBtn").click(function() {
          $("#DraftContent").show();
          $("#AppliedContent").hide();
       });
    });
 
    // JavaScript (jQuery) code to toggle the content when the "ApprovedBtn" button is clicked
    $(document).ready(function() {
       $("#AppliedBtn").click(function() {
          $("#DraftContent").hide();
          $("#AppliedContent").show();
       });
    });
 </script>
 @endsection