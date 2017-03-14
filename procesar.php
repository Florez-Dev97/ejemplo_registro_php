<?php  
	# Valida si la variable peticion está definida
	if( isset($_POST["hdPeticion"]) ) {

		$peticion = $_POST["hdPeticion"];

		# Datos de la conexion
		$servidor = "localhost";
		$user = "root";
		$password = "";
		$dbname = "prueba_registro";

		$conexion = mysqli_connect($servidor, $user, $password, $dbname);

		# si la conexion falla imprimimos mensaje
		if(!$conexion) {
			echo "Hubo un error al conectar";
		
		} else {
			if($peticion == "login") {
				# captura de parametros
				$txtUsuario = $_POST["txtUsuario"];
				$txpContra = $_POST["txpContra"];

				# creacion de consulta
				$sSQL = "select * from usuar105 where username = '".$txtUsuario."' and clave = '".$txpContra."'";
				$sentencia = mysqli_query($conexion, $sSQL);

				# validamos si existe el registro buscado
				if($registro = mysqli_fetch_array($sentencia)) {
					# si existe, se saluda al usuario
					echo "Bienvenid@ ".$registro["nombre"];

					# link para modificar datos
					$link = "<a href='registro.php?accion=u&id=".$registro["id_usuario"]."'>Actualizar mis datos</a>";
					echo "<br>".$link;
				}
		
			} else if($peticion == "registro") {
				$txtDocumento = $_POST["txtDocumento"];
				$txtNombre = $_POST["txtNombre"];
				$txtEmail = $_POST["txtEmail"];
				$txtUsuario = $_POST["txtUsuario"];
				$txpContra = $_POST["txpContra"];

				$sSQL = "insert into usuar105(documento, nombre, email, username, clave) values('".$txtDocumento."', '".$txtNombre."', '".$txtEmail."', '".$txtUsuario."', '".$txpContra."')";

				$sentencia = mysqli_query($conexion, $sSQL);

				if($sentencia) {
					echo "Usuario agregado<br>";
					echo "<a href='index.php'>Inicio</a>";
				}

			} else if($peticion == "actualizacion") {
				$txtDocumento = $_POST["txtDocumento"];
				$txtNombre = $_POST["txtNombre"];
				$txtEmail = $_POST["txtEmail"];
				$hdID = $_POST["hdID"];

				$sSQL = "update usuar105 set ";
				$sSQL .= "documento = '".$txtDocumento."', ";
				$sSQL .= "nombre = '".$txtNombre."', ";
				$sSQL .= "email = '".$txtEmail."' ";
				$sSQL .= "where id_usuario = ".$hdID;
				$sentencia = mysqli_query($conexion, $sSQL);

				if($sentencia) {
					echo "Usuario modificado<br>";
					echo "<a href='index.php'>Inicio</a>";
				}
			}

			# cerramos la conexion	
			mysqli_close($conexion);
		}
	} else {
		# En caso de que no redireccionamos al index
		header("Location: index.php?err_peticion");
	}
?>