<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\MedicationDosage;

class Medication extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'seo_medicamento';
    protected $hidden = [
        '_token'
    ];
    protected $fillable = ['titulo', 'estado'];
    public function dosage()
    {
        return $this->hasMany(MedicationDosage::class, 'idmedicamento', 'id');
    }
}
