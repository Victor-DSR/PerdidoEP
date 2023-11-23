<?php
include_once('codigo.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="auxiliar.css">
  <title>Perdido em Pindorama</title>
</head>
<body>

  <div id="loading">
    <img src="IMG/Papel.gif" alt="Carregando...">
  </div>

  <div class="container">
    <div class="diarioExp scroll-area contentE">
      <?php 
        $dados = selecionarJogadores(); 
        $i = 1;
          foreach ($dados as $jogadores) {
            echo $i . "° Lugar: " . $jogadores['nome'] . " - " . $jogadores['pontos'] . "<br>";
            $i++;
          }
      ?>
    </div>
    <div class="diarioExpD" style="top: 10%;">
    <h2>Perdido Em Pindorama</h2>
      <img src="IMG/TGif.gif" alt="Gif de Teste">
    </div>
    <div class="botoes">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;"href="TM.php">Voltar</a></button>
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