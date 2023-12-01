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
$_SESSION['contCombo'] = 0;
$_SESSION['Bio'] = '4';
$_SESSION['Inimigo'] = '4';
$_SESSION['Padrao'] = 'p1';
$_SESSION['HP'] += 50;
criarRA();
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
        <p><?php inserirHab($_SESSION['idJog'], $id_hab); ?></p>
     </div>
     <div class="diarioExpD scroll-area content">
     <p>"Com os poderes do guia, vou ser capaz de andar tranquilamente por aqui", eu disse. "Com essas habilidades, poderei encontrar o Espírito Maligno", eu disse. Maldição! Estou andando há dias e não consigo encontrá-lo por nada. Passei por algumas tribos devastadas pelos seus poderes, e ainda que eu persiga seu rastro, parece que ele sempre foge no último instante. Mais alguns dias se passaram desde que escrevi a última parte, e acho que descobri uma forma de encontrar o Espírito. Alguns irmãos que encontrei durante minhas buscas me contaram sobre um poderoso Guardião chamado de "Roedor Ancião". Ele é um protetor inigualável. Com sua ajuda, poderei não só achar o Espírito Maligno como também derrotá-lo de uma vez por todas.</p>
     <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN42.php?id=100">Falar com o Guardião</a></button>
     </div>
  <div class="botoesE">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN42.php?id=<?php echo $H1[1]?>"><?php echo $H1[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN42.php?id=<?php echo $H2[1]?>"><?php echo $H2[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJn42.php?id=<?php echo $H3[1]?>"><?php echo $H3[0] ?></a></button>
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