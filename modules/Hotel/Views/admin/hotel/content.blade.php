<div class="panel">
    <div class="panel-title"><strong>{{__("Staycation Content")}}</strong></div>
    <div class="panel-body">
        <?php
        
        $fdata = DB::table('bravo_hotels')->where('id',$row->id)->first();
        
        ?>
        <div class="form-group">
            <label>{{__("Title")}}</label>
            <input type="text" value="@php if($fdata !== null) { echo $fdata->title;}  @endphp" placeholder="{{__("Name of the hotel")}}" name="title" class="form-control">
        </div>
        
        <div class="form-group">
            <label class="control-label">{{__("Content")}}</label>
            <div class="">
                <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">@php if($fdata !== null) { echo $fdata->content;}  @endphp</textarea> 
            </div>
        </div>
       {{-- @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("Youtube Video")}}</label>
                <input type="text" name="video" class="form-control" value="{{$row->video}}" placeholder="{{__("Youtube link video")}}">
            </div>
        @endif --}}
        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("Banner Image")}}</label>
                <div class="form-group-image">
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('banner_image_id',$row->banner_image_id) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">{{__("Gallery")}}</label>
                {!! \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery',$row->gallery) !!}
            </div>
        @endif
    </div>
</div>


