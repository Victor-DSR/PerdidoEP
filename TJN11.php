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
     <div class="diarioExp" style="width: 30%; height: auto; top: 20%; left: 35%;">
        <img src="IMG/TGif.gif" alt="Gif de Teste">
        <p>Acabei de acordar. Vejo minha casa, minha terra, mas... o que é esse livro estranho? E por que tudo parece tão familiar? Minha cabeça dói.</p>
     </div>
     <div class="diarioExpD scroll-area content">
        <p>Eu morri há algumas horas… de novo? Desde o meu encontro com aquele poderoso espírito, sinto que algo despertou dentro de mim. Sinto que não é a primeira vez que vejo este livro, que escrevo nele! Tornei-me uma espécie de espírito que viaja entre o tempo... Que bom, agora posso deter os guardiões! Na minha vida passada, ou em minhas vidas, os guardiões das terras — animais de poder inigualável com poderosos espíritos guerreiros dentro de si — foram corrompidos por algum estranho e poderoso ser maligno e antigo. Devo enfrentá-los e impedi-los de destruir minha terra e meus amigos mais uma vez.
	O primeiro deles está próximo, o espírito dos ventos, Quero Tempestades, um pássaro que consegue controlar os céus e os ventos ao seu favor.
        </p>
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