<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'deal_id', 
        'description', 
        'quantity', 
        'unit_price', 
        'total_price'
    ];

    // Define the inverse relationship with the Deal model
    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
