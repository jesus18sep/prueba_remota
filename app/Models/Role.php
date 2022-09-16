<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['nombre','descripcion',];

    use HasFactory;

    public function roles()
    {
        return $this->hasMany(roles_users::class, 'role_id');
    }
}
