<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public $timestamps = false;
    protected $table = 'inventory';
    protected $fillable = [
        'id', 'productName', 'quantity', 'price', 'message',
    ];

    public static function getLowInventoryProducts($threshold = 10)
    {
        return Inventory::where('quantity', '<', $threshold)->get();
    }
}
