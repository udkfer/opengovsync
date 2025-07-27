<!DOCTYPE html>
<html>
<head>
<title>Despesas de {{ $deputado->nome }}</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<h1>Despesas de {{ $deputado->nome }}</h1>
<a href="{{ route('deputados.index') }}" class="btn btn-secondary mb-3">Voltar</a>
<table class="table">
<thead>
<tr>
<th>Tipo</th>
<th>Valor</th>
<th>Data</th>
<th>Fornecedor</th>
</tr>
</thead>
    <tbody>
@foreach ($despesas as $despesa)
    <tr>
    <td>{{ $despesa->tipo_despesa }}</td>
    <td>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</td>
    <td>{{ $despesa->data ? $despesa->data->format('d/m/Y') : '-' }}</td>
    <td>{{ $despesa->fornecedor }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
{{ $despesas->links() }}
</div>
</body>
</html>
