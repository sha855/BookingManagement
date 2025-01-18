 <?php

$entry =DB::table('visa_entry')->get();

?>

@If(Session::has('dataAdded'))


<h5 style="color:green;">Data added successfully</h5>

@elseif(Session::has('dataUpdated'))

<h5 style="color:green;">Data updated successfully</h5>


@else

@endif

@foreach($datachild as $dt)

 <div class="panel">
    <div class="panel-title"><strong>{{__("Content")}}</strong></div>
    <div class="panel-body">
            <div class="row">
                <input type="text" value="{{$dt->id}}" style="display:none;" name="id[]">
                <div class="form-group col-lg-6">
                    <label>{{__("Select Visa Type")}}</label>
                   <select name="entry_id" class="form-control" required>
                       <option value="<?php  if($datachild){ echo $dt->entry_id; }; ?>"><?php  if($datachild){ echo $data->entry; }; ?></option>
                       @foreach($entry as $aa)
                       <option value="{{$aa->id}}">{{$aa->entry}}</option>
                       @endforeach
                   </select>
                </div>
                 <div class="form-group col-lg-6">
                    <label>{{__("Days")}}</label>

                    <input type="text" name="days[]" value="{{$dt->days}}" placeholder="{{__('Type visa days')}}" class="form-control">
                </div>
                <div class="form-group col-lg-6">
                    <label>{{__("Heading")}}</label>
                    <input type="text" name="title[]" value="{{$dt->title}}" placeholder="{{__('Tourist|Standard|Single Entry|14 days')}}"  class="form-control">
                </div>
                 <div class="form-group col-lg-6">
                    <label>{{__("Visa Price")}}</label>
                    <input type="text" name="price[]" value="{{$dt->price}}" placeholder="{{__('AED 350')}}" name="code" class="form-control">
                </div>
            </div>
            
        <div class="form-group">
            <label class="control-label">{{__("Visa Content")}}</label>
            <div class="">
                <textarea name="discription[]" class="d-none has-ckeditor" cols="30" rows="10">{{$dt->discription}}</textarea> 
            </div>
        </div>
        
    </div>
</div>

 @endforeach

@if($datachild == '[]')


<div class="panel">
    <div class="panel-title"><strong>{{__("Content")}}</strong></div>
    <div class="panel-body">
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>{{__("Select Visa Type")}}</label>
                   <select name="entry_id" class="form-control" required>
                       <option >Select--visa</option>
                       @foreach($entry as $aa)
                       <option value="{{$aa->id}}">{{$aa->entry}}</option>
                       @endforeach
                   </select>
                </div>
                 <div class="form-group col-lg-6">
                    <label>{{__("Days")}}</label>
                    <input type="text" name="days" value="" placeholder="{{__('Type visa days')}}" class="form-control">
                </div>
                <div class="form-group col-lg-6">
                    <label>{{__("Heading")}}</label>
                    <input type="text" name="title" value="" placeholder="{{__('Tourist|Standard|Single Entry|14 days')}}"  class="form-control">
                </div>
                 <div class="form-group col-lg-6">
                    <label>{{__("Visa Price")}}</label>
                    <input type="text" name="price" value="" placeholder="{{__('AED 350')}}" name="code" class="form-control">
                </div>
            </div>
            
        <div class="form-group">
            <label class="control-label">{{__("Visa Content")}}</label>
            <div class="">
                <textarea name="discription" class="d-none has-ckeditor" cols="30" rows="10"></textarea> 
            </div>
        </div>
        
    </div>
</div>

@endif

<div class="panel">

<div class="panel-title"><strong>{{__("Visa Entry Type")}}</strong></div>
    <div class="panel-body">
           
               <table class="table">

                   <tr>
                       <th>Entry Name</th>
                       <th>Action</th>
                   </tr>
                   
                   <tbody>
                       @foreach($entry as $a)
                    <tr>
                        <td class="">{{$a->entry}}</td>
                        <td>&nbsp;<button type="button" attr="{{$a->id}}" name="{{$a->entry}}" data-toggle="modal" data-target="#editModalLong" class="editbutton btn btn-success">Edit</button></td>
                     </tr> 
                        @endforeach
                   </tbody>
                   
               </table>
    </div>
</div>






