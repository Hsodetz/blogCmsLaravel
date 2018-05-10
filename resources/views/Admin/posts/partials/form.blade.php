
<!-- Le pasamos el id del usuario en un campo oculto para que se guarde en la tabla -->

{{ Form::hidden('user_id', Auth::user()->id) }}

<div class="form-group">
  
    {{ Form::label('category_id', 'Categorías') }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
  
</div>

<div class="form-group">
  {!! Form::label('name', "Nombre de la categoria") !!}
    
  {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', "URL Amigable") !!}
      
    {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) !!}
</div>

<div class="form-group">
  
  {!! Form::label('file', 'Imagen') !!}
  
  {!! Form::file('file') !!}
  
</div>

<div class="form-group">
  
  {!! Form::label('status', 'Estado') !!}

  <label>
    
    {!! Form::radio('status', 'PUBLISHED') !!} Publicado
    
  </label>
  <label>
    
    {!! Form::radio('status', 'DRAFT') !!} Borrador
    
  </label>

</div>

<div class="form-group">
  
  {!! Form::label('tags', 'Etiquetas') !!}
  <div>
    
    @foreach ($tags as $tag)
      <label>
        
        {!! Form::checkbox('tags[]', $tag->id) !!} {{ $tag->name }}
        
      </label>
    @endforeach
    
  </div>
  

</div>

<div class="form-group">
  
  {!! Form::label('excerpt', 'Extracto') !!}
  
  {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) !!}
  
  

</div>

<div class="form-group">
    {!! Form::label('body', "Descripcion") !!}
      
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  
  {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
  
</div>


@section('scripts')
<script src="{{ asset('/vendor/stringToSlug/jquery.stringtoslug.min.js') }}"></script>
<script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>

<script>
$(document).ready(function(){
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-', 
    prefix: '',
    suffix: '',
    replace: '',
    AND: 'and',
    options: {},
    callback: false 
  });
});

// Configuracion para el ckeditor
CKEDITOR.config.height = 400;   //alto
CKEDITOR.config.width  = 'auto';  //ancho

CKEDITOR.replace('body'); //reemplazo encaso de que no cargue el ckeditor

</script>

@endsection
