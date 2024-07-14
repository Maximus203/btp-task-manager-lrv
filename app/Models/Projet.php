<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{

    use HasFactory;
    protected $primaryKey = 'idProjet';

    protected $fillable = [
        'nomProjet',
        'description',
        'dateDeDebut',
        'dateDeFin',
        'budget',
        'statut',
        'chefProjet',
        'client',
        'projet_ouvrier',
    ];

    public function chefDeProjet()
    {
        return $this->belongsTo(User::class, 'chefProjet');
    }
    public function clientProjet()
    {
        return $this->belongsTo(User::class, 'client');
    }
    public function ouvriers()
    {
        return $this->belongsToMany(User::class, 'projets_ouvriers')->withPivot('idRole');
    }
}
