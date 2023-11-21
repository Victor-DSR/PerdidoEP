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
          echo "<label><input type='checkbox' name='habilidade[]' value='". $habilidade['nome']."'>".$habilidade['nome']."</label>";
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
          $_SESSION["H$i"] = $habilidade['nome']."<br>";
        }
      }
    }
  }