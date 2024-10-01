<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\DayOfWeek;
class TimeSlot extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'seo_rangos';
    protected $fillable = ['day', 'texto', 'estado'];
    protected $casts = [
        'day' => DayOfWeek::class,
    ];
}