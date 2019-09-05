<?php
session_start();
 $conexao = mysqli_connect('localhost','root','1234','crud')or die('nao foi possivel conectar com o banco de dados');


 if (isset($_POST['enviaCadastro']) && !empty($_POST['nome'])) {
 	
 	$mensagem = array('<p style="color:green;">usuario foi inserido com sucesso!</p>','<p style="color:red;">não foi inserido o usuario com sucesso!</p>');	
    $nome = $_POST['nome'];
    $nomeUsuario = $_POST['nomeUsuario'];
    $password = $_POST['senha'];
    $inserir = "INSERT INTO usuarios(nome,nomeUsuario,senha)VALUES('$nome','$nomeUsuario','$password')";
    $dados = mysqli_query($conexao,$inserir);

    if ($dados) {
    	
    	$_SESSION['msg'] = $mensagem[0];
		header('location:usuarios.php');

    }else{

    	 $_SESSION['msg'] = $mensagem[1];
        header('location:usuarios.php');
    }

 }else{

 	echo "nao";


 }

?>