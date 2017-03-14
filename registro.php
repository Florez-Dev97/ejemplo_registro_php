<?php 
	$modificacion = false;
	$documento = "";
	$nombre = "";
	$email = "";
	$hdID = 0;

	if( isset($_GET["accion"]) ) {
		$tipo_registro = $_GET["accion"];

		if( !isset($_GET["id"]) ) {
			header("Location: index.php");
		
		} else {
			# Datos de la conexion
			$servidor = "localhost";
			$user = "root";
			$password = "";
			$dbname = "prueba_registro";

			$conexion = mysqli_connect($servidor, $user, $password, $dbname);

			$sSQL = "select documento, nombre, email from usuar105 where id_usuario = ".$_GET["id"];

			$sentencia = mysqli_query($conexion, $sSQL);

			if($registro = mysqli_fetch_array($sentencia)) {
				$documento = $registro["documento"];
				$nombre = $registro["nombre"];
				$email = $registro["email"];
				$hdID = $_GET["id"];
			}

			$modificacion = true;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mis Datos</title>
</head>
<body>
	<header>
		<h1>Ejemplo muy básico de registro de datos en PHP</h1>
	</header>

	<section>
		<form action="procesar.php" method="post" enctype="application/x-www-urlencoded">
			<div>
				<h1>Mis datos</h1>
			</div>

			<div>
				<label for="txtDocumento">Documento: </label>
				<input type="text" name="txtDocumento" id="txtDocumento" value="<?php echo $documento; ?>" />
			</div>
			
			<div>
				<label for="txtNombre">Nombre: </label>
				<input type="text" name="txtNombre" id="txtNombre" value="<?php echo $nombre; ?>" />
			</div>

			<div>
				<label for="txtEmail">Email: </label>
				<input type="email" name="txtEmail" id="txtEmail" value="<?php echo $email; ?>" />
			</div>
			
			<?php  
				# Validacion para mostrar cuando sea un registro normal
				if(!$modificacion) {
			?>
					<div>
						<label for="txtUsuario">Usuario: </label>
						<input type="text" name="txtUsuario" id="txtUsuario" />
					</div>

					<div>
						<label for="txpContra">Contraseña: </label>
						<input type="password" name="txpContra" id="txpContra" />
					</div>
			<?php
				} else {
			?>
					<input type="hidden" name="hdID" value="<?php echo $hdID; ?>" />
			<?php
				}
			?>

			<div>
				<input type="hidden" name="hdPeticion" value="actualizacion">
				<button type="reset">Cancelar</button>
				<button type="submit">Iniciar</button><br>
			</div>
		</form>
	</section>
</body>
</html>