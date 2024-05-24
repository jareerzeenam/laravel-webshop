<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public $casts = [
        'price' => MoneyCast::class,
        'amount_discount' => MoneyCast::class,
        'amount_tax' => MoneyCast::class,
        'amount_subtotal' => MoneyCast::class,
        'amount_total' => MoneyCast::class,
    ];


}
