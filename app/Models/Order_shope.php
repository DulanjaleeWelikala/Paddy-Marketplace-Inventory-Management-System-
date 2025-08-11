<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_shope extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'paddy_id',
        'quantity',
        'status',
        'invoice_path',
    ];

    // Relationship to Admin (User)
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    // Relationship to Paddy
    public function paddy()
    {
        return $this->belongsTo(Paddy::class);
    }
}
