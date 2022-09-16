<?php

namespace App\Http\Controllers;
use App\Models\Factura;
use App\Models\Factura_Compra;
use App\Models\Compra;
use App\Models\User;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $facturas = Factura::all();
        return view ('factura.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $facturas = Factura::all();
        $clientes = User::join("compras", "users.id", "=","compras.user_id")->where('status','=',0)->distinct()->get(['users.name','users.id']);
        $compras  = Compra::where('status','=','0')->get();        
        return view('factura.create',compact('clientes','compras','facturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        
        $usuario=$_POST['usuario'];
        $aleas = date('M-d-y');
        $compras = Compra::where('status','=','0')->where('user_id','=',$usuario)->get();
        $factura = Factura::create(['aleas_factura'=>$aleas]);
        
        foreach($compras as $compra){            
            Factura_Compra::create([
                'compra_id' => $compra->id,
                'factura_id'=> $factura->id]); 
        Compra::where('status','=','0')->where('user_id','=',$usuario)->update(['status'=>1]);           
        }
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        $users = User::join("compras", "users.id", "=","compras.user_id")
        ->join("facturas_compras","compras.id","=","facturas_compras.compra_id")
        ->where('compras.status','=',1)
        ->where('facturas_compras.factura_id','=',$factura->id)
        ->distinct()->get(['users.name','users.id']);

        $facturas_emitidas = Factura_Compra::where('factura_id','=',$factura->id)->get();

        $precio= Factura_Compra::join("compras","facturas_compras.compra_id","=","compras.id")
        ->join("productos","compras.producto_id","=","productos.id")
        ->where('facturas_compras.factura_id','=',$factura->id)
        ->get(['productos.precio']);

        $resultadoPrecio=  round($precio->sum('precio'));

        $precioTotal= Factura_Compra::join("compras","facturas_compras.compra_id","=","compras.id")
        ->join("productos","compras.producto_id","=","productos.id")
        ->where('facturas_compras.factura_id','=',$factura->id)
        ->selectRaw('productos.precio * productos.impuesto / 100 + productos.precio as resultado')
        ->get(['resultado']);        
        $resultadoPrecioFinal = round($precioTotal->sum('resultado'),2);

        $impuestoTotal= Factura_Compra::join("compras","facturas_compras.compra_id","=","compras.id")
        ->join("productos","compras.producto_id","=","productos.id")
        ->where('facturas_compras.factura_id','=',$factura->id)
        ->selectRaw('productos.precio * productos.impuesto / 100 as resultado')
        ->get(['resultado']);

        $resultadoImpuesto = round($impuestoTotal->sum('resultado'),2);

        //echo $resultadoPrecioFinal;

        return view('factura.show',compact('facturas_emitidas','users','precio','resultadoPrecio', 'resultadoPrecioFinal', 'resultadoImpuesto'));

    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
