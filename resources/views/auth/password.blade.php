@extends('app')


@section('content')
<div class="container-fluid">
<div class="row">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="header-title">إستعادة كلمة المرور<h3>
</div>
<div class="box-body">

<form method="POST" action="/password/email">
  {!! csrf_field() !!}

  @if (count($errors) > 0)
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  @endif

  <div>
      Email
      <input type="email" name="email" value="{{ old('email') }}">
  </div>

  <div>
      <button type="submit">
          Send Password Reset Link
      </button>
  </div>
</form>
</div>
</div>
</div>
</div>
@endsection
@stop
