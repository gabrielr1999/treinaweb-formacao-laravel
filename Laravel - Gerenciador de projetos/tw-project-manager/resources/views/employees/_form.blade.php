@csrf
<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input required value="{{ old('nome', $employee->nome ?? '') }}" type="text" class="form-control" id="nome" name="nome" maxlength="100" placeholder="Digite o nome">
</div>
<div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input required value="{{ old('cpf', $employee->cpf ?? '') }}" type="text" class="form-control" id="cpf" name="cpf" data-mask="000.000.000-00" placeholder="Digite o CPF">
</div>
<div class="mb-3">
<label for="data_contratacao" class="form-label">Data Contratação</label>
    <input required value="{{ old('data_contratacao', isset($employee->data_contratacao) ? date_to_br($employee->data_contratacao) : '' ) }}" type="text" class="form-control" id="data_contratacao" name="data_contratacao" data-mask="00/00/0000" placeholder="Digite a Data Contratação">
</div> 


<div class="row mb-2">
    <div class="col-md-4">
        <div class="form-group">
            <label for="logradouro">Logradouro</label>
            <input required value="{{ old('logradouro', $employee->address->logradouro ?? '') }}"  class="form-control" type="text" name="logradouro" maxlength="255" id="logradouro" placeholder="Digite o logradouro">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="numero">Número</label>
            <input required value="{{ old('numero', $employee->address->numero ?? '') }}" class="form-control" type="text" name="numero" id="numero" maxlength="20" placeholder="Digite o número">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="complemento">Complemento</label>
            <input value="{{ old('complemento', $employee->address->complemento ?? '') }}" class="form-control" type="text" name="complemento" id="complemento" maxlength="50" placeholder="Digite o complemento">
        </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-md-3">
        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input required value="{{ old('bairro', $employee->address->bairro ?? '') }}"  class="form-control" type="text" name="bairro" id="bairro" maxlength="50" placeholder="Digite o bairro">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input required value="{{ old('cidade', $employee->address->cidade ?? '') }}" class="form-control" type="text" name="cidade" id="cidade" maxlength="50" placeholder="Digite a cidade">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="cep">CEP</label>
            <input required value="{{ old('cep', $employee->address->cep ?? '') }}" class="form-control" type="text" name="cep" id="cep" data-mask="00000-000" placeholder="Digite o CEP">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="estado">Estado</label>
            <input required value="{{ old('estado', $employee->address->estado ?? '') }}" class="form-control" type="text" name="estado" id="estado" data-mask="SS" placeholder="Digite o estado">
        </div>
    </div>
</div>

<button class="btn btn-success" type="submit">Enviar</button>