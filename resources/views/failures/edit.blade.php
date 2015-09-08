@extends('app')


@section('content')
<div class="box">
<div class="box-header">
<h3 class="box-title">تعديل:	{!! $failure->fail_name !!}</h3>
</div><!--.box header-->
<div class="box-body">

{!! Form::model($failure,['method' => 'PATCH','action' => ['FailuresController@update',$failure -> fail_id]]) !!}

@include('failures.form',['submitbtn' =>'تعديل',
						  'fail_date'=>\Carbon\Carbon::parse($failure->fail_time)->format('Y-m-d')
						  ])

{!! Form::close() !!}
</div>
</div>
@include('errors.errors')
@stop
