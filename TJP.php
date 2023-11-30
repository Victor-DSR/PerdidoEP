<?php
include_once('codigo.php');
$_SESSION['nivel'] = 4;
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
  <div class="diarioExp scroll-area content">
      <h1><?php echo $_SESSION['nome']; ?></h1>
      <h2><?php echo $_SESSION['email']; ?></h2>
      <p>Nível: <?php echo $_SESSION['nivel']; ?>/4 </p>
        <?php switch ($_SESSION['nivel']) {
    case 0:
        echo "Você ainda não possui nível.";
        break;
    case 1:
        echo "<a style='text-decoration: none;color: inherit;'href='TPN.php?id=1'>Pampa</a><br>";
        break;
    case 2:
        echo "<a style='text-decoration: none;color: inherit;'href='TPN.php?id=1'>Pampa</a><br>";
        echo "<a style='text-decoration: none;color: inherit;'href='TPN.php?id=2'>Mata Atlântica</a><br>";
        break;
    case 3:
        echo "<a style='text-decoration: none;color: inherit;'href='TPN.php?id=1'>Pampa</a><br>";
        echo "<a style='text-decoration: none;color: inherit;'href='TPN.php?id=2'>Mata Atlântica</a><br>";
        echo "<a style='text-decoration: none;color: inherit;'href='TPN.php?id=3'>Caatinga</a><br>";
        break;
    case 4:
      echo "<a style='text-decoration: none;color: inherit;'href='TPN.php?id=1'>Pampa</a><br>";
      echo "<a style='text-decoration: none;color: inherit;'href='TPN.php?id=2'>Mata Atlântica</a><br>";
      echo "<a style='text-decoration: none;color: inherit;'href='TPN.php?id=3'>Caatinga</a><br>";
        echo "<a style='text-decoration: none;color: inherit;'href='TPN.php?id=4,5'>Amazônia</a><br>";
        break;
}
        ?>
    </div>
    <div class="diarioExpD scroll-area content">
     <?php habilidadesJogador($_SESSION['idJog']); ?>
     <br>
     <h2>Conteúdos Didáticos:</h2>
     <h4>Agentes do Relevo</h4>
     <p>Existem diversos tipos de relevo e com gêneses variadas. Isso se deve pelo fato de existirem diferentes agentes para sua formação, também conhecidos como modeladores do relevo. Os Agentes Modeladores do Relevo são as forças responsáveis por, ao longo de milhares de anos, agirem modificando o ambiente, o terreno e o espaço no geral. São divididos em dois tipos principais: Agentes Internos ou Endógenos e Externos ou Exógenos.</p>
     <h5>Agentes Internos do Relevo</h5>
     <p>Os agentes endógenos, ou internos, do relevo são caracterizados em três tipos, quais sejam o vulcanismo, os abalos sísmicos e o tectonismo. Todos ocorrem no interior da Terra e resultam em transformações externas da superfície.
O Vulcanismo se caracteriza pela ação contínua do magma, que ascende por meio de brechas existentes entre as placas tectônicas do planeta, gerando erupções vulcânicas, embora tais casos sejam periódicos e menos frequentes.
Os Abalos Sísmicos e o Tectonismo estão diretamente relacionados, já que os abalos são gerados pela movimentação das placas tectônicas. Os abalos são causados pelos movimentos de afastamento (movimento de divergência), choque (movimento de convergência) ou deslizamento (movimento conservativo) entre placas. O Tectonismo por sua vez é caracterizado pela movimentação do magma no interior da terra e é dividido em Epirogênese, quando o movimento tectônico é vertical e rotativo, e Orogênese, quando o movimento tectônico é horizontal.
</p>
     <h5>Agentes Externos do Relevo</h5>
     <p>Os agentes exógenos, ou externos, do relevo são caracterizados pela ação de elementos de fora da superfície terrestre como a água, os ventos, os seres vivos, entre outros que causam a erosão e a sedimentação do solo.
Dentre os agentes externos há o Intemperismo e a Erosão. O primeiro é resultado da ação de elementos biológicos, químicos e físicos sobre as rochas, que causam a decomposição e a desintegração das rochas.
Já a Erosão envolve os processos de remoção, transporte e deposição de materiais, sendo causada por diversos agentes, como o vento e a água. Os ventos, ou erosão eólica, alteram o relevo de forma lenta e gradual gerando novas formações rochosas através do transporte de sedimentos e poeira, causando tanto a erosão, quanto a sedimentação. Por fim, a Água cujo tipo de erosão muda conforme a origem, podendo ser: a) Fluvial: a ação das chuvas que transportam sedimentos pela água, assim como rios desgastam o solo criando seu próprio curso; b) Glacial: onde o derretimento das geleiras resulta na moldagem do solo pela neve acumulada; c) Pluvial: ação também causada pela chuva, mas chamada assim por conta da lavagem do solo por chuvas fortes resultando em erosões profundas e grandes conhecidas respectivamente como “ravinas e voçorocas"; e d) Marinha: ação causada pela água do mar, que desgasta o solo e as rochas no litoral de modo lento e contínuo criando falésias, praias, encostas e restingas por todo o litoral.
</p>
     <h4>Cartografia</h4>
     <p>A Cartografia representa o estudo, operações, técnicas científicas e artísticas que servem para elaborar mapas, planos cartesianos e outras formas de expressão ou representação de objetos, elementos, fenômenos e ambientes físicos ou socioeconômicos. Por meio dela é possível fazer levantamentos ambientais, socioeconômicos, educacionais, entre outros dos mais diversos tipos, tendo uma representação específica, retratando a dimensão territorial do objetivo e principalmente facilitando a compreensão do tema em uma visão mais ampla.</p>
     <h4>Climatologia</h4>
     <p>A climatologia estuda os padrões de comportamento da atmosfera considerando um longo período de tempo, sendo subdividida em Climatologia Regional e Climatologia Dinâmica.</p>
     <h4>Climatologia Regional</h4>
     <p>É o ramo da climatologia que é responsável pelo estudo do clima em áreas e coordenadas específicas.</p>
     <h4>Climatologia Dinâmica</h4>
     <p>É o ramo da climatologia responsável pelo estudo dos movimentos atmosféricos em diferentes escalas.</p>
     <h4>Elementos Climaticos</h4>
     <p>São as forças atmosféricas cujas propriedades e características particulares definem o clima e suas propriedades, estão presentes no tempo e no espaço sendo possível sentir através de nossos sentidos ou medir através de instrumentos específicos. Dentre estes, pode-se citar: a temperatura, a umidade, a pressão, a radiação, entre muitos outros.</p>
    </div>
    <div class="botoes">
      <button class="botao-imagem"><a style="text-decoration: none;color: inherit;"href="TM.php">Voltar</a></button>
    </div>
  </div>

  <script>
    setTimeout(function() {
      var loadingElement = document.getElementById('loading');
      loadingElement.parentNode.removeChild(loadingElement);
    }, 4000);
  </script>

</body>
</html>