<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $table = 'resposanavel';

    protected $fillable = [
        'nome'
    ];

    public function chamados()
    {
        return $this->hasMany(Chamado::class);
    }
}