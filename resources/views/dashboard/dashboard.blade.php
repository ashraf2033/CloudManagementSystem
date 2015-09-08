@extends('app')
@section('head')

@endsection
@section('content')
<!--smallboxes-->
@if(Gate::allows('produce'))
@include('dashboard.partials.pr_smallbxs')
@elseif(Gate::allows('maintain'))
@include('dashboard.partials.mt_smallbxs')
@else
@include('dashboard.partials.mt_smallbxs')
@endif


<!--navtabs-->
@if(Gate::allows('produce'))
@include('dashboard.partials.pr_navtabs')
@elseif(Gate::allows('maintain'))
@include('dashboard.partials.mt_navtabs')
@else
@include('dashboard.partials.mt_navtabs')
@endif
@endsection
@section('scripts')

@endsection
@stop
