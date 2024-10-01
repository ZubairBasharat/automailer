<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class SeoAdministrator extends Authenticatable
{   use Notifiable;
    public $timestamps = false;
    protected $guard = 'admin';
    protected $table = 'seo_administrador';
    protected $fillable = ['usuario', 'password', 'nombres', 'email', 'estadoadm', 'apellidos'];
    protected $primaryKey = 'idadministrador';
    public $incrementing = true;
    protected $hidden = [
        'password', 'remember_token', '_token'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
