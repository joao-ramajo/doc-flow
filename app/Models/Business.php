<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
