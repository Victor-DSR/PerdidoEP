<?php
include_once('codigo.php');

function habilidades($a){
     $sql = "SELECT * FROM jog_hab WHERE id_jog='$a'";
     $resultado = mysqli_query(conectar(), $sql);
     $dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
     
     $sql2 = "SELECT * FROM habilidades;";
     $resultado2 = mysqli_query(conectar(), $sql2);
     $dados2 = mysqli_fetch_all($resultado2, MYSQLI_ASSOC);
     
     var_dump($dados);
     var_dump($dados2);
}

habilidades($_SESSION['idJog']);
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
  </div>

  <script>
    setTimeout(function() {
      var loadingElement = document.getElementById('loading');
      loadingElement.parentNode.removeChild(loadingElement);
    }, 4000);
  </script>

</body>
</html>