<?php
header('content-type: text/html; charset=utf-8');
session_start();
/* Conectar ao Banco de Dados*/{
 function conectar()
  {
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco_dados = "bdd_pep";
    $conexao = mysqli_connect($host, $usuario, $senha, $banco_dados);
    if ($conexao) {
        mysqli_set_charset($conexao, 'utf8');
        return $conexao;
    } else {
        echo "Erro ao conectar a base de dados. " . mysqli_connect_error();
        die();
    }
   } 
}
/*Funções do Site*/ {
 if (isset($_GET['']) == NULL and $_SESSION['idJog'] == NULL) {
    header("location:index.php");
 }
 if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nom'];
    $email = $_POST['eml'];
    $senha = $_POST['snh'];
    $hash = password_hash($senha,PASSWORD_DEFAULT);

    $conexao = conectar();
    $sql = "INSERT INTO jogador(nome, email, senha) VALUES ('$nome','$email','$hash')";
    mysqli_query(conectar(), $sql);
    header("location:index.php"); 
 } 
 if (isset($_POST['alterar'])) {
  $nome = $_POST['nom'];
  $email = $_POST['eml'];
  $senhaConfirm = $_POST['snhT'];
  $senha = $_POST['snh'];
  $hash = password_hash($senha,PASSWORD_DEFAULT);
  $sql = "SELECT * FROM jogador WHERE email='$email'";
  $resultado = mysqli_query(conectar(), $sql);
  $dados = mysqli_fetch_assoc($resultado);

    if(password_verify($senhaConfirm,$dados['senha'])){
       $id = $dados['id'];
       $sql2 = "UPDATE jogador SET `nome`='$nome',`email`='$email',`senha`='$hash' WHERE id='$id'";
       mysqli_query(conectar(), $sql2);
       header("location:TM.php"); 
    } else {
       header("location:TJ.php"); 
    }
 }
 if (isset($_POST['excluir'])) {
  $id = $_SESSION['idJog'];
  $sql = "DELETE FROM jogador WHERE id='$id'";
  mysqli_query(conectar(), $sql);
  header("location:index.php"); 
 } 
 if(isset($_POST['login'])){
    $email = $_POST['eml'];
    $senha = $_POST['snh'];

    $sql = "SELECT * FROM jogador WHERE email='$email'";
    $resultado = mysqli_query(conectar(), $sql);  
    if(mysqli_num_rows($resultado) > 0){
        $dados = mysqli_fetch_assoc($resultado);
        $aux = $dados['id'];
        $sql2 = "SELECT * FROM progresso WHERE id_jog='$aux'";
        $resultado2 = mysqli_query(conectar(), $sql2); 
        $dados2 = mysqli_fetch_assoc($resultado2);
        if(mysqli_num_rows($resultado2) == 0){
           $sql3 = "INSERT INTO progresso(id_jog) VALUES ('$aux')";
           mysqli_query(conectar(), $sql3);
        }
        if(password_verify($senha,$dados['senha'])){
            session_start();
            $_SESSION["idJog"] = $dados['id'];
            $_SESSION["nome"] = $dados['nome'];
            $_SESSION["email"] = $dados['email'];
            $_SESSION["nivel"] = $dados2['nivel'];
            header("location:TM.php");
        } else {
           header("location:index.php");
        }
    } else {
      header("location:index.php"); 
   } 
 }
}
/*Tela de Morte*/{
 function telaMorteQT(){
   echo "<!DOCTYPE html>
   <html lang='pt-br'>
   <head>
   <meta http-equiv='X-UA-Compatible' content='IE=edge'>
       <meta name='viewport' content='width=device-width, initial-scale=1.0'>
       <link rel='stylesheet' type='text/css' href='auxiliar.css'>
     <title>Perdido em Pindorama</title>
   </head>
   <body style='background-image: url(IMG/FPM.png);'>
     <div class='container-morte'>
     <div class='botoesE'>
     <button class='botao-imagem-combo'><a style='text-decoration: none;color: inherit;' href='TM.php'>Voltar ao Menu</a></button>
     </div>
   </body>
   </html>";
  }
}
/* Verificação e Seleção do Banco de Dados*/{
 function verificarHab ($a){
         $sql = "SELECT * FROM jog_hab WHERE id_jog='$a'";
         $resultado = mysqli_query(conectar(), $sql);
         $dados = mysqli_fetch_assoc($resultado);

    if(isset($dados['id_jog'])){
         header("location:SHJ2.php");
    } else {
         $sql2 = "INSERT INTO jog_hab(id_jog, id_hab) VALUES ('$a','0'),('$a','1'),('$a','2')";
         $resultado2 = mysqli_query(conectar(), $sql2);
         $_SESSION['H1'] = "Golpe de Sorte+0";
         $_SESSION['H2'] = "Defesa Alta+1";
         $_SESSION['H3'] = "RespirarFundo+2";
         header("location:TJN11.php");
    }
 }
 function selecionarJogadores()
 {
     $sql = "SELECT nome, pontos FROM `jogador` ORDER BY `jogador`.`pontos` DESC";
     $resultado = mysqli_query(conectar(), $sql);
     return $dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
 }
 function selecionarHabs()
 {
     $sql = "SELECT * FROM habilidades";
     $resultado = mysqli_query(conectar(), $sql);
     return $dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
 }
 function selecionarHistoria($a)
 {
     $sql = "SELECT * FROM historia WHERE id='$a';";
     $resultado = mysqli_query(conectar(), $sql);
     return $dados = mysqli_fetch_assoc($resultado);
 }
 function selecionarIdHab($a)
 {
     $sql = "SELECT * FROM jog_hab WHERE id_jog='$a'";
     $resultado = mysqli_query(conectar(), $sql);
     return $dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
 }
 function selecionarJogHab($a, $b)
 {
     $sql = "SELECT * FROM jog_hab WHERE id_jog='$a' AND id_hab='$b'";
     $resultado = mysqli_query(conectar(), $sql);
     return $dados = mysqli_fetch_assoc($resultado);
 }
 function selecionarPadrao($a)
 {
     $sql = "SELECT * FROM padraoinimigo WHERE id = $a";
     $resultado = mysqli_query(conectar(), $sql);
     return $dados = mysqli_fetch_assoc($resultado);
 }
 function habilidadesJogador($a){
  $ids = selecionarIdHab($a);
  $habs = selecionarHabs();
  foreach ($ids as $id) {
    foreach ($habs as $habilidade) {
      if ($id['id_hab'] == $habilidade['id']){
        echo "<img src='ICONS/". $habilidade['img'] . "' style='width: 10%;'>" . $habilidade['nome'] . ": <br>" . $habilidade['descricaoD'] . "<br>";
      }
    }
  }
 }
 function habilidadesJogadorNWP($a){
    $ids = selecionarIdHab($a);
    $habs = selecionarHabs();
    foreach ($ids as $id) {
      foreach ($habs as $habilidade) {
        if ($id['id_hab'] == $habilidade['id']){
          echo "<label><input type='checkbox' name='habilidade[]' value='". $habilidade['nome'] . "+" . $habilidade['id'] . "'>".$habilidade['nome']."</label>";
        }
      }
    }
  }
  function habilidadesJogadorNW($a){
    $ids = selecionarIdHab($a);
    $habs = selecionarHabs();
    $i = 0;
    foreach ($ids as $id) {
      foreach ($habs as $habilidade) {
        if ($id['id_hab'] == $habilidade['id']){
          $i++;
          $_SESSION["H$i"] = $habilidade['nome'];
        }
      }
    }
  }
  function selecionarHabilidade($a){
    $sql = "SELECT * FROM habilidades WHERE id = '$a'";
    $resultado = mysqli_query(conectar(), $sql);
    return $dados = mysqli_fetch_assoc($resultado);
  }
  function selecionarProgresso($a){
    $sql = "SELECT * FROM progresso WHERE id_jog = '$a'";
    $resultado = mysqli_query(conectar(), $sql);
    return $dados = mysqli_fetch_assoc($resultado);
  }
  function selecionarJogador($a){
    $sql = "SELECT * FROM jogador WHERE id = '$a'";
    $resultado = mysqli_query(conectar(), $sql);
    return $dados = mysqli_fetch_assoc($resultado);
  }
  function contarPontos($a, $b){
    $jog = selecionarJogador($b);
    $pontos = $jog['pontos'] + $a;
    $sql = "UPDATE jogador SET pontos = '$pontos' WHERE jogador.id = '$b';";
    $resultado = mysqli_query(conectar(), $sql);
  }
  function inserirHab($a, $b){
    if ($b == 0){
       echo "Você não aprendeu nenhuma habilidade.";
    } else {
    $id = selecionarJogHab($a, $b);
    $habilidade = selecionarHabilidade($b);
    $nome = $habilidade['nome'];
      if(isset($id['id_hab']) != NULL){
        echo "Você já possui esta Habilidade.";
      } else {
        $sql = "INSERT INTO jog_hab(id_jog, id_hab) VALUES ('$a','$b')";
        $resultado = mysqli_query(conectar(), $sql);
        echo "Você aprendeu uma nova habilidade! $nome, volte para a tela de menu para saber mais.";
      }
  }
 }
  function contarNivel($a, $b){
    $prog = selecionarProgresso($a);
    $nivel = $prog['nivel'];
      if($nivel < $b){
        $sql = "UPDATE progresso SET nivel='$b' WHERE id_jog='$a';";
        $resultado = mysqli_query(conectar(), $sql);~
        $_SESSION['nivel'] = $b;
      }
  }
}
/* Personagem e Inimigos*/{
 function criarPersonagem(){
   $_SESSION['HP'] = 100;
   $_SESSION['DEF'] = 10;
   $_SESSION['ATQ'] = 10;
 }
 function criarQT(){
  $_SESSION['HPINI'] = 200;
  $_SESSION['ATQINI'] = 20;
  $_SESSION['DEFINI'] = 10;
 }
 function criarPP(){
  $_SESSION['HPINI'] = 200;
  $_SESSION['ATQINI'] = 20;
  $_SESSION['DEFINI'] = 25;
 }
 function criarAP(){
  $_SESSION['HPINI'] = 300;
  $_SESSION['ATQINI'] = 30;
  $_SESSION['DEFINI'] = 15;
 }
 function criarRA(){
  $_SESSION['HPINI'] = 300;
  $_SESSION['ATQINI'] = 30;
  $_SESSION['DEFINI'] = 15;
 }
 function criarRAU(){
  $_SESSION['HPINI'] = 200;
  $_SESSION['ATQINI'] = 40;
  $_SESSION['DEFINI'] = 20;
 }
}
/*Habilidades Jogador e Inimigos*/{
 function ATQJOG($a, $b, $c){
   $a += $_SESSION['ATQ'];
  if($a > $b){
     $a -= $b;
     $c -= $a;
     return $c;
  } else {
    return $c;
  }
 }
 function DEFJOG($a, $b){
     $a += $b;
     return $a;
 }
 function CURAJOG($a, $b){
  $a += $b;
  return $a;
 }
 function BUFJOG($a, $b){
     $a *= $b;
     return $a;
 }
 function DBUFJOG($a, $b){
  if($b == 'Jogador'){
       if($a == 'Dispersar Divergente'){
       $_SESSION['ATQINI'] = 0;
       } elseif($a == 'Nuvens Aceleradas'){
       $_SESSION['DEFINI'] = 0;
       } elseif($a == 'Ventos Congelates'){
       $_SESSION['ATQINI'] = 0;
       $_SESSION['DEFINI'] = 0;
       }
  }
 }
 function ATQ($a, $b, $c){
  $a += $_SESSION['ATQ'];
 if($a > $b){
    $a -= $b;
    $c -= $a;
    return $c;
 } else {
   return $c;
 }
 }
 function DEF($a, $b){
    $a += $b;
    return $a;
 }
 function CURA($a, $b){
 $a += $b;
 return $a;
 }
 function BUF($a, $b){
    $a *= $b;
    return $a;
 }
 function DBUF($a, $b){
      if($a == 'Dispersar Divergente'){
      $_SESSION['ATQINI'] = 0;
      } elseif($a == 'Nuvens Aceleradas'){
      $_SESSION['DEFINI'] = 0;
      } 
 }
 function Combo($a, $b){
   if($a['id'] == 1){
     $_SESSION['contCombo'] = 1;
   } elseif($a['id'] == 2 and $_SESSION['contCombo'] == 1){
     $_SESSION['contCombo'] = 2;
   } elseif($a['id'] == 0 and $_SESSION['contCombo'] == 2){
     $_SESSION['contCombo'] = 0;
    echo "<button class='botao-imagem'><a style='text-decoration: none;color: inherit;' href='$b.php?id=12'>Golpe Duplo</a></button>";
   } elseif($a['id'] == 2 and $_SESSION['contCombo'] != 1){
     $_SESSION['contCombo'] = 0;
   }
   if($a['id'] == 3){
    $_SESSION['contCombo'] = 1;
   } elseif($a['id'] == 10 and $_SESSION['contCombo'] == 1){
    $_SESSION['contCombo'] = 2;
   } elseif($a['id'] == 11 and $_SESSION['contCombo'] == 2){
    $_SESSION['contCombo'] = 0;
   echo "<button class='botao-imagem-combo'><a style='text-decoration: none;color: inherit;' href='$b.php?id=13'>Fúria dos Ventos</a></button>";
   } elseif($a['id'] == 10 and $_SESSION['contCombo'] != 1){
    $_SESSION['contCombo'] = 0;
   }
   if($a['id'] == 8){
    $_SESSION['contCombo'] = 1;
   } elseif($a['id'] == 7 and $_SESSION['contCombo'] == 1){
    $_SESSION['contCombo'] = 2;
   } elseif($a['id'] == 9 and $_SESSION['contCombo'] == 2){
    $_SESSION['contCombo'] = 0;
   echo "<button class='botao-imagem-combo'><a style='text-decoration: none;color: inherit;' href='$b.php?id=14'>Ventos Congelantes</a></button>";
   } elseif($a['id'] == 7 and $_SESSION['contCombo'] != 1){
    $_SESSION['contCombo'] = 0;
   }
   if($a['id'] == 5){
    $_SESSION['contCombo'] = 1;
   } elseif($a['id'] == 3 and $_SESSION['contCombo'] == 1){
    $_SESSION['contCombo'] = 2;
   } elseif($a['id'] == 4 and $_SESSION['contCombo'] == 2){
    $_SESSION['contCombo'] = 0;
    echo "<button class='botao-imagem-combo'><a style='text-decoration: none;color: inherit;' href='$b.php?id=15'>Terremoto Estrondoso</a></button>";
   } elseif($a['id'] == 4 and $_SESSION['contCombo'] != 1){
    $_SESSION['contCombo'] = 2;
   }
   if($a['id'] == 8){
    $_SESSION['contCombo'] = 1;
   } elseif($a['id'] == 4 and $_SESSION['contCombo'] == 1){
    $_SESSION['contCombo'] = 0;
    echo "<button class='botao-imagem-combo'><a style='text-decoration: none;color: inherit;' href='$b.php?id=16'>Magnitude Nove</a></button>";
   }
 }
}
/* Turnos e Status*/{
  function atividadeTurnoJogador($a, $b, $c){
    if ($a['tipo'] == "ATQ"){
         $_SESSION['contadorJog'] = 1;
         $_SESSION['HPINI'] = ATQJOG($a['efeito'], $_SESSION['DEFINI'], $_SESSION['HPINI']);
    } 
    elseif ($a['tipo'] == "DEF"){
         $_SESSION['contadorJog'] = 2;
         $_SESSION['DEF'] = DEFJOG($_SESSION['DEF'], $a['efeito']);
    }
    elseif ($a['tipo'] == "CURA"){
         $_SESSION['contadorJog'] = 3;
         $_SESSION['HP'] = CURAJOG($_SESSION['HP'], $a['efeito']);
    } 
    elseif ($a['tipo'] == "BUF"){
         $_SESSION['contadorJog'] = 4;
         $_SESSION['ATQ'] = BUFJOG($_SESSION['ATQ'], $a['efeito']);
    } 
    elseif ($a['tipo'] == "DBUF"){
         $_SESSION['contadorJog'] = 5;
         DBUFJOG($a['nome'], $b);
    }
    elseif ($a['tipo'] == "ESP"){
         $_SESSION['contadorJog'] = 6;
         if($c == 1){
          $_SESSION['HP'] = $_SESSION['HP'] + 30;
        } elseif($c == 2){
          $_SESSION['HPINI'] = $_SESSION['HPINI'] - 30;
        } elseif($c == 3){
         $_SESSION['HPINI'] = $_SESSION['HPINI'] - 30;
        } elseif($c == 4){;
         $_SESSION['HP'] = $_SESSION['HP'] + 30;
        }
    }
  }
 function atividadeTurnoQT($a, $b){
  if ($a == "ATQ"){
       $_SESSION['contador'] = '1'; 
       $_SESSION['descAcao'] = 'Quero Tempestades sobe aos céus e então retorna em alta velocidade usando suas garras para ataca-lo.';
       $_SESSION['HP'] = ATQ($_SESSION['ATQINI'], $_SESSION['DEF'], $_SESSION['HP']);
  } 
  elseif ($a == "DEF"){
       $_SESSION['contador'] = '2'; 
       $_SESSION['descAcao'] = 'Quero Tempestades recua rapidamente enquanto usa suas asas para cobrir seu corpo em defesa aos seus ataques.';
       $_SESSION['DEFINI'] = DEF($_SESSION['DEFINI'], 20);
  } 
  elseif ($a == "DBUF"){
       $_SESSION['contador'] = '3'; 
       $_SESSION['descAcao'] = 'Quero Tempestades invoca um poderoso tufão ao bater suas asas para lhe desestabilizar e o deixar mais vulneravel a seus ataques.';
       DBUF('Nuvens Aceleradas', $b);
  }
 }
 function atividadeTurnoPP($a){
  if ($a == "ATQ"){
       $_SESSION['contador'] = '1'; 
       $_SESSION['descAcao'] = 'Pedregulho Peludo salta em sua direção lhe dando um poderoso golpe.';
       $_SESSION['HP'] = ATQ($_SESSION['ATQINI'], $_SESSION['DEF'], $_SESSION['HP']);
  } 
  elseif ($a == "CURA"){
       $_SESSION['contador'] = '2'; 
       $_SESSION['descAcao'] = 'Pedregulho Peludo se abaixa e fica em posição defensiva enquanto come algumas gramas para recuperar seu vigor.';
       $_SESSION['HPINI'] = CURA($_SESSION['HPINI'], 10);
  } 
  elseif ($a == "ESP"){
       $_SESSION['contador'] = '3'; 
       $_SESSION['descAcao'] = 'Pedregulho Peludo levanta por inteiro fazendo uma grande sombra sobre você, ao cair o gigante gera tremores por toda a terra dificultando seus ataques.';
  }
 }
 function atividadeTurnoAP($a){
  if ($a == "ATQ"){
       $_SESSION['contador'] = '1'; 
       $_SESSION['descAcao'] = 'Atlas Pintado salta em sua direção rasgando sua carne com as garras.';
       $_SESSION['HP'] = ATQ($_SESSION['ATQINI'], $_SESSION['DEF'], $_SESSION['HP']);
  } 
  elseif ($a == "CURA"){
       $_SESSION['contador'] = '2'; 
       $_SESSION['descAcao'] = 'Atlas Pintado recua e então lambe suas próprias feridas para se curar.';
       $_SESSION['HPINI'] = CURA($_SESSION['HPINI'], 40);
  } 
  elseif ($a == "ATQCRIT"){
       $_SESSION['contador'] = '3'; 
       $_SESSION['descAcao'] = 'Atlas Pintado salta em sua direção de forma certeira rasgando sua carne com as garras.';
       $_SESSION['ATQINI']= BUF($_SESSION['ATQINI'], 2);
  }
 }
 function atividadeTurnoRA($a){
  if ($a == "ATQ"){
       $_SESSION['contador'] = '1'; 
       $_SESSION['descAcao'] = 'Roedor Ancião se levata e então are sua boca lhe dando uma dolorosa mordida.';
       $_SESSION['HP'] = ATQ($_SESSION['ATQINI'], $_SESSION['DEF'], $_SESSION['HP']);
  } 
  elseif ($a == "CURA"){
       $_SESSION['contador'] = '2'; 
       $_SESSION['descAcao'] = 'Roedor Ancião se acoca e então começa a tremer, suas feridas lentamente se fecham.';
       $_SESSION['HPINI'] = CURA($_SESSION['HPINI'], 40);
  } 
  elseif ($a == "DEF"){
    $_SESSION['contador'] = '3'; 
    $_SESSION['descAcao'] = 'Roedor Ancião começa a se mexer violentamente fazendo com que sua defesa cresça.';
    $_SESSION['DEFINI'] = DEF($_SESSION['DEFINI'], 20);
  } 
 }
 function atividadeTurnoRAU($a){
  if ($a == "ATQ"){
       $_SESSION['contador'] = '1'; 
       $_SESSION['descAcao'] = 'Roedor Ancião Possuido salta em sua direção lhe dando um poderoso ataque.';
       $_SESSION['HP'] = ATQ($_SESSION['ATQINI'], $_SESSION['DEF'], $_SESSION['HP']);
  } 
  elseif ($a == "CURA"){
       $_SESSION['contador'] = '2'; 
       $_SESSION['descAcao'] = 'Roedor Ancião Possuido levanta em todo seu esplendor e absorve a vida a sua volta, se curando no processo.';
       $_SESSION['HPINI'] = CURA($_SESSION['HPINI'], 40);
  } 
  elseif ($a == "ATQCRIT"){
       $_SESSION['contador'] = '3'; 
       $_SESSION['descAcao'] = 'Roedor Ancião Possuido entra em frenesi e lhe ataca em fúria.';
       $_SESSION['ATQINI']= BUF($_SESSION['ATQINI'], 2);
  }
 }
 function manterStatusQT(){
  if($_SESSION['contador'] == 1){ 
      $_SESSION['DEFINI'] = 10;
 } elseif($_SESSION['contador'] == 2){
      $_SESSION['ATQINI'] = 20;  
 } elseif($_SESSION['contador'] == 3){
     $_SESSION['DEF'] = 0; 
 } 
 }
 function manterStatusPP(){
  if($_SESSION['contador'] == 1){
    } elseif($_SESSION['contador'] == 2){
      $_SESSION['ATQINI'] = 20;
      $_SESSION['DEFINI'] = 25;
    } elseif($_SESSION['contador'] == 3){
      $_SESSION['ATQ'] = 0; 
    } 
 }
 function manterStatusAP(){
  if($_SESSION['contador'] == 1){
      $_SESSION['ATQINI'] = 30;
      $_SESSION['DEFINI'] = 15;
    } elseif($_SESSION['contador'] == 2){
      $_SESSION['ATQINI'] = 30;
      $_SESSION['DEFINI'] = 15;
    } elseif($_SESSION['contador'] == 3){
      $_SESSION['DEFINI'] = 15; 
    } 
 }
 function manterStatusRA(){
  if($_SESSION['contador'] == 1){
      $_SESSION['ATQINI'] = 30;
      $_SESSION['DEFINI'] = 15;
    } elseif($_SESSION['contador'] == 2){
      $_SESSION['ATQINI'] = 30;
      $_SESSION['DEFINI'] = 15;
    } elseif($_SESSION['contador'] == 3){
      $_SESSION['DEFINI'] = 15; 
    } 
 }
 function manterStatusRAU(){
  if($_SESSION['contador'] == 1){
      $_SESSION['ATQINI'] = 40;
      $_SESSION['DEFINI'] = 20;
    } elseif($_SESSION['contador'] == 2){
      $_SESSION['ATQINI'] = 40;
      $_SESSION['DEFINI'] = 20;
    } elseif($_SESSION['contador'] == 3){
      $_SESSION['DEFINI'] = 20; 
    } 
 }
 function manterStatusPersonagem(){
  if($_SESSION['contadorJog'] == 1){
      $_SESSION['DEF'] = 10;
      $_SESSION['ATQ'] = 10;
 } elseif($_SESSION['contadorJog'] == 2){
      $_SESSION['ATQ'] = 10;
 } elseif($_SESSION['contadorJog'] == 3){
      $_SESSION['ATQ'] = 10;
      $_SESSION['DEF'] = 10;
 } elseif($_SESSION['contadorJog'] == 4){
      $_SESSION['DEF'] = 10;
 }
 }
 function padraoAtaqueQT($a){
  if($_SESSION['Padrao'] == 'p1'){
    $_SESSION['Padrao'] = 'p2';
     atividadeTurnoQT($a['p1'], "Inimigo"); 
    } elseif($_SESSION['Padrao'] == 'p2'){
       $_SESSION['Padrao'] = 'p3';
       atividadeTurnoQT($a['p2'], "Inimigo"); 
      } elseif($_SESSION['Padrao'] == 'p3'){
       $_SESSION['Padrao'] = 'p4';
       atividadeTurnoQT($a['p3'], "Inimigo"); 
      } elseif($_SESSION['Padrao'] == 'p4'){
       $_SESSION['Padrao'] = 'p5';
       atividadeTurnoQT($a['p4'], "Inimigo"); 
      } elseif($_SESSION['Padrao'] == 'p5'){
       $_SESSION['Padrao'] = 'p6';
       atividadeTurnoQT($a['p5'], "Inimigo"); 
      } elseif($_SESSION['Padrao'] == 'p6'){
       $_SESSION['Padrao'] = 'p7';
       atividadeTurnoQT($a['p6'], "Inimigo"); 
      } elseif($_SESSION['Padrao'] == 'p7'){
       $_SESSION['Padrao'] = 'p8';
       atividadeTurnoQT($a['p7'], "Inimigo"); 
      } elseif($_SESSION['Padrao'] == 'p8'){
       $_SESSION['Padrao'] = 'p9';
       atividadeTurnoQT($a['p8'], "Inimigo"); 
      } elseif($_SESSION['Padrao'] == 'p9'){
       $_SESSION['Padrao'] = 'p1';
       atividadeTurnoQT($a['p9'], "Inimigo"); 
      }
  }
  function padraoAtaquePP($a){
    if($_SESSION['Padrao'] == 'p1'){
         $_SESSION['Padrao'] = 'p2';
         atividadeTurnoPP($a['p1']); 
        } elseif($_SESSION['Padrao'] == 'p2'){
         $_SESSION['Padrao'] = 'p3';
         atividadeTurnoPP($a['p2']); 
        } elseif($_SESSION['Padrao'] == 'p3'){
         $_SESSION['Padrao'] = 'p4';
         atividadeTurnoPP($a['p3']); 
        } elseif($_SESSION['Padrao'] == 'p4'){
         $_SESSION['Padrao'] = 'p5';
         atividadeTurnoPP($a['p4']); 
        } elseif($_SESSION['Padrao'] == 'p5'){
         $_SESSION['Padrao'] = 'p6';
         atividadeTurnoPP($a['p5']); 
        } elseif($_SESSION['Padrao'] == 'p6'){
         $_SESSION['Padrao'] = 'p7';
         atividadeTurnoPP($a['p6']); 
        } elseif($_SESSION['Padrao'] == 'p7'){
         $_SESSION['Padrao'] = 'p8';
         atividadeTurnoPP($a['p7']); 
        } elseif($_SESSION['Padrao'] == 'p8'){
         $_SESSION['Padrao'] = 'p9';
         atividadeTurnoPP($a['p8']); 
        } elseif($_SESSION['Padrao'] == 'p9'){
         $_SESSION['Padrao'] = 'p1';
         atividadeTurnoPP($a['p9']); 
        }
  }
  function padraoAtaqueAP($a){
    if($_SESSION['Padrao'] == 'p1'){
        $_SESSION['Padrao'] = 'p2';
        atividadeTurnoAP($a['p1']); 
        } elseif($_SESSION['Padrao'] == 'p2'){
        $_SESSION['Padrao'] = 'p3';
        atividadeTurnoAP($a['p2']); 
        } elseif($_SESSION['Padrao'] == 'p3'){
        $_SESSION['Padrao'] = 'p4';
        atividadeTurnoAP($a['p3']); 
        } elseif($_SESSION['Padrao'] == 'p4'){
        $_SESSION['Padrao'] = 'p5';
        atividadeTurnoAP($a['p4']); 
        } elseif($_SESSION['Padrao'] == 'p5'){
        $_SESSION['Padrao'] = 'p6';
        atividadeTurnoAP($a['p5']); 
        } elseif($_SESSION['Padrao'] == 'p6'){
        $_SESSION['Padrao'] = 'p7';
        atividadeTurnoAP($a['p6']); 
        } elseif($_SESSION['Padrao'] == 'p7'){
        $_SESSION['Padrao'] = 'p8';
        atividadeTurnoAP($a['p7']); 
        } elseif($_SESSION['Padrao'] == 'p8'){
        $_SESSION['Padrao'] = 'p9';
        atividadeTurnoAP($a['p8']); 
        } elseif($_SESSION['Padrao'] == 'p9'){
        $_SESSION['Padrao'] = 'p1';
        atividadeTurnoAP($a['p9']); 
        }
    }
    function padraoAtaqueRA($a){
      if($_SESSION['Padrao'] == 'p1'){
          $_SESSION['Padrao'] = 'p2';
          atividadeTurnoRA($a['p1']); 
          } elseif($_SESSION['Padrao'] == 'p2'){
          $_SESSION['Padrao'] = 'p3';
          atividadeTurnoRA($a['p2']); 
          } elseif($_SESSION['Padrao'] == 'p3'){
          $_SESSION['Padrao'] = 'p4';
          atividadeTurnoRA($a['p3']); 
          } elseif($_SESSION['Padrao'] == 'p4'){
          $_SESSION['Padrao'] = 'p5';
          atividadeTurnoRA($a['p4']); 
          } elseif($_SESSION['Padrao'] == 'p5'){
          $_SESSION['Padrao'] = 'p6';
          atividadeTurnoRA($a['p5']); 
          } elseif($_SESSION['Padrao'] == 'p6'){
          $_SESSION['Padrao'] = 'p7';
          atividadeTurnoRA($a['p6']); 
          } elseif($_SESSION['Padrao'] == 'p7'){
          $_SESSION['Padrao'] = 'p8';
          atividadeTurnoRA($a['p7']); 
          } elseif($_SESSION['Padrao'] == 'p8'){
          $_SESSION['Padrao'] = 'p9';
          atividadeTurnoRA($a['p8']); 
          } elseif($_SESSION['Padrao'] == 'p9'){
          $_SESSION['Padrao'] = 'p1';
          atividadeTurnoRA($a['p9']); 
          }
      }
      function padraoAtaqueRAU($a){
        if($_SESSION['Padrao'] == 'p1'){
            $_SESSION['Padrao'] = 'p2';
            atividadeTurnoRAU($a['p1']); 
            } elseif($_SESSION['Padrao'] == 'p2'){
            $_SESSION['Padrao'] = 'p3';
            atividadeTurnoRAU($a['p2']); 
            } elseif($_SESSION['Padrao'] == 'p3'){
            $_SESSION['Padrao'] = 'p4';
            atividadeTurnoRAU($a['p3']); 
            } elseif($_SESSION['Padrao'] == 'p4'){
            $_SESSION['Padrao'] = 'p5';
            atividadeTurnoRAU($a['p4']); 
            } elseif($_SESSION['Padrao'] == 'p5'){
            $_SESSION['Padrao'] = 'p6';
            atividadeTurnoRAU($a['p5']); 
            } elseif($_SESSION['Padrao'] == 'p6'){
            $_SESSION['Padrao'] = 'p7';
            atividadeTurnoRAU($a['p6']); 
            } elseif($_SESSION['Padrao'] == 'p7'){
            $_SESSION['Padrao'] = 'p8';
            atividadeTurnoRAU($a['p7']); 
            } elseif($_SESSION['Padrao'] == 'p8'){
            $_SESSION['Padrao'] = 'p9';
            atividadeTurnoRAU($a['p8']); 
            } elseif($_SESSION['Padrao'] == 'p9'){
            $_SESSION['Padrao'] = 'p1';
            atividadeTurnoRAU($a['p9']); 
            }
        }
}