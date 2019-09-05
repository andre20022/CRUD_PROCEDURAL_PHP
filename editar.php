<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Novos dados de usuario</h2>
	<?php
	session_start();

	$id = $_GET['codigo'];

    $conexao = mysqli_connect('localhost','root','1234','crud')or die('nao foi possivel conectar com o banco de dados');
    $selecao = "SELECT * FROM usuarios WHERE cod = {$id}";
    $dados = mysqli_query($conexao,$selecao);
    $ara = mysqli_fetch_assoc($dados);

if (isset($_GET['enviar'])){

	$codigo = $_GET['usu'];
	$nome = $_GET['nome'];
	$login = $_GET['nomeUsuarios'];
	$senha = $_GET['senha'];
	$mensagem = array('<p style="color:green;">usuario foi alterado com sucesso!</p>','<p style="color:red;">usuario não foi alterado com sucesso!</p>');

	$sqli = "UPDATE usuarios SET nome = '{$nome}',nomeUsuario = '{$login}',senha = '{$senha}' WHERE cod = {$codigo}";
	$ara = mysqli_query($conexao,$sqli);
	if ($ara) {
		
		$_SESSION['msg'] = $mensagem[0];
		header('location:usuarios.php');

	}else{

        $_SESSION['msg'] = $mensagem[1];
        header('location:usuarios.php');
		
	}

}

	?>
<table>
	<form action="editar.php" method="GET">
     <tr>
        <td>
        	<label>novo nome</label>
        	<input type="text" name="nome" value="<?php echo $ara['nome']?>">
        </td>	
     </tr>
       <tr>
        <td>
        	<label>novo novo nome de usuario</label>
        	<input type="text" name="nomeUsuarios" value="<?php echo $ara['nomeUsuario']?>">
        </td>	
     </tr>
       <tr>
        <td>
        	<label>nova senha</label>
        	<input type="text" name="senha" value="<?php echo $ara['senha']?>">
        </td>	
     </tr>
      <tr>
        <td>
        	<input type="hidden" name="usu" value="<?php echo $ara['cod'];?>">
        </td>	
     </tr>
     <tr>
        <td>
        	<input type="submit" name="enviar" value="Editar">
        </td>	
     </tr>
</table>
</form>

   
</body>
</html>