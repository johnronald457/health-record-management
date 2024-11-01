<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    public $primaryKey = 'id';

    public $fillable = [
        'user_id', 
        'health_assessment_id', 
        'interpretation_comments',
        'recommendations',
        'prescriptions',
        'result_summary'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function health_assessment()
    {
        return $this->belongsTo(HealthAssessment::class);
    }
}
