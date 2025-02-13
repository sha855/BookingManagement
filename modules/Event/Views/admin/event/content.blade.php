
<div class="panel">
    <div class="panel-title"><strong>{{__("Activities Content")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label>{{__("Title")}}</label>
            <input type="text" value="{!! clean($translation->title) !!}" placeholder="{{__("Name of the event")}}" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">{{__("Content")}}</label>
            <div class="">
                <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{$translation->content}}</textarea>
            </div>
        </div>
        @if(is_default_lang())
            {{-- <div class="form-group">
                <label class="control-label">{{__("Youtube Video")}}</label>
                <input type="text" name="video" class="form-control" value="{{$row->video}}" placeholder="{{__("Youtube link video")}}">
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Start Time")}}</label>
                        <input type="text" name="start_time" class="form-control" value="{{$row->start_time}}" placeholder="{{__("Ex: 15:00")}}">
                        <small>
                            {{ __("Input time format, ex: 15:00") }}
                        </small>
                    </div>
                </div>
                <div class="col-lg-6 @if( $row->getBookingType()== "ticket") d-none @endif">
                    <div class="form-group">
                        <label class="control-label">{{__("End Time")}}</label>
                        <input type="text" name="end_time" class="form-control" value="{{$row->end_time}}" placeholder="{{__("Ex: 21:00")}}">
                        <small>
                            {{ __("Input time format, ex: 21:00") }}
                        </small>
                    </div>
                </div> 
            </div>
            --}}
            
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        @if( $row->getBookingType()== "ticket")
                            <label class="control-label">{{__("Duration (hour)")}}</label>
                        @else
                            <label class="control-label">{{__("Duration")}}</label>
                        @endif
                        <input type="number" name="duration" class="form-control" value="{{$row->duration}}" placeholder="{{__("Ex: 3")}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group @if( $row->getBookingType()== "ticket") d-none @endif">
                        <label class="control-label">{{__("Duration Unit")}}</label>
                        <select name="duration_unit" class="form-control">
                            <option value="hour" @if($row->duration_unit == "hour") selected @endif > {{__("Hour")}}</option>
                            <option value="minute" @if($row->duration_unit == "minute") selected @endif > {{__("Minute")}}</option>
                        </select>
                    </div>
                </div>
            </div>
        @endif
        
        
        {{-- <div class="form-group-item">
             <label class="control-label">{{__('FAQs')}}</label>
             <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5">{{__("Title")}}</div>
                    <div class="col-md-5">{{__('Content')}}</div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                @if(!empty($translation->faqs))
                    @php if(!is_array($translation->faqs)) $translation->faqs = json_decode($translation->faqs); @endphp
                    @foreach($translation->faqs as $key=>$faq)
                        <div class="item" data-number="{{$key}}">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="faqs[{{$key}}][title]" class="form-control" value="{{$faq['title']}}" placeholder="{{__('Eg: When and where does the tour end?')}}">
                                </div>
                                <div class="col-md-6">
                                    <textarea name="faqs[{{$key}}][content]" class="form-control" placeholder="...">{{$faq['content']}}</textarea>
                                </div>
                                <div class="col-md-1">
                                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-right">
                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" __name__="faqs[__number__][title]" class="form-control" placeholder="{{__('Eg: Can I bring my pet?')}}">
                        </div>
                        <div class="col-md-6">
                            <textarea __name__="faqs[__number__][content]" class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        
        
        
        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("Banner Image")}}</label>
                <div class="form-group-image">
                    
                    
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('banner_image_id',$row->banner_image_id) !!}
                </div>
            </div>
            <div class="form-group">
              <label class="control-label">{{__("Gallery")}}</label>
                
               <?php
               $galleryString = $row->gallery; 
               $galleryArray = explode(',', $galleryString);
               $desiredIds = array_slice($galleryArray, 0, 4 );

               $desiredIdsString = implode(',', $desiredIds); 
               
                ?>
                                           
                                           
                {!! \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery',$desiredIdsString) !!}
            </div>
        @endif
    </div>
</div>
