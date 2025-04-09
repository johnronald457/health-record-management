<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifyStudent extends Model
{
    use HasFactory;

    // Define the table associated with the model
    // protected $table = 'notify_students';

    protected $fillable = [
        'patient_id',
        'target_date',
        'description',
        'decision',
        'contact_no',
    ];

    // Optionally define any casts for the attributes (e.g., date casting)
    protected $casts = [
        'target_date' => 'date', // If you want the 'target_date' to be cast as a date
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
