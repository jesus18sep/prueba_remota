@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">            
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
                        {{-- <th scope="col">Fecha de la compra</th>  --}}
                    </tr>
                    
                </thead>
                <tbody>
                    @foreach ($facturas_emitidas as $factura_emitida)
                    <tr>                        
                        <th scope="row">{{$factura_emitida->id}}</th>
                        <td>{{$factura_emitida->compra->producto->nombre}}</td>
                        <td>{{$factura_emitida->compra->producto->precio}}</td>
                        <td>{{$factura_emitida->compra->producto->impuesto}}</td>
                        {{-- <td>{{$factura_g->compra_factura->created_at}}</td>                             --}}
                    </tr>                    
                    @endforeach
                </tbody>
                <tbody>
                    
                    <tr align="center" style="margin: 0px auto;">                        
                        <th class="table-light" colspan="2">Montos</th>
                        <th>Montal total: {{$resultadoPrecio}}</th>                          
                        <th>Impuesto total: {{$resultadoImpuesto}}</th>
                    </tr>                    
                    <tr align="center" style="margin: 0px auto;">
                        <th class="table-light" colspan="2">Resultado Final</th>
                        <th colspan="2">Total: {{$resultadoPrecioFinal}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection