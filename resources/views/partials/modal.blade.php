<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $modal_title }}</h4>
      </div>
      <div class="modal-body">
        <h4>{{ $modal_body }}</h4>
      </div>
      <div class="modal-footer">
        {!! Form::model($model,['method'=> $method,'action' => [$action,$wild]]) !!}
        {!! Form::submit( "موافق",['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>
