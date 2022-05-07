<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }

    public function hasEnoughCoins()
    {
        return $this->wallet->coins >= config('constants.VALUES.COMPANY.COINS_PER_CONTACT');
    }

    public function chargeCoins()
    {
        return $this->wallet->chargeCoins(config('constants.VALUES.COMPANY.COINS_PER_CONTACT'));
    }
}
