<?php 
	session_start();
	include("../php/conex.php");
	include("../php/hour_control.php");
	$conex = mysqli_connect($ruta,$user,$pass,"nvl_notes");
	$usuario = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notas - INSpector</title>
		<meta content="text/html;" http-equiv="content-type" charset="utf-8">
		<!--<meta http-equiv="refresh" content="60; url=notas.php">-->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
		<link rel="stylesheet" type="text/css" href="../materialize/css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="../materialize/css/stylenterprise.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><script type="text/javascript" src="materialize/js/refresh.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
      	<script type="text/javascript" src="../nav.js"></script>  
		<style type="text/css">
			.mi-input::-webkit-input-placeholder { color: black; font-weight :bold; }
			.mi-input:-moz-placeholder { color: #bdbdbd; font-weight: bold; }
			.mi-input::-moz-placeholder { color: #bdbdbd; font-weight: bold; }
			.mi-input:-ms-input-placeholder { color: #bdbdbd; font-weight: bold; }

		</style>
		
</head>
<body style="background-color: #ffffff">

			<div class="navbar-fixed">
			    <nav class="blue-grey" >
			    	<div class="container">
				      <div class="nav-wrapper">
				        <a href="#!" class="brand-logo">INSpector Notas</a>
				        <ul class="right hide-on-med-and-down">
				        <form method="post" name="notas">
					          <li><a onclick="javascript: document.getElementById('hidden').className = 'rower'"><i class="material-icons">view_agenda</i></a></li>
					          <li><a onclick="javascript: document.getElementById('hidden').className = 'row'"><i class="material-icons">dashboard</i></a></li>
				         </form>
				        </ul>
				      </div>
			      </div>
			    </nav>
		    </div>	
		    	<form method="post">
					<div class="container">
						<div class="container">						
			    			<ul class="collapsible popout" data-collapsible="accordion">
							    <li>
							      <div class="collapsible-header"><i class="material-icons">create</i><span class="flow-text">Crear nota nueva...</span></div>
							      <div class="collapsible-body">
							      	<center>
								      	<div id="notaColor" class="z-depth-2 black-text" style="margin-top: 2%; margin-bottom: 2%; width:400px; border-radius: 8px;">
											<div style="padding: 40px;">													
													<input required class="mi-input browser-default" type="text" name="tituloNota" placeholder="TITULO" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
														<table>
															<tbody>
																<tr>
																	<td><input class="with-gap" name="backColor" type="radio" id="test1" value="yellow lighten-1" onclick="javascript: document.getElementById('notaColor').className = 'z-depth-2 black-text yellow lighten-1';"/>
															    <label class="black-text" for="test1">Amarillo</label></td>
																	<td><input class="with-gap" name="backColor" type="radio" id="test2" value="red lighten-1" onclick="javascript: document.getElementById('notaColor').className = 'z-depth-2 black-text red lighten-1';"/>
															    <label class="black-text" for="test2">Rojo</label></td>
																	<td><input class="with-gap" name="backColor" type="radio" id="test3" value="lime lighten-1" onclick="javascript: document.getElementById('notaColor').className = 'z-depth-2 black-text lime lighten-1';" />
															    <label class="black-text" for="test3">Verde</label></td>
																</tr>
																<tr>
																	<td><input class="with-gap" name="backColor" type="radio" id="test4" value="blue lighten-2" onclick="javascript: document.getElementById('notaColor').className = 'z-depth-2 black-text blue lighten-2';"/>
															    <label class="black-text" for="test4">Azul</label></td>
																	<td><input class="with-gap" name="backColor" type="radio" id="test5" value="grey lighten-1" onclick="javascript: document.getElementById('notaColor').className = 'z-depth-2 black-text grey lighten-1';"/>
															    <label class="black-text" for="test5">Gris</label></td>
																	<td><input class="with-gap" name="backColor" type="radio" id="test6" value="purple lighten-3" onclick="javascript: document.getElementById('notaColor').className = 'z-depth-2 black-text purple lighten-3';"/>
															    <label class="black-text" for="test6">Morado</label></td>
																</tr>
																<tr>
																	<td><input class="with-gap" name="backColor" type="radio" id="test7" value="pink lighten-3" onclick="javascript: document.getElementById('notaColor').className = 'z-depth-2 black-text pink lighten-3';"/>
															    <label class="black-text" for="test7">Rosa</label></td>
																	<td><input class="with-gap" name="backColor" type="radio" id="test8" value="orange lighten-2" onclick="javascript: document.getElementById('notaColor').className = 'z-depth-2 black-text orange lighten-2';"/>
															    <label class="black-text" for="test8">Naranja</label></td>
																	<td><input class="with-gap" name="backColor" type="radio" id="test9" value="teal lighten-2" onclick="javascript: document.getElementById('notaColor').className = 'z-depth-2 black-text teal lighten-2';"/>
															    <label class="black-text" for="test9">Aqua</label></td>
																</tr>
															</tbody>
														</table>															
														
													<textarea requiredx style="height:100px;" name="descripcionNota" class="mi-input" placeholder="Descripción"></textarea>
													<i class="material-icons left">alarm_add</i><label class="left black-text">Recordatorio(opcional)</label>
													<input type="datetime-local" name="fechaRecordatorioNota" placeholder="Selecciona día">
													<button class="btn-flat black-text waves-effect waves-light right" type="submit" name="guardarNota">Guardar</button>
											</div>
										</div>	
									</center>	
							      </div>
							    </li>
							</ul>
						</div>
					</div>							
				</form>				
					
			<?php 

				if (mysqli_connect_errno()) { 	
                    echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                }else{
                	function alarma($year,$month,$day,$hour,$minute,$titulo){								
								$second = '00';
								//Mi cuenta regresiva
								  global $return;
								  global $countdown_date;
								  $countdown_date = mktime($hour, $minute, $second, $month, $day, $year);
								  $today = time();
								  $diff = $countdown_date - $today;
								  if ($diff < 0)$diff = 0;
								  $dl = floor($diff/60/60/24);
								  $hl = floor(($diff - $dl*60*60*24)/60/60);
								  $ml = floor(($diff - $dl*60*60*24 - $hl*60*60)/60);
								  $sl = floor(($diff - $dl*60*60*24 - $hl*60*60 - $ml*60));				

								$resultado .=  "Faltan ".$dl." dias ".$hl." horas <br>".$ml." minutos ".$sl." segundos";
								$total = $dl + $hl + $ml + $sl;
								if($total == 0){ ?>
									<script type="text/javascript">
										alert("La nota con titulo: <?php echo $titulo; ?> a expirado. Revisala para saber que tarea tienes pendiente en este momento");
										</script>
								<?php }
								return $resultado;

                	}                                
                   	$counter = mysqli_query($conex,"SELECT * FROM `$usuario` ORDER BY `id` DESC"); ?>
                   				<div id="hidden" class="row">                   					
                       	 <?php while($row = mysqli_fetch_array($counter)){ 
                       	 		?>        	  				
								
						        	<div class="col s12 m12 l3">
										<div id="cardVencido" class="card <?php echo $row['colorNota']; ?>">
										    <div class="card-content">										    
										      <span class="card-title activator grey-text text-darken-4"><?php echo $row['tituloNota'] ?><i class="material-icons right">more_vert</i></span>
										      <p id="sonido" style="font-size: 11px;" class="grey-text text-darken-2"><b><?php if($row['hora_alarma'] != ""){ echo "<i class=\"white-text material-icons left\">alarm_on</i>".str_replace("T",", ", $row['hora_alarma']).".";}else{ echo "<i class=\"white-text material-icons left\">alarm_off</i> Sin alarma";} ?></b>
										      <br><?php if($row['hora_alarma'] != "") echo alarma($row['anio'],$row['mes'],$row['dia'],$row['hora'],$row['minuto'],$row['tituloNota']); ?>
										      </p>
										      <p style="font-size: 20px" class="black-text"><?php echo $row['msjNota']; ?></p>
										    </div>
										    <form method="post">
										    	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
											    <div class="card-reveal">
											      <span class="card-title grey-text text-darken-4">Opciones<i class="material-icons right">close</i></span>
											      <button class="btn-flat red-text waves-effect waves-light" type="submit" name="deleteNota">Eliminar
												    <i class="material-icons left">delete</i>
												  </button>
												  <a class="modal-trigger indigo-text waves-effect waves-light btn-flat" href="#modal<?php echo $row['id']?>">Modificar<i class="material-icons left">edit</i></a>
											      <!--<button class="btn-flat teal-text waves-effect waves-light" type="submit" name="modifyNota">Modificar
												    <i class="material-icons left">edit</i>
												  </button>-->
												
											    </div>
										    </form>
										  </div>	
									</div>
									<div id="modal<?php echo $row['id'];?>" class="modal">
									    <div class="modal-content">
									 <form method="post" action="#">
									 <center>
									 	<input type="hidden" value="<?php echo $row['id'];?>" name="idLocalizacion"/>
								      	<div id="notaModificadaColor<?php echo $row['id']; ?>" class="z-depth-2 black-text" style="margin-top: 2%; margin-bottom: 2%; width:400px; border-radius: 8px;">
											<div style="padding: 40px;">													
													<input required class="mi-input browser-default" type="text" name="tituloNotaModificada" value="<?php echo $row['tituloNota']; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
														<table>
															<tbody>
																<tr>
																	<td><input required title="Selecciona el color de nota que deseas" class="with-gap" name="colorNotaModificada" type="radio" id="dynamic<?php echo $row['id']; ?>" value="yellow lighten-1" onclick="javascript: document.getElementById('notaModificadaColor<?php echo $row['id']; ?>').className = 'z-depth-2 black-text yellow lighten-1';"/>
															    <label class="black-text" for="dynamic<?php echo $row['id']; ?>">Amarillo</label></td>
																	<td><input required class="with-gap" name="colorNotaModificada" type="radio" id="dynamic<?php echo $row['id']*$row['id']+9; ?>" value="red lighten-1" onclick="javascript: document.getElementById('notaModificadaColor<?php echo $row['id']; ?>').className = 'z-depth-2 black-text red lighten-1';"/>
															    <label class="black-text" for="dynamic<?php echo $row['id']*$row['id']+9; ?>">Rojo</label></td>
																	<td><input required class="with-gap" name="colorNotaModificada" type="radio" id="dynamic<?php echo $row['id']*$row['id']+2; ?>" value="lime lighten-1" onclick="javascript: document.getElementById('notaModificadaColor<?php echo $row['id']; ?>').className = 'z-depth-2 black-text lime lighten-1';" />
															    <label class="black-text" for="dynamic<?php echo $row['id']*$row['id']+2; ?>">Verde</label></td>
																</tr>
																<tr>
																	<td><input required class="with-gap" name="colorNotaModificada" type="radio" id="dynamic<?php echo $row['id']*$row['id']+3; ?>" value="blue lighten-2" onclick="javascript: document.getElementById('notaModificadaColor<?php echo $row['id']; ?>').className = 'z-depth-2 black-text blue lighten-2';"/>
															    <label class="black-text" for="dynamic<?php echo $row['id']*$row['id']+3; ?>">Azul</label></td>
																	<td><input required class="with-gap" name="colorNotaModificada" type="radio" id="dynamic<?php echo $row['id']*$row['id']+4; ?>" value="grey lighten-1" onclick="javascript: document.getElementById('notaModificadaColor<?php echo $row['id']; ?>').className = 'z-depth-2 black-text grey lighten-1';"/>
															    <label class="black-text" for="dynamic<?php echo $row['id']*$row['id']+4; ?>">Gris</label></td>
																	<td><input required class="with-gap" name="colorNotaModificada" type="radio" id="dynamic<?php echo $row['id']*$row['id']+5; ?>" value="purple lighten-3" onclick="javascript: document.getElementById('notaModificadaColor<?php echo $row['id']; ?>').className = 'z-depth-2 black-text purple lighten-3';"/>
															    <label class="black-text" for="dynamic<?php echo $row['id']*$row['id']+5; ?>">Morado</label></td>
																</tr>
																<tr>
																	<td><input required class="with-gap" name="colorNotaModificada" type="radio" id="dynamic<?php echo $row['id']*$row['id']+6; ?>" value="pink lighten-3" onclick="javascript: document.getElementById('notaModificadaColor<?php echo $row['id']; ?>').className = 'z-depth-2 black-text pink lighten-3';"/>
															    <label class="black-text" for="dynamic<?php echo $row['id']*$row['id']+6; ?>">Rosa</label></td>
																	<td><input required class="with-gap" name="colorNotaModificada" type="radio" id="dynamic<?php echo $row['id']*$row['id']+7; ?>" value="orange lighten-2" onclick="javascript: document.getElementById('notaModificadaColor<?php echo $row['id']; ?>').className = 'z-depth-2 black-text orange lighten-2';"/>
															    <label class="black-text" for="dynamic<?php echo $row['id']*$row['id']+7; ?>">Naranja</label></td>
																	<td><input required class="with-gap" name="colorNotaModificada" type="radio" id="dynamic<?php echo $row['id']*$row['id']+8; ?>" value="teal lighten-2" onclick="javascript: document.getElementById('notaModificadaColor<?php echo $row['id']; ?>').className = 'z-depth-2 black-text teal lighten-2';"/>
															    <label class="black-text" for="dynamic<?php echo $row['id']*$row['id']+8; ?>">Aqua</label></td>
																</tr>
															</tbody>
														</table>								
													<textarea required style="height:100px;" name="descripcionNotaModificada" type="text" class="mi-input"><?php echo $row['msjNota']; ?></textarea>
													<i class="material-icons left">alarm_add</i><label class="left black-text">Recordatorio(opcional)</label>
													<input type="datetime-local" name="recordatorioNotaModificada" value="<?php if($row['hora_alarma'] != ""){ echo $row['hora_alarma'];} ?>">
													<button class="btn-flat black-text waves-effect waves-light right" type="submit" name="modifyNota">Guardar</button>
											</div>
										</div>	
									</center>
								</form> 
							</div>
						</div>       	

	        		<?php } ?> </div> 
	        		
	        		 <?php }
	        		 if(isset($_POST['deleteNota'])){

	        		 	$idNota = $_POST['id'];
	        		 	$sqlDelete = "DELETE FROM `$usuario` WHERE `id` = '$idNota'";

	        		 	if (mysqli_connect_errno()) { 	
                                echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                        }else{                                
                            mysqli_query($conex,$sqlDelete);
                            mysqli_close($conex); ?>
                            <script type="text/javascript">
                            	alert("SE ELIMINÓ CORRECTAMENTE LA NOTA."); 
                            	window.location="notas.php";
                            </script>;


	        		 <?php } }
	        		 if(isset($_POST['modifyNota'])){

	        		 	$idLocalizacion = $_POST['idLocalizacion'];
	        		 	$tituloNotaModificada = $_POST['tituloNotaModificada'];
	        		 	$colorNotaModificada = $_POST['colorNotaModificada'];
	        		 	$descripcionNotaModificada = $_POST['descripcionNotaModificada'];
	        		 	$recordatorioNotaModificada = $_POST['recordatorioNotaModificada'];

	        		 	list($fechaM,$horaM) = explode("T",$recordatorioNotaModificada);
						list($anyoM,$mesM,$diaM) = explode("-",$fechaM);
						list($horaM,$minM) = explode(":", $horaM);

	        		 	$sqlModificacion ="UPDATE `$usuario` SET
	        		 			`hora_alarma`= '$recordatorioNotaModificada',
	        		 			`anio`= '$anyoM',
	        		 			`mes`= '$mesM',
	        		 			`dia`= '$diaM',
	        		 			`hora`= '$horaM',
	        		 			`minuto`= '$minM',
	        		 			`tituloNota`= '$tituloNotaModificada',
	        		 			`msjNota`= '$descripcionNotaModificada',
	        		 			`colorNota`= '$colorNotaModificada' WHERE `id` = '$idLocalizacion'";

	        		 			if (mysqli_connect_errno()) { 	
                                  		echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{
                                	mysqli_query($conex,$sqlModificacion);
                                	mysqli_close($conex); ?>
                                	<script type="text/javascript">		                            	
		                            	window.location="notas.php";
		                            </script>;
						<?php }
	        		 }
	        		 




						if(isset($_POST['guardarNota'])){

							$tituloNota = $_POST['tituloNota'];
							$msjNota = $_POST['descripcionNota'];
							$horaAlarma = $_POST['fechaRecordatorioNota'];
							$background = $_POST['backColor'];

							//separacion de la cadena de alarma para el control del conteo en segundos
							
							list($fecha,$hora) = explode("T",$horaAlarma);
							list($anyo,$mes,$dia) = explode("-",$fecha);
							list($hora,$min) = explode(":", $hora);
							

							$addNote = "INSERT INTO `$usuario` (
											`id`,
											`hora_alarma`,
											`anio`,
											`mes`,
											`dia`,
											`hora`,
											`minuto`,
											`tituloNota`,
											`msjNota`,
											`colorNota`) VALUES (NULL,'$horaAlarma','$anyo','$mes','$dia','$hora','$min','$tituloNota','$msjNota','$background')";

							if (mysqli_connect_errno()) { 	
                                  		echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{                                
                                	mysqli_query($conex,$addNote);
                                	mysqli_close($conex); ?>
                                	<script type="text/javascript">		                            	
		                            	window.location="notas.php";
		                            </script>;
						<?php }
					}
				 ?>  
        	

</body>
</html>