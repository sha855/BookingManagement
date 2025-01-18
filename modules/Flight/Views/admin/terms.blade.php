@extends('admin.layouts.app')
@section('content')


 <div class="panel">
     
     
     @if(Session::get('dataUpdated'))
      <div class="panel-title" style="color:green;">
        Data updated Successfully 
      </div>
     @endif
     
     
    <div class="panel-title"><strong>{{__("Terms & condition")}}</strong></div>
    <div class="panel-body">
           <form method="post" action="{{ route('flight.admin.visaTerms') }}">
           @csrf
        <div class="form-group">
            <label class="control-label">{{__("Visa Terms & Condition Content")}}</label>
            <div class="">
                <textarea name="discription" class="d-none has-ckeditor" cols="30" rows="10"><?php  if($data) {echo $data->discription; } ?></textarea> 
            </div>
        </div>
        <br>
        
        <button type="submit" class="btn btn-primary"> Update</button>
        
        </form>
        
    </div>
</div>


@endsection