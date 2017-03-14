<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
</head>
<body>
	<header>
		<h1>Ejemplo muy básico de registro de datos en PHP</h1>
	</header>

	<section>
		<form action="procesar.php" method="post" enctype="application/x-www-urlencoded">
			<div>
				<h1>Logueo</h1>
			</div>

			<div>
				<label for="txtUsuario">Usuario: </label>
				<input type="text" name="txtUsuario" id="txtUsuario" />
			</div>

			<div>
				<label for="txpContra">Contraseña: </label>
				<input type="password" name="txpContra" id="txpContra" />
			</div>

			<div>
				<input type="hidden" name="hdPeticion" value="login">
				<button type="reset">Cancelar</button>
				<button type="submit">Iniciar</button><br>
				<a href="registro.php">¡Registrarse!</a>
			</div>
		</form>
	</section>
</body>
</html>