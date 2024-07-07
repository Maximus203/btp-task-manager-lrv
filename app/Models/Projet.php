<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
    'nomProjet',
    'description',
    'dateDeDebut',
    'dateDeFin',
    'budget',
    'status',
    'chefProjet',
    'client',
    'projet_ouvrier',
    ];

    public function chefDeProjet(){
        return $this->belongsTo(User::class, 'chefProjet');
    }
    public function client(){
        return $this->belongsTo(User::class, 'client');
    }
    public function ouvriers(){
        return $this->belongsToMany(User::class, 'projet_ouvrier')->withPivot('idRole');
    }
}
