<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listar produtos</title>
</head>
<style>
    body {
        text-align: center;
    }
    table {
        margin: auto;
    }
    button a {
        text-decoration: none;
        color: #000;
    }
</style>
<body>
	<h1>Listar produtos</h1>

	<button style="margin-bottom: 15px;">
        <a href="/produto/novo">Novo Usuário</a>
    </button>

	@if(session('mensagem'))
		<p>{{ session('mensagem') }}</p>
	@endif

	<table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
        @foreach ($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->descricao }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>R$ {{ $produto->valor }}</td>
                <td>
                    <a href="/produto/{{ $produto->id }}">Exibir</a>
                    <a href="/produto/editar/{{ $produto->id }}">Editar</a>
                    <a href="/produto/apagar/{{ $produto->id }}">Excluir</a>
                </td>
            </tr>
        @endforeach
	</table>

</body>
</html>