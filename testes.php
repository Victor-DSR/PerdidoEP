<?php
$senha = "root";
$hash = password_hash($senha,PASSWORD_DEFAULT);

echo "$hash";
?>