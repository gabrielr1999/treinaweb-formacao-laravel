<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    // Define o nome da tabela
    protected $table = 'cadend';

    // Define o nome da chave primária
    protected $primaryKey = 'cod';

    // Mapeando o relacionamento com funcionário
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'codigo_fun', 'cod');
    }
}
