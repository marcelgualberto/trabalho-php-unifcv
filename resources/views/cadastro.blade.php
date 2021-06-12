<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Novo Usuário</title>
    </head>
    <style>
        body, .botao {
            text-align: center;
        }
        .formulario {
            margin: auto;
            width: 300px;
            height: 500px;
        }
        form {
            text-align: start;
        }
    </style>
    <body>
        <h1>Cadastrar Novo Produto</h1>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="formulario">
            <form action="/produto/salvar" method="post">
                @csrf
                <p>
                    <label for="descricao">Nome: </label>
                    <input type="text" name="descricao" id="descricao" value="{{ old('descricao') }}"> 
                </p>
                <p>
                    <label for="valor">Valor: </label>
                    <input type="text" name="valor" id="valor" value="{{ old('valor') }}">
                </p>
                <p>
                    <label for="quantidade">Quantidade: </label>
                    <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') }}">
                </p>
                <p class="botao">
                    <input type="submit" value="Cadastrar">
                </p>
            </form>
        </div>
    </body>
</html>