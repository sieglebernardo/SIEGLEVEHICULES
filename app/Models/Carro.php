<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;

    protected $table = 'carros';
    protected $primaryKey = 'id_carro';

    protected $fillable = [
        'id_compra',
        'marca',
        'modelo',
        'ano',
        'cor',
        'placa',
        'preco',
        'status',
        'kilometragem',
        'renavam',
        'tipo_combustivel',
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'id_compra', 'id_compra');
    }
}
