<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Table name (optional if Laravel naming convention followed)
    protected $table = 'orders';

    // Mass assignable fields (fillable)
    protected $fillable = [
        'farmer_id',
        'paddy_id',
        'product_name',
        'stock_manager_id',
        'quantity',
        'payment_method',
        'price',
        'status',
        'rejection_reason',
        'cancellation_reason',
    ];

    /**
     * User who placed the order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Paddy product ordered
     */

public function paddy()
{
    return $this->belongsTo(Paddy::class, 'paddy_id', 'paddy_id'); 
    // Assuming Paddy primary key is 'paddy_id'
}


}
