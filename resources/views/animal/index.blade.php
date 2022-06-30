@extends("templates.main")

@section("titulo", "Animais")

@section("formulario")
    <br />
    <h1>Cadastro Animal</h1>
    <br />

    <form action="/animal" method="post" class="row">
        <div class="form-group col-6">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" />
        </div>

        <div class="form-group col-6">
            <label for="nome_dono">Dono:</label>
            <input type="text" name="nome_dono" id="nome_dono" class="form-control" />
        </div>

        <div class="form-group col-6">
            <label for="raca">Raça:</label>
            <input type="text" name="raca" id="raca" class="form-control" />
        </div>

        <div class="form-group col-6">
            <label for="especie_id">Especie:</label>
            <select name="especie_id" id="especie_id" class="form-control" required>
                @foreach ($especies as $especie)
                    <option value="{{ $especie->id }}" @if ($especie->id == $animal->especie_id) selected @endif>{{ $especie->descricao }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-6">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" />
        </div>

        <div class="form-group col-4">
            @csrf
            <input type="hidden" name="id" value="{{ $animal->id }}" />
            <a href="/animal" class="btn btn-primary" style="margin-top: 24.25px;">
                <i class="bi bi-plus-square"></i>
                Novo
            </a>

            <button type="submit" class="btn btn-success" style="margin-top: 24.25px;">
                <i class="bi bi-save"></i>
                Salvar
            </button>
        </div>
    </form>
@endsection

@section("tabela")
<br />
    <h1>Tabela de Animais</h1>
    <br />

    <table class="table table-striped"> 
        <colgroup>
            <col width="300"></col>
            <col width="300"></col>
            <col width="300"></col>
            <col width="100"></col>
            <col width="100"></col>
        </colgroup>

        <thead>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Espécie</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animals as $animal)
                <tr>
                    <td>{{ $animal->nome }}</td>
                    <td class="td_idade" id="idade">{{ $animal->data_nascimento }}</td>
                    <td>{{ $animal->nome_especie }}</td>
                    <td>
                        <a href="/especie/{{ $especie->id }}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="/especie/{{ $especie->id }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                                Del
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<script>

    /*function calcular_idade($nasc){
        
        $data = explode("-", $nasc);
        $anoAtual = date('y');
        $idade = $anoAtual - $data[0];
        
        return $idade;
    }

    document.addEventListener("DOMContentLoaded", function() {
		
	});

    function myFunction() {
        var x = document.getElementById("idade").value;
        var data = explode('-', x);
        var atual = date('y');
        document.getElementById("idade").val(atual - data[0]).;
    }*/
</script>