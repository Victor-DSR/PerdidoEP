<?php
include_once('codigo.php');
$_SESSION['contadorJog'] = 1;
echo "HP JOGADOR: " . $_SESSION['HP'] . "<br>";
echo "DEF JOGADOR: " . $_SESSION['DEF'] . "<br>";
echo "ATQ JOGADOR: " . $_SESSION['ATQ'] . "<br>";
echo "HP INIMIGO: " . $_SESSION['HPINI'] . "<br>";
echo "ATQ INIMIGO: " . $_SESSION['ATQINI'] . "<br>";
echo "ESP INIMIGO: " . $_SESSION['ESPINI'] . "<br>";
echo "DEF INIMIGO: " . $_SESSION['DEFINI'] . "<br>";
$HU = selecionarHabilidade(1);
atividadeTurnoJogador1($HU, "Jogador");

function atividadeTurnoJogador1($a, $b){
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

  function manterStatusPersonagem1(){
    if($_SESSION['contadorJog'] == 1){
        $_SESSION['DEF'] = 10;
        $_SESSION['ATQ'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   } elseif($_SESSION['contadorJog'] == 2){
        $_SESSION['ATQ'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   } elseif($_SESSION['contadorJog'] == 3){
        $_SESSION['ATQ'] = 10;
        $_SESSION['DEF'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   } elseif($_SESSION['contadorJog'] == 4){
        $_SESSION['DEF'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   } elseif($_SESSION['contadorJog'] == 5){
        $_SESSION['DEF'] = 10;
        $_SESSION['ATQ'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   } elseif($_SESSION['contadorJog'] == 6){
        $_SESSION['DEF'] = 10;
        $_SESSION['ATQ'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
   } elseif($_SESSION['contadorJog'] == 7){
        $_SESSION['DEF'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   } elseif($_SESSION['contadorJog'] == 8){
        $_SESSION['ATQ'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   } elseif($_SESSION['contadorJog'] == 9){
        $_SESSION['DEF'] = 10;
        $_SESSION['ATQ'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   } elseif($_SESSION['contadorJog'] == 10){
        $_SESSION['DEF'] = 10;
        $_SESSION['ATQ'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   } elseif($_SESSION['contadorJog'] == 11){
        $_SESSION['DEF'] = 10;
        $_SESSION['ATQ'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   } elseif($_SESSION['contadorJog'] == 12){
        $_SESSION['DEF'] = 10;
        $_SESSION['ATQ'] = 10;
        $_SESSION['ATQINI'] = 10; 
        $_SESSION['ESPINI'] = 10; 
        $_SESSION['DEFINI'] = 10;
   }
   }

  ?>