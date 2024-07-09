<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetOuvrier extends Model
{
    use HasFactory;
    protected $table = 'projets_ouvriers';
    protected $fillable = ['idProjet', 'ouvrier'];

    public function ouvriers()
    {
        return $this->belongsToMany(User::class, 'projets_ouvriers', 'idProjet', 'ouvrier')->withPivot('idRole');
    }
}
