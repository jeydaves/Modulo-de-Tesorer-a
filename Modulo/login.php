<?php
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
   
    require_once("libraries/password_compatibility_library.php");
}


require_once("config/db.php");


require_once("classes/Login.php");

$login = new Login();

if ($login->isUserLoggedIn() == true) {
   header("location: facturas.php");

} else {
    ?>
	<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Inicio de Sesión</title>
	<!-- Latest compiled and minified CSS -->
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <link rel=icon href='img/Logo_erp.ico' sizes="32x32" type="image/png">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <!-- CSS  -->
   <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   	<div class="wrapp">
			<div class="logo">
				<a href="#"><img src="img/Logo_erp.png" alt="Logo_erp"></a>
			</div>
			<nav>
				<ul>
					<li><a href="../ERP/index.html">Inicio <i class="fas fa-home"></i> </a></li>
					<li><a href="#">Gerencia/Administración <i class="fas fa-screwdriver"></i></a></li>
					<li><a href="#">Departamentos <i class="fas fa-th-large"></i></a>
					<ul>
						<li><a href="">Compras/Inventario <i class="fab fa-readme"></i></a></li>
						<li><a href="../Modulo/index.php ">Tesoreria/Cuentas por pagar <i class="fas fa-hand-holding-usd"></i> </a></li>
					</ul>
				</li>
			</ul>
			</li>	
			</nav>
		</div>
</head>
<body>
 <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
          <form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form" class="form-signin">
			<?php
				// show potential errors / feedback (from login object)
				if (isset($login)) {
					if ($login->errors) {
						?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						    <strong>Error!</strong> 
						
						<?php 
						foreach ($login->errors as $error) {
							echo $error;
						}
						?>
						</div>
						<?php
					}
					if ($login->messages) {
						?>
						<div class="alert alert-success alert-dismissible" role="alert">
						    <strong>Aviso!</strong>
						<?php
						foreach ($login->messages as $message) {
							echo $message;
						}
						?>
						</div> 
						<?php 
					}
				}
				?>
                <span id="reauth-email" class="reauth-email"></span>
                <input class="form-control" placeholder="Usuario" name="user_name" type="text" value="" autofocus="" required>
                <input class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off" required>
            <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="login" id="submit">Iniciar Sesión</button>
                   
            </form><!-- /form -->
            
       
            
        </div><!-- /card-container -->
    </div><!-- /container -->
  </body>
</html>

	<?php
}


