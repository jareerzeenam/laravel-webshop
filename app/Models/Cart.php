<?php

namespace App\Models;

use App\Enums\CurrencyEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Money\Currency;
use Money\Money;

class Cart extends Model
{
    use HasFactory;

    protected function total(): Attribute
    {
        return Attribute::make(
            get: function(){
                return $this->items->reduce(
                    function(Money $total, CartItem $item){
                        return $total->add($item->subtotal);
                    },
                    new Money(0, new Currency(CurrencyEnum::GBP->value))
                );
            }
        );
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
