<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoBanner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $hidden = ['_token'];
    protected $fillable = [
        "titulo",
        "link",
        "estado",
        "orden",
        "tipo",
        'foto',
        "archivo",
        "texto1",
        "texto2",
        "link2",
    ];
}
