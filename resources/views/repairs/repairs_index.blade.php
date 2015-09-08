@extends('app')

@section('head')
<link href="/AdminLTE-RTL/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
<div class="col-xs-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="class = box-title">الإصلاحات</h3>
    </div>
<div class="box-body">
<div class="row">
  <div class="col-md-12"> <!--table-->
<table id="dataTable" border="1" class="table table-striped table-bordered table-hover " style="width:100%"  align="center">
  <thead>
    <tr>
    <th style="text-align:right">#</th>
    <th style="text-align:right">رقم العطل</th>
    <th style="text-align:right">العطل</th>
    <th style="text-align:right">تاريخ العطل</th>
    <th style="text-align:right">تاريخ الإصلاح</th>
    <th style="text-align:right">حالة الإصلاح</th>
    <th style="text-align:right">الفنيين</th>
    <th style="text-align:right">قطع غيار</th>
    <th style="text-align:right">خيارات	</th>
    </tr>
  </thead>
  <tbody>
    @foreach($repairs as $repair)
<tr>
<td>{{ $repair->rep_id }}</td>
<td>{{ $repair->fail_id }}</td>
<td>{{ $repair->failure->fail_name }}</td>
<td>{{ $repair->failure->fail_time}}</td>
<td>{{ $repair->rep_date }}</td>
<td>{{ $repair->rep_status }}</td>
<td>{{ $repair->technicans()->lists('tech_name')->implode(',') }}</td>
<td>{{ $repair->spare_parts()->lists('part_name')->implode(',') }}</td>
<td>
@can('maintain')
  <a href="{{ action("RepairsController@edit",$repair) }}" title="تعديل" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a>
  @endcan
  <a href="{{ action("RepairsController@show",[$repair,'action'=> 'RepairsController@finish']) }}" title="إتمام" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-thumbs-up " aria-hidden="true"></span></a>
  <a href="#" title="إعتماد" aria-label="Left Align" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash " aria-hidden="true"></span></a>

</td>
</tr>
<!-- Modal -->
@include('partials.modal',[
  'model' => "$repair",
  'wild' => "$repair->rep_id",
  'method'=>'DELETE',
  'action'=>'RepairsController@destroy',
  'modal_title'=>'حذف تقرير',
  'modal_body'=>'هل تريد حذف هذا التقرير',
  'btn'=>'حذف'

  ])
    @endforeach
  </tbody>
</table>
  </div>
</div> <!--/row-->
</div><!--/box_body-->
  </div><!--/box-->

</div>
</div> <!--/row-->
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
  "order": [ 1,'desc']
});
} );
</script>
@endsection

@stop
