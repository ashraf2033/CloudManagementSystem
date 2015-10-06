@extends('app')
@section('head')

	<link rel="stylesheet" href="/AdminLTE-RTL/plugins/datepicker/datepicker3.css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="/AdminLTE-RTL/plugins/bootstrap-select/dist/css/bootstrap-select_rtl.min.css" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="row">

<div class="col-md-6">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">مهمة جديدة</h3>
</div><!--.box header-->
<div class="box-body">
{!! Form::open(['url' => '/maintainance/tasks']) !!}

<div class="container col-md-12">
	<div class="form-group col-md-6">
	{!! Form::label('task_name','الإسم:') !!}
  {!! Form::text('task_name',null,['class' => 'form-control']) !!}
  {!! Form::hidden('user_id',\Auth::user()->user_id ) !!}
	</div>
	<div class="form-group col-md-6">
	{!! Form::label('task_date','موعد المهمة:') !!}
  {!! Form::text('task_date',date('Y-m-d'),['class' => 'form-control','id' => 'datepicker']) !!}
	</div>
</div>
<div class="container col-md-12">
	<div class="form-group col-md-6">
	{!! Form::label('machine_id','الآلة:') !!}
  {!! Form::select('machine_id',[""=>"aaaa"]+$machines,null,['class' => 'form-control']) !!}
	</div>
	<div class="form-group col-md-6">
	{!! Form::label('tech_id','الفني:') !!}


		<select class="form-control selectpicker selectpicker2  bs-select-hidden" data-live-search="true" name="tech_id"><option value="" class="bs-title-option">إختر...</option>
			@foreach($technicans as $key => $tech)
<option value = {{ $key }} >{{ $tech }}</option>
			@endforeach</select>

	</div>
</div>
<div class="container col-md-12">
	<div class="form-group col-md-6">
	{!! Form::label('task_type','نوع الصيانة:') !!}
  {!! Form::text('task_type',null,['class' => 'form-control']) !!}
	</div>
	<div class="form-group col-md-6">
  {!! Form::hidden('task_status','مجدولة',['class' => 'form-control']) !!}
	</div>
</div>
<div class="col-md-12">
<div class="col-md-6">
	{!! Form::label('machine_id','مستلزمات قطع الغيار:') !!}
</div>
</div>
<div class="container col-md-12">

	<div class="input_fields_wrap1 form-group">
	<div class="form-group fields1">

	<div class="col-md-10">

		<div class="col-md-8 form-group">

	  <select class="form-control selectpicker bs-select-hidden" data-live-search="true" name="part_id[]">
	 		@foreach($parts as $key => $pid)
	  <option value = {{ $key }} >{{ $pid }}</option>
	 				 @endforeach</select></select>
	  </div>

	  <div class="col-md-3">

	  <input class="form-control" placeholder="الكمية" name="part_qty[]" type="number">
	  </div>
	</div>

	<button class="btn btn-primary fa fa-plus addButton" type="button" name="button"></button>
	</div>

	<div class="moreForms form-group"></div>
	</div>

</div><!--/box-body-->
<div class="box-footer">
<div class="col-md-12">


</div>

</div>
	</div>

<div class="box-footer">
	<div class="col-md-6">

 {!! Form::submit('جدولة',['class' =>' btn btn-primary'])!!}
	</div>
</div>
</div>
</div><!--/box-->

{!! Form::close() !!}

</div>
@include('errors.errors')
@endsection
@section('scripts')
<script type="text/javascript" src="/js/addinput.js"></script>

		<script type="text/javascript" src="/AdminLTE-RTL/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="/AdminLTE-RTL/plugins/datepicker/locales/bootstrap-datepicker.ar.js"></script>
<script type="text/javascript" src="/AdminLTE-RTL/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		<script type="text/javascript">
		$(function() {
			$( "#datepicker" ).datepicker({
				language : 'ar',
				format : 'yyyy-mm-dd',


			});
		});
		</script>
		<script type="text/javascript">
				$('.selectpicker').selectpicker({
					title : "إختر..."

				});
		</script>
@endsection
