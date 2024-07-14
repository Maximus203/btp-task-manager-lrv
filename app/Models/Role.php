<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'idRole'; // Définition de la clé primaire personnalisée

    protected $fillable = [
        'nomRole',
        // Autres attributs
    ];

    // Définissez les relations ici
    public function users()
    {
        return $this->hasMany(User::class, 'idRole');
    }
}
