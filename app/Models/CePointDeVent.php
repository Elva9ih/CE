<?php

namespace App\Models;
use App\Dcs\Facades\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CePointDeVent extends Model
{
    use HasFactory;
    public function ce_provider()
    {
        return $this->belongsTo(CeProvider::class);
    }
    public function ce_ville()
    {
        return $this->belongsTo(CeVille::class);
    }
    public function ce_livreurs()
    {
        return $this->belongsToMany(CeLivreur::class, 'ce_livreur_point_de_vents');
    }
    public function getLibelleAttribute()
    {
        return Helper::getFieldTranslated($this);
    }

}
