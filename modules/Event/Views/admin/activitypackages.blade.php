@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Activity package Management")}}</h1>
            <div class="title-actions">
               <a href="{{ url('/admin/module/event/availability/' . request()->route('activity_id') . '/pricePackage') }}" class="btn btn-warning btn-xs">
  <i class="fa fa-calendar"></i> {{ __("Price Availability") }}
</a>
               <a href="{{ url('/admin/module/event/edit/' .request()->route('activity_id')) }}" class="btn btn-info btn-xs">
  <i class="fa fa-hand-o-right"></i> {{ __("Back to Activity") }}
</a>
            </div>
        </div>
        @include('admin.message')
          
        
        <div class="row">
            <div class="col-md-4">


 <form method="post" action="{{url('/admin/module/event/availability/storePackage')}}"  enctype="multipart/form-data">
        @csrf
                    <div class="panel">
                        <div class="panel-title"><strong>Add Package</strong></div>
                        <div class="panel-body">
                        <div class="form-group">

                 <input type="hidden" name="parent_id" value="{{request()->route('activity_id')}}">
    <label>Package Name <span class="text-danger">*</span></label>
    <input type="text" required="" value="" placeholder="Package Name" name="title" class="form-control" required>
</div>
<div class="form-group d-none">
    <label>Package Description</label>
    <textarea name="content" cols="30" rows="5" class="form-control"></textarea>
</div>
    <div class="form-group">
        <label>Feature Image </label>
                <div class="dungdt-upload-box dungdt-upload-box-normal " data-val="">
            <div class="upload-box" v-show="!value">
                <input type="hidden" name="image_id" v-model="value" value="">
                <div class="text-center">
                </div>
                <div class="text-center">
                    <span class="btn btn-primary btn-field-upload" @click="openUploader">Upload image</span>
                </div>
            </div>
            <div class="attach-demo" title="Change file">
                            </div>
            <div class="upload-actions justify-content-between" v-show="value">
                                <a class="edit-img btn btn-sm btn-primary edit-single" data-file=""><i class="fa fa-edit"></i></a>
                <a class="delete btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </div>
        </div>
        
    </div>

    <div class="form-group">
        <label>Gallery</label>
                <div class="dungdt-upload-multiple " data-val="">
            <div class="attach-demo d-flex">
                            </div>
            <div class="upload-box" v-show="!value">
                <input type="hidden" name="gallery" v-model="value" value="">
                <div class="text-left">
                    <span class="btn btn-info btn-sm btn-field-upload" @click="openUploader"><i class="fa fa-plus-circle"></i> Select images</span>
                </div>
            </div>
        </div>
        
    </div>
    <hr>
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Price <span class="text-danger">*</span></label>
                <input type="number" required="" value="" min="1" placeholder="Price" name="price" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Number of Person<span class="text-danger">*</span></label>
                <input type="number" required="" value="1" min="1" max="100" placeholder="Number" name="number" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Discount Price<span class="text-danger">*</span></label>
                <input type="number" required="" value="" min="1" placeholder="Price" name="discount_price" class="form-control">
            </div>
        </div>
    </div>
    <hr>
          
        <hr>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Max Adults </label>
                <input type="number" min="1" value="1" name="adults" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Max Children </label>
                <input type="number" min="0" value="0" name="children" class="form-control">
            </div>
        </div>
    </div>
    
    <hr>
<!--<div class="form-group">-->
<!--    <label>Import url</label>-->
    <input type="hidden" value="" name="ical_import_url" class="form-control">
<!--</div>-->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label><strong>Status</strong> </label>
                <select name="status" class="custom-select">
                    <option value="publish">Publish</option>
                    <option value="pending">Pending</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
        </div>
    </div>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Add Package</button>
                        </div>
                    </div>
                </form>




            </div>
            <div class="col-md-8">

                <div class="panel">
                    <div class="panel-body">
                      
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                       
                                        <th> {{ __('Package name')}}</th>
                                        <th width="100px"> {{ __('Person')}}</th>
                                        <th width="100px"> {{ __('Price')}}</th>
                                        <th width="100px"> {{ __('Status')}}</th>
                                        <!--<th width="100px"></th>-->
                                        <th width="100px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($get as $gg)
                                            <tr class="active">
                                               
                                                <td class="title">
                                                {{$gg->title}}
                                                </td>
                                                <td>{{$gg->number}}</td>
                                                <td>{{$gg->price}}</td>
                                                <td><span class="badge">{{$gg->status}}</span></td>
                                                <!--<td>-->
                                                <!--    <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}-->
                                                <!--    </a>-->
                                                <!--</td>-->
                                                <td>
                                                    <a href="{{ url('delete/'.$gg->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i>{{__('Delete')}}
                                                    </a>
                                                </td>
                                            </tr>
                                             @endforeach
                                    </tbody>
                                </table>
                            </div>
                        
                     {{--{{$rows->appends(request()->query())->links()}}--}}   
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::get('eventdataDeletedSuccessfully'))
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
      Swal.fire('Item Deleted Successfully')
    </script>

    {{Session::forget('eventdataDeletedSuccessfully')}}

    @endif

      @if(Session::get('pacakagestoreadded'))
         
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
      Swal.fire('Package added Successfully')
    </script>

          @endif
      
@endsection
