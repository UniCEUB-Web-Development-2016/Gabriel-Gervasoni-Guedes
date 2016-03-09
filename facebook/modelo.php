<?php

class Modelo
{

private $nome;
private $sobrenome;
private $email;
private $email_conf;
private $senha;
private $nascimento;
private $sexo;


public function __construct($nome, $sobrenome, $email, $email_conf, $senha, $nascimento, $sexo)
{
$this->nome = $nome;
$this->sobrenome = $sobrenome;
$this->email = $email;
$this->email_conf = $email_conf;
$this->senha = $senha;
$this->nascimento = $nascimento;
$this->sexo = $sexo;
}
public function write(){
    $myfile = fopen("data.txt", "a+") or die("Unable to open file!");
    fwrite($myfile,$this->nome);
    fwrite($myfile,' ');
    fwrite($myfile,$this->sobrenome);
    fwrite($myfile,' ');
    fwrite($myfile,$this->email);
    fwrite($myfile,' ');
    fwrite($myfile,$this->email_conf);
    fwrite($myfile,' ');
    fwrite($myfile,$this->senha);
    fwrite($myfile,' ');
    fwrite($myfile,$this->nascimento);
    fwrite($myfile,' ');
    fwrite($myfile,$this->sexo);
    fwrite($myfile,"\r\n");
    fclose($myfile);
}


}

?>