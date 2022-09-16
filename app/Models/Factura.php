<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';

    protected $guarded = ['id'];

    protected $fillable = ['aleas_factura'];

    public function factura()
    {
        return $this->hasMany(Factura_Compra::class, 'factura_id');
    }
}
