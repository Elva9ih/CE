<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeInstance extends Model
{
    use HasFactory;
    public function ce_provider()
    {
        return $this->hasOne(CeProvider::class);
    }
}
