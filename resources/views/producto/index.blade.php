@extends('layouts.app')


@section('titulo' , 'Sistema Venta')

@section('content')
<div class="container">
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">Impuesto</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
      <tr>
        <th scope="row">{{$producto->id}}</th>
        <td>{{$producto->nombre}}</td>
        <td>{{$producto->precio}}</td>
        <td>{{$producto->impuesto}}</td>
        <td>
            {!! Form::open(['route' => ['producto.destroy', $producto->id],'class' => 'form_eliminar', 'method' => 'DELETE']) !!}
            <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-info" title="Editar">Editar</a>                                                    
                                                        
            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}    
                
            {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    <a href="{{route('producto.create')}}" class="btn btn-primary">Registrar Producto</a>
    <a href="{{route('compra.create')}}" class="btn btn-primary">Comprar Producto</a>
  </div>
@endsection