@extends('app')
@section('content')
<div class="row">
<div class="col-md-12">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">تسجيل حركة</h3>
</div>
<div class="box-body">
<div class="form-group col-md-10">

{!! Form::open(['url' => 'transes/']) !!}

{!! Form::label('part','الصنف:') !!}
{!! Form::label('part',$part->part_name) !!}
{!! Form::hidden('part_id',$part->part_id) !!}
</div>
<div class='form-group col-md-3'>
{!! Form::label('part_qty','الكمية:') !!}
 <input class="form-control" name="part_qty" type="number">

{!! Form::hidden('type',$type) !!}
</div>
<div class='form-group col-md-3'>
{!! Form::label('note','نوع الحركة:') !!}
{!! Form::text('note','',['class'=>'form-control']) !!}


</div>


</div><!--box-body-->
<div class="box-footer">

{!! Form::submit($submit,['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

</div><!--/Box-->
</div>
</div>
@endsection
