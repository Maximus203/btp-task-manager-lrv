<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $primaryKey = 'idTache';
    protected $fillable = ['nomTache', 'description', 'dateDeDebut', 'dateDeFin', 'ouvrier', 'budget', 'idProjet', 'statut'];

    public function responsable()
    {
        return $this->belongsTo(User::class, 'ouvrier');
    }
    public function projet()
    {
        return $this->belongsTo(Projet::class, 'idProjet');
    }
}
