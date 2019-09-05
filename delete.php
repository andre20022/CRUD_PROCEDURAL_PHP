<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Deletar usuario</h2>
<?php
session_start();
	$id = $_GET['codigo'];
	$conexao = mysqli_connect('localhost','root','1234','crud')or die('nao foi possivel conectar com o banco de dados');
	$selecao = "SELECT * FROM usuarios WHERE cod = {$id}";
    $dados = mysqli_query($conexao,$selecao);
    $ara = mysqli_fetch_assoc($dados);


if (isset($_GET['enviar'])){

	$mensagem = array('<p style="color:green;">usuario foi apagado com sucesso!</p>','<p style="color:red;">não foi apagado o usuario com sucesso!</p>');
    $codigo = $_GET['usu'];
	$sqli = "DELETE FROM usuarios WHERE cod = {$codigo}";
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
	<form action="delete.php" method="GET">
     <tr>
        <td>
        	<label>novo nome</label>
        	<input type="text" name="" value="<?php echo $ara['nome']?>">
        </td>	
     </tr>
       <tr>
        <td>
        	<label>novo novo nome de usuario</label>
        	<input type="text" name="" value="<?php echo $ara['nomeUsuario']?>">
        </td>	
     </tr>
       <tr>
        <td>
        	<label>nova senha</label>
        	<input type="text" name="" value="<?php echo $ara['senha']?>">
        </td>	
     </tr>
      <tr>
        <td>
        	<input type="hidden" name="usu" value="<?php echo $ara['cod'];?>">
        </td>	
     </tr>
     <tr>
        <td>
        	<input type="submit" name="enviar" value="Apagar">
        </td>	
     </tr>
</table>
</form>
</body>
</html>