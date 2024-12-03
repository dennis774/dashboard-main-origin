<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UddesignFeedback extends Model
{
    use HasFactory;

    protected $table = 'uddesign_feedback';

    protected $fillable = [
        'name',
        'feedback_type',
        'product_name',
        'comments',
        'rating',
        'feedback_date',
        
    ];
    protected $casts = [
        'feedback_date' => 'datetime',
    ];


}
