@extends('app')
@section('content')

<div class="row">
  <div class="col-xs-12">
      <div class="box">
      <div class="box-header">
  <h3 class="box-title">الفنيين</h3>
    </div><!--.box header-->
<div class="box-body">
<div class="row">
  <div class="col-md-12">
<div class="col-md-1 pull-right">

<a href="{{ action("TechnicansController@create")}}">
    <button class="btn btn-primary " type="button" name="new">إضافة</button>
    </a>
</div>
  </div>
</div>
<div><!--table-->
<table id="dataTable" border="1" class="table table-striped table-bordered table-hover " style="width:30%" >
  	<thead>
  	<tr>
  	<th style="text-align:right">#</th>
     <th style="text-align:right">الإسم</th>
     <th style="text-align:right">المجال</th>
  	<th style="text-align:right">خيارات</th>
  	</tr>
  	</thead>
  	<tbody>

    @foreach($technicans as $technican)
  <tr>
    <td>{{ $technican->id }}</td>
    <td>{{ $technican->tech_name }}</td>
    <td>{{ $technican->tech_type }}</td>
    <td>
      <a href="#" title="حذف" aria-label="Left Align" type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash " aria-hidden="true"></span></a>
  	</td>
@include('partials.modal',[
  'model' => "$technican",
  'wild' => "$technican->id",
  'method'=>'DELETE',
  'action'=>'TechnicansController@destroy',
  'modal_title'=>'حذف فني',
  'modal_body'=>'هل تريد حذف هذا السجل'
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
@endsection
@stop
