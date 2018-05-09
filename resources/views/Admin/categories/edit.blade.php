@extends('layouts.app')


@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Editar Categorias </h3>
    </div>
    <div class="panel-body">
      
      {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}

        @include('admin.categories.partials.form')
      
      {!! Form::close() !!}
      
      
    </div>
  </div>
</div>

@endsection