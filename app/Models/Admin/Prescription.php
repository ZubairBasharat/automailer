<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Prescription extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'seo_receta';
    protected $fillable = ['idusuario', 'anotaciones', 'idreserva'];
    public function user()
    {
        return $this->belongsTo(User::class, 'idusuario', 'id');
    }
}
