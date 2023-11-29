<?php
include_once('codigo.php');
contarPontos($_SESSION['HP'], $_SESSION['idJog']);
contarNivel($_SESSION['idJog'], 4);
$H1 = explode('+',$_SESSION['H1']);
$H2 = explode('+',$_SESSION['H2']);
$H3 = explode('+',$_SESSION['H3']);
$PI = selecionarPadrao($_SESSION['Inimigo']); 
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
        <p>TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO</p>
     </div>
     <div class="diarioExpD scroll-area content">
     <p>TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO TEXTO</p>
     <button class="botao-imagem"><a style="text-decoration: none;color: inherit;" href="TM.php"> Voltar ao Menu</a></button>
     </div>
  </div>
  </div>
  <script>
    setTimeout(function() {
      var loadingElement = document.getElementById('loading');
      loadingElement.parentNode.removeChild(loadingElement);
    }, 800);
    function validarFormulario(event) {
      var checkboxes = document.querySelectorAll('input[name="Hab"]');
      var habilidadesSelecionadas = Array.from(checkboxes).filter(function (checkbox) {
      return checkbox.checked;
    });
      if (habilidadesSelecionadas.length > 1) {
        event.preventDefault();
        alert("Selecione no máximo 1 habilidade.");
        }
    }
  </script>

</body>
</html>