<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function fees()
    {
        return $this->hasMany(CptCode::class);
    }
}
