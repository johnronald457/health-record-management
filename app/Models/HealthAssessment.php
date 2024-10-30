<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthAssessment extends Model
{
    public $primaryKey = 'id';

    public $fillable = [
        'user_id', 
        'medical_conditions', 
        'medical_history', 
        'height',
        'weight',
        'blood_pressure',
        'heart_rate',
        'symptoms',
        'allergies'
    ];
    
}
