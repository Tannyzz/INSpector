<?php 
	session_start();
	include("../php/conex.php");
	include("../php/hour_control.php");
	$conexion = mysqli_connect($ruta,$user,$pass,$db);
	$siniestro = $_GET['siniestro'];
	$tipo = $_GET['tipo'];
	$asegurado = $_GET['asegurado'];
	$us = $_SESSION['user'];

	if($_SESSION['user'] == ""){ ?>
	 	<script type="text/javascript">
                        alert("ERROR: Ingresa primero al sistema para poder solicitar la pagina que deseas.");
                        location.href = "../login.php";
                </script>

                <?php }

    if (mysqli_connect_errno()){ 	
            echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
        }else{                                
            $result = mysqli_query($conexion,"SELECT * FROM `user_ins_2018` WHERE `user` = '$us'");
            while($row = mysqli_fetch_array($result)){
            		$type = $row['type'];
            } 
        }
        if($type == 3){
        	$hide = "hide";
        	$read = "readonly";	

        	if (mysqli_connect_errno()) {
 	
            echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
        }else{                                
            $result = mysqli_query($conexion,"SELECT * FROM `siniestro` WHERE `siniestro` = '$siniestro' and `asegurado` = '$asegurado'");
            while($row = mysqli_fetch_array($result)){

            	$d1 = $row['poliza'];
            	$d2 = $row['fechaSiniestro'];
            	$d3 = $row['tipoReclamo'];
            	$d4 = $row['sumaAsegurada'];
            	$d5 = $row['producto'];
            	$d6 = $row['lugSiniestro'];
            	$d7 = $row['causasFalle'];
            	$d8 = $row['causasInve'];
            	$d9 = $row['domicilio'];
            	$d10 = $row['ocupacion'];            	
            	$d11 = $row['porcentaje'];
            	}
            }

        }elseif ($type == 0 or $type == 1 or $type == 2 or $type == -1) {
        	$hide = "";
        	$read = "";
        	$hide = $_GET['vzlcn'];
        	$read = $_GET['ride'];

        		if (mysqli_connect_errno()) {
 	
            echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
        }else{                                
            $result = mysqli_query($conexion,"SELECT * FROM `siniestro` WHERE `siniestro` = '$siniestro' and `asegurado` = '$asegurado'");
            while($row = mysqli_fetch_array($result)){
            	$d0 = $row['idSiniestro'];
            	$d1 = $row['poliza'];
            	$d2 = $row['fechaSiniestro'];
            	$d3 = $row['tipoReclamo'];
            	$d4 = $row['sumaAsegurada'];
            	$d5 = $row['producto'];
            	$d6 = $row['lugSiniestro'];
            	$d7 = $row['causasFalle'];
            	$d8 = $row['causasInve'];
            	$d9 = $row['domicilio'];
            	$d10 = $row['ocupacion'];
            	$d11 = $row['porcentaje'];
            	$d12 = $row['exclusion'];
            	}
            }
        }
?>

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
			<h4 class="teal-text center">Datos complementarios</h4>
			<h5 class="<?php echo $hide; ?> red-text center container"><b>AVISO:</b> No puedes dejar espacios en blanco, si no cuentas con el dato solicitado pon un asterisco (*), más adelante podrás modificarlos si cuentas con los permisos necesarios.</h5>
			<!--Tabla de ingreso de datos-->
			<div class="center container">
				<table class="bordered centered">
			        <tbody>
			        	<form method="post">
			          <tr>
			            <td class="teal white-text" >Asegurado:</td>
			            <td><input required readonly type="text" value="<?php echo ucwords(str_replace('Ã±','ñ',$asegurado)); ?>"></td>
			          </tr>
			          <tr>
			            <td class="teal white-text" >Póliza:</td>
			            <td><input value="<?php echo $d1; ?>" <?php echo $read; ?> required type="text" name="poliza" placeholder="Escribe aquí"></td>
			          </tr>
			          <tr>
			            <td class="teal white-text" >Siniestro:</td>
			            <td><input required readonly type="text" value="<?php echo $siniestro; ?>"></td>
			          </tr>
			           <tr>
			            <td class="teal white-text" >Fecha de Siniestro:</td>
			            <td><input value="<?php echo $d2; ?>" <?php echo $read; ?> required type="date" name="fechasiniestro"></td>
			          </tr>
			           <tr>
			            <td class="teal white-text" >Tipo de reclamación:</td>
			            <td><input value="<?php echo $tipo; ?>" required readonly type="text" name="tiporeclamacion" placeholder="Escribe aquí"></td>
			          </tr>
			           <tr>
			            <td class="teal white-text" >Suma Asegurada:</td>
			            <td><input value="<?php echo "$".$d4; ?>" <?php echo $read; ?> required type="text" name="monto"></td>
			          </tr>
			          <tr>
			            <td class="teal white-text" >Producto:</td>
			            <td>
			            <select <?php if($read == "readonly"){ $read = "disabled";
			          		echo $read; } ?> name="lugarsiniestro" class="browser-default">
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
						    </select><br><input value="<?php echo $d5; ?>" <?php echo $read; ?> type="text" readonly>

			            <!--<input value="<?php echo $d5; ?>" <?php echo $read; ?> required type="text" name="producto" placeholder="Escribe aquí"></td>-->
			          </tr>
			          <tr>
			            <td class="teal white-text" >Lugar de Siniestro:</td>
			            <td>
			            <textarea value="<?php echo $d6; ?>" <?php echo $read; ?> required name="lugarsiniestro" placeholder="Escribe aquí" rows="20" cols="50"><?php echo $d6; ?></textarea>
			            <!--<input value="<?php echo $d6; ?>" <?php echo $read; ?> required type="text" name="lugarsiniestro" placeholder="Escribe aquí"></td>-->
			          </tr>
			          <tr>
			            <td class="teal white-text" >Causas del fallecimiento:</td>
			            <td>
			            <textarea value="<?php echo $d7; ?>" <?php echo $read; ?> required name="causasfallecimiento" placeholder="Escribe aquí" rows="20" cols="50"><?php echo utf8_encode($d7); ?></textarea>

			            <!--<input value="<?php echo $d7; ?>" <?php echo $read; ?> required type="text" name="causasfallecimiento" placeholder="Escribe aquí"></td>-->
			          </tr>
			          <tr>
			            <td class="teal white-text" >Causas de investigación:</td>
			            <td>
			            	<textarea value="<?php echo $d8; ?>" <?php echo $read; ?> required name="causasinvestigacion" placeholder="Escribe aquí" rows="20" cols="50"><?php echo $d8; ?></textarea>
			            <!--<input value="<?php echo $d8; ?>" <?php echo $read; ?> required type="text" name="casuasinvestigacion" placeholder="Escribe aquí"></td>-->
			          </tr>
			          <tr>
			            <td class="teal white-text" >Domicilio particular:</td>
			            <td>
			            	<textarea value="<?php echo $d9; ?>" <?php echo $read; ?> required name="domicilio" placeholder="Escribe aquí" rows="20" cols="50"><?php echo $d9; ?></textarea>

			            <!--<input value="<?php echo $d9; ?>" <?php echo $read; ?> required type="text" name="domicilio" placeholder="Escribe aquí"></td>-->
			          </tr>
			          <tr>
			            <td class="teal white-text" >Ocupación de Asegurado:</td>
			            <td><input value="<?php echo $d10; ?>" <?php echo $read; ?> required type="text" name="ocupacionasegurado" placeholder="Escribe aquí"><br>
			            	<input name="exclusion" value="EXCLUSIÓN" type="radio" id="test1"/><label for="test1">Exclusión</label>
			            	<input name="exclusion" value="RIESGO" type="radio" id="test2"/><label for="test2">Riesgo</label>
			            	<input name="exclusion" value="SIN RIESGO" type="radio" id="test3"/><label for="test3">Sin Riesgo</label><br>
			            	<input value="<?php echo utf8_encode($d12); ?>" <?php echo $read; ?> type="text" readonly>
			            </td>
			          </tr>
			          <tr>
			          	<td class="teal white-text">Porcetanje de avance en investigación: </td>
			          	<td>
			          	<select <?php if($read == "readonly"){ $read = "disabled";
			          		echo $read; } ?> name="porcentaje" required class="z-depth-2 browser-default">
					      <option value="" disabled selected>SELECCIONA UN PORCENTAJE </option>	
					      <option value="1% Inicio de Investigación">1 % Inicio de investigación</option>
					      <option value="10 % de Avance">10 % de Avance</option>
					      <option value="20 % de Avance">20 % de Avance </option>
					      <option value="30 % de Avance">30 % de Avance </option>
					      <option value="40 % de Avance">40 % de Avance </option>
					      <option value="50 % de Avance">50 % de Avance </option>
					      <option value="60 % de Avance">60 % de Avance </option>
					      <option value="70 % de Avance">70 % de Avance </option>
					      <option value="80 % de Avance">80 % A la espera de Documentos</option>
					      <option value="90 % de Avance">90 % Elaboración de Informe</option>
					      <option value="100 % de Avance">100 % para entregar en menos de 48hr </option>	

					    </select><br><input value="<?php echo $d11; ?>" <?php echo $read; ?> type="text" readonly></td>
			          </tr>
			          
			        </tbody>
			      </table>
			</div>
			<h5 class="<?php echo $hide; ?> center red-text text-lighten-1"><b>NOTA:</b> Verifica bien los datos antes de finalizar.</h5>

			   <footer class="page-footer" id="degradado" >				          				
				          <div class="footer-copyright">
				            <div class="container">
				            © 2015 INSpector, Asesores Profesionales.

				            
				            <?php if ($d1 != "") { ?>
				            <input disable disabled class="<?php echo $hide; ?> right btn waves-effect waves-light" type="submit" value="Finalizar" >
				            	 <input class="<?php echo $hide; ?> right btn red waves-effect waves-light" type="submit" value="Actualizar" name="actualizar">
				            	 
				            <?php } else{ ?>
				            <input class="<?php echo $hide; ?> right btn waves-effect waves-light" type="submit" value="Finalizar" name="finalizar">
								 <input disable disabled class="<?php echo $hide; ?> right btn red waves-effect waves-light" type="submit" value="actualizar">
				            	<?php } ?>
				           
				            </form>
				            </div>
				          </div>
				        </footer>
	</div>

	<?php 

	if (isset($_POST['finalizar'])) {

			$poliza = $_POST['poliza'];
			$fechaSiniestro = $_POST['fechasiniestro'];
			$tiporeclamacion = strtoupper($_POST['tiporeclamacion']);
			$sumaAsegurada = $_POST['monto'];
			$producto = strtoupper($_POST['producto']);
			$lugarsiniestro = strtoupper($_POST['lugarsiniestro']);
			$causasfallecimiento = strtoupper($_POST['causasfallecimiento']);
			$casuasinvestigacion = strtoupper($_POST['casuasinvestigacion']);				
			$domicilio = strtoupper($_POST['domicilio']);
			$ocupacionasegurado = strtoupper($_POST['ocupacionasegurado']);
			$porcentaje = $_POST['porcentaje'];
			$exclusion = strtoupper($_POST['exclusion']);

		 if (mysqli_connect_errno()) {
                              echo "<center><p style=\"color:#b40000\"><strong>Falló la conexion a la Base de Datos.</strong></p></center>";
                              
                        }else{

                        	$datosSiniestro = "INSERT INTO `inspector`.`siniestro`(
                        		`idSiniestro`,
                        		`asegurado`, 
                        		`poliza`, 
                        		`siniestro`, 
                        		`fechaSiniestro`, 
                        		`tipoReclamo`, 
                        		`sumaAsegurada`, 
                        		`producto`, 
                        		`lugSiniestro`, 
                        		`causasFalle`, 
                        		`causasInve`, 
                        		`domicilio`, 
                        		`ocupacion`,
                        		`porcentaje`,
                        		`exclusion`) VALUES (NULL,'$asegurado','$poliza','$siniestro','$fechaSiniestro','$tiporeclamacion','$sumaAsegurada','$producto','$lugarsiniestro','$causasfallecimiento','$casuasinvestigacion','$domicilio','$ocupacionasegurado','$porcentaje','$exclusion')";
                        	mysqli_query($conexion,$datosSiniestro);
                        	mysqli_close($conexion);
                        	?>
							<script type="text/javascript">
		                        alert("<?php  echo "Se ha dado de alta correctamente el Siniestro y el SSIAS numero ".$siniestro.".."; ?>");	
		                        window.close();	                    
		                	</script>
                        	 	<?php     	 		
                        }
	}
	if (isset($_POST['actualizar'])) {

			$poliza = $_POST['poliza'];
			$fechaSiniestro = $_POST['fechasiniestro'];
			$tiporeclamacion = $_POST['tiporeclamacion'];
			$sumaAsegurada = $_POST['monto'];
			$producto = $_POST['producto'];
			$lugarsiniestro = $_POST['lugarsiniestro'];
			$causasfallecimiento = $_POST['causasfallecimiento'];
			$casuasinvestigacion = $_POST['casuasinvestigacion'];				
			$domicilio = $_POST['domicilio'];
			$ocupacionasegurado = $_POST['ocupacionasegurado'];
			$porcentaje = $_POST['porcentaje'];
			$exclusion = $_POST['exclusion'];

		 if (mysqli_connect_errno()) {
                              echo "<center><p style=\"color:#b40000\"><strong>Falló la conexion a la Base de Datos.</strong></p></center>";
                              
                        }else{

                        	$datosSiniestro = "UPDATE `siniestro` SET `asegurado`='$asegurado',
												`poliza`='$poliza',
												`siniestro`='$siniestro',
												`fechaSiniestro`='$fechaSiniestro',
												`tipoReclamo`='$tiporeclamacion',
												`sumaAsegurada`='$sumaAsegurada',
												`producto`='$producto',
												`lugSiniestro`='$lugarsiniestro',
												`causasFalle`='$causasfallecimiento',
												`causasInve`='$casuasinvestigacion',
												`domicilio`='$domicilio',
												`ocupacion`='$ocupacionasegurado', 
												`porcentaje` = '$porcentaje',
												`exclusion` = '$exclusion' WHERE `idSiniestro`='$d0'";
                        	mysqli_query($conexion,$datosSiniestro);
                        	mysqli_close($conexion);
                        	?>
							<script type="text/javascript">
		                        alert("<?php  echo "Se ha modificado correctamente el Siniestro número ".$siniestro."."; ?>");	
		                        window.close();	                    
		                	</script>
                        	 	<?php     	 		
                        }
	}
			
	 ?>



</body>
</html