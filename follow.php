<?php
	session_start();
	include("php/hour_control.php");
	include("php/conex.php");
	$conex = mysqli_connect($ruta,$user,$pass,"follow");
	$conex2 = mysqli_connect($ruta,$user,$pass,$db);
	$siniestro = utf8_encode($_GET['S']);
	$us = $_SESSION['user'];

			if (mysqli_connect_errno()){ 	
            echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
        }else{                                
            $result = mysqli_query($conex2,"SELECT * FROM `user_ins_2018` WHERE `user` = '$us'");
            while($row = mysqli_fetch_array($result)){
            		$type = $row['type'];
            } 
        }
        if($type == 3 or $type == 0){
        	$hide = "";	
        }else{
        	$hide = "hide";
        }

	if($_SESSION['user'] != ''){
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
		<script src="http://code.google.com/apis/gears/gears_init.js" type="text/javascript" charset="utf-8"></script>
		<script src="geo.js" type="text/javascript" charset="utf-8"></script>		
	</head>
	<body>
		    <div class="navbar-fixed">
			    <nav class="deep-orange lighten-1" >
			    	<div class="container">
				      <div class="nav-wrapper">
				        <a  href="#!" class="brand-logo">SSIAS System</a>
 					     </ul>
				      </div>
				      </div>
			    </nav>
		    </div>
		    <?php }else{ ?>
		<script type="text/javascript">
                        alert("ERROR: Ingresa primero al sistema para poder visualizar FOLLOw.");
                        location.href = "login.php";
                </script>
<?php } ?>
	<div class="container"><br>	
	
	<h6 class="left-align flow-text">SSIAS, Sistema de Seguimiento e Investigación detallado de Actividades en Siniestros.</h6>
	
	<h4>Siniestro No. <?php echo "<b><span class=\"orange-text text-darken-5\">".$siniestro."</span></b>"; ?></h4>
		
		<?php  
		if (mysqli_connect_errno()) {
 	
            echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
        }else{                                
            $result = mysqli_query($conex,"SELECT * FROM `casosF` WHERE `case` = '$siniestro';");
            while($row = mysqli_fetch_array($result)){?>
		            <h5><span class="orange-text text-darken-5">Asegurado:</span> <?php echo ucwords(str_replace('Ã±','ñ',$row['asegurado'])).".";?></h5>
		            <h5><span class="orange-text text-darken-5">Tipo de Siniestro:</span> <?php echo ucwords($row['typeSin'].".");?></h5>
					<h5><span class="orange-text text-darken-5">Investigador asignado: </span><?php echo ucwords(str_replace('.', ' ',$row['inves']))."."; ?></h5>
			<a target="_blank" href="siniestros/ifsinind2.php?siniestro=<?php  echo $siniestro;?>&amp;&amp;asegurado=<?php echo ucwords($row['asegurado']);?>" class="<?php echo $hide; ?> waves-effect waves-light btn right"><i class="material-icons right">add</i>Más información del Siniestro</a> <?php } } ?>



				
	<form method="post">
			<button type="submit"  name="place" class="<?php echo $hide; ?> orange waves-effect waves-light btn"><i class="mdi-navigation-expand-more right"></i>Nueva tarea</button><br><br>
			<!--<a href="geo.html" class="orange waves-effect waves-light btn"><i class="mdi-communication-location-on right"></i>Localización</a>-->
		</form>
		<?php 
	
			if(isset($_POST['place'])){ ?>
					<div class="row">
					    <form class="col s12 center" method="post" onsubmit="detectar()" enctype="multipart/form-data">
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
								<input required class="btn waves-effect" type="file" name="archivo" size="35" /><br>
								<input required class="btn waves-effect" type="file" name="archivo1" size="35" /><br>
								<input required class="btn waves-effect" type="file" name="archivo2" size="35" />		
								<input type="hidden" id="lat" name="lati" value=""/>
								<input type="hidden" id="lng" name="lngi" value=""/>
								<input name="action" type="hidden" value="upload" />								
								<input name="action1" type="hidden" value="upload" />
								<input name="action2" type="hidden" value="upload" />
					        	<button type="submit" name="guardar" class="cyan waves-effect waves-light btn right"><i class="mdi-navigation-check right"></i>Guardar</button>					        						        		
					        </div>
					      </div>
					    </form>
					    <form method="post">
					    	<button type="submit" name="canceled" class="red waves-effect waves-light btn right"><i class="mdi-navigation-close right"></i>Cancelar</button>
					    	    
					    </form>
					  </div>
					   <script language="javascript">
								function detectar(){
								if(geo_position_js.init())
								{
									geo_position_js.getCurrentPosition(mostra_ubicacion,function(){document.getElementById('mapa').innerHTML="No se puedo detectar la ubicación"},{enableHighAccuracy:true});
								}	else	{
									document.getElementById('mapa').innerHTML="La geolocalización no funciona en este navegador.";
								}
							}
							
							function mostra_ubicacion(p){
								var coords = p.coords.latitude + "," + p.coords.longitude;
								document.getElementById('mapa').innerHTML="<a href=\"http://maps.google.com/?q="+coords+"\"><img src=\"http://maps.google.com/maps/api/staticmap?center="+coords+"&maptype=hybrid&size=200x200&zoom=12&markers=size:mid|"+coords+"&sensor=false\" alt=\"mapa\"/></a>";
							}
							</script>

			<?php } 
			 if(isset($_POST['guardar'])){ 

			 		$latitud = $_GET['lati'];
			 		$longitud = $_GET['lngi'];
					$text = $_POST['text'];
					$state = $_POST['state'];

					$status = "";
					if($_POST['action'] == "upload" && $_POST['action1'] == "upload" && $_POST['action2'] == "upload"){
					    //primer foto
					    $tamano = $_FILES["archivo"]['size'];
					    $tipo = $_FILES["archivo"]['type'];
					    $archivo = $_FILES["archivo"]['name'];
					    $prefijo = substr(md5(uniqid(rand())),0,6);
					    //segunda foto
					    $tamano1 = $_FILES["archivo1"]['size'];
					    $tipo1 = $_FILES["archivo1"]['type'];
					    $archivo1 = $_FILES["archivo1"]['name'];
					    $prefijo1 = substr(md5(uniqid(rand())),0,6);
					    //tercer foto
					    $tamano2 = $_FILES["archivo2"]['size'];
					    $tipo2 = $_FILES["archivo2"]['type'];
					    $archivo2 = $_FILES["archivo2"]['name'];
					    $prefijo2 = substr(md5(uniqid(rand())),0,6);
					   
					    if ($archivo != "") {
					        // guardamos el archivo a la carpeta files
					        $destino =  "img_follow/".$prefijo."_".$siniestro.".jpeg";
					        $destino1 =  "img_follow/".$prefijo1."_".$siniestro.".jpeg";
					        $destino2 =  "img_follow/".$prefijo2."_".$siniestro.".jpeg";

					        if (copy($_FILES['archivo']['tmp_name'],$destino) && copy($_FILES['archivo1']['tmp_name'],$destino1) && copy($_FILES['archivo2']['tmp_name'],$destino2)) {
					            $status = "Archivos subido: <b>".$archivo."</b>";
					        } else {
					            $status = "Error al subir los archivo";
					        }
					    } else {
					        $status = "Error al subir archivos";
					    }
					}
						if(mysqli_connect_errno()){ 	
					       echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
					    }else{ 
						   		$sql = "INSERT INTO `follow`.`$siniestro` (`pic`, `num_sin`, `date_control`, `description`, `inves`, `state`, `picture1`, `picture2`, `picture3`, `lat`, `lng`) VALUES (NULL, '$siniestro', '$horaDeControl', '$text', NULL ,'$state','$destino','$destino1','$destino2','$latitud','$longitud');";
								$resultado = mysqli_query($conex,$sql);
								mysqli_close($conex);
								header("Location: follow.php?S=$siniestro"); }  
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
                                $result = mysqli_query($conex,"SELECT * FROM `$siniestro` ORDER BY pic DESC");
                
                                        while($row = mysqli_fetch_array($result)){
                                        	if($class != 3){
                                        	$id_delete = $row['pic'];
                                        	$modify = $row['state'];?>                                        	
												<h4><?php echo $row['num_sin']?></h4>
												<h6 style="color:#c5cae9"><?php echo $row['date_control']." - ID de control de sistema: ".$id_delete?></h6>
												<p class="flow-text"><?php echo $row['description']?></p> <div class="right-align" id="mapa"></div>
												<p>Estado de la tarea: <?php if($row['state'] == 0){ 
								echo "<span style=\"color:#c62828\">En ejecución</span>";?>
								<div class="row center">
									<div class="col s12 m4 l4"><img style="border-radius: 8px" class="materialboxed z-depth-2 responsive-img" width="100%" height="150px" src="<?php echo $row['picture1']?>"></div>
									<div class="col s12 m4 l4"><img style="border-radius: 8px" class="materialboxed z-depth-2 responsive-img" width="100%" height="150px" src="<?php echo $row['picture2']?>"></div>
									<div class="col s12 m4 l4"><img style="border-radius: 8px" class="materialboxed z-depth-2 responsive-img" width="100%" height="150px" src="<?php echo $row['picture3']?>"></div>
								</div>
								<form name="gestion" method="post">
									<!--<button name="maps" class="btn purple waves-effect waves-light btn right"><i class="material-icons">place</i></button>-->
									<button value="<?php echo $id_delete?>" name="delete" class="<?php echo $hide; ?> red waves-effect waves-light btn right"><i class="mdi-action-delete right"></i></button>
									<button value="<?php echo $id_delete?>" name="modify" class="<?php echo $hide; ?> light-blue waves-effect waves-light btn right"><i class="mdi-image-rotate-right right"></i></button>
									
								</form> 

						<?php
							}else{
								echo "<span style=\"color:#00BCD4\">Finalizada</span>";?>
								<div class="row center">
									<div class="col s12 m4 l4"><img style="border-radius: 8px" class="materialboxed z-depth-2 responsive-img" width="100%" height="150px" src="<?php echo $row['picture1']?>"></div>
									<div class="col s12 m4 l4"><img style="border-radius: 8px" class="materialboxed z-depth-2 responsive-img" width="100%" height="150px" src="<?php echo $row['picture2']?>"></div>
									<div class="col s12 m4 l4"><img style="border-radius: 8px" class="materialboxed z-depth-2 responsive-img" width="100%" height="150px" src="<?php echo $row['picture3']?>"></div>
								</div>
								<form name="gestion" method="post">
								<!--<button name="maps" class="btn purple waves-effect waves-light btn right"><i class="material-icons">place</i></button>-->
									<button disabled="true" value="<?php echo $id_delete?>" name="delete" class="<?php echo $hide; ?> btn disabled red waves-effect waves-light btn right"><i class="mdi-action-delete right"></i></button>
									<button disabled="true" value="<?php echo $id_delete?>" name="modify" class="<?php echo $hide; ?> btn disabled light-blue waves-effect waves-light btn right"><i class="mdi-image-rotate-right right"></i></button>
									
								</form>
								<?php }  ?></p>
								
								
						<div class="divider"></div>
		<?php } } 
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
