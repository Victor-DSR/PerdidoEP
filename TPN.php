<?php
include_once('codigo.php');
$dados = selecionarHistoria($_GET['id']);
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
    <div class="diarioExp scroll-area content" style="top: 15%;">
        <?php 
        echo $dados['descricao'] . "<br>"; 
        echo "<img src='IMG/" . $dados['IMG'] . "' alt='IMG'>";
        ?>
    </div>
    <div class="diarioExpD scroll-area content">
    <?php 
        echo $dados['historia']  . "<br>"; 
        echo $dados['inimigo']  . "<br>"; 
        echo "<img src='IMG/" . $dados['GIF'] . "' alt='IMG'>";
        ?>
    </div>
    <div class="botoes">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;"href="TJP.php">Voltar</a></button>
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