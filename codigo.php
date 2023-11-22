<?php
header('content-type: text/html; charset=utf-8');
session_start();
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
    return mysqli_query(conectar(), $sql);
}

if(isset($_POST['login'])){
    $email = $_POST['eml'];
    $senha = $_POST['snh'];

    $sql = "SELECT * FROM jogador WHERE email='$email'";
    $resultado = mysqli_query(conectar(), $sql);  

    if(mysqli_num_rows($resultado) > 0){
        $dados = mysqli_fetch_assoc($resultado);
        if(password_verify($senha,$dados['senha'])){
           
            session_start();
            $_SESSION["idJog"] = $dados['id'];
            $_SESSION["jog"] = $dados['nome'];

            header("location:TM.php");
        }
    } 
}

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
          $_SESSION["H$i"] = $habilidade['nome'] . "+" . $habilidade['id'];
        }
      }
    }
  }

  function selecionarHabilidade($a){
    $sql = "SELECT * FROM habilidades WHERE id = '$a'";
    $resultado = mysqli_query(conectar(), $sql);
    return $dados = mysqli_fetch_assoc($resultado);
}

function criarPersonagem(){
   $_SESSION['HP'] = 100;
   $_SESSION['DEF'] = 10;
   $_SESSION['ATQ'] = 10;
}

function criarQT(){
  $_SESSION['HPQT'] = 200;
  $_SESSION['ATQQT'] = 40;
  $_SESSION['ESPQT'] = 50;
  $_SESSION['DEFQT'] = 10;
}

function danoPersonagem($a, $b, $c, $d, $e, $f){
   $d -= $f;
   $b -= $e;
   $a -= $b;
   $c -= $d;
   $_SESSION['HPQT'] = $a;
   $_SESSION['HP'] = $c;
   $_SESSION['ATQQT'] = 15;
   $_SESSION['ESPQT'] = 50;
   $_SESSION['DEFQT'] = 10;
   $_SESSION['DEF'] = 10;
   $_SESSION['ATQ'] = 10;
}

function aumentarDefesa($a, $b, $c, $d){
   $a += $b;
   $d -= $a;
   $c -= $d;
   $_SESSION['DEF'] = $a;
   $_SESSION['HP'] = $c;
   $_SESSION['ATQQT'] = 15;
   $_SESSION['ESPQT'] = 50;
   $_SESSION['DEFQT'] = 10;
   $_SESSION['ATQ'] = 10;
}

function curarPersonagem($a, $b, $c, $d, $e){
   $a += $b;
   $c -= $e;
   $a -= $c;
   $_SESSION['HP'] = $a;
   $_SESSION['ATQQT'] = 15;
   $_SESSION['ESPQT'] = 50;
   $_SESSION['DEFQT'] = 10;
   $_SESSION['DEF'] = 10;
   $_SESSION['ATQ'] = 10;
}

function buffarAtaque($a, $b, $c, $d, $e){
   $a += $b;
   $d -= $e;
   $c -= $d;
   $_SESSION['ATQ'] = $a;
   $_SESSION['HP'] = $c;
   $_SESSION['ATQQT'] = 15;
   $_SESSION['ESPQT'] = 50;
   $_SESSION['DEFQT'] = 10;
   $_SESSION['DEF'] = 10;
}

function impedirInimigo(){
   $_SESSION['ATQQT'] = 0;
   $_SESSION['ESPQT'] = 50;
   $_SESSION['DEFQT'] = 10;
   $_SESSION['DEF'] = 10;
   $_SESSION['ATQ'] = 10;
}

function diminuirAtaqueInimigo($a, $b, $c, $d){
   $a -= $b;
   $a -= $d;
   $c -= $d;
   $_SESSION['ATQQT'] = $a;
   $_SESSION['HP'] = $c;
   $_SESSION['ESPQT'] = 50;
   $_SESSION['DEFQT'] = 10;
   $_SESSION['DEF'] = 10;
   $_SESSION['ATQ'] = 10;
}

function diminuirAtaqueESPInimigo($a, $b, $c, $d){
  $a -= $b;
  $a -= $d;
  $c -= $d;
  $_SESSION['ESPQT'] = $a;
  $_SESSION['HP'] = $c;
  $_SESSION['ATQQT'] = 50;
  $_SESSION['DEFQT'] = 10;
  $_SESSION['DEF'] = 10;
  $_SESSION['ATQ'] = 10;
}

function efeitoBiomaClima($a){
   if($a == "Pampa"){
     echo $a; 
   } elseif($a == "Mata Atlantica"){
     echo $a;
   } elseif($a == "Caatinga"){
     echo $a;
   } elseif($a == "Amazonia"){
     echo $a;
   }
}