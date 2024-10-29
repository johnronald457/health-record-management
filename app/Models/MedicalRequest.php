<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRequest extends Model
{
    // use HasFactory;

    protected $fillable = [
        'patient_id',
        'preferred_date',
        'notes',
    ];

    // Define relationship if needed (assuming 'User' model exists)
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
