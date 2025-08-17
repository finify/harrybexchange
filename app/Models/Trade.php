<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'buy_amount',
        'sell_amount',
        'transaction_id',
        'trade_type',
        'trade_name',
        'coin_id',
        'giftcard_id',
        'trade_details',
        'created_at',
        'updated_at'
    ];
}
