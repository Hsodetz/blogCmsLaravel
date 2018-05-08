
@extends('layouts.app')

@section('content')

<div class="container">

  <div class="panel panel-default">
      <div class="panel-heading">
        Listado de Etiquetas
        <a href="{{ route('tags.create') }}" class="btn btn-primary btn-sm pull-right"> 
          Crear 
        </a>
      </div>
      <div class="panel-body">
        
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th colspan="3">&nbsp;</th>
              
            </tr>
          </thead>
          <tbody>
            
            @foreach ($tags as $tag)
              <tr>
                <td> {{ $tag->id }} </td>
                <td> {{ $tag->name }} </td>
                <td width="10px">
                  <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-success btn-sm">
                     Ver 
                  </a>
                </td>
                <td width="10px">
                  <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">
                      Editar 
                  </a>
                </td>
                <td width="10px">
                  
                  {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
                    
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                    
                  {!! Form::close() !!}
                  
                  
                </td>
              </tr>
            @endforeach
            
          </tbody>
        </table>

        {{ $tags->links() }}
    
      </div>
    </div>

</div>



@endsection

