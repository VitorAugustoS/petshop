@extends("templates.main")

@section("titulo", "Especie")

@section("formulario")
    <br />
    <h1>Cadastro de Especies</h1>
    <br />

    <form action="/especie" method="POST" class="row">
        <div class="form-group col-8">
            <label for="descricao">Especie:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $especie->descricao }}"/>
        </div>

        <div class="form-group col-4">
            @csrf
            <input type="hidden" name="id" value="{{ $especie->id }}" />

            <a href="/especie" class="btn btn-primary" style="margin-top: 23.25px;">
				<i class="bi bi-plus-square"></i>
				Novo
			</a>

            <button type="submit" class="btn btn-success" style="margin-top: 23.25px;">
				<i class="bi bi-save"></i>
				Salvar
			</button>
        </div>
    </form>
        
@endsection

@section("tabela")
    <br />
    <h1>Tabela das Especies</h1>
    <br />

    <table class="table table-striped"> 
        <colgroup>
            <col width="1000"></col>
            <col width="100"></col>
            <col width="100"></col>
        </colgroup>

        <thead>
            <tr>
                <th>Especie</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especies as $especie)
                <tr>
                    <td>{{ $especie->descricao }}</td>
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