<?php 
	session_start();
	include("../php/conex.php");
	include("../php/hour_control.php");
	$conex = mysqli_connect($ruta,$user,$pass,"follow");
	$conex1 = mysqli_connect($ruta,$user,$pass,"ins_bitacor");

	if($_SESSION['user'] == ""){ ?>
	 	<script type="text/javascript">
                        alert("ERROR: Ingresa primero al sistema para poder solicitar la pagina que deseas.");
                        location.href = "login.php";
                </script>

                <?php } ?>	
<!DOCTYPE html>
<html>
<head>
	<title>Bitacora - INSpector</title>
	<meta content="text/html;" http-equiv="content-type" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
		<link rel="stylesheet" type="text/css" href="../materialize/css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="../materialize/css/stylenterprise.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style type="text/css">
			.mi-input::-webkit-input-placeholder { color: black; font-weight :bold; }
			.mi-input:-moz-placeholder { color: black; font-weight: bold; }
			.mi-input::-moz-placeholder { color: black; font-weight: bold; }
			.mi-input:-ms-input-placeholder { color: black; font-weight: bold; }
		</style>
</head>
<body style="background-color: #ffffff">
	<div>
		<h3 class="center blue-grey-text">INSpector Bitácora</h3>
	</div>
	<div class=" container divider blue-grey"></div><br>

	<div class="row">
		<div class="col s12 m6 l6">
				<div class="center">
					<form method="post">
						<button class="amber btn waves-effect waves-light" type="submit" name="agregar">Agregar acción
			   				 <i class="material-icons">create</i>
			  			</button>
			  			<button class="ambar btn waves-effect waves-light" type="submit" name="crear">Crear bitacora
			   				 <i class="material-icons">add</i>
			  			</button>
		  			</form>
		  		</div>		
		</div>
		<div class="col s12 m6 l6">
				<h6><b>Selecciona un número de Siniestro para ver su bitácora:</b></h6>
				<form method="post">
					<select class="browser-default" name="consultaBitacora">
					    <option value="" disabled selected>Selecciona el Siniestro</option>

							    <?php 
							    if (mysqli_connect_errno()) { 	
                                  		echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{                                
                                	$result = mysqli_query($conex,"SELECT `case` FROM `casosF` WHERE `statusSin`= 1 AND `bitacora` = 1");                              	

                                          while($row = mysqli_fetch_array($result)){ 
                                          		?>
                                          		<option value="<?php echo $row['case']; ?>"><?php echo $row['case']; ?></option>
                                          		<?php } } ?>
					</select><br>
					<button class="indigo btn waves-effect waves-light right" type="submit" name="consulta">consultar
			   					 <i class="material-icons right">library_books</i>
			  		</button>
			  	</form>


		</div>
	</div>

	<?php if(isset($_POST['crear'])){ ?>
						<form method="post">	
						<div class="row container">
						<div class="container">
							<div class="col s12 teal" style="border-radius: 10px">
							<b><label class="black-text">Dar de alta la bitácora del Siniestro:</label></b>
							  <select class="browser-default" name="altaBitacora">
							    <option value="" disabled selected>Selecciona el Siniestro</option>

							    <?php 
							    if (mysqli_connect_errno()) { 	
                                  		echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{                                
                                	$result = mysqli_query($conex,"SELECT `case` FROM `casosF` WHERE `statusSin`=1 AND `bitacora` = 0");                              	

                                          while($row = mysqli_fetch_array($result)){ 
                                          		?>
                                          		<option value="<?php echo $row['case']; ?>"><?php echo $row['case']; ?></option>
                                          		<?php } } ?>
							  </select>
							  <b><label class="black-text">Usuario que da de alta la bitácora</label></b>
							   <div class="input-field col s12">							   
						          <input name="usuarioAltaBitacora" disabled value="<?php echo $_SESSION['user']; ?>" id="disabled" type="text" class="validate white-text">
						        </div><br>
							<div class="right">
								<button class="btn waves-effect waves-light" type="submit" name="crear1">crear
				   					 <i class="material-icons">send</i>
				  				</button>
				  				<button class="red btn waves-effect waves-light" type="submit" name="cancelar">Cancelar
				   					 <i class="material-icons">delete</i>
				  				</button>
			  				</div>
			  				</div>
						</div>
					</div>
		  			</form>
		  				

		<?php }
			if(isset($_POST['agregar'])){ ?>
				<div class="row container">
						<div class="container">
						<form method="post">
							<div class="col s12 amber" style="border-radius: 10px">
							<b><label class="black-text">Agregar a la bitácora:</label></b>
							  <select class="browser-default" name="agregarTarea">
							    <option value="" disabled selected>Selecciona el Siniestro</option>

							    <?php 
							    if (mysqli_connect_errno()) { 	
                                  		echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{                                
                                	$result = mysqli_query($conex,"SELECT `case` FROM `casosF` WHERE `statusSin`=1 AND `bitacora` = 1");                              	

                                          while($row = mysqli_fetch_array($result)){ 
                                          		?>
                                          		<option value="<?php echo $row['case']; ?>"><?php echo $row['case']; ?></option>
                                          		<?php } } ?>
							  </select>
								<input class="mi-input" type="text" name="titulo" placeholder="TITULO" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
								<div class="input-field col s12">
						          <textarea id="textarea1" name="descripcion" class="mi-input materialize-textarea" placeholder="Descripción"></textarea>
						        </div>
							</div>
														
			  				<button class="red btn waves-effect waves-light right" type="submit" name="cancelar">Cancelar
			   					 <i class="material-icons">delete</i>
			  				</button>
			  				<button class="amber darken-3 btn waves-effect waves-light right" type="submit" name="agregar1">Agregar
			   					 <i class="material-icons">send</i>
			  				</button>
			  				</form>
						</div>	
					</div>	

				
			<?php } 

			/*Apartado 
			para la creacion de la bitacora
			segun el numero de siniestro que elija*/

			if(isset($_POST['crear1'])){

					$bitacoraSiniestro = $_POST['altaBitacora'];
					$usuarioAltaBitacora = $_SESSION['user'];
					$titulo = "INICIO";
					$descripcion = "Bitácora inicializada. Sistema INSpector";


					$creacionBitacora = "CREATE TABLE IF NOT EXISTS `$bitacoraSiniestro` (
										  `id` int(15) NOT NULL AUTO_INCREMENT,
										  `usuario` varchar(30) COLLATE utf8mb4_bin NOT NULL,
										  `hora_control` varchar(60) COLLATE utf8mb4_bin NOT NULL,
										  `titulo` varchar(100) COLLATE utf8mb4_bin NOT NULL,
										  `msj` varchar(500) COLLATE utf8mb4_bin NOT NULL,
										  PRIMARY KEY (`id`)
										) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=1;";
					
					$primerComentario = "INSERT INTO `$bitacoraSiniestro` (
										`id`,
										`usuario`,
										`hora_control`,
										`titulo`,
										`msj`) VALUES (NULL,'$usuarioAltaBitacora','$horaDeControl','$titulo','$descripcion')";
					
					$cambioActivo = "UPDATE `casosF` SET `bitacora`= 1 WHERE `case`='$bitacoraSiniestro'";
					$consultaDeBitacora = "SELECT * FROM `$bitacoraSiniestro` ORDER BY id DESC";

					if (mysqli_connect_errno()) { 	
                                  		echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{ 

                                	mysqli_query($conex1,$creacionBitacora);
                                	mysqli_query($conex1,$primerComentario);
                                	mysqli_query($conex,$cambioActivo);

                                	$result = mysqli_query($conex1,$consultaDeBitacora); 	?>								                               	
                                			<p class="flow-text indigo-text">Bitacora de Siniestro: <b><?php echo $bitacoraSiniestro; ?></b></p>
                                          <?php while($row = mysqli_fetch_array($result)){ ?>                                          		
                                          		<ul class="collection">
												    <li class="collection-item avatar">
												      <i class="material-icons circle indigo">library_books</i>
												      <b><span class="title"><?php echo $row['titulo']; ?></span></b>
												      <p><?php echo $row['hora_control']; ?> <br>
												         <h5><?php echo $row['msj']; ?></h5>
												      </p>
												      <p class="secondary-content"><i class="material-icons right">person</i><?php echo $row['usuario']; ?></p>
												    </li>
												 </ul>
                                          		<?php }
                                }
                                	mysqli_close($conex);
                                	mysqli_close($conex1);
                 }

				/*Apartado
				para agregar una nueva tarea
				a la bitacora seleccionada*/

				if(isset($_POST['agregar1'])){

					$agregarEnSiniestro = $_POST['agregarTarea'];
					$usuarioAltaBitacora = $_SESSION['user'];
					$titulo = $_POST['titulo'];
					$descripcion = $_POST['descripcion'];

					$agregarABitacora = "INSERT INTO `$agregarEnSiniestro` (
										`id`,
										`usuario`,
										`hora_control`,
										`titulo`,
										`msj`) VALUES (NULL,'$usuarioAltaBitacora','$horaDeControl','$titulo','$descripcion')";
					
					$cambioActivo = "UPDATE `casosF` SET `bitacora`= 1 WHERE `case`='$bitacoraSiniestro'";
					$consultaDeBitacora = "SELECT * FROM `$agregarEnSiniestro` ORDER BY id DESC";

					if (mysqli_connect_errno()) { 	
                                  		echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{ 

                                	mysqli_query($conex1,$agregarABitacora);
                                	$result = mysqli_query($conex1,$consultaDeBitacora); ?>								                               	
												<p class="flow-text indigo-text">Bitacora de Siniestro: <b><?php echo $agregarEnSiniestro; ?></b></p>
                                        <?php  while($row = mysqli_fetch_array($result)){ ?>
                                          		
                                          		<ul class="collection">
												    <li class="collection-item avatar">
												      <i class="material-icons circle indigo">library_books</i>
												      <b><span class="title"><?php echo $row['titulo']; ?></span></b>
												      <p><?php echo $row['hora_control']; ?> <br>
												         <h5><?php echo $row['msj']; ?></h5>
												      </p>
												      <p class="secondary-content"><i class="material-icons right">person</i><?php echo $row['usuario']; ?></p>
												    </li>
												 </ul>
                                          		<?php }

                                	mysqli_close($conex1);
                                }
				}
				/*Apartado
				para la consulta de la bitacora
				seleccionada segun el numero de siniestro*/

				if(isset($_POST['consulta'])){

					$consulta = $_POST['consultaBitacora'];

					$consultaDeBitacora = "SELECT * FROM `$consulta` ORDER BY id DESC";

					if (mysqli_connect_errno()) { 	
                                  		echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{ 

                                	$result = mysqli_query($conex1,$consultaDeBitacora); ?>									                               	
										<p class="flow-text indigo-text">Bitacora de Siniestro: <b><?php echo $consulta; ?></b></p>
                                          <?php while($row = mysqli_fetch_array($result)){ 
                                          		?>

                                          		<ul class="collection">
												    <li class="collection-item avatar">
												      <i class="material-icons circle indigo">library_books</i>
												      <b><span class="title"><?php echo $row['titulo']; ?></span></b>
												      <p><?php echo $row['hora_control']; ?> <br>
												         <h5><?php echo $row['msj']; ?></h5>
												      </p>
												      <p class="secondary-content"><i class="material-icons right">person</i><?php echo $row['usuario']; ?></p>
												    </li>
												 </ul>
                                          		<?php } }                              			


                                	mysqli_close($conex1);
                                }
			if(isset($_POST['cancelar'])){
				header('Location: bitacora.php');
			}
		?>
	
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
      	<script type="text/javascript" src="nav.js"></script>  

</body>
</html>