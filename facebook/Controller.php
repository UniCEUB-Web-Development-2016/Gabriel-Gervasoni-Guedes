<?php
include "modelo.php";

$cadastro = new Modelo($_POST['nome'], $_POST['sobrenome'], 
$_POST['email'], $_POST['senha'], $_POST['nascimento'], $_POST['sexo']);

$cadastro->write();

header ('location:cadastro.php');