<div class="container col-md-12">

	<div class="form-group col-md-6">
	{!! Form::label('machine_name','الآلة:') !!}
	{!! Form::text('machine_name',null,['class' => 'form-control']) !!}
	</div>
	<div class="form-group col-md-6">
	{!! Form::label('serial_number','الرقم المتسلسل:') !!}
	{!! Form::text('serial_number',null,['class' => 'form-control']) !!}
	</div>
</div>

<div class="container col-md-12">


	<div class="form-group col-md-6">
	{!! Form::label('machine_supplier','المورد:') !!}
  {!! Form::text('machine_supplier',null,['class' => 'form-control']) !!}
	</div>

	<div class="form-group col-md-6">
	{!! Form::label('production_line','خط الإنتاج:') !!}
	{!! Form::text('production_line',null,['class' => 'form-control']) !!}
	</div>
</div>
	<div class="container col-md-12">


  	<div class="form-group col-md-6">
  	{!! Form::label('manufacturer','الشركة المصنعة:') !!}
  	{!! Form::text('manufacturer',null,['class' => 'form-control']) !!}
  	</div>
		<div class="form-group col-md-6">
  	{!! Form::label('buying_date','تاريخ الشراء:') !!}
  	{!! Form::text('buying_date',null,['id'=>'datepicker','class' => 'form-control']) !!}
	</div>
	<div class="container col-md-12">
		<div class="form-group col-md-6">
		{!! Form::submit($submitbtn,['class' =>'btn-primary form-control']) !!}
		</div>
	</div>
	@section('scripts')
	<script type="text/javascript" src="/AdminLTE-RTL/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/AdminLTE-RTL/plugins/datepicker/locales/bootstrap-datepicker.ar.js"></script>

	<script type="text/javascript">
	$(function() {
    $( "#datepicker" ).datepicker({
			language : 'ar',
			format : 'mm-dd-yyyy',
			endDate : '0d',

		});
  });
	</script>
	@endsection
