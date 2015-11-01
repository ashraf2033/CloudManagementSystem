@extends('app')

@section('content')
<div class="col-md-6">


<div class="box">
<div class="box-header">
<h3 class="box-title">إضافة قطعة جديدة</h3>
</div><!--.box header-->
<div class="box-body">
{!! Form::open(['url' => 'spareparts']) !!}
{!! Form::hidden('user_id',\Auth::user()->user_id) !!}
@include('spareparts.form',['submitbtn' => 'إضافة'])

{!! Form::close() !!}
</div>
</div><!--/box-->
</div>
@include('errors.errors')

@stop
