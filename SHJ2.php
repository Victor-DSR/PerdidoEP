<?php
include_once('codigo.php');
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
  <div class="formulario" style="font-size:x-large;">
        <form action="TJN11.php" method="POST">
            <div class="field">
                Escolha até 3 habilidades:
                <?php habilidadesJogadorNWP($_SESSION['idJog']); ?>
            </div>
                <input class="botao-imagem" type="submit" value="Selecionar Habilidades" onclick="validarFormulario(event)"></input>
        </form>
    </div>
  </div>

  <script>
    setTimeout(function() {
      var loadingElement = document.getElementById('loading');
      loadingElement.parentNode.removeChild(loadingElement);
    }, 4000);

    function validarFormulario(event) {
      var checkboxes = document.querySelectorAll('input[name="habilidade"]');
      var habilidadesSelecionadas = Array.from(checkboxes).filter(function (checkbox) {
      return checkbox.checked;
    });
      if (habilidadesSelecionadas.length > 3) {
        event.preventDefault();
        alert("Selecione no máximo 3 habilidades.");
        }
    }
  </script>

</body>
</html>