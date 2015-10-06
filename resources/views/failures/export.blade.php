@extends('app')
@section('head')
	<link rel="stylesheet" href="/AdminLTE-RTL/plugins/datepicker/datepicker3.css" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')

<div class="row">
  <div class="col-xs-12">
      <div class="box box-primary">
      <div class="box-header with-border">
  <h3 class="box-title">إستخراج تقرير</h3>
    </div><!--.box header-->
<div class="box-body">

<div class="row">
  <div class="col-xs-12">
    <div class="form-group">

{!! Form::open(['url' => 'maintainance/failures/download']) !!}
{!! Form::select('period',['all'=>'إختر','Thismonth'=>'الشهر الحالي','DateRange'=>'فترة مخصصة'],0,['name'=>'period','class'=>'input input-sm']) !!}

	{!! Form::text('date1',"من",['class' => 'input-sm','id' => 'datepicker']) !!}

	{!! Form::text('date2',"إلى",['class' => 'input-sm','id' => 'datepicker1']) !!}
	{!! Form::hidden('author', \Auth::user()->name ,['class' => 'input-sm','id' => 'datepicker1']) !!}

    </div>

  </div>
</div>

</div><!--/.box-body-->
<div class="box-footer">
      {!! Form::button('<i class="fa fa-file-excel-o"> تصدير</i>',['class' =>'btn btn-primary','type'=>'submit']) !!}
      {!! Form::close() !!}

</div>
 </div><!--/.box-->
 </div><!--/.col-->
</div><!--/.row-->
  @stop
@section('scripts')
<script type="text/javascript" src="/AdminLTE-RTL/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/AdminLTE-RTL/plugins/datepicker/locales/bootstrap-datepicker.ar.js"></script>

<script type="text/javascript">
// A $( document ).ready() block.
$( document ).ready(function() {
  $("#datepicker1").hide();
  $("#datepicker").hide();
});

$('select[name="period"]').change(function(){

  if ($(this).val() == "DateRange"){
  $("#datepicker1").show();
  $("#datepicker").show();}
else{
$("#datepicker1").hide();
$("#datepicker").hide();
}
});
</script>

<script type="text/javascript">
$(function() {
  $( "#datepicker" ).datepicker({
    language : 'ar',
    format : 'yyyy-mm-dd',


  });

  $( "#datepicker1" ).datepicker({
    language : 'ar',
    format : 'yyyy-mm-dd',


  });
});
</script>
@endsection
