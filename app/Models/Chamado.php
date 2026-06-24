<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
   protected $fillable  = [
  
    'titulo',
    'descricao',
    'prioridade',
    'status',
    'responsavel_id',
    'setor'

   ];

    public function responsavel(){

    return $this->belongsTo(Responsavel::class);
    }
}