<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRequest extends Model
{
    // use HasFactory;

    protected $fillable = [
        'patient_id',
        'request_type',
        'description',
        'status',
        'priority',
        'preferred_date',
        'schedule_date',
        'test_date',
        'doctor_name',
        'file_path',
        'findings',
        'doctor_comments',
        'AI_comments',
        'condition',
    ];

    // Define relationship if needed (assuming 'User' model exists)
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    // Define relationship if needed (assuming 'Treatment' model exists)
    public function treatments()
    {
        return $this->hasMany(Treatment::class, 'medical_request_id');
    }
}
