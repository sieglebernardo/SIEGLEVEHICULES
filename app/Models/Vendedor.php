<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';

    protected $primaryKey = 'id_vendedor';

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'data_contratacao',
    ];
}
