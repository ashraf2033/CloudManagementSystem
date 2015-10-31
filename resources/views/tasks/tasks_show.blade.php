  @extends('app')
  @section('head')

  	<link rel="stylesheet" href="/AdminLTE-RTL/plugins/datepicker/datepicker3.css" media="screen" title="no title" charset="utf-8">
  	<link rel="stylesheet" href="/AdminLTE-RTL/plugins/bootstrap-select/dist/css/bootstrap-select_rtl.min.css" media="screen" title="no title" charset="utf-8">
  @endsection
  @section('content')
  <div class="row">

  <div class="col-md-6">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">{{ $task->task_name }}</h3>
  </div><!--.box header-->
  <div class="box-body">
  <table style="width:100%"  align="center">
  <tbody>

    <tr>
  <td>
    <h5>الآلة : {{$task->machine->machine_name}} </h5>
  </td>
  <td>
    <h5>الموعد : {{$task->task_date->format('Y-m-d')}} </h5>
  </td>
  <td>
    <h5>الحالة : {{$task->task_status}} </h5>
  </td>
    </tr>
    <tr>
      <td>
        <h5> نوع الصيانة : {{$task->task_type}} </h5>
      </td>
      <td>
      </td>
  @if(Input::get('action') == 'TasksController@show')
      <td>
     <h5> قطع غيار  : {{$task->parts()->lists('part_name')->implode(',')}} </h5>
      </td>
      <td>
      </td>
    </tr>
  </tbody>
  </table>
  <h4>  الفني المسؤول  : <a href="#"></a>{{$task->technican()->lists('tech_name')->implode(',')}} </h4>

  <h4>قطع الغيار:</h4>
  <table class="table table-striped table-bordered table-hover ">
    @if(count($task->parts->toArray()) != 0)
    <thead>
    <tr>
      <th>الصنف</th>
      <th>الكمية </th>
    </tr>
    </thead>
    <tbody>


    @foreach($task->parts as $part)
    <tr>
      <td>{{ $part->part_name }}</td>
      <td>{{ $part->pivot->part_qty }}</td>
   </tr>
    @endforeach
      @else
      <h4> لم يتم إستخدام قطع غيار في هذه العملية</h4>
      @endif
  </tbody>
  @endif
  </table >
</div><!--/box-body-->

  </div><!--/box-->
  </div>
  </div><!--/row-->

@if(Input::get('action') == 'TasksController@finish')
  <div class="row">
<div class="col-md-6">
  <div class="box box-success">
<div class="box-header with-border">
  <h3 class="box-title">تقرير إتمام العملية</h3>
</div>
<div class="box-body">
{!! Form::open(['method'=>'PATCH','action' => ['TasksController@finish',$task->task_id]]) !!}
<div class="form-group col-md-6">
	{!! Form::label('tech_id','الفني:') !!}


		<select class="form-control selectpicker selectpicker2  bs-select-hidden" data-live-search="true" name="tech_id"><option value="" class="bs-title-option">إختر...</option>
			@foreach($technicans as $key => $tech)
<option value = {{ $key }} >{{ $tech }}</option>
			@endforeach</select>

	</div>
<div class="col-md-12 form-group">
{!! Form::label('parts','مستلزمات قطع الغيار:') !!}
</div>

<div class="input_fields_wrap1">

<div class="form-group fields1">

<div class="col-md-9 aaa">

  <div class="col-md-6 form-group">

  <select class="form-control selectpicker bs-select-hidden" data-live-search="true" name="part_id[]">
     @foreach($parts as $key => $pid)
  <option value = {{ $key }} >{{ $pid }}</option>
          @endforeach</select></select>
  </div>

  <div class="col-md-3">

  <input class="form-control" placeholder="الكمية" name="part_qty[]" type="number">
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
  <!-- Button trigger modal -->

{!! Form::submit("إتمام",['class'=>'btn btn-success'])!!}

</div>
{!! Form::close() !!}
  </div><!--Box-->

</div><!--Col-->
  </div><!--/ROW-->
@endif
  @endsection
  @section('scripts')
  <script type="text/javascript" src="/js/addinput.js"></script>

  		<script type="text/javascript" src="/AdminLTE-RTL/plugins/datepicker/bootstrap-datepicker.js"></script>
  		<script type="text/javascript" src="/AdminLTE-RTL/plugins/datepicker/locales/bootstrap-datepicker.ar.js"></script>
  <script type="text/javascript" src="/AdminLTE-RTL/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  		<script type="text/javascript">
  		$(function() {
  			$( "#datepicker" ).datepicker({
  				language : 'ar',
  				format : 'yyyy-mm-dd',


  			});
  		});
  		</script>
  		<script type="text/javascript">
  				$('.selectpicker').selectpicker({
  					title : "إختر..."

  				});
  		</script>
  @endsection
