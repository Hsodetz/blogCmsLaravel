
@extends('layouts.app')


@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Editar Etiquetas </h3>
    </div>
    <div class="panel-body">
      

      {!! Form::model($tag, ['method' => 'PUT', 'route' => ['tags.update', $tag->id]]) !!}

        @include('admin.tags.partials.form')
      
      {!! Form::close() !!}
      
      
    </div>
  </div>
</div>

@endsection