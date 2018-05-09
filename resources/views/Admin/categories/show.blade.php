@extends('layouts.app')


@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Ver Categoria </h3>
    </div>
    <div class="panel-body">
      
      <p><strong> Nombre        </strong> {{ $category->name }} </p>
      <p><strong> Slug          </strong> {{ $category->slug }} </p>
      <p><strong> Contenido     </strong> {{ $category->body }} </p>
     
    </div>
  </div>
</div>

@endsection