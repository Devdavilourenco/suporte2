<!DOCTYPE html>
<html>
<head>
	<title>Confirmação de ocorrencia</title>
	<script type="text/javascript">
		function ok(){
			setTimeout("window.location='func/home.php'",3000);
		}
		function okk(){
			setTimeout("window.location='adm/home.php'",3000);
		}
		function erro(){
			setTimeout("window.location='index.php'",3000);
		}
	</script>
	<meta charset="utf-8">
	<style type="text/css">
		img{
            margin-top: 2%;
        }
        h2{  
            margin-top: 10%;            
        }
	</style>
</head>
<body>
</body>
</html>
<?php 
	require './conexao.php';
	$nome   = $_POST['nome'];
	$obs    = $_POST['observacao_cliente'];
	$dep    = $_POST['dep'];
	$estado = $_POST['estado'];
	$data   = $_POST['data'];



	$resultado = $mysqli -> query("INSERT INTO ocorrencia VALUES(0,'$nome','$obs','$dep','$estado','$data')");
	if((mysqli_num_rows($resultado)>0)&&($_POST['login'] =="adm")){
		session_start();
		$_SESSION['login'] = $_POST['login'] ;
		$_SESSION['senha'] = $_POST['senha'];
		echo "<center><h2>Login Efetuado com Sucesso -ADM!</h2></center>";
		echo "<center><img src='https://raw.githubusercontent.com/GabrielCordeiroBarrosoTeles/Projeto-Oficina/main/site/img/carregando.gif'></center>";
		echo "<script>okk()</script>";
	}
	else if((mysqli_num_rows($resultado)>0)&&($_POST['login'] !="adm") ){
		session_start();
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['senha'] = $_POST['senha'];
		echo "<center><h2>Login Efetuado com Sucesso!</h2></center>";
		echo "<center><img src='https://raw.githubusercontent.com/GabrielCordeiroBarrosoTeles/Projeto-Oficina/main/site/img/carregando.gif'></center>";
		echo "<script>ok()</script>";
	}
	else{
		echo "<center><h2>Usuário e/ou senha incorreto(s)</h2></center>";
		echo "<center><img src='https://raw.githubusercontent.com/GabrielCordeiroBarrosoTeles/Projeto-Oficina/main/site/img/carregando.gif'></center>";
		echo "<script>erro()</script>";
	}
?>