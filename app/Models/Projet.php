<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{

    // Définir la clé primaire
    protected $primaryKey = 'idProjet';

    // Permet de spécifier si la clé primaire est autoincrementée
    public $incrementing = true;
    use HasFactory;
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
        return $this->belongsToMany(User::class, 'projet_ouvrier')->withPivot('idRole');
    }
}
