<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnPaddy extends Model
{
    use HasFactory;

    protected $table = 'return_paddies';

    protected $fillable = [
        'paddy_id',
        'product_name',
        'quantity',
        'reason',
        'return_date',
    ];


    public function paddy()
    {
        return $this->belongsTo(Paddy::class);
    }
}
