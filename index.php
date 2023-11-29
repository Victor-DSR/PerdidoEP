<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="auxiliar.css">
    <title>Login</title>
</head>
<body>
<div class="container">
<div id="loading">
    <img src="IMG/Papel.gif" alt="Carregando...">
</div>
    <form action="codigo.php" class="formulario" method="post">
    <div class="field">
        <label> Email </label>
        <input class="form-control" type="text" name="eml"/>
    </div>

    <div class="field">
        <label> Senha </label>
        <input class="form-control" type="password" name="snh"/>
    </div>

    <div class="botoesE" style="top: 45%; right: 68%;">
    <button class="botao-imagem" type="submit" name="login"> Fazer Anotações </button>
    </div>

     </form>
        <div class='botoesE' style="top: 45%; right: 53%;">
            <button class="botao-imagem"><a style="text-decoration: none;color: inherit;"href="TC.php">Novo Escritor</a></button>
        </div>
    </div>
</div>  
<script>
    setTimeout(function() {
      var loadingElement = document.getElementById('loading');
      loadingElement.parentNode.removeChild(loadingElement);
    }, 4000);
  </script>
</body>
</html>