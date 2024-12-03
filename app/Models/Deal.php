<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'deal_name', 
        'client_name', 
        'contact_number', 
        'email', 
        'date_approved', 
        'production_due_date', 
        'payment_method', 
        'cash', 
        'gcash', 
        'cash_gcash', 
        'date_closed', 
        'grand_price', 
        'status'
    ];

    // Define the relationship with the DealItem model
    public function items()
    {
        return $this->hasMany(DealItem::class);
    }
}
