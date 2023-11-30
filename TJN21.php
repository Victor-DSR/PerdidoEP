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
$_SESSION['Bio'] = 'Mata Atlantica';
$_SESSION['Inimigo'] = '2';
$_SESSION['Padrao'] = 'p1';
$_SESSION['HP'] += 50;
criarPP();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="auxiliar.css">
  <title>Perdido em Pindorama</title>
</head>
<body style="background-image: url(IMG/TJBM.gif);">

  <div id="loading">
    <img src="IMG/Papel.gif" alt="Carregando...">
  </div>

  <div class="container">
  <div class="diarioExp" style="width: 30%; height: auto; top: 20%; left: 35%;">
        <img src="IMG/TGif.gif" alt="Gif de Teste">
        <p><?php inserirHab($_SESSION['idJog'], $id_hab); ?></p>
     </div>
     <div class="diarioExpD scroll-area content">
     Depois de derrotar o 'Quero Tempestades' e absorver parte de seus poderes, sinto-me mais forte. Andei durante dias e semanas sem parar em busca do meu próximo inimigo. Talvez agora, que tenho os poderes do Espírito do Vento, eu possa derrotá-lo. O guardião destas terras úmidas é o 'Pedregulho Peludo', um tatu gigantesco com os poderes do Espírito da Terra. Se eu derrotá-lo e conseguir absorver seus poderes, serei capaz de enfrentar os próximos guardiões que guardam ainda mais força em seu interior.
     </div>
  <div class="botoesE">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN22.php?id=<?php echo $H1[1]?>"><?php echo $H1[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN22.php?id=<?php echo $H2[1]?>"><?php echo $H2[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJn22.php?id=<?php echo $H3[1]?>"><?php echo $H3[0] ?></a></button>
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