@extends('layouts.app')

@section('content')

<div class="container">

  <div class="panel panel-default">
      <div class="panel-heading">
        Listado de Categorias
        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm pull-right"> 
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
            
            @foreach ($posts as $post)
              <tr>
                <td> {{ $post->id }} </td>
                <td> {{ $post->name }} </td>
                <td width="10px">
                  <a href="{{ route('posts.show', $post->id) }}" class="label label-primary">
                     Ver 
                  </a>
                </td>
                <td width="10px">
                  <a href="{{ route('posts.edit', $post->id) }}" class="label label-warning">
                      Editar 
                  </a>
                </td>
                <td width="10px">
                  
                  {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                    
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
                    
                  {!! Form::close() !!}
                  
                  
                </td>
              </tr>
            @endforeach
            
          </tbody>
        </table>

        {{ $posts->links() }}
    
      </div>
    </div>

</div>



@endsection

