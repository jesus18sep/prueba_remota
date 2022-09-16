@extends('layouts.app')

@section('titulo' , 'Sistema Venta')

@section('content')

<div class="container">
  <a href="{{route('factura.create')}}" class="btn btn-sm btn-primary">Facturas pendientes</a>
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Numero de Factura</th>            
          <th scope="col">Fecha de Facturación</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($facturas as $factura)
        <tr>
          <th scope="row">{{$factura->id}}</th>
          <td>{{$factura->aleas_factura}}{{$factura->id}}</td>
          <td>{{$factura->created_at}}</td>
          <td>
              <a href="{{route('factura.show', $factura->id)}}" class="btn btn-info">Ver Factura</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection