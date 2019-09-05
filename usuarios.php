<!DOCTYPE html>
<html>
<head>
	<title>inicio</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

	<h2>Usuarios do site</h2>
	<?php
	session_start();
     
     $conexao = mysqli_connect('localhost','root','1234','crud')or die('nao foi possivel conectar com o banco de dados');

     $sqli = "SELECT * FROM usuarios";
     $dados = mysqli_query($conexao,$sqli);

     if(isset($_SESSION['msg'])){

       		echo '<div id="mensagem"><p>'.$_SESSION['msg'].'</p></div>';
       		session_unset($_SESSION['msg']);
      
 
     }

     while ($infomacao = mysqli_fetch_assoc($dados)) {

	?>

 <table border="1">
   	<tr>
   		<td><label class="textoInformativo">nome:</label> <span class="informacao"><?php echo $infomacao['nome']; ?></span></td>
   	</tr>
   	<tr> 
   		<td><label class="textoInformativo">nome de usuario:</label> <span class="informacao"><?php echo $infomacao['nomeUsuario']; ?></span></td>
   		<td class="botao"><a href="editar.php?codigo=<?php echo $infomacao['cod']; ?>">editar</a></td>
   		<td class="botao"><a href="delete.php?codigo=<?php echo $infomacao['cod']; ?>">excluir</a></td>
   	</tr>
   	<tr>
   		<td><label class="textoInformativo">senha:</label> <span class="informacao"><?php echo $infomacao['senha']; ?></span></td>
   	</tr>
 </table>
<?php
	  }
?>
<script type="text/javascript">

    var tempo = setInterval(tempoDeMensagem, 4000);

      function tempoDeMensagem() {
          
          let mensagem = document.getElementById('mensagem').style.display = 'none';
            
      }
    console.log(mensagem);

</script>
<hr>
<h2>Cadastre um novo usuario do site</h2>
 <table class="tabelaCadastro" border="1">
 	<form action="cadastro.php" method="POST">
   	<tr class="cada">
   		<td><input class="textoCadastro" placeholder="Nome" type="text" name="nome"></td>
   	</tr>
   	<tr>
   		<td><input class="textoCadastro" placeholder="NomeUsuario" type="text" name="nomeUsuario"></td>
   	</tr>
   	<tr>
   		<td><input class="textoCadastro" placeholder="Senha" type="text" name="senha"></td>
   	</tr>
   	<tr>
   		<td><input class="botaoCadastro" type="submit" name="enviaCadastro" value="Cadastrar"></td>
   	</tr>
   </form>
 </table>
</body>
</html>