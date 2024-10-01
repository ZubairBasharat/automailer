<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoText extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'seo_texto';
    protected $primaryKey = 'idtexto';
    public $incrementing = true;
    protected $fillable= ['titulo', 'descripcion', 'tipo', 'seccion', 'email1', 'email2', 'telefono', 'icono', 'orden', 'subtitulo', 'meta_titulo', 'link'];
    protected $hidden = ['_token'];
}