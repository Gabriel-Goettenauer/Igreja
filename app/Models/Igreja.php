<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Igreja extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 'endereco', 'website', 'foto_igreja'
    ];

    
    public function membros()
    {
        return $this->hasMany(Membro::class);
    }
}
