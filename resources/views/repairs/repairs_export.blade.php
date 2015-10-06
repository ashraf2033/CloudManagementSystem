@extends('app')
@section('content')

<div class="row">
  <div class="col-xs-12">
      <div class="box box-primary">
      <div class="box-header with-border">
  <h3 class="box-title">الأعطال</h3>
    </div><!--.box header-->
<div class="box-body">
<div class="row">
  <div class="col-xs-12">

  </div>
</div>

</div><!--/.box-body-->
<div class="box-footer">
  <a href="{{ action("FailuresController@create")}}">
      <button class="btn btn-primary " type="button" name="new">بلاغ جديد</button>
      </a>
  <a href="{{ action("FailuresController@export")}}">
      <button class="btn btn-primary " type="button" name="new">تصدير</button>
      </a>
</div>
 </div><!--/.box-->
 </div><!--/.col-->
</div><!--/.row-->
  @stop
