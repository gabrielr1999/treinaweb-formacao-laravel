<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    
    // Define o nome da tabela
    protected $table = 'cadfun';

    // Define o nome da chave primária
    protected $primaryKey = 'cod';

    // Define as colunas de timestamp
    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';

    // Mapeando o relacionamento com endereço
    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'codigo_fun', 'cod');
    }
}
