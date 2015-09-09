@extends('app')
@section('head')
<link rel="stylesheet" href="/AdminLTE-RTL/plugins/datepicker/datepicker3.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="/AdminLTE-RTL/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="/AdminLTE-RTL/plugins/bootstrap-select/dist/css/bootstrap-select_rtl.min.css" media="screen" title="no title" charset="utf-8">

@endsection
@section('content')
@include('repairs.fail_info')

<div class="row">
    {!! Form::open(['url' => 'maintainance/repairs']) !!}
<div class="col-md-6">


  <div class="box box-primary">
    <div class="box-header with-border">
<h4 class="box-title">تقرير إصلاح </h4>
    </div>

    <div class="box-body">

      <div class="form-group col-md-6">
              {!! Form::hidden('fail_id',$fail->fail_id ) !!}
      {!! Form::label('rep_date','تاريخ الإصلاح:') !!}
      {!! Form::text('rep_date',date('Y-m-d'),['class' => 'form-control','id'=>'datepicker']) !!}
      </div>

      <div class="form-group col-md-6">
      {!! Form::label('rep_dur','زمن الإصلاح:') !!}
      {!! Form::text('rep_dur',null,['class' => 'form-control']) !!}
      </div>

      <div class="form-group col-md-6">
      {!! Form::label('rep_status','حالة الإصلاح:') !!}
      {!! Form::select('rep_status',[0=>'إختر','جاري الإصلاح'=>'جاري الإصلاح','تم'=>'تم',],null,['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-md-12">
      {!! Form::label('rep_details','تفاصيل الإصلاح:') !!}
      {!! Form::textarea('rep_details',null,['class' => 'form-control']) !!}
      </div>
<div class="col-md-12">
  <button class="btn btn-primary fa fa-plus addButton2" type="button" name="button"></button>
  {!! Form::label('technicans','الفنيين:') !!}
</div>
        <div class="input_fields_wrap2">

     <div class="form-group fields">

        <div class="col-md-6">

        {!! Form::select('technicans[]',$technicans,0,['class' => 'form-control selectpicker', 'data-live-search'=>'true']) !!}


        </div>

     </div>

     </div>

        <div class="moreForms2"></div>
    </div><!--/Box-Body-->
  </div> <!--/Box-->
</div>

  <div class="col-md-6">
  <div class="box box-warning">
   <div class="box-header with-border">
     <h4 class ="box-title">مستلزمات قطع الغيار</h4>
   </div>
   <div class="box-body">



<div class="input_fields_wrap1">
<div class="form-group fields1">
<div class="col-md-9 aaa">

     <div class="col-md-8 form-group">

     {!! Form::select('part_id[]',$parts,0,['class' => 'form-control selectpicker','data-live-search'=> 'true']) !!}
     </div>

     <div class="col-md-3">

     {!! Form::input('number','part_qty[]',null,['class' => 'form-control','placeholder'=>'الكمية']) !!}
     </div>
<!--     <button class="btn btn-danger fa fa-minus remove_field" type="button" name="button"></button>-->

<button class="btn btn-primary fa fa-plus addButton" type="button" name="button"></button>
</div>
</div>

</div>


<div class="moreForms form-group"></div>


   <!--<button class="btn btn-danger fa fa-minus remove_field" type="button" name="button"></button>-->
   </div>

  <div class="box-footer">
    <div class="form-group col-md-5">
    {!! Form::submit("إصلاح",['class'=>'form-control btn-primary']) !!}
    </div>

  </div>
  </div><!--Box-->
  </div>
  {!! Form::close() !!}
</div><!--/row-->
@stop
@section('scripts')
<script type="text/javascript" src="/js/addinput.js"></script>
<script type="text/javascript" src="/js/addinput2.js"></script>

<script type="text/javascript" src="/AdminLTE-RTL/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript" src="/AdminLTE-RTL/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/AdminLTE-RTL/plugins/datepicker/locales/bootstrap-datepicker.ar.js"></script>
<script type="text/javascript" src="/AdminLTE-RTL/plugins/bootstrap-datetimepicker/js/moment.js"></script>
<script type="text/javascript" src="/AdminLTE-RTL/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js">

</script>
<script type="text/javascript">
$(function() {
  $( "#datepicker" ).datepicker({
    language : 'ar',
    format : 'yyyy-mm-dd',
    endDate : '0d',


  });
});
</script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT',
                });
            });
        </script>
        <script type="text/javascript">
    			  $('.selectpicker').selectpicker({
              title : "إختر..."

    				});
    		</script>
@endsection
