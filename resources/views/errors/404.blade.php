<!-- Extendemos de una vista que ya tiene laravel por defecto para los errores -->


@extends('errors::layout')

@section('title', '403')

<a href="{{ URL::previous() }}"> Atras </a>

@section('message', "Acceso no Autorizado")




