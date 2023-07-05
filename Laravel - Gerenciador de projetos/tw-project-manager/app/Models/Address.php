<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'cep', 'estado'];

    // Pertence a um funcionário
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
