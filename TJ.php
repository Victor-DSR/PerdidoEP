<?php
include_once('codigo.php');
$dados = selecionarJogador($_SESSION['idJog']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="auxiliar.css">
  <title>Perdido Em Pindorama</title>
</head>
<body>
<div id="loading">
    <img src="IMG/Papel.gif" alt="Carregando...">
</div>
  <div class="container">
             <form action='codigo.php' class="formulario" method="post"> 
        <div class="field">
            <label for="nome">Nome:</label>
            <input type="text" name="nom" value='<?php echo $dados['nome']; ?>' required>
        </div>

        <div class="field">
            <label for="nome">Email:</label>
            <input type="text" name="eml" value='<?php echo $dados['email']; ?>' required>
        </div>
        
        <div class="field">
            <label for="telefone">Senha Atual:</label>
            <input type="password" name="snhT">
        </div>
        <div class="field">
            <label for="telefone">Nova Senha:</label>
            <input type="password" name="snh">
        </div>
        <button class="botao-imagem" type="submit" name="alterar"> Reescrever Páginas </button>
              </form>
  <div class="diarioExpD" style="top: 20%;left: 90%;">
    <div class="botoes">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;"href="TM.php">Voltar</a></button>
      <form action='codigo.php' method="post" onsubmit="return confirmarEnvio()"> 
        <input type="hidden" name="excluir">
        <button class="botao-imagem" type="submit" name="excluir"> Rasgar Paginas </button>
      </form>
    </div>
  </div>
  </div>
  <script>
    setTimeout(function() {
      var loadingElement = document.getElementById('loading');
      loadingElement.parentNode.removeChild(loadingElement);
    }, 4000);
    function confirmarEnvio() {
      var confirma = confirm("Deseja realmente excluir sua conta e todas as suas informações?\nClique em 'OK' para confirmar ou 'Cancelar' para desistir.");
      return confirma;}
  </script>
</body>
</html>