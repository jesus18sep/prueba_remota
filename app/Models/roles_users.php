<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles_users extends Model
{
    protected $table = 'role_user';

    protected $fillable = ['role_id','user_id',];

    use HasFactory;

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function roles_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
