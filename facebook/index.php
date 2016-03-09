<!DOCTYPE html>
<html>
<head>
<title>Cadastro</title>
</head>
<body>
<p>Entre com dados para cadastro:</p>
<form action="Controller.php" method="post">
	Nome: <input name="nome" type="text"/>
	Sobrenome: <input name="sobrenome" type="text"/>
<br>
	Email: <input name="email" type="text"/>
<br>
	Confirmar Email: <input name="email_conf" type="text"/>
<br>
	Senha: <input name="senha" type="password"/>
<br>
	Data de Nascimento: <input name="nascimento" type="date"/>
<br>
	<input type="radio" name="sexo" value="masculino" checked> Masculino<br>
    <input type="radio" name="sexo" value="feminino"> Feminino<br>
	<input type="submit" value="Cadastrar"/>
</form>
<h1>Feito por Gabriel Guedes e Isabela Eifert</h1>
</body>
</html>