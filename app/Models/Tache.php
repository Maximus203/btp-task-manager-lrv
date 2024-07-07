<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $fillable = ['nomTache','description', 'dateLimite', 'responsable', 'idProjet', 'status'];

    public function responsable(){
        return $this->belongsTo(User::class, 'responsable');
    }
    public function projet(){
    return $this->belongsTo(Projet::class, 'idProjet');
    }
}
