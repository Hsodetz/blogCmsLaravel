@extends('layouts.app')


@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Ver Entrada </h3>
    </div>
    <div class="panel-body">
      
      <p><strong> Nombre        </strong> {{ $post->name }} </p>
      <p><strong> Slug          </strong> {{ $post->slug }} </p>
      <p><strong> Contenido     </strong> {{ $post->body }} </p>
     
    </div>
  </div>
</div>

@endsection