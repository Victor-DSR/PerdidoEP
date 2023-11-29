<?php
include_once('codigo.php');
function padraoAtaqueRAU($a){
    if($_SESSION['Padrao'] == 'p1'){
        $_SESSION['Padrao'] = 'p2';
        atividadeTurnoRAU($a['p1'], "Inimigo"); 
        } elseif($_SESSION['Padrao'] == 'p2'){
        $_SESSION['Padrao'] = 'p3';
        atividadeTurnoRAU($a['p2'], "Inimigo"); 
        } elseif($_SESSION['Padrao'] == 'p3'){
        $_SESSION['Padrao'] = 'p4';
        atividadeTurnoRAU($a['p3'], "Inimigo"); 
        } elseif($_SESSION['Padrao'] == 'p4'){
        $_SESSION['Padrao'] = 'p5';
        atividadeTurnoRAU($a['p4'], "Inimigo"); 
        } elseif($_SESSION['Padrao'] == 'p5'){
        $_SESSION['Padrao'] = 'p6';
        atividadeTurnoRAU($a['p5'], "Inimigo"); 
        } elseif($_SESSION['Padrao'] == 'p6'){
        $_SESSION['Padrao'] = 'p7';
        atividadeTurnoRAU($a['p6'], "Inimigo"); 
        } elseif($_SESSION['Padrao'] == 'p7'){
        $_SESSION['Padrao'] = 'p8';
        atividadeTurnoRAU($a['p7'], "Inimigo"); 
        } elseif($_SESSION['Padrao'] == 'p8'){
        $_SESSION['Padrao'] = 'p9';
        atividadeTurnoRAU($a['p8'], "Inimigo"); 
        } elseif($_SESSION['Padrao'] == 'p9'){
        $_SESSION['Padrao'] = 'p1';
        atividadeTurnoRAU($a['p9'], "Inimigo"); 
        }
    }
?>