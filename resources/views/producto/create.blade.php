@extends('layouts.app')


@section('titulo' , 'Sistema Venta')

@section('content')




<div class="container">
    <h1>Registrar Productos</h1>
    {!! Form::open(['route' => 'producto.store']) !!}
    @include('producto.form')
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>

@endsection