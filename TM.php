<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="auxiliar.css">
  <title>Perdido em Pindorama</title>
</head>
<body style="background-image: url(IMG/FP.gif);">

  <div id="loading">
    <img src="IMG/Papel.gif" alt="Carregando...">
  </div>

  <div class="container">
    <div class="central">
      <h1>Perdido Em Pindorama</h1>
    </div>
    <div class="diarioExp" style="width: 30%; height: auto; top: 30%; left: 40%;">
    <img src="IMG/TGif.gif" alt="Gif de Teste">
    </div>
    <div class="diarioExpD" style="width: 20%; height: auto; top: 40%;">
    <img src="IMG/CM.gif" alt="Gif de Teste">
    </div>
    <div class="botoes">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;"href="SHJ1.php">Novo Jogo</a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;"href="TJP.php">Diario de Experiencia</a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;"href="TJ.php">Diario Pessoal</a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;"href="TR.php">Lista de Aventureiros</a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;"href="sair.php">Fechar Diario</a></button>
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
