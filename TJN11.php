<?php
include_once('codigo.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["habilidade"])) {
        $habilidades = $_POST["habilidade"];
        $i = 0;
        foreach ($habilidades as $habilidade) {
            $i++;
            $_SESSION["H$i"] = $habilidade."<br>";
        }
    } else {
        habilidadesJogadorNW($_SESSION['idJog']);
    }
}

/*echo $_SESSION['H1'] . "<br>";
echo $_SESSION['H2'] . "<br>";
echo $_SESSION['H3'] . "<br>";*/
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
  <div class="botoesE">
      <button class="botao-imagem"><?php echo $_SESSION['H1'] ?></button>
      <button class="botao-imagem"><?php echo $_SESSION['H2'] ?></button>
      <button class="botao-imagem"><?php echo $_SESSION['H3'] ?></button>
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