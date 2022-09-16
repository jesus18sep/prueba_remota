@extends('layouts.app')

@section('titulo' , 'Sistema Venta')

@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr align="center">
            <th scope="col">Cliente</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $factura)
          <tr align="center">
            <td>{{$factura->name}}</td>
            <td align="center">
              {!! Form::open(['route'=>'factura.store']) !!}
                {{-- <input type="hidden" name="aleas_factura" value="<?php echo date('M-d-y'); ?>"> --}}
                <input type="hidden" name='usuario' value="{{$factura->id}}">
                <button class="btn btn-success btn-sm">Generar Factura</button>
              {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
@endsection