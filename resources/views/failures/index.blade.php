@extends('app')

@section('head')
<!-- Bootstrap 3.3.4 -->
<!-- dataTables style -->
 <link href="/AdminLTE-RTL/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
      <div class="box">
      <div class="box-header">
  <h3 class="box-title">الأعطال</h3>
    </div><!--.box header-->
<div class="box-body">
<div class="row">
  <div class="col-xs-12">
<div class="col-md-1 pull-right">

<a href="{{ action("FailuresController@create")}}">
    <button class="btn btn-primary " type="button" name="new">بلاغ جديد</button>
    </a>
</div>
  </div>
</div>
<div class="table-responsive"><!--table-->

  <table id="dataTable" border="1" class="table table-striped table-bordered table-hover table-condensed cf  " style="width:100%"  align="center">
  	<thead>
  	<tr>
  	<th style="text-align:right">#</th>  <th style="text-align:right">العطل</th>  <th style="text-align:right">الآلة</th>
  	<th style="text-align:right">تاريخ العطل</th>
  	<th style="text-align:right">نوع العطل</th>
  	<th style="text-align:right">الوردية</th>
  	<th style="text-align:right">درجة الأهمية</th>
  	<th style="text-align:right">ملاحظات</th>
  	<th style="text-align:right">خيارات	</th>
  	</tr>
  	</thead>
  	<tbody>
  	@foreach($failures as $failure)

  <tr>
  	<td>{{ $failure->fail_id }}</td>
  	<td>{{ $failure->fail_name }}</td>
  	<td>{{ $failure->machine->machine_name}}</td>
  	<td>{{ $failure->fail_time }}</td>
  	<td>{{ $failure->fail_type }}</td>
  	<td>{{ $failure->shift }}</td>

  	<td>{{ $failure->fail_importance }}</td>
  	<td><div style="width:120px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis">{{ $failure->fail_notes }}</div></td>

  	<td>
  		<a href="{{ action("FailuresController@show",$failure)}}" title="تفاصيل" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-question-sign " aria-hidden="true"></span></a>
  	@can('maintain')
    <a href="{{ action("RepairsController@create",['failure'=>$failure])}}" title="إصلاح" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-wrench " aria-hidden="true"></span></a>
  		@endcan
  	</td>
  </tr>
  	@endforeach
  	</tbody>
 </table>
</div>
</div><!--/.box-body-->
 </div><!--/.box-->
 </div><!--/.col-->
</div><!--/.row-->
  @stop
@section('scripts')
<!-- dataTables script 3.3.2 JS -->
<script src="/AdminLTE-RTL/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/AdminLTE-RTL/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready( function () {
   $('#dataTable').DataTable({
 "language": {
   "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"

 },
 "lengthMenu": [ 5,10, 25, 50,100 ],
  "order": [ 3,'desc']
});
} );
</script>
@endsection
