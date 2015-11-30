<?php
	session_start();
	include("php/conex.php");
	include("php/hour_control.php");

  if($_SESSION['user'] == ''){ ?>
    <script type="text/javascript">
                        alert("ERROR: Ingresa primero al sistema para poder solicitar la pagina que deseas.");
                        location.href = "login.php";
                </script>

  <?php }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nuevo SSIAS</title>
	<meta content="text/html;" http-equiv="content-type" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
		<link rel="stylesheet" type="text/css" href="materialize/css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="materialize/css/stylenterprise.css"/>
		<link href="AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <link href="AdminLTE-2.1.1/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	    <link href="AdminLTE-2.1.1/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="login-box">
      <div class="login-logo">
        <b>INSpector System </b><br>Asesores Profesionales<br><span class="text-teal">FOLLOWSSIAS SYSTEM</span>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">SSIAS, Sistema de Seguimiento e Investigación detallado de Actividades en Siniestros.</p>
		        <form method="post">
		          <div class="form-group has-feedback">
		            <input type="text" class="form-control" required autocomplete="off" placeholder="NUMERO DE SINIESTRO" name="siniestro" />
		            <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
		          </div>
		          <div class="form-group has-feedback">
		            	<h5>QUIEN DA DE ALTA</h5>
					    <select name="userAlta" required class="browser-default">
					      <option value="<?php echo $_SESSION['user']; ?>" selected><?php echo $_SESSION['user'] ?></option>
					    </select>
		          </div>
		          <div class="form-group has-feedback">		          	
		            <select name="inves" required class="browser-default">
					      <option value="" disabled selected>SELECCIONA AL INVESTIGADOR </option>
							<?php 
							if($_SESSION['user'] != ''){

								$conexion = mysqli_connect($ruta,$user,$pass,$db);

								if (mysqli_connect_errno()) { 	
                                  		echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
                                }else{                                
                                	$result = mysqli_query($conexion,"SELECT * FROM `user_ins_2018` WHERE type=3");
                                          while($row = mysqli_fetch_array($result)){ ?>
										      <option value="<?php echo $row['user'];?>"><?php echo $row['user'];?></option>	
					      <?php  } } }else{ ?> <option value=""><?php echo $row['user'];?></option>	 <?php } ?>				      
					    </select>
		          </div>
		          <div class="row">
		            <div class="col-xs-8">   	                                    
		            </div>
		            <div class="col-xs-4">
		              <button onclick="" type="submit" class="btn btn-primary btn-flat" name="createf">Crear SSIAS</button>
		            </div>
		           </div>
		        </form>
      </div>
      </div>
      <?php 
      		if(isset($_POST['createf'])){
      			if($_SESSION['user'] != ''){
      			$sinester = $_POST['siniestro'];
      			$alta = $_POST['userAlta'];
      			$inves = $_POST['inves'];

      			$conex = mysqli_connect("localhost","root","QUORRAlegacy","follow");

      			 if (mysqli_connect_errno()) {
                              echo "<center><p style=\"color:#b40000\"><strong>Falló la conexion a la Base de Datos.</strong></p></center>";
                              
                        }else{

                        	$create = "CREATE TABLE `$sinester`(
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
                        	 	mysqli_query($conex,$create);

                        	$inicializacion = "INSERT INTO `follow`.`$sinester` (
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
                        		`lng`) VALUES (NULL,'$sinester','$horaDeControl','SSIAS iniciado','$investigador',1,'img_follow/9019irb_INSpector.jpeg','img_follow/9019irb2_INSpector.jpeg','img_follow/9019irb3_INSpector.jpeg',' ',' ');";
							mysqli_query($conex,$inicializacion);
							
							$status = "INSERT INTO `follow`.`casosF` (`id`,`case`,`status`,`inves`,`highuser`) VALUES (NULL,'$sinester',1,'$inves','$alta');";
							mysqli_query($conex,$status);
                        	
                        	mysqli_close($conex); ?>
										<script type="text/javascript">
                        alert("<?php  echo "Se ha dado de alta correctamente el SSIAS numero ".$sinester.". Visualizalo en SSIAS Activos y da click en el."; ?>");
                    
                </script>
                        	 	<?php     	 		


      		}
      		}else{ ?> 
      			<script type="text/javascript">
                        alert("ERROR: Ingresa primero al sistema para poder dar de alta un SSIAS.");
                        location.href = "login.php";
                </script>
      		<?php }
      	}
       ?>





	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
      	<script type="text/javascript" src="js/animations.js"></script>
      	<!--Admin rsc-->
      	<script src="AdminLTE-2.1.1/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	    <script src="AdminLTE-2.1.1/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	    <script src="AdminLTE-2.1.1/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
	    <script>
	      $(function () {
	        $('input').iCheck({
	          checkboxClass: 'icheckbox_square-blue',
	          radioClass: 'iradio_square-blue',
	          increaseArea: '20%' // optional
	        });
	      });
	    </script>
      	

</body>
</html>