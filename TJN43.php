<?php
include_once('codigo.php');
$H1 = explode('+',$_SESSION['H1']);
$H2 = explode('+',$_SESSION['H2']);
$H3 = explode('+',$_SESSION['H3']);
$_SESSION['contCombo'] = 0;
$_SESSION['Bio'] = 'Amazonia';
$_SESSION['Inimigo'] = '5';
$_SESSION['Padrao'] = 'p1';
criarRAU();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="auxiliar.css">
  <title>Perdido em Pindorama</title>
</head>
<body style="background-image: url(IMG/TJBA.gif);">

  <div id="loading">
    <img src="IMG/Papel.gif" alt="Carregando...">
  </div>

  <div class="container">
  <div class="diarioExp" style="width: 30%; height: auto; top: 20%; left: 35%;">
        <img src="IMG/TGif.gif" alt="Gif de Teste">
        <p>Seu ataque repentino me pegou desprevenido, mas eu consegui derrotá-lo, agora só preciso descobrir o porquê dele me atacar. </p>
     </div>
     <div class="diarioExpD scroll-area content">
       <p>O Protetor Ancião foi o responsável por toda aquela tragédia, ele foi o primeiro a ser corrompido, não posso acreditar que alguém tão poderoso quanto ele perdeu para o espírito maligno… mas tem algo estranho, não consigo absorver os poderes do Roedor e ele… ele está se levantando? mas sua energia está mais densa e seus olhos mudaram.</p>
     </div>
     <div class="botoesE">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN421.php?id=<?php echo $H1[1]?>"><?php echo $H1[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN421.php?id=<?php echo $H2[1]?>"><?php echo $H2[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJn421.php?id=<?php echo $H3[1]?>"><?php echo $H3[0] ?></a></button>
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