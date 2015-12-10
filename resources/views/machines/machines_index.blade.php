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
  <h3 class="box-title">الآلات</h3>
    </div><!--.box header-->
<div class="box-body">
<div class="row">
  <div class="col-md-12">
<div class="col-md-1 pull-right">

<a href="{{ action("MachinesController@create")}}">
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
     <th style="text-align:right">الآلة</th>
  	<th style="text-align:right">نوع الآلة</th>
  	<th style="text-align:right">الرقم المسلسل</th>
     <th style="text-align:right">المورد</th>
  	<th style="text-align:right">خط الإنتاج</th>
  	<th style="text-align:right">الشركة المصنعة</th>
  	<th style="text-align:right">تاريخ الشراء</th>
  	<th style="text-align:right">خيارات</th>
  	</tr>
  	</thead>
  	<tbody>
  	@foreach($machines as $machine)

  <tr>
  	<td>{{ $machine->machine_id }}</td>
  	<td>{{ $machine->machine_name }}</td>
  	<td>{{ $machine->machine_type }}</td>
  	<td>{{ $machine->serial_number }}</td>
  	<td>{{ $machine->machine_supplier}}</td>
  	<td>{{ $machine->production_line }}</td>
  	<td>{{ $machine->manufacturer}}</td>
  	<td>{{ $machine->buying_date }}</td>
    <td>
      <a href="{{ action("MachinesController@edit",$machine)}}" title="تعديل" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a>
      <a href="{{ action("MachinesController@show",$machine)}}" title="تفاصيل" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-question-sign " aria-hidden="true"></span></a>

    @include('partials.modal',[
      'model' => "$machine",
      'wild' => "$machine->machine_id",
      'method'=>'DELETE',
      'action'=>'MachinesController@destroy',
      'modal_title'=>'حذف تقرير',
      'modal_body'=>'هل تريد حذف هذا التقرير',
      'btn'=>'حذف'

      ])
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
