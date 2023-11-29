<?php
include_once('codigo.php');
$_SESSION['nivel'] = 4;
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
        <?php switch ($_SESSION['nivel']) {
    case 0:
        echo "Você ainda não possui nível.";
        break;
    case 1:
        echo "<a style='text-decoration: none;color: inherit;'href='PT.php'>Pampa</a><br>";
        break;
    case 2:
        echo "<a style='text-decoration: none;color: inherit;'href='PT.php'>Pampa</a><br>";
        echo "<a style='text-decoration: none;color: inherit;'href='MAP.php'>Mata Atlântica</a><br>";
        break;
    case 3:
        echo "<a style='text-decoration: none;color: inherit;'href='PT.php'>Pampa</a><br>";
        echo "<a style='text-decoration: none;color: inherit;'href='MAP.php'>Mata Atlântica</a><br>";
        echo "<a style='text-decoration: none;color: inherit;'href='CP.php'>Caatinga</a><br>";
        break;
    case 4:
      echo "<a style='text-decoration: none;color: inherit;'href='PT.php'>Pampa</a><br>";
      echo "<a style='text-decoration: none;color: inherit;'href='MAP.php'>Mata Atlântica</a><br>";
      echo "<a style='text-decoration: none;color: inherit;'href='CP.php'>Caatinga</a><br>";
        echo "<a style='text-decoration: none;color: inherit;'href='AMP.php'>Amazônia</a><br>";
        break;
}
        ?>
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