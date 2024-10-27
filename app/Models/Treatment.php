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
        'recommendation',
        'result_summary'
    ];
}
