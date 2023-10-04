<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnePhysique extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function represente(){
        return $this->hasOne(PersonneMorale::class,'representant_id');
    }
}
