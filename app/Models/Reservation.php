<?php

namespace App\Models;
use App\Models\User;
use App\Models\Admin\Prescription;
use App\Models\Admin\PrescriptionDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'seo_reservas';
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario', 'id');
    }
    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'id', 'idreserva');
    }
    public function prescriptions()
    {
        return $this->hasManyThrough(prescriptionDetail::class, Prescription::class, 'idreserva', 'idreceta');
    }
    public function getPrescriptionCount()
    {
        return $this->prescription()->count();
    }
}
