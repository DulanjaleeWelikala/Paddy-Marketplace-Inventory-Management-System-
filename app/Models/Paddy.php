<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Paddy extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'paddy_id';
    protected $keyType = 'string';


    protected $fillable = [
        'paddy_id',
        'product_name',
        'description',
        'price',
        'quantity',
        'badge',
        'image',
        'added_by',
    ];

   public function user()
{
    return $this->belongsTo(User::class, 'added_by');
}


public function orders()
{
    return $this->hasMany(Order::class, 'paddy_id', 'paddy_id');
}




}
