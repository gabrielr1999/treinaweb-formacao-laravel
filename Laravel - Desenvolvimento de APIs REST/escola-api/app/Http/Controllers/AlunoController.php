<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Response;
use App\Http\Requests\AlunoRequest;
use App\Http\Resources\AlunoColecao;
use App\Http\Resources\AlunoUnico;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use SimpleXMLElement;

class AlunoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/alunos",
     *     summary="Lista os alunos cadastrados",
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     * 
     * Display a listing of the resource.
     *
     * @return AlunoColecao
     */
    public function index(Request $request): AlunoColecao
    {
        if ($request->query('relacoes') === 'turma'){
            $alunos = Aluno::with('turma')->paginate(2);
        } else {
            $alunos = Aluno::paginate(2);
        }


        // $aluno = Aluno::with($request)->get();
        // $aluno = Aluno::get()->makeHidden('turma_id');
        // $aluno = Aluno::get()->makeVisible('created_at');

        return new AlunoColecao($alunos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AlunoRequest $request
     * @return Response
     */
    public function store(AlunoRequest $request): Response
    {
        $dadosAluno = $request->all();

        return response(Aluno::create($dadosAluno), 201);
        
    }

    /**
     * @OA\Get(
     *     path="/api/alunos/{id}",
     *     summary="Mostra os detalhes de um aluno",
     *     @OA\Parameter(
    *         description="Parameter with mutliple examples",
    *         in="path",
    *         name="id",
    *         required=true,
    *         @OA\Schema(type="string"),
    *         @OA\Examples(example="int", value="1", summary="Um valor inteiro."),
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="OK"
    *     )
     * )
     * 
     * Display the specified resource.
     *
     * @param  Aluno $aluno
     * @return AlunoUnico
     */
    public function show(Aluno $aluno)
    {
        if (request()->header("Accept") === "application/xml") {
            return $this->pegarAlunoXMLResponse($aluno);
        }

        if (request()->wantsJson()) {
            return new AlunoUnico($aluno);
        }

        return response('Formato de dado desconhecido');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AlunoRequest $request
     * @param  Aluno $aluno
     * @return Aluno
     */
    public function update(AlunoRequest $request, Aluno $aluno): Aluno
    {
        $aluno->update($request->all());

        return $aluno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Aluno $aluno
     * @return array
     */
    public function destroy(Aluno $aluno)
    {
       $aluno->delete();

       return [];
    }

    /**
     * Retorna uma response com xml do aluno
     *
     * @param Aluno $aluno
     * @return Response
     */
    private function pegarAlunoXMLResponse(Aluno $aluno): Response
    {
        $aluno = $aluno->toArray();

        $xml = new SimpleXMLElement('<aluno/>');

        array_walk_recursive($aluno, function ($valor, $chave) use ($xml) {
            $xml->addChild($chave, $valor);
        });

        return response($xml->asXML())
            ->header('Content-Type', 'application/xml');
    }
}
