<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoBlog extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'seo_blog';
    protected $fillable= ['titulo','seourl','detalle', 'resumen', 'archivo', 'estado', 'meta_titulo', 'meta_descripcion'];
    protected $hidden = ['_token'];
}
