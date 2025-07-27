<!DOCTYPE html>
<html>
<head>
<title>Deputados</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<h1>Deputados</h1>
<a href="{{ route('deputados.sync') }}" class="btn btn-primary mb-3">Sincronizar Dados</a>
<form method="GET" class="mb-3">
<div class="row">
<div class="col">
<input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ request('nome') }}">
</div>
<div class="col">
<input type="text" name="partido" class="form-control" placeholder="Partido" value="{{ request('partido') }}">
</div>
<div class="col">
<button type="submit" class="btn btn-secondary">Filtrar</button>
</div>
</div>
</form>
<table class="table">
<thead>
<tr>
<th>Nome</th>
<th>Partido</th>
<th>UF</th>
<th>Ações</th>
</tr>
</thead>
    <tbody>
@foreach ($deputados as $deputado)
    <tr>
    <td>{{ $deputado->nome }}</td>
    <td>{{ $deputado->partido }}</td>
    <td>{{ $deputado->uf }}</td>
    <td>
    <a href="{{ route('deputados.show', $deputado) }}" class="btn btn-info btn-sm">Ver Despesas</a>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
{{ $deputados->links() }}
</div>
</body>
</html>
