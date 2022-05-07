<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function chargeCoins($count)
    {
        if ($this->coins >= $count) {
            $this->coins = $this->coins - $count;
            $this->save();
        } else {
            throw new Exception('Not enough coins!');
        }
    }
}
