@extends('admin.layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="d-flex justify-content-between mb20">
			<h1 class="title-bar">{{!empty($recovery) ? __('Recovery') : __("All Visa")}}</h1>
			<div class="title-actions">
				@if(empty($recovery))
					<a href="{{route('flight.admin.create')}}" class="btn btn-primary">{{__("Add new visa")}}</a>
				@endif
			</div>
		</div>
		@include('admin.message')
		<div class="filter-div d-flex justify-content-between ">
			{{-- <div class="col-left">
				@if(!empty($data))
					<form method="post" action="{{route('flight.admin.bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
						{{csrf_field()}}
						<select name="action" class="form-control">
							<option value="">{{__(" Bulk Actions ")}}</option>

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
			</div> --}}
			<div class="col-left dropdown">
				<form method="get" action="{{ !empty($recovery) ? route('flight.admin.recovery') : route('flight.admin.index')}}" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
					@if(!empty($data))
						<input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search by name')}}" class="form-control">
						<div class="ml-3 position-relative">
							<button class="btn btn-secondary dropdown-toggle bc-dropdown-toggle-filter" type="button" id="dropdown_filters">
								{{ __("Advanced") }}
							</button>
							<div class="dropdown-menu px-3 py-3 dropdown-menu-right" aria-labelledby="dropdown_filters">
								
							</div>
						</div>
					@endif
					<button class="btn-info btn btn-icon btn_search" type="submit">{{__('Search')}}</button>
				</form>
			</div>
		</div>
		<div class="text-right">
			
		</div>

		@If(Session::has('datadeleted'))


<h5 style="color:red;">Data deleted successfully</h5>

    @endif

		<div class="panel">
			<div class="panel-body">
				<form action="" class="bravo-form-item">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
							<tr>
								<th width="60px"><input type="checkbox" class="check-all"></th>
								<th> {{ __('Visa Type')}}</th>
								<th> {{ __('Created_at')}}</th>
								<th> {{ __('Updated_at')}}</th>
								<th>{{ __('Action')}}</th>
							
							
							</tr>
							</thead>
							<tbody>
							@if($data)
								@foreach($data as $row)
									<tr >
										<td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}">
										</td>
										<td>{{$row->entry}}</td>
										<td>{{$row->created_at}}</td>
										<td>{{$row->updated_at}}</td>
										<td><a href="{{route('flight.admin.create',['id'=>$row->id])}}" type="button" class="btn btn-primary">Edit</a>&nbsp;<a href="{{route('flight.admin.delete',['id'=>$row->id])}}" type="button" class="btn btn-danger">Delete</a></td>
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="7">{{__("No visa found found")}}</td>
								</tr>
							@endif
							</tbody>
						</table>
					</div>
				</form>
			
			</div>
		</div>
	</div>
@endsection
@push('js')
	<script>
        $(document).ready(function () {
            $('.has-datetimepicker').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                showCalendar: false,
                autoUpdateInput: false, //disable default date
                sameDate: true,
                autoApply: true,
                disabledPast: true,
                enableLoading: true,
                showEventTooltip: true,
                classNotAvailable: ['disabled', 'off'],
                disableHightLight: true,
                locale: {
                    format: 'YYYY/MM/DD hh:mm:ss'
                }
            }).on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD hh:mm:ss'));
            });
        })
	</script>
@endpush
