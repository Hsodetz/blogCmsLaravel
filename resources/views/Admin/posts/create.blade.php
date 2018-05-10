@extends('layouts.app')


@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Crear Entradas </h3>
    </div>
    <div class="panel-body">
    
      {!! Form::open(['route' => 'posts.store']) !!}

        @include('admin.posts.partials.form')
      
      {!! Form::close() !!}
    
  </div>
</div>

@endsection