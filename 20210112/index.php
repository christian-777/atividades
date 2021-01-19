<?php
	session_start();
?>
<!DOCTYPE html>

<html lang="pt-BR">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8" />
		<title>Form de login</title>
		<link rel="stylesheet" href="css/estilos.css" type="text/css" />
	</head>
	
	<body>
		<h1>Form de login modal</h1>
		<?php
			if(isset($_SESSION["id"])){
				echo'<button id="btn">logout</button>';
				echo'<br /> <b>Bem-Vindo(a) '.$_SESSION["nome"].'</b><br />';
				echo'<br /> <b>Sua permissao é: '.$_SESSION["desc"].'</b><br />';
				echo'<br /> <b>Seu nivel de permissao é: '.$_SESSION["nivel"].'</b>';
				if(!isset($_COOKIE["CookieTeste"])){
					header("Location:logout.php");
				}
			}
			else{
				
				echo'<button class="modalbtn">Login</button>';
				echo'<div class="modal">
  
				<form id="f1" class="modal-content animate" action="autenticacao.php" method="post">
					<div class="imgcontainer">
						<button class="close" title="Fechar">&times;</button>
						<img src="imagens/img_avatar2.png" alt="Avatar" class="avatar" />
					</div>
					<div class="container">
						<label for="email"><b>Endereço de e-mail</b></label>
						<input type="text" placeholder="Digite seu e-mail" name="email" id="email" required>
	
						<label for="senha"><b>Senha</b></label>
						<input type="password" placeholder="Digite sua senha" name="senha" id="senha" required>
					  
						<input type="submit" name="submeter" value="Login" class="submitbtn" />
					</div>
					<div class="container" style="background-color:#f1f1f1">
						<button class="cancelbtn">Cancelar</button>
					</div>
				</form>
				
			</div>';
			}
		?>
		
		
		<script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/MD5.js"></script>
		<script src="js/login.js"></script>
		<script>
			$("#btn").css("background-color", "red");
			$("#btn").css("color", "white");
			$("#btn").css("padding", "14px 20px");
			$("#btn").css("margin", "8px 0");
			$("#btn").css("border", "none");
			$("#btn").css("cursor", "pointer");
			$("#btn").css("width", "auto");
			$("#btn").click(function(){
				window.location="logout.php";
			});
			
		</script>
		<noscript>Seu navegador não suporta JavaScript</noscript>
	</body>
	
</html>
