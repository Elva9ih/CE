<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Dcs\Facades\Helper;

class CeTypeVehicule extends Model
{
    use HasFactory;
    public function ce_livreurs()
    {
        return $this->hasMany(CeLivreur::class);
    }
    public function getLibelleAttribute()
    {
        return Helper::getFieldTranslated($this);
    }
}