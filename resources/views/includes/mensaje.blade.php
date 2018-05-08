

@if (Session::has('info_success'))

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h5><strong>Exito!</strong></h5>
    <p> {{ Session::get('info_success') }} </p> 
</div>

@endif


@if (count($errors))

<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h5><strong>Fatal!</strong></h5>
    <ul>
      
      @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>
      @endforeach
      
    </ul>
</div>
  
@endif

