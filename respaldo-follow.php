<?php
	include("php/hour_control.php");
	include("php/conex.php");
	$conex = mysqli_connect($ruta,$user,$pass,"follow");
	$siniestro = $_GET['S'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Follow</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
		<link rel="stylesheet" type="text/css" href="materialize/css/materialize.css"  media="screen,projection"/>
		 <meta http-equiv="refresh" content="5000">
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
	<div class="navbar-fixed">
			    <nav class="teal" >
				      <div class="nav-wrapper">
				        <a  href="home_admin.php" class="brand-logo"><i class="material-icons left">arrow_back</i>INSpector System</a>
				              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

				        <ul class="right hide-on-med-and-down">
				          <li><a href="encriptacion.php"><i class="mdi-action-account-child right"></i>Registrar Cuenta</a></li>
				          <li><a href="logout.php"><i class="mdi-navigation-close right"></i>Cerrar sesión</a></li>
				        </ul>
				        <ul class="side-nav" id="mobile-demo">
				         <li><a href="encriptacion.php"><i class="mdi-action-account-child right"></i>Registrar Cuenta</a></li>
				          <li><a href="logout.php"><i class="mdi-navigation-close right"></i>Cerrar sesión</a></li>
 					     </ul>
				      </div>
			    </nav>
		    </div>
	<div class="container"><br>	
	<h3 class="teal-text center">Follow</h3>
	<div class="container">
	<h6 class="center container">Sistema de investigación y seguimiento detallado de actividades en siniestros</h6>
	</div>
	<h4>Siniestro No. <?php echo $siniestro; ?></h4>
		
		<?php  
		if (mysqli_connect_errno()) {
 	
            echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
        }else{                                
            $result = mysqli_query($conex,"SELECT inves FROM $siniestro WHERE pic = 1");
            while($row = mysqli_fetch_array($result)){?>
					<h5>Investigador asignado: <?php echo ucwords(str_replace('.', ' ',$row['inves'])); } }?></h5>
	<form method="post">
			<button type="submit" name="place" class="orange waves-effect waves-light btn"><i class="mdi-navigation-expand-more right"></i>Nuevo</button><br><br>
			<a href="geo.html" class="orange waves-effect waves-light btn"><i class="mdi-communication-location-on right"></i>Localización</a>
		</form>
		<?php 
			if(isset($_POST['place'])){ ?>
					<div class="row">
					    <form class="col s12 center" method="post">
					      <div class="row">
					        <div class="input-field col s6">
					          <i class="mdi-editor-mode-edit prefix"></i>
					          <textarea required id="icon_prefix2" class="materialize-textarea" name="text"></textarea>
					          <label for="icon_prefix2">Describe tu tarea</label>
					        </div>
					         <div class="col s6">				        	
									    <p>
									      <input style="color:#00BCD4" required name="state" type="radio" id="0" />
									      <label for="0">En ejecución</label>
									    </p>										
					        </div>					       
					      </div>
					      <div class="row left-align">					      	
					        <div class="col s12">									
								<input type="file" name="imagen" id="imagen" />		
					        	<button type="submit" name="guardar" class="cyan waves-effect waves-light btn right"><i class="mdi-navigation-check right"></i>Guardar</button>					        						        		
					        </div>
					      </div>
					    </form>
					    <form method="post">
					    	<button type="submit" name="canceled" class="red waves-effect waves-light btn right"><i class="mdi-navigation-close right"></i>Cancelar</button>
					    </form>
					  </div>

			<?php }

			 if(isset($_POST['guardar'])){
					$text = $_POST['text'];
					$state = $_POST['state'];
						if(mysqli_connect_errno()){ 	
					       echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
					    }else{
						   	$sql = "INSERT INTO `follow`.`$siniestro` (`pic`, `num_sin`, `date_control`, `description`, `inves`, `state`) VALUES (NULL, '$siniestro', '$horaDeControl', '$text', NULL ,'$state');";
								$resultado = mysqli_query($conex,$sql);
								mysqli_close($conex);
								header("Location: follow.php?S=$siniestro");    
			            }  
			}
			if(isset($_POST['canceled'])){
				header("Location: follow.php?S=$siniestro");  
			}


				 ?>
	<div class="divider"></div>
		<div class="divider"></div>
		<?php       if (mysqli_connect_errno()) {
 	
                                  echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{                                
                                $result = mysqli_query($conex,"SELECT * FROM $siniestro ORDER BY pic DESC");
                
                                        while($row = mysqli_fetch_array($result)){ 
                                        	$id_delete = $row['pic'];
                                        	$modify = $row['state'];?>
						<h4><?php echo $row['num_sin']?></h4>
						<h6 style="color:#c5cae9"><?php echo $row['date_control']." - ID de control de sistema: ".$id_delete?></h6>
						<p class="flow-text"><?php echo $row['description']?></p>
						<p>Estado de la tarea: <?php if($row['state'] == 0){ 
								echo "<span style=\"color:#c62828\">En ejecución</span>";?>
								<form name="gestion" method="post">
									<button name="maps" class="btn purple waves-effect waves-light btn right"><i class="material-icons">place</i></button>
									<button value="<?php echo $id_delete?>" name="delete" class="red waves-effect waves-light btn right"><i class="mdi-action-delete right"></i></button>
									<button value="<?php echo $id_delete?>" name="modify" class="light-blue waves-effect waves-light btn right"><i class="mdi-image-rotate-right right"></i></button>
									
								</form> 
						<?php
							}else{
								echo "<span style=\"color:#00BCD4\">Finalizada</span>";?>
								<form name="gestion" method="post">
								<button name="maps" class="btn purple waves-effect waves-light btn right"><i class="material-icons">place</i></button>
									<button disabled="true" value="<?php echo $id_delete?>" name="delete" class="btn disabled red waves-effect waves-light btn right"><i class="mdi-action-delete right"></i></button>
									<button disabled="true" value="<?php echo $id_delete?>" name="modify" class="btn disabled light-blue waves-effect waves-light btn right"><i class="mdi-image-rotate-right right"></i></button>
									
								</form>
								<?php }?></p>
								
								
						<div class="divider"></div>
		<?php } 
		}

		if(isset($_POST['delete'])){
				$value = $_POST['delete'];
				if(mysqli_connect_errno()){ 	
					       echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
					    }else{
						   	$sql = "DELETE FROM `follow`.`$siniestro` WHERE `$siniestro`.`pic` = '$value'";
								$resultado = mysqli_query($conex,$sql);
								mysqli_close($conex);
								header("Location: follow.php?S=$siniestro");    
			            } 
			}
		if(isset($_POST['modify'])){
				$value = $_POST['modify'];				
					if(mysqli_connect_errno()){ 	
					       echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
					    }else{
						   	$sql = "UPDATE  `follow`.`$siniestro` SET  `state` = '1' WHERE  `$siniestro`.`pic` = '$value';";
								$resultado = mysqli_query($conex,$sql);
								mysqli_close($conex);
								header("Location: follow.php?S=$siniestro");    
			            } 
				
		}

		 ?>

		
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	</body>
</html>





?>

					    <script type="text/javascript">		
										function detectar(){			   					
											if(geo_position_js.init())
											{
												geo_position_js.getCurrentPosition(mostra_ubicacion,function(){document.getElementById('mapa').innerHTML="No se puedo detectar la ubicación"},{enableHighAccuracy:true});
											}	else	{
												document.getElementById('mapa').innerHTML="La geolocalización no funciona en este navegador.";
											}	
										}						
										function mostra_ubicacion(p){
											var lat = p.coords.latitude;
											var lng = p.coords.longitude;

											document.getElementById("lat").value;
											document.getElementById("lng").value;
											document.getElementById("lat").value=lat;
											document.getElementById("lng").value=lng;																					
										}
				</script>


					    <?php