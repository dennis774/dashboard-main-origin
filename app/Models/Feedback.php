<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'name',
        'feedback_type',
        'dish',
        'comments',
        'rating',
        'feedback_date',
        
    ];
    protected $casts = [
        'feedback_date' => 'datetime',
    ];
}
