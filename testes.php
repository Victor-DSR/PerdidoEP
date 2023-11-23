<?php
include_once('codigo.php');
$senha = 'root1';
$hash = password_hash($senha,PASSWORD_DEFAULT);
echo $hash;
  ?>