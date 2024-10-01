<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Admin\MedicationDosage;
use App\Models\Admin\Medication;

class PrescriptionDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'seo_receta_detalle';
    protected $fillable = ['idtipo', 'idmedicamento', 'dosis', 'idreceta'];
    public function medication()
    {
        return $this->belongsTo(Medication::class, 'idmedicamento', 'id');
    }
    
    public function medicationDosage()
    {
        return $this->belongsTo(MedicationDosage::class, 'idtipo', 'id');
    }
}