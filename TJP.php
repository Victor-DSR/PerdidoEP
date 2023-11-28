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
  <div class="diarioExp">
      <h1><?php echo $_SESSION['nome']; ?></h1>
      <h2><?php echo $_SESSION['email']; ?></h2>
      <p>Nível: <?php echo $_SESSION['nivel']; ?>/4 </p>
        <a style="text-decoration: none;color: inherit;"href="#.php">Pampa</a><br>
        <a style="text-decoration: none;color: inherit;"href="#.php">Mata Atlântica</a><br>
        <a style="text-decoration: none;color: inherit;"href="#.php">Caatinga</a><br>
        <a style="text-decoration: none;color: inherit;"href="#.php">Amazônia</a>
    </div>
    <div class="diarioExpD scroll-area content">
     <?php habilidadesJogador($_SESSION['idJog']); ?>
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