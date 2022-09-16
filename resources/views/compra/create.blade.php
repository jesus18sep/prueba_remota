@extends('layouts.app')
@section('titulo' , 'Sistema Venta')

@section('content')

<div class="container">
    <h1>Comprar Productos</h1>
    
    {!! Form::open(['route' => 'compra.store']) !!}
    @include('compra.form')

    {!! Form::submit('Comprar', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Borrar', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
      

      <br><br>

      
</div>

@endsection