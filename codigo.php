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
        if(mysqli_num_rows($resultado2) == 0){
           $sql3 = "INSERT INTO progresso(id_jog) VALUES ('$aux')";
           mysqli_query(conectar(), $sql3);
        }
        if(password_verify($senha,$dados['senha'])){
            session_start();
            $_SESSION["idJog"] = $dados['id'];
            $_SESSION["nome"] = $dados['nome'];
            $_SESSION["email"] = $dados['email'];
            $_SESSION["nivel"] = $dados['nivel'];
            header("location:TM.php");
        } else {
           header("location:index.php");
        }
    } else {
      header("location:index.php"); 
   } 
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
 function selecionarIdHab($a)
 {
     $sql = "SELECT * FROM jog_hab WHERE id_jog='$a'";
     $resultado = mysqli_query(conectar(), $sql);
     return $dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
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
        echo $habilidade['nome'] . ": <br>" . $habilidade['descricaoD'] . "<br>";
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
  function selecionarJogador($a){
    $sql = "SELECT * FROM jogador WHERE id = '$a'";
    $resultado = mysqli_query(conectar(), $sql);
    return $dados = mysqli_fetch_assoc($resultado);
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
  $_SESSION['ESPINI'] = 50;
  $_SESSION['DEFINI'] = 10;
 }
 function criarRPA(){
  $_SESSION['HPRINI'] = 200;
  $_SESSION['ATQRINI'] = 30;
  $_SESSION['DEFRINI'] = 50;
 }
 function criarAP(){
  $_SESSION['HPINI'] = 300;
  $_SESSION['CDDINI'] = 2;
  $_SESSION['ATQINI'] = 40;
  $_SESSION['CRITINI'] = 2;
  $_SESSION['ESPINI'] = 50;
  $_SESSION['DEFINI'] = 10;
 }
 function criarRA(){
  $_SESSION['HPINI'] = 400;
  $_SESSION['CDDINI'] = 2;
  $_SESSION['CRITINI'] = 1;
  $_SESSION['ATQINI'] = 50;
  $_SESSION['ESPINI'] = 80;
  $_SESSION['DEFINI'] = 10;
 }
}
/*Habilidades Jogador*/{
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
  if($_SESSION['contador'] != 2){
     $a += $b;
     return $a;
  } else {
    return $a;
  }
 }
 function CURA($a, $b){
  $a += $b;
  return $a;
 }
 function BUF($a, $b){
   if($_SESSION['contador'] != 4){
     $a *= $b;
     return $a;
   } else {
   return $a;
   }
 }
 function DBUF($a, $b){
  if($b == 'Jogador'){
       if($a == 'Dispersar Divergente'){
       $_SESSION['ATQINI'] = 0;
       } elseif($a == 'Nuvens Aceleradas'){
       $_SESSION['DEFINI'] = 0;
      } 
  } elseif($b == 'Inimigo'){
       if($a == 'Dispersar Divergente'){
       $_SESSION['ATQ'] = 0;
       } elseif($a == 'Nuvens Aceleradas'){
       $_SESSION['DEF'] = 0;
      }
  }
 }
 function ESP($a){
   if($a == "Pampa"){
     echo $a; 
   } elseif($a == "Mata Atlantica"){
     echo $a;
   } elseif($a == "Caatinga"){
     echo $a;
   } elseif($a == "Amazonia"){;
     echo $a;
   }
 }
}
/* Turnos e Status*/{
  function atividadeTurnoJogador($a, $b){
    if ($a['tipo'] == "ATQ"){
         $_SESSION['contadorJog'] = 1;
         $_SESSION['HPINI'] = ATQ($a['efeito'], $_SESSION['DEFINI'], $_SESSION['HPINI']);
    } 
    elseif ($a['tipo'] == "DEF"){
         $_SESSION['contadorJog'] = 2;
         $_SESSION['DEF'] = DEF($_SESSION['DEF'], $a['efeito']);
    }
    elseif ($a['tipo'] == "CURA"){
         $_SESSION['contadorJog'] = 3;
         $_SESSION['HP'] = CURA($_SESSION['HP'], $a['efeito']);
    } 
    elseif ($a['tipo'] == "BUF"){
         $_SESSION['contadorJog'] = 4;
         $_SESSION['ATQ'] = BUF($_SESSION['ATQ'], $a['efeito']);
    } 
    elseif ($a['tipo'] == "DBUF"){
         $_SESSION['contadorJog'] = 5;
         DBUF($a['nome'], $b);
    }
    elseif ($a['tipo'] == "ESP"){
         $_SESSION['contadorJog'] = 6;
         echo ESP('Mata Atlantica');
    }
  }
 function atividadeTurnoQT($a, $b){
  if ($a == "ATQ"){
       $_SESSION['contadorQT'] = '1'; 
       $_SESSION['HP'] = ATQ($_SESSION['ATQINI'], $_SESSION['DEF'], $_SESSION['HP']);
  } 
  elseif ($a == "DEF"){
       $_SESSION['contadorQT'] = '2'; 
       $_SESSION['DEFINI'] = DEF($_SESSION['DEFINI'], 20);
  } 
  elseif ($a == "DBUF"){
       $_SESSION['contadorQT'] = '3'; 
       DBUF('Nuvens Aceleradas', $b);
  }
 }
 function manterStatusQT(){
  if($_SESSION['contadorQT'] == 1){
      $_SESSION['ESPINI'] = 10; 
      $_SESSION['DEFINI'] = 10;
 } elseif($_SESSION['contadorQT'] == 2){
      $_SESSION['ATQINI'] = 10; 
      $_SESSION['ESPINI'] = 10; 
 } elseif($_SESSION['contadorQT'] == 3){
     $_SESSION['DEF'] = 0; 
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
 } elseif($_SESSION['contadorJog'] == 6){
      echo "a fazer"; 
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
}