<?php

namespace App\Models;
use App\Dcs\Facades\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeVille extends Model
{
    use HasFactory;
    public function ce_providers()
    {
        return $this->hasMany(CeProvider::class);
    }
    public function ce_point_de_vents()
    {
        return $this->hasMany(CePointDeVent::class);
    }
    public function getLibelleAttribute()
    {
        return Helper::getFieldTranslated($this);
    }

}
