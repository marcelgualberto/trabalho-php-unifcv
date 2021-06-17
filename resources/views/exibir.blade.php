<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exibir Produto</title>
    </head>
    <style>
        body {
            text-align: center;
            font-size: 20px;
        }
        .box {
            background-color: lightgrey;
            width: 500px;
            height: 300px;
            margin: auto;
            border-radius: 5px;
        }
        .content {
            padding: 20px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        button {
            font-size: 18px;
        }
    </style>
    <body>
        <div class="box">
            <div class="content">
                <p>
                    Código: <strong>{{ $produto->id }}</strong>
                </p>

                <p>
                    Nome do produto: <strong>{{ $produto->descricao }}</strong>
                </p>

                <p>
                    Quantidade: <strong>{{ $produto->quantidade }}</strong>
                </p>
                <p>
                    Valor: <strong>R$ {{ $produto->valor }}</strong>
                </p>

                <button>
                    <a href="/produtos">Voltar</a>
                </button>
            </div>
        </div>
    </body>
</html>