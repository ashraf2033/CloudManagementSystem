<div class="container col-md-12">

	<div class="form-group col-md-6">
	{!! Form::label('part_name','الإسم:') !!}
	{!! Form::text('part_name',null,['class' => 'form-control']) !!}
	</div>
	<div class="form-group col-md-3">
	{!! Form::label('part_stock','الكمية')!!}
	{!! Form::input('number','part_stock',null,['class' => 'form-control']) !!}
	</div>
</div>

<div class="container col-md-12">

	<div class="form-group col-md-6">
	{!! Form::label('part_store','المخزن') !!}
  {!! Form::text('part_store',null,['class' => 'form-control']) !!}
	</div>

</div>

	<div class="container col-md-12">
		<div class="form-group col-md-6">
		{!! Form::submit($submitbtn,['class' =>'btn-primary form-control']) !!}
		</div>
	</div>
