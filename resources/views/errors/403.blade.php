<!-- Extendemos de una vista que ya tiene laravel por defecto para los errores -->


@extends('errors::layout')

@section('title', '404')

@section('message', "Pagina no encontrada")

<a href="{{ URL::previous() }}"> Atras </a>