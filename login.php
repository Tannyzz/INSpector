<?php
	session_start();
	include("php/conex.php");
	$conexion = mysqli_connect($ruta,$user,$pass,$db);


	if($_SESSION['user'] != ""){ 
		if (mysqli_connect_errno()) { 	
	        echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
	    }else{                                
	       	$result = mysqli_query($conexion,"SELECT `type` FROM `user_ins_2018` WHERE `user`= '$_SESSION[user]'");
	                 while($row = mysqli_fetch_array($result)){
							$panel = $row['type'];     	
					 } 
					 switch ($panel) {
					 	case '0':
					 		header('Location: home_admin.php');
					 		break;
					 	case '1':
					 		header('location: home_procesor.php');
					 		break;
					 	case '2':
					 		header('Location: home_coor.php');
					 		break;
					 	case '3':
					 		header('location: home_investigador.php');
					 		break;
					 	case '4':
					 		header('Location: home_client.php');
					 		break;
					 	case '5':
					 		header('location: home_benef.php');
					 		break;

					 	
					 	default:
					 		echo "<b><center class=\"red-text flow-text\">Permiso Denegado</center></b>";
					 		break;
					 }
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inspector - Login</title>
		<meta content="text/html;" http-equiv="content-type" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
		<link rel="stylesheet" type="text/css" href="materialize/css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="materialize/css/stylenterprise.css"/>
		<link href="AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <link href="AdminLTE-2.1.1/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	    <link href="AdminLTE-2.1.1/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
	<body class="lighten-2">
			<div class="navbar-fixed">
			    <nav class="indigo lighten-1" >
			    	<div class="container">
				      <div class="nav-wrapper">
				        <a href="#!" class="brand-logo">INSpector System</a>
				        <ul class="right hide-on-med-and-down">
				          <li><a href="#!">Ayuda</a></li>
				          <li></li>
				        </ul>
				      </div>
			      </div>
			    </nav>
		    </div>

		    <div class="login-box">
      <div class="login-logo">
        <b>INSpector </b><br>Asesores Profesionales
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Inicia tu sesión para ingresar</p>
		        <form method="post">
		          <div class="form-group has-feedback">
		            <input type="text" class="form-control" autocomplete="off" placeholder="Usuario" name="user" />
		            <span class="glyphicon glyphicon-user form-control-feedback"></span>
		          </div>
		          <div class="form-group has-feedback">
		            <input type="password" class="form-control" placeholder="Contraseña" name="psswd" />
		            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		          </div>
		          <div class="form-group has-feedback">
		            <input type="password" class="form-control" autocomplete="off" placeholder="Numero de identificación" name="number" />
		            <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
		          </div>
		          <div class="row">
		            <div class="col-xs-8">   	                                    
		            </div>
		            <div class="col-xs-4">
		              <button type="submit" class="btn btn-primary  btn-flat" name="login">Iniciar Sesión</button>
		            </div>
		           </div>
		        </form>
      </div>
      </div>
 <?php 

  	if (isset($_POST['login'])){

      		$number = $_POST['number'];
      		$users = $_POST['user'];
      		$password = $_POST['psswd'];

      		if (mysqli_connect_errno()) {
                echo "<center><p style=\"color:#b40000\"><strong>Falló la conexion a la Base de Datos.</strong></p></center>";
                              
            }else{

      				$sql = "SELECT * FROM user_ins_2018 WHERE id_us='$number'";
                    $result = mysqli_query($conexion,$sql);

                     while($row = mysqli_fetch_array($result)){ 

                     			$db_user = $row['user'];
                     			$db_hash = $row['psswd'];
                     			$db_salt = $row['salt'];
                     			$level_user = $row['type'];                     			
                     }
            }
      	
      	if ($db_hash === hash('sha512', $db_salt.$password) and $db_user === $users){
      			if ($level_user === "-1") { 
      				$_SESSION['user'] = $db_user;
                  		header("Location: home_admin.php");
      			}
      			if($level_user === '0'){
      				$sql = "UPDATE `user_ins_2018` SET `type_b`=1 WHERE user='$db_user'";
				 	$result = mysqli_query($conexion,$sql);
      				$_SESSION['user'] = $db_user;
                  		header("Location: home_admin.php");  

      			}elseif ($level_user === '1') {
      				$sql = "UPDATE `user_ins_2018` SET `type_b`=1 WHERE user='$db_user'";
				 	$result = mysqli_query($conexion,$sql);
				 	$_SESSION['user'] = $db_user;
                		header("Location: home_procesor.php");

                }elseif ($level_user === '2') {
                	$sql = "UPDATE `user_ins_2018` SET `type_b`=1 WHERE user='$db_user'";
				 	$result = mysqli_query($conexion,$sql);
				 	$_SESSION['user'] = $db_user;
                		header("Location: home_coor.php");

                }elseif ($level_user === '3') {
                	$sql = "UPDATE `user_ins_2018` SET `type_b`=1 WHERE user='$db_user'";
				 	$result = mysqli_query($conexion,$sql);
				 	$_SESSION['user'] = $db_user;
                		header("Location: home_investigador.php");
                		
                }elseif ($level_user === '4'){
                	$sql = "UPDATE `user_ins_2018` SET `type_b`=1 WHERE user='$db_user'";
				 	$result = mysqli_query($conexion,$sql);
				 	$_SESSION['user'] = $db_user;
                		header("Location: home_client.php");
                }elseif ($level_user === '5'){
                	$sql = "UPDATE `user_ins_2018` SET `type_b`=1 WHERE user='$db_user'";
				 	$result = mysqli_query($conexion,$sql);
				 	$_SESSION['user'] = $db_user;
                		header("Location: home_benef.php");
                }
                mysql_close();       		

   		}else{ ?>
				<script type="text/javascript">
                        alert("ERROR: Usuario o contraseña incorrectos, intentalo nuevamente.");
                        location.href = "login.php";
                </script>
<?php   }
	}          ?>

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