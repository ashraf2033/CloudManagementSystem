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
  <h3 class="box-title">قطع الغيار</h3>
    </div><!--.box header-->
<div class="box-body">
<div class="row">
  <div class="col-md-12">
<div class="col-md-1 pull-right">

<a href="{{ action("SparePartsController@create")}}">
    <button class="btn btn-primary " type="button" name="new">إضافة</button>
    </a>
</div>
  </div>
</div>
<div><!--table-->
<table id="dataTable" border="1" class="table table-striped table-bordered table-hover " style="width:100%"  align="center">
  	<thead>
  	<tr>
  	<th style="text-align:right">#</th>
     <th style="text-align:right">الإسم</th>
  	<th style="text-align:right">الكمية</th>
  	<th style="text-align:right">المخزن</th>
  	<th style="text-align:right">خيارات</th>
  	</tr>
  	</thead>
  	<tbody>

    @foreach($parts as $part)
  <tr>


    <td>{{ $part->part_id }}</td>
    <td>{{ $part->part_name }}</td>
    <td>{{ $part->part_stock }}</td>
    <td>{{ $part->part_store }}</td>

    <td>

      <a href="{{ action("SparePartsController@edit",$part)}}" title="تعديل" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a>
      <a href="" title="تفاصيل" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-question-sign " aria-hidden="true"></span></a>

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
 "lengthMenu": [ 5,10, 25, 50,100 ]

});
} );
</script>
@endsection

@stop
