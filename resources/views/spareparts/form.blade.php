<div class="container col-md-12">

	<div class="form-group col-md-6">
	{!! Form::label('part_name','الإسم:') !!}
	{!! Form::text('part_name',null,['class' => 'form-control']) !!}
	</div>

</div>

<div class="container col-md-12">

	<div class="form-group col-md-6">
	{!! Form::label('part_store','المخزن') !!}
  {!! Form::select('part_store',[""=>"إختر","كهربائي"=>"كهربائي","ميكانيكي"=>"ميكانيكي"],null,['class' => 'form-control']) !!}
	</div>

</div>

	<div class="container col-md-12">
		<div class="form-group col-md-6">
		{!! Form::submit($submitbtn,['class' =>'btn-primary form-control']) !!}
		</div>
	</div>
