<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
         'name',
         'cpf',
         'rg',
         'data_de_nascimento',
         'telefone',
         'local_nascimento'
    ];
    
}
