

	<link rel="stylesheet" href="/AdminLTE-RTL/plugins/datepicker/datepicker3.css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="/AdminLTE-RTL/plugins/bootstrap-select/dist/css/bootstrap-select_rtl.min.css" media="screen" title="no title" charset="utf-8">



<div class="container col-md-12">

	<div class="form-group col-md-3">
	{!! Form::label('fail_name','العطل:') !!}
	{!! Form::text('fail_name',null,['class' => 'form-control']) !!}
	</div>
	<div class="form-group col-md-3">
	{!! Form::label('machine_id','الآلة:') !!}
	{!! Form::select('machine_id',$machine_list,0, ['class'=>'form-control selectpicker',	'data-live-search'=>'true','title'=>'إختر آلة']) !!}


	</div>
</div>

<div class="container col-md-12">

	<div class="form-group col-md-3">
	{!! Form::label('fail_time','تاريخ العطل:') !!}
	{!! Form::text('fail_time',$fail_date,['class' => 'form-control ','id' => 'datepicker']) !!}
	</div>
	<div class="form-group col-md-3">
	{!! Form::label('fail_type','نوع العطل:') !!}
  {!! Form::hidden('user_id',\Auth::user()->user_id ) !!}
	<div>
	{!! Form::radio('fail_type','ميكانيكي',null,['class' =>'radio-inline']) !!}
	{!! Form::label('fail_type','ميكانيكي') !!}
	&nbsp;
	{!! Form::radio('fail_type','كهربائي',null,['class' =>'radio-inline']) !!}
	{!! Form::label('fail_type','كهربائي') !!}
	</div>
	</div>


</div>
	<div class="container col-md-12">


		<div class="form-group col-md-6">
		{!! Form::label('shift','الوردية') !!}

		<div>
		{!! Form::radio('shift','وردية 1',null,['class' =>'radio-inline']) !!}
		{!! Form::label('shift','وردية 1') !!}
		&nbsp;
		{!! Form::radio('shift','وردية 2',null,['class' =>'radio-inline']) !!}
		{!! Form::label('shift','وردية 2') !!}
		&nbsp;
		{!! Form::radio('shift','وردية 3',null,['class' =>'radio-inline']) !!}
		{!! Form::label('shift','وردية 3') !!}
		</div>
		</div>


	</div>
	<div class="container col-md-12">


			<div class="form-group col-md-6">
			{!! Form::label('fail_details','تفاصيل العطل:') !!}
			{!! Form::textarea('fail_details',null,['class' =>'form-control']) !!}


			</div>
		</div>
	<div class="container col-md-12">


		<div class="form-group col-md-6">
		{!! Form::label('fail_importance','درجة الأهمية:') !!}

		<div>
		{!! Form::radio('fail_importance','عادي',null,['class' =>'radio-inline']) !!}
		{!! Form::label('fail_importance','عادي') !!}
		&nbsp;
		{!! Form::radio('fail_importance','هام',null,['class' =>'radio-inline']) !!}
		{!! Form::label('fail_importance','هام') !!}
		&nbsp;
		{!! Form::radio('fail_importance','هام جداً',null,['class' =>'radio-inline']) !!}
		{!! Form::label('fail_importance','هام جداً') !!}
		</div>
		</div>


	</div>

	<div class="container col-md-12">
		<div class="form-group col-md-6">
		{!! Form::label('fail_notes','ملاحظات:') !!}
		{!! Form::text('fail_notes',null,['class' =>'form-control']) !!}
		</div>
	</div>

	<div class="container col-md-12">
		<div class="form-group col-md-6">
		{!! Form::submit($submitbtn,['class' =>'btn-primary form-control']) !!}
		</div>
	</div>
@section('scripts')


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
					title : "إختر آلة ...",

				});
		</script>
@endsection
