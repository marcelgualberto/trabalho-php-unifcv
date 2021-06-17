<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>

   <h1>Editar Produto</h1>
   <div class="formulario">
            <form action="/produto/gravar/{{$produto ->id}}" method="post">
                @csrf
                <p>
                    <label for="descricao">Nome: </label>
                    <input type="text" name="descricao" id="descricao" value="{{$produto -> descricao}}"> 
                </p>
                <p>
                    <label for="valor">Valor: </label>
                    <input type="text" name="valor" id="valor" value="{{$produto -> valor}}">
                </p>
                <p>
                    <label for="quantidade">Quantidade: </label>
                    <input type="number" name="quantidade" id="quantidade" value="{{$produto -> quantidade}}">
                </p>
                <p class="botao">
                    <input type="submit" value="Editar">
                </p>
            </form>
        </div>

    
</body>
</html>