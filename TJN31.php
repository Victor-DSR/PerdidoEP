<?php
include_once('codigo.php');
if(isset($_POST['Hab'])){
  $id_hab = $_POST['Hab'];
} else {
  $id_hab = '0';
}
$H1 = explode('+',$_SESSION['H1']);
$H2 = explode('+',$_SESSION['H2']);
$H3 = explode('+',$_SESSION['H3']);
$_SESSION['Bio'] = 'Caatinga';
$_SESSION['Inimigo'] = '3';
$_SESSION['Padrao'] = 'p1';
$_SESSION['HP'] += 50;
criarAP();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="auxiliar.css">
  <title>Perdido em Pindorama</title>
</head>
<body style="background-image: url(IMG/TJBC.gif);">

  <div id="loading">
    <img src="IMG/Papel.gif" alt="Carregando...">
  </div>

  <div class="container">
  <div class="diarioExp" style="width: 30%; height: auto; top: 20%; left: 35%;">
        <img src="IMG/TGif.gif" alt="Gif de Teste">
        <p><?php inserirHab($_SESSION['idJog'], $id_hab); ?></p>
     </div>
     <div class="diarioExpD scroll-area content">
      <p>Meu Deus, eu não aguento mais andar. Parece que já se passaram semanas desde que enfrentei o último guardião. Sair daquela floresta demorou muito tempo, mas eu daria qualquer coisa para voltar para ela. O clima aqui é muito mais difícil, seco e quente. Mal consigo encontrar água. Me pergunto como o espírito guia consegue viver por aqui. Isso não importa; preciso achá-lo e vencê-lo se quiser encontrar o caminho certo para as terras ancestrais. Com seus poderes, poderei me guiar dentro daquele gigantesco labirinto natural e achar o culpado por trás de tudo isso.</p>
     </div>
  <div class="botoesE">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN32.php?id=<?php echo $H1[1]?>"><?php echo $H1[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN32.php?id=<?php echo $H2[1]?>"><?php echo $H2[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJn32.php?id=<?php echo $H3[1]?>"><?php echo $H3[0] ?></a></button>
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