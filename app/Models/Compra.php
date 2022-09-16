<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';

    protected $fillable = ['producto_id','user_id','status'];

    public function producto()
    {
        return $this->belongsto(producto::class, 'producto_id');
    }

    public function user()
    {
        return $this->belongsto(user::class, 'user_id');
    }

    public function compra()
    {
        return $this->belongsTo(Factura_compra::class, 'compra_id');
    }
}
