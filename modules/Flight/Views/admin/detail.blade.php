 @extends('admin.layouts.app')
@section('content')
    <form action="{{route('flight.admin.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="container-fluid">
            <input type="text" value="" style="display:none;">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">@php if($data) { $data->id ? __('Edit: ').$data->entry : __('Add new Visa'); } @endphp</h1>
                  </div>
                <div class="">
                    @if(!$data)
                        <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#exampleModalLong" target="_blank"><i class="fa fa-ticket" aria-hidden="true"></i> {{__("Add Visa type")}}</a>
                    @endif
                </div>
            </div>
            @include('admin.message')
                <div class="row">
                    <div class="col-md-9">
                        @include('Flight::admin.flight.form')
                        @include('Core::admin/seo-meta/seo-meta')
                    </div>
                    <div class="col-md-3">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('Publish')}}</strong></div>
                            <div class="panel-body">
                                @if(is_default_lang())
                                       <div>
                                        <label><input type="radio" name="status" value="publish"> {{__("Publish")}}
                                        </label></div>
                                    <div>
                                       </div>
                                @endif
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
                                </div>
                            </div>
                        </div>
                       
                       
                  {{--  @if(is_default_lang())
                        <div class="panel">
                            <div class="panel-title"><strong>{{__("Author Setting")}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <?php
                                    // $user = $row->author;
                                    // \App\Helpers\AdminForm::select2('author_id', [
                                    //     'configs' => [
                                    //         'ajax'        => [
                                    //             'url' => route('user.admin.getForSelect2'),
                                    //             'dataType' => 'json'
                                    //         ],
                                    //         'allowClear'  => true,
                                    //         'placeholder' => __('-- Select User --')
                                    //     ]
                                    // ], !empty($user->id) ? [
                                    //     $user->id,
                                    //     $user->getDisplayName() . ' (#' . $user->id . ')'
                                    // ] : false)
                                    ?>
                                </div>
                            </div>
                        </div>
                        @include('Tour::admin.tour.attributes')
                        @endif

                   --}}  
                      </div>
                 </div>
            </div>
    </form>
@endsection

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form method = "post" action="{{route('flight.admin.entry')}}">
          @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Visa Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<div class="modal-body" >
     <input type ="text" class="form-control" name="entry" placeholder="please enter visa type name">
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    </form>
  </div>
</div>



<div class="modal fade" id="editModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method ="post" action="{{route('flight.admin.entry')}}">
          @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Visa Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">

                 <input type ="text" style="display:none;" value="" class="entryidedit">
          
                 <input type ="text"  class="form-control editentry" name="entry" placeholder="please enter visa type name">
              
               </div>
             <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">update</button>
          </div>
       </div>
    </form>
   </div>
</div>





@push('js')

<script>


 $('document').ready(function(){

  $('.editbutton').click(function(){

  var id =  $(this).attr('attr');

  $('.entryidedit').val(id);

  var entry =  $(this).attr('name');

  $('.editentry').val(entry);

  });


 });


    </script>


    <script>
        $(document).ready(function () {
            $('.has-datetimepicker').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                showCalendar: false,
                autoUpdateInput: false, //disable default date
                sameDate: true,
                autoApply           : true,
                disabledPast        : true,
                enableLoading       : true,
                showEventTooltip    : true,
                classNotAvailable   : ['disabled', 'off'],
                disableHightLight: true,
                timePicker24Hour: true,

                locale:{
                    format:'YYYY/MM/DD HH:mm:ss'
                }
            }).on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD HH:mm:ss'));
            });
        })
    </script>
@endpush

