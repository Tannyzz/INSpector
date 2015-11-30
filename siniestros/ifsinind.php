<?php 
	session_start();
	include("../php/conex.php");
	include("../php/hour_control.php");
	$conexion = mysqli_connect($ruta,$user,$pass,$db);
	$conexion2 = mysqli_connect($ruta,$user,$pass,"follow");

	 if($_SESSION['user'] == ""){ ?>
	 	<script type="text/javascript">
                        alert("ERROR: Ingresa primero al sistema para poder solicitar la pagina que deseas.");
                        location.href = "../login.php";
                </script>

                <?php } ?>
<!DOCTYPE html>
<html>
<head>
	<title>Informe de Siniestro Individual</title>
	<meta content="text/html;" http-equiv="content-type" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
		<link rel="stylesheet" type="text/css" href="../materialize/css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="../materialize/css/stylenterprise.css"/>
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="teal">
	<div class="container" style="background-color: white;">
			<img src="../images/logo-oficial.jpg" height="250px" width="250px" class="left responsive-img">
			<div>
			    <nav style="height: 161px; " id="degradado">
			    <div class="container">
				      <div class="nav-wrapper">
				        <h4 style="line-height: 150px;" class="center">Alta de Siniestro Individual</h4>				        
				      </div>
				     </div>
			    </nav>
		    </div>
			<div class="logo-siniestro center"><img src="../images/logo-oficial.jpg" height="350px" width="350px" class="responsive-img"></div>
			<!--Tabla de ingreso de datos-->
			<div class="center container">
				<table class="bordered centered">
			        <tbody>
			        	<form method="post">
			          <tr>
			            <td class="teal white-text" >Siniestro No.</td>
			            <td><input  type="text" name="siniestro" placeholder="Ingresa número de Siniestro"></td>
			          </tr>
			          <tr>
			            <td class="teal white-text" >Tipo de Siniestro:</td>
			            <td>
						    <select name="tipo" class="browser-default">
						      <option value="" disabled selected>Selecciona tu producto</option>
						      <option value="" disabled>------Productos BANAMEX------</option>
						      <option value="EMERGENCIA MEDICA EN EFECTIVO">EMERGENCIA MEDICA EN EFECTIVO</option>
						      <option value="NÓMINA SEGURA BANAMEX">NÓMINA SEGURA BANAMEX</option>
						      <option value="VIDA BANAMEX Mas">VIDA BANAMEX Mas</option>
						      <option value="SEGURO INTEGRAL CONTRA MUERTE ACCIDENTAL">SEGURO INTEGRAL CONTRA MUERTE ACCIDENTAL</option>
						      <option value="SEGURO CONTRA CÁNCER">SEGURO CONTRA CÁNCER</option>
						      <option value="PROTECCION INTEGRAL CONTRA ACCIDENTES PLAN INTEGRAL">PROTECCION INTEGRAL CONTRA ACCIDENTES PLAN INTEGRAL</option>
						      <option value="PROTECCIÓN INTEGRAL CONTRA ACCIDENTES">PROTECCIÓN INTEGRAL CONTRA ACCIDENTES</option>
						      <option value="PLAN BÁSICO">PLAN BÁSICO</option>
						      <option value="TIEMPOS DE VIDA I">TIEMPOS DE VIDA I</option>
						      <option value="TIEMPOS DE VIDA II">TIEMPOS DE VIDA II</option>
						      <option value="VIDA PLUS">VIDA PLUS</option>
						      <option value="" disabled>------Productos BANCOMER------</option>
						      <option value="VIDA SEGURA">VIDA SEGURA</option>
						      <option value="FAMILIA SEGURA">FAMILIA SEGURA</option>
						      <option value="META SEGURA">META SEGURA</option>
						      <option value="PRIMER DIAGNOSTICO DE CANCER">PRIMER DIAGNOSTICO DE CANCER</option>
						      <option value="INVALIDEZ">INVALIDEZ</option>
						      <option value="GASTOS MEDICOS">GASTOS MEDICOS</option>
						      <option value="GASTOS HOSPITALARIOS">GASTOS HOSPITALARIOS</option>
						      <option value="" disabled>------Productos GNP------</option>
						      <option value="SINIESTROS ESPECIALES VIDA">SINIESTROS ESPECIALES VIDA</option>
						      <option value="" disabled>------Productos SANTANDER------</option>
						      <option value="VIDA">VIDA</option>
						      <option value="FRAUDE">FRAUDE</option>
						    </select>
						</td>
			          </tr>
			          <tr>
			            <td class="teal white-text" >Asegurado:</td>
			            <td><input type="text" name="asegurado" placeholder="Ingresa Nombre de Asegurado"></td>
			          </tr>
			</div><br>
			<tr>
				<td>
					<p class="orange-text text-darken-5 center">SSIAS, Sistema de Seguimiento e Investigación detallado de Actividades en Siniestros.</p></td>
					<td><p class="center">Cada Siniestro tendrá un SSIAS asociado para que el Cliente de seguimiento a su caso.</p></td>
				
			</tr>

					<tr>
			            <td class="teal white-text" >Quien da de alta el SSIAS</td>
			            <td><input type="text" readonly name="userAlta" value="<?php echo $_SESSION['user']; ?>"></td>
			          </tr>
			          <tr>
			            <td class="teal white-text" >Investigador Asignado:</td>
			            <td><select name="inves"  class="z-depth-2 browser-default">
					      <option value="" disabled selected>SELECCIONA AL INVESTIGADOR </option>
							<?php 
								if (mysqli_connect_errno()) { 	
                                  		echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{                                
                                	$result = mysqli_query($conexion,"SELECT `user` FROM `user_ins_2018` WHERE `type`=3 OR `type` = 0");
                                          while($row = mysqli_fetch_array($result)){ ?>
										      <option value="<?php echo $row['user'];?>"><?php echo $row['user'];?></option>	
					      <?php  } } ?>				      
					    </select>
					    </td>
			          </tr>
			         
			        </tbody>
			      </table>


			<h5 class=" center red-text text-lighten-1"><b>AVISO:</b> Verifica bien los datos antes de continuar. El SSIAS es obligatorio.</h5>
		</div>	
			   <footer class="page-footer" id="degradado" >				          				
				          <div class="footer-copyright">
				            <div class="container">
				            © 2015 INSpector, Asesores Profesionales.
								
				            <input class="right btn waves-effect waves-light" value="Continuar" type="submit" name="continuar">
								  
								   </form>
				            </div>

				          </div>
				        </footer>
	
	<?php 
		if (isset($_POST['continuar'])) {

			$siniestro = $_POST['siniestro'];
			$tipo = $_POST['tipo'];
			$asegurado = strtoupper(ucwords(str_replace('Ñ','Ã±',$_POST['asegurado'])));
			$userAlta = $_POST['userAlta'];
			$investigador= $_POST['inves'];

      			 if (mysqli_connect_errno()) {
                              echo "<center><p style=\"color:#b40000\"><strong>Falló la conexion a la Base de Datos.</strong></p></center>";
                              
                        }else{

                        	$create = "CREATE TABLE `$siniestro`(
                        				`pic` INT(10) NOT NULL AUTO_INCREMENT,
                                        `num_sin` VARCHAR(100) NOT NULL,
                                        `date_control` VARCHAR(80) NOT NULL,
                                        `description` VARCHAR(1000) NOT NULL,
                                        `inves` VARCHAR(50),
                                        `state` VARCHAR(20) NOT NULL,
                                        `picture1` VARCHAR(200) NOT NULL,
                                        `picture2` VARCHAR(200) NOT NULL,
                                        `picture3` VARCHAR(200) NOT NULL,
                                        `lat` VARCHAR(15) NOT NULL,
                                        `lng` VARCHAR(15) NOT NULL,
                                        PRIMARY KEY(pic)
                                        );";
                        	 	mysqli_query($conexion2,$create);

                        	$inicializacion = "INSERT INTO `follow`.`$siniestro` (
                        		`pic`, 
                        		`num_sin`, 
                        		`date_control`, 
                        		`description`, 
                        		`inves`,
                        		`state`,
	                            `picture1`,
	                            `picture2`,
	                            `picture3`,
                        		`lat`,
                        		`lng`) VALUES (NULL,'$siniestro','$horaDeControl','SSIAS iniciado','$investigador',1,'img_follow/9019irb_INSpector.jpeg','img_follow/9019irb2_INSpector.jpeg','img_follow/9019irb3_INSpector.jpeg',' ',' ');";
							mysqli_query($conexion2,$inicializacion);
							
							$status = "INSERT INTO `follow`.`casosF` (`id`,`case`,`typeSin`,`asegurado`,`status`,`statusSin`,`inves`,`highuser`) VALUES (NULL,'$siniestro','$tipo','$asegurado',1,1,'$investigador','$userAlta');";

							mysqli_query($conexion2,$status);                        	
                        	mysqli_close($conexion2); 

                        	header('Location: ../siniestros/ifsinind2.php?siniestro=$siniestro&&asegurado=$asegurado&&tipo=$tipo');
      		}
		}
	 ?>

</body>
</html
