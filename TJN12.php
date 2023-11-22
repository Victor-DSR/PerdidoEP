<?php
include_once('codigo.php');
$id = $_GET['id'];
$H1 = explode('+',$_SESSION['H1']);
$H2 = explode('+',$_SESSION['H2']);
$H3 = explode('+',$_SESSION['H3']);
$HU = selecionarHabilidade($id);

if ($HU['tipo'] == "ATQ"){
     danoPersonagem($_SESSION['HPQT'], $HU['efeito'], $_SESSION['HP'], $_SESSION['ATQQT'], $_SESSION['DEFQT'], $_SESSION['DEF']);
} 
elseif ($HU['tipo'] == "DEF"){
     aumentarDefesa($_SESSION['DEF'], $HU['efeito'], $_SESSION['HP'], $_SESSION['ATQQT']);
}
elseif ($HU['tipo'] == "CURA"){
     curarPersonagem($_SESSION['HP'], $HU['efeito'], $_SESSION['ATQQT'], $_SESSION['DEFQT'], $_SESSION['DEF']);
} 
elseif ($HU['tipo'] == "BUF"){
     buffarAtaque($_SESSION['ATQ'], $HU['efeito'], $_SESSION['HP'], $_SESSION['ATQQT'], $_SESSION['DEF']);
} 
elseif ($HU['tipo'] == "DBUF1"){
     impedirInimigo();
}  
elseif ($HU['tipo'] == "DBUF2" and $_SESSION['HPQT'] > 50){
     diminuirAtaqueInimigo($_SESSION['ATQQT'], $HU['efeito'], $_SESSION['HP'], $_SESSION['DEF']);
} 
elseif ($HU['tipo'] == "DBUF2" and $_SESSION['HPQT'] < 50){
    diminuirAtaqueESPInimigo($_SESSION['ESPQT'], $HU['efeito'], $_SESSION['HP'], $_SESSION['DEF']);
} 
elseif ($HU['tipo'] == "ESP"){
     efeitoBiomaClima($_SESSION['Bio']);
}

echo "HP JOGADOR: " . $_SESSION['HP'] . "<br>";
echo "DEF JOGADOR: " . $_SESSION['DEF'] . "<br>";
echo "ATQ JOGADOR: " . $_SESSION['ATQ'] . "<br>";
echo "HP INIMIGO: " . $_SESSION['HPQT'] . "<br>";
echo "ATQ INIMIGO: " . $_SESSION['ATQQT'] . "<br>";
echo "ESP INIMIGO: " . $_SESSION['ESPQT'] . "<br>";
echo "DEF INIMIGO: " . $_SESSION['DEFQT'] . "<br>";
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