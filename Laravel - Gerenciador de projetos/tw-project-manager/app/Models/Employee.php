<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * Defino o que vai ser permitido
     */
    protected $fillable = ['nome', 'cpf', 'data_contratacao', 'data_demissao'];

    /**
     * Defino o que não vai ser permitido
     */
    //protected $guarded = ['created_at', 'updated_at', 'id'];

    /**
     * Permite tudo
     */
    //protected $guarded = [];

    /**
     * Define a relação com endereço
     * Um funcioanrio tem um endereço
     *
     * @return void
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Define a relação com projetos
     * Um funcionario pertence a muitos projetos
     *
     * @return void
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_project', 'employee_id', 'project_id');
    }

    /**
     * Retorna os funcionários ativos
     *
     * @return void
     */
    static public function ativos()
    {
        return Employee::where('data_demissao', null)->get();
    }
}
