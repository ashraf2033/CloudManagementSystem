@extends('app')
@section('content')
<div class="col-md-6">


<div class="box">
<div class="box-header">
<h3 class="box-title">إضافة فني</h3>
</div><!--.box header-->
<div class="box-body">
{!! Form::open(['url' => 'technicans']) !!}

<div class="container col-md-12">


	<div class="form-group col-md-6">
	{!! Form::label('tech_name','الإسم:') !!}
  {!! Form::text('tech_name',null,['class' => 'form-control']) !!}
	</div>

	<div class="form-group col-md-6">
	{!! Form::label('tech_type','المجال:') !!}
  {!! Form::select('tech_type',[''=>'إختر','كهربائي'=>'كهربائي','ميكانيكي'=>'ميكانيكي'],null,['class' => 'form-control']) !!}
	</div>


	<div class="container col-md-12">
		<div class="form-group col-md-6">
		{!! Form::submit('إضافة',['class' =>'btn-primary form-control']) !!}
		</div>
	</div>

{!! Form::close() !!}
</div>
</div><!--/box-->
</div>
@endsection
