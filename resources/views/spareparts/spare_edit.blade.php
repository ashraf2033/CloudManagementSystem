@extends('app')

@section('content')
<div class="col-md-6">
<div class="box">
<div class="box-header">
<h3 class="box-title">تعديل بيانات القطعة </h3>
</div><!--.box header-->
<div class="box-body">
{!! Form::model($part,['method' => 'PATCH','action' => ['SparePartsController@update',$part-> part_id]]) !!}

@include('spareparts.form',['submitbtn' => 'تعديل'])

{!! Form::close() !!}
</div>
</div><!--/box-->
</div>
@include('errors.errors')

@stop
