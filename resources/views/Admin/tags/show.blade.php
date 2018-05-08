
@extends('layouts.app')


@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Ver Etiqueta </h3>
    </div>
    <div class="panel-body">
      
      <p><strong> Nombre  </strong> {{ $tag->name }} </p>
      <p><strong> Slug    </strong> {{ $tag->slug }} </p>
      
       
      
    </div>
  </div>
</div>

@endsection