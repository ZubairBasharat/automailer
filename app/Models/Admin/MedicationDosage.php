<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\MedicationDosage;
class MedicationDosage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'seo_medicamento_tipo';
    protected $fillable = ['tipo', 'estado', 'idmedicamento'];
    protected $hidden = [
        '_token'
    ];

}
