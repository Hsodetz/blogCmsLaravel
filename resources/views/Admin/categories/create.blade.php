
@extends('layouts.app')


@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Crear Categorias </h3>
    </div>
    <div class="panel-body">
    
      {!! Form::open(['route' => 'categories.store']) !!}

        @include('admin.categories.partials.form')
      
      {!! Form::close() !!}
    
  </div>
</div>

@endsection