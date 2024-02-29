<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Dcs\Facades\Helper;


class CeLivreur extends Model
{
    use HasFactory;
    public function ce_providers()
    {
        return $this->belongsToMany(CeProvider::class, 'ce_provider_livreurs');
    }

    public function ce_point_de_vents()
    {
        return $this->belongsToMany(CePointDeVent::class, 'ce_livreur_point_de_vents');
    }

    public function ce_type_vehicule()
    {
        return $this->belongsTo(CeTypeVehicule::class,'vehicule_id');
    }
    public function getLibelleAttribute()
    {
        return Helper::getFieldTranslated($this);
    }

}
