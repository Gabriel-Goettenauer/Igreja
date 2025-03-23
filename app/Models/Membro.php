<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'cpf', 'data_nascimento', 'email', 'telefone', 'logradouro', 'cidade', 'estado', 'igreja_id'
    ];

    public function igreja()
    {
        return $this->belongsTo(Igreja::class);
    }
}
