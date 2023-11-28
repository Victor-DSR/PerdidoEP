<?php
include_once('codigo.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["habilidade"])) {
        $habilidades = $_POST["habilidade"];
        $i = 0;
        foreach ($habilidades as $habilidade) {
            $i++;
            $_SESSION["H$i"] = $habilidade;
        }
    } else {
        habilidadesJogadorNW($_SESSION['idJog']);
    }
}
$H1 = explode('+',$_SESSION['H1']);
$H2 = explode('+',$_SESSION['H2']);
$H3 = explode('+',$_SESSION['H3']);
$_SESSION['Bio'] = 'Pampa';
$_SESSION['Inimigo'] = '1';
$_SESSION['Padrao'] = 'p1';
criarQT();
criarPersonagem();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="auxiliar.css">
  <title>Perdido em Pindorama</title>
</head>
<body style="background-image: url(IMG/TJBP.gif);">

  <div id="loading">
    <img src="IMG/Papel.gif" alt="Carregando...">
  </div>

  <div class="container">
  <div class="central" style="left: 35%;">
      <?php
     echo "HP JOGADOR: " . $_SESSION['HP'] . "<br>";
     echo "DEF JOGADOR: " . $_SESSION['DEF'] . "<br>";
     echo "ATQ JOGADOR: " . $_SESSION['ATQ'] . "<br>";
     echo "HP INIMIGO: " . $_SESSION['HPINI'] . "<br>";
     echo "ATQ INIMIGO: " . $_SESSION['ATQINI'] . "<br>";
     echo "ESP INIMIGO: " . $_SESSION['ESPINI'] . "<br>";
     echo "DEF INIMIGO: " . $_SESSION['DEFINI'] . "<br>";
     ?>
      <img src="IMG/TGif.gif" alt="Gif de Teste">
     </div>
  <div class="botoesE">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN12.php?id=<?php echo $H1[1]?>"><?php echo $H1[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN12.php?id=<?php echo $H2[1]?>"><?php echo $H2[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJn12.php?id=<?php echo $H3[1]?>"><?php echo $H3[0] ?></a></button>
    </div>
  </div>
  </div>

  <script>
    setTimeout(function() {
      var loadingElement = document.getElementById('loading');
      loadingElement.parentNode.removeChild(loadingElement);
    }, 800);
  </script>

</body>
</html>