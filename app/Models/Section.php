<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'seo_seccion';
    protected $primaryKey = 'idseccion';
    public $incrementing = true;
    protected $fillable= ['titulo', 'detalle', 'estado', 'seccion', 'orden', 'seodetalle', 'tipo', 'foto', 'resumen', 'seourl', 'meta_titulo', 'costo'];
}