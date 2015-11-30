<?php
	session_start(); 
	include("php/conex.php");
	$conexion = mysqli_connect($ruta,$user,$pass,$db);
	
	if($_SESSION['user'] == ""){ ?>
	 	<script type="text/javascript">
                        alert("ERROR: Ingresa primero al sistema para poder solicitar la pagina que deseas.");
                        location.href = "login.php";
                </script>

                <?php } ?>	

<!DOCTYPE html>
<html>
<head>
	<title>INSpector Encripter</title>
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

<div class="navbar-fixed">
			    <nav class="red darken-2" >
			    	<div class="container">
				      <div class="nav-wrapper">
				        <span class="brand-logo"><a href="home_admin.php"><i class="mdi-navigation-arrow-back left"></i>INSpector System</a></span>
				        	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				        <ul class="right hide-on-med-and-down">
				          <li><a href="logout.php"><i class="mdi-navigation-close right"></i>Cerrar sesión</a></li>
				          <li></li>
				        </ul>
				        <ul class="side-nav" id="mobile-demo">
					    	   <li><a href="logout.php"><i class="mdi-navigation-close right"></i>Cerrar sesión</a></li>
					     </ul>
				      </div>
			      </div>
			    </nav>
		    </div>
		    <div class="login-box">
      <div class="login-logo">
        <b>INSpector System</b><br>Registro de Cuentas Encriptación de Usuarios
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Selecciona bien tu Usuario y Contraseña</p>
		        <form method="post">
		          <div class="form-group has-feedback">
		            <input type="text" required="required" autocomplete="off" class="form-control" placeholder="Usuario" name="user"/>
		            <span class="glyphicon glyphicon-user form-control-feedback"></span>
		          </div>
		          <div class="form-group has-feedback">
		            <input type="password" required="required" class="form-control" placeholder="Password" name="psswd"/>
		            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		          </div>
		           <label>Tipo de Usuario</label>
					    <select name="type" class="browser-default">
					    <option value="5">Nivel 5 - Beneficiario</option>
					      <option value="4">Nivel 4 - Cliente</option>
					       <option value="3">Nivel 3 - Investigador</option>
					       <option value="2">Nivel 2 - Coordinador</option>
					      <option value="1">Nivel 1 - Jefe de Proceso</option>				      
					    </select>
		          <div class="row">
		            <div class="col-xs-8">   	                                    
		            </div>
		            <div class="col-xs-4">
		              <button type="submit" name="log" class="btn btn-primary  btn-flat">Encriptar</button>
		            </div>
		           </div>
		        </form>
      </div>	

		<?php 

		if(isset($_POST['log'])){
			$user = $_POST['user'];
			$password = $_POST['psswd'];
			$type = $_POST['type'];
				if($type === '-1'){
					echo "<center>Debes de seleccionar un tipo de Usuario</center>";
				}

			$salt = md5(uniqid(rand(), true)); 
			$hash = hash('sha512', $salt.$password); 
			unset($password);                   
                     
                        if (mysqli_connect_errno()) {
                              echo "<p style=\"color:#b40000\"><strong>Falló la conexion a la Base de Datos.</strong></p>";
                              
                        }else{
                            $sql = "INSERT INTO user_ins_2018 (id_us, user, psswd, salt, type) VALUES ('','$user','$hash','$salt','$type')";
                            
                            mysqli_query($conexion,$sql); 

                            $id = "SELECT id_us FROM user_ins_2018 WHERE user='$user'";
                   			$result = mysqli_query($conexion,$id);

		                     while($row = mysqli_fetch_array($result)){ 

		                     			$db_id = $row['id_us'];
		                     			echo $db_id;
		                     }
                            mysqli_close($conexion); ?>
                              <script type="text/javascript">
                                  alert("Se encriptó correctamente la nueva cuenta. Guarda bien tu Usuario, Contraseña y Numero de Identificación Personal porque no podrás recuperarlos en un futuro. Tu NIP es: <?php echo $db_id ?> ");
                                  location.href = "home_admin.php";
                              </script>
                            <?php 
                        }
                            
                   } ?>


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