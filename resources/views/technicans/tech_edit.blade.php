@extends('app')
@section('content')
<div class="col-md-6">


<div class="box">
<div class="box-header">
<h3 class="box-title">تعديل بيانات فني</h3>
</div><!--.box header-->
<div class="box-body">
{!! Form::model($tech,['method' => 'PATCH','action' => ['TechnicansController@update',$tech->id]]) !!}

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

{{--  @endcan --}}
</div>


		</div>
	</div>

</div>
<div class="box-footer">
  {!! Form::submit('تعديل',['class' =>' btn btn-primary ']) !!}
{!! Form::close() !!}
<a href="#" title="حذف" aria-label="Left Align" type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash " aria-hidden="true"></span>&nbsp;حذف</a>

@include('partials.modal',[
'model' => "$tech",
'wild' => "$tech->id",
'method'=>'DELETE',
'action'=>'TechnicansController@destroy',
'modal_title'=>'حذف فني',
'modal_body'=>'هل تريد حذف هذا الفني'
])
</div>
</div><!--/box-->
</div>
@endsection
