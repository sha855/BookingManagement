@extends('admin.layouts.app')
@section('content')
         @csrf
        <input type="hidden" name="id" value="{{$row->id}}">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                
                    <div class="lang-content-box">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__("Seat type Content")}}</strong></div>
                            <div class="panel-body">
                                @include('Flight::admin.seatType.form')
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">{{__("Save Change")}}</button>
                    </div>
                </div>
            </div>
        </div>
   
    
    
@endsection

 