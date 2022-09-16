@extends('layouts.app')


@section('titulo' , 'Sistema Venta')

@section('content')




<div class="container">
    <h1>Editar Productos</h1>
    {{-- {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!} --}}
    {!! Form::model($productos,['route' => ['producto.update', $productos->id], 'method'=>'PUT']) !!}
    @include('producto.form_editar')
    {{-- <a href="{{ route('producto.edit', $productos->id) }}" class="btn btn-primary">Actualizar</a> --}}
    {!! Form::hidden('id', $productos->id)!!}
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>

@endsection