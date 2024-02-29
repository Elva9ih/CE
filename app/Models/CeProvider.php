<?php

namespace App\Models;

use App\Dcs\Facades\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CeProvider extends Model
{
    use HasFactory;
    public function ce_type_provider()
    {
        return $this->belongsTo(CeTypeProvider::class);
    }
    public function ce_ville()
    {
        return $this->belongsTo(CeVille::class,'ville_id');
    }

    public function ce_point_de_vents()
    {
        return $this->hasMany(CePointDeVent::class,'point_vente_id');
    }
    public function ce_instance()
    {
        return $this->belongsTo(CeInstance::class);
    }
    public function ce_livreurs()
    {
        return $this->belongsToMany(CeLivreur::class, 'ce_provider_livreurs');
    }

    public function getLibelleAttribute()
    {
        return Helper::getFieldTranslated($this);
    }


}