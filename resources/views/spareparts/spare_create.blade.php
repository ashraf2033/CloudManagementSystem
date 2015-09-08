@extends('app')

@section('content')
<div class="col-md-6">


<div class="box">
<div class="box-header">
<h3 class="box-title">إضافة قطعة جديدة</h3>
</div><!--.box header-->
<div class="box-body">
{!! Form::open(['url' => 'spareparts']) !!}

@include('spareparts.form',['submitbtn' => 'إضافة'])

{!! Form::close() !!}
</div>
</div><!--/box-->
</div>
@include('errors.errors')

@stop
