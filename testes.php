<?php
include_once('codigo.php');
$_SESSION['contador'] = 1;
echo "HP JOGADOR: " . $_SESSION['HP'] . "<br>";
echo "DEF JOGADOR: " . $_SESSION['DEF'] . "<br>";
echo "ATQ JOGADOR: " . $_SESSION['ATQ'] . "<br>";
echo "HP INIMIGO: " . $_SESSION['HPINI'] . "<br>";
echo "ATQ INIMIGO: " . $_SESSION['ATQINI'] . "<br>";
echo "ESP INIMIGO: " . $_SESSION['ESPINI'] . "<br>";
echo "DEF INIMIGO: " . $_SESSION['DEFINI'] . "<br>";

/*echo "<br>" . $_SESSION['HPINI'] . "<br>";
atividadeTurno($PI, "Jogador");
echo "<br>" . $_SESSION['HPINI'] . "<br>";*/


?>