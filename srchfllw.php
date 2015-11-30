<?php session_start(); include("php/conex.php"); $conexion = mysqli_connect($ruta,$user,$pass,$db); 
		if($_SESSION['user'] == ''){ ?>	
			<script type="text/javascript">
                        alert("ERROR: Ingresa primero al sistema para poder solicitar la pagina que deseas.");
                        location.href = "login.php";
                </script>
	  <?php }else{ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
			    <nav class="deep-orange lighten-1" >
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
        <b>INSpector System </b><br>Buscar SSIAS
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Visualizar SSIAS</p>
		        <form method="post">		          
		          <div class="form-group has-feedback">
		            <input type="text" class="form-control" autocomplete="off" placeholder="Número de Siniestro" name="sinester" />
		            <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
		          </div>
		          <div class="row">
		            <div class="col-xs-8">   	                                    
		            </div>
		            <div class="col-xs-4">
		              <button type="submit" class="btn btn-primary  btn-flat" name="search">Buscar</button>
		            </div>
		           </div>
		        </form>
      </div>
      </div>
 <?php 

  	if (isset($_POST['search'])){
      		$sinester = $_POST['sinester'];

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
      			if($level_user === '4'){
      				$_SESSION['user'] = $db_user;
                  		header("Location: follow.php?S=$sinester");  

      			}elseif ($level_user === '5') {
				 	$_SESSION['user'] = $db_user;
                		header("Location: follow.php?S=$sinester");

                }    		

   		}else{ ?>
				<script type="text/javascript">
                        alert("ERROR: Usuario, contraseña o numero se siniestro incorrectos, intentalo nuevamente.");
                        location.href = "srchfllw.php";
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
<?php } ?>