<?php

namespace App\Models;

use App\Policies\ClientPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[UsePolicy(ClientPolicy::class)]
class Client extends Model
{
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    protected $fillable = [
        'name',
        'bussiness_id',
        'email',
        'password',
        'cpf',
        'rg',
        'phone'
    ];
}
