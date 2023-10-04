<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonneMorale extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function representant(){
        return $this->belongsTo(PersonnePhysique::class, 'representant_id');
    }
}
