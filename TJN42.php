<?php
include_once('codigo.php');
$id = $_GET['id'];
$H1 = explode('+',$_SESSION['H1']);
$H2 = explode('+',$_SESSION['H2']);
$H3 = explode('+',$_SESSION['H3']);
if($_SESSION['HP'] > 0 and $_SESSION['HPINI'] > 0){
  $HU = selecionarHabilidade($id);
  $PI = selecionarPadrao($_SESSION['Inimigo']);
  atividadeTurnoJogador($HU, "Jogador", $_SESSION['Bio']); 
  padraoAtaqueRA($PI);
      if($_SESSION['HPINI'] <= 0){
        header("location:TJN43.php");
      } elseif ($_SESSION['HP'] <= 0){
        die(telaMorteQT());
      }
  } 
$INFO = selecionarHabilidade($id);
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
        <p><?php 
        echo "Vida: " . $_SESSION['HP'] . "<br>";
        echo "Ataque: " . $_SESSION['ATQ'] . "<br>";
        echo "Defesa: " . $_SESSION['DEF'] . "<br>";
        ?></p>
        <div><?php  echo $INFO['descricao']; ?></div>
     </div>
     <div class="diarioExpD" style="width: 30%; height: auto; top: 0%; left: 70%;">
        <img src="IMG/RA.gif" alt="Gif de Teste">
        <p><?php 
        echo "Vida: " . $_SESSION['HPINI'] . "<br>";
        echo "Ataque: " . $_SESSION['ATQINI'] . "<br>";
        echo "Defesa: " . $_SESSION['DEFINI'] . "<br>";
        ?></p>
         <div style="width: 80%;"><?php  echo $_SESSION['descAcao']; ?></div>
     </div>
  <div class="botoesE">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN42.php?id=<?php echo$H1[1]?>"><?php echo $H1[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN42.php?id=<?php echo$H2[1]?>"><?php echo $H2[0] ?></a></button>
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TJN42.php?id=<?php echo$H3[1]?>"><?php echo $H3[0] ?></a></button>
      <?php combo($INFO, 'TJN42'); ?>
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
<?php
manterStatusRA();
manterStatusPersonagem();
?>