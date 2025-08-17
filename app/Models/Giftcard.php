<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giftcard extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_name',
        'sell_price',
        'buy_price',
        'card_image',
    ];
}
