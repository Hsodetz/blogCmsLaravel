@extends('layouts.app')


@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Editar Entradas </h3>
    </div>
    <div class="panel-body">
      
      {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => 'true']) !!}

        @include('admin.posts.partials.form')
      
      {!! Form::close() !!}
      
      
    </div>
  </div>
</div>

@endsection