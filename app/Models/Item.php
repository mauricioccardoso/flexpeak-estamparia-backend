<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['order_id', 'name', 'category', 'quantity', 'url'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
