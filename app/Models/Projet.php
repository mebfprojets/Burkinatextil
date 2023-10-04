<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function chiffre_daffaire_previsionnels(){
        return $this->hasMany(PrevisionChiffreDaffaire::class);
    }
    public function evaluation_financieres(){
        return $this->hasMany(EvaluationFinanciere::class);
    }
    public function porteur(){
        return $this->belongsTo(PersonnePhysique::class, 'personne_id');
    }
}
