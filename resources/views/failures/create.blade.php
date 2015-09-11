@extends('app')

@section('content')
<div class="box">
<div class="box-header">
<h3 class="box-title">التبليغ عن عطل جديد</h3>
</div><!--.box header-->
<div class="box-body">
{!! Form::open(['url' => 'maintainance/failures']) !!}

@include('failures.form',['submitbtn' => 'تبليغ','fail_date'=>date('Y-m-d')])

{!! Form::close() !!}
</div>
</div><!--/box-->


@stop
