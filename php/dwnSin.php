<?php 
	session_start(); 
	include("conex.php"); 
	$conexion2 = mysqli_connect($ruta,$user,$pass,"follow"); 

	if($_SESSION['user'] == ''){ ?>
		<script type="text/javascript">
                        alert("ERROR: Ingresa primero al sistema para poder solicitar la pagina que deseas..");
                        location.href = "../login.php";
                </script>

	<?php }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta content="text/html;" http-equiv="content-type" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
		<link rel="stylesheet" type="text/css" href="../materialize/css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="../materialize/css/stylenterprise.css"/>
		<link href="../AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <link href="../AdminLTE-2.1.1/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	    <link href="../AdminLTE-2.1.1/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
	<body class="lighten-2">
			<div class="navbar-fixed">
			    <nav class="grey lighten-1" >
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
        <b>BAJA de Siniestro</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">En este apartado podrás desactivar un Siniestro para que deje de estar en linea del Sistema Web. Si deseas verlo de nuevo lo encontrarás en el apartado HISTORICOS.</p>
		        <form method="post">		          
		          <div class="form-group has-feedback">
		            <input required type="text" class="form-control" autocomplete="off" placeholder="Número de Siniestro" name="sinester" />
		            <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
		          </div>
		          <div class="row">
		            <div class="col-xs-8">   	                                    
		            </div>
		            <div class="col-xs-4">
		              <button type="submit" class="btn btn-primary  btn-flat" name="dlt">Dar de baja</button>
		            </div>
		           </div>
		        </form>
      </div>
      </div>

 <?php 


  	if (isset($_POST['dlt'])){
      		$sinester = $_POST['sinester']; 

      		if(mysqli_connect_errno()){ 	
					       echo "<span style='color:#b71c1c;'>Falló la conexión con la Base de Datos MySQL: " . mysqli_connect_error() . "</span>";
					    }else{
						   	$sql = "UPDATE  `follow`.`casosF` SET  `statusSin` = 0 WHERE  `case` = '$sinester'";

								$resultado = mysqli_query($conexion2,$sql);
								mysqli_close($conexion2); ?>
								<script type="text/javascript">
                        alert("Ha sido dado de baja correctamente el Siniestro <?php echo $sinester; ?> a HISÓRICOS.");
                </script>

								<?php   
			            }
			        }
			         ?>


		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
      	<script type="text/javascript" src="../js/animations.js"></script>
      	<!--Admin rsc-->
      	<script src="../AdminLTE-2.1.1/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	    <script src="../AdminLTE-2.1.1/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	    <script src="../AdminLTE-2.1.1/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
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
<body>

</body>
</html>