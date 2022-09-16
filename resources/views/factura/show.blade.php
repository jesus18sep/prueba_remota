@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">            
            <table class="table table-bordered">
                <div class="card">
                    <nav class="navbar navbar-dark bg-dark">
                        <div class="container-fluid">
                            <span class="navbar-text">
                                Cliente:<strong> {{$users[0]['name']}}</strong>
                            </span>
                            {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#comprar">+Generar Factura</button> --}}
                            {{--    <a class="btn btn-primary btn-sm" href="{{ route('facturas.create') }}">+Generar Factura</a> --}}
                        </div>
                    </nav>
                </div>
                <thead class="table-light">
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Producto</th> 
                        <th scope="col">Precio</th>
                        <th scope="col">Impuesto %</th>
                    </tr>
                    @foreach ($facturas_emitidas as $factura_emitida)
                    <tr>
                        <td>{{$factura_emitida->id}}</td>
                        <td>{{$factura_emitida->compra->producto->nombre}}</td>
                        <td>{{$factura_emitida->compra->producto->precio}}</td>
                        <td>{{$factura_emitida->compra->producto->impuesto}}</td> 
                    </tr>
                    @endforeach
                    <tr>
                        <th scope="col">Monto Total</th>
                        <td>{{$resultadoPrecio}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">Impuesto Total</th>
                        <td>{{$resultadoImpuesto}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">Total</th>
                        <td>{{$resultadoPrecioFinal}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>           
            </table>
        </div>
    </div>
</div>


@endsection