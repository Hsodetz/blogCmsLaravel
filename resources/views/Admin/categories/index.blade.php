@extends('layouts.app')

@section('content')

<div class="container">

  <div class="panel panel-default">
      <div class="panel-heading">
        Listado de Categorias
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm pull-right"> 
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
            
            @foreach ($categories as $category)
              <tr>
                <td> {{ $category->id }} </td>
                <td> {{ $category->name }} </td>
                <td width="10px">
                  <a href="{{ route('categories.show', $category->id) }}" class="label label-primary">
                     Ver 
                  </a>
                </td>
                <td width="10px">
                  <a href="{{ route('categories.edit', $category->id) }}" class="label label-warning">
                      Editar 
                  </a>
                </td>
                <td width="10px">
                  
                  {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                    
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
                    
                  {!! Form::close() !!}
                  
                  
                </td>
              </tr>
            @endforeach
            
          </tbody>
        </table>

        {{ $categories->links() }}
    
      </div>
    </div>

</div>



@endsection

