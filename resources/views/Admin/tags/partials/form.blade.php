
<div class="form-group">
  {!! Form::label('name', "Nombre de la etiqueta") !!}
    
  {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', "URL Amigable") !!}
      
    {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) !!}
  </div>

<div class="form-group">
  
  {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
  
</div>


@section('scripts')
<script src="{{ asset('/vendor/stringToSlug/jquery.stringtoslug.min.js') }}"></script>

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
</script>
  
@endsection





