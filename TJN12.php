<?php
include_once('codigo.php');
$id = $_GET['id'];
$H1 = explode('+',$_SESSION['H1']);
$H2 = explode('+',$_SESSION['H2']);
$H3 = explode('+',$_SESSION['H3']);
$HU = selecionarHabilidade($id);
function contabilizarStatus($a, $b, $c, $d, $e, $f, $g, $h){
     $HpPer = $a;
     $HpMon = $b;
     $tipoHab = $c;
     $efeitoHab = $d;
     $defPer = $e;
     $defMon = $f;
     $atqPer = $g;
     $atqMon = $h;
     $combo = 0;
     if ($tipoHab == "ATQ"){

     } elseif ($tipoHab == "DEF"){

     } elseif ($tipoHab == "CURA"){

     } elseif ($tipoHab == "BUF"){

     } elseif ($tipoHab == "DBUF"){

     } elseif ($tipoHab == "ESP"){

     }
}
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
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN12.php?id=<?php echo$H1[1]?>"><?php echo $H1[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN12.php?id=<?php echo$H2[1]?>"><?php echo $H2[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJn12.php?id=<?php echo$H3[1]?>"><?php echo $H3[0] ?></a></button>
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