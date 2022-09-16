<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura_Compra extends Model
{
    use HasFactory;

    protected $table = 'facturas_compras';

    protected $fillable = ['compra_id','factura_id'];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'factura_id');
    }

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }


}
