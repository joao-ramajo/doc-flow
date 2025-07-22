<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    public function owner():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function client():BelongsTo{
        return $this->belongsTo(Client::class);
    }
}
