
@extends('layouts.app')


@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"> Crear Etiquetas </h3>
  </div>
  <div class="panel-body">
    
    {!! Form::open(['route' => 'tags.store']) !!}

      @include('admin.tags.partials.form')
    
    {!! Form::close() !!}
    
  </div>
</div>

@endsection

