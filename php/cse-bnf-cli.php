<?php
session_start();
	include("conex.php");
	$conexion = mysqli_connect($ruta,$user,$pass,'follow');

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
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="materialize.css"  media="screen,projection"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta content="text/html;" http-equiv="content-type" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
		<link rel="stylesheet" type="text/css" href="../materialize/css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="../materialize/css/stylenterprise.css"/>
		<link href="../AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <link href="../AdminLTE-2.1.1/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	    <link href="../AdminLTE-2.1.1/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
</head>
<body>

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
        <b>HISTÓRICOS SSIAS</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <p class="login-box-msg">SSIAS, Sistema de Seguimiento e Investigación detallado de Actividades en Siniestros.</p>
        <p class="login-box-msg">En este apartado podrás visualizar el SSIAS que va asociado a tu caso de investigación.</p>
		        <form method="post">		          
		          <div class="form-group has-feedback">
		            <input type="text" class="form-control" autocomplete="off" placeholder="Número de Siniestro" name="numero" />
		            <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
		          </div>
		          <div class="row">
		            <div class="col-xs-8">   	                                    
		            </div>
		            <div class="col-xs-4">
		              <button type="submit" class="btn btn-primary  btn-flat" name="buscar">Buscar</button>
		            </div>
		           </div>
		        </form>
      </div>
      </div>
	
	<?php 

		if(isset($_POST['buscar'])){
			$buscar = $_POST['numero'];
			if (mysqli_connect_errno()) {
                echo "<center><p style=\"color:#b40000\"><strong>Falló la conexion al Sistema LineINS.</strong></p></center>";                              
            }else{

      				$sql = "SELECT * FROM `follow`.`casosF` WHERE `case` = '$buscar' and `status` = 1";
                    $result = mysqli_query($conexion,$sql); 
                    if(mysqli_num_rows(mysqli_query($conexion,$sql)) == 0){ ?>
                    	<h4 class="red-text">No se ha encontrado el Follow solicitado. Verifica la escritura del caso que solicitas e intentalo nuevamente.</h4>
                    <?php }else{

                     while($row = mysqli_fetch_array($result)){ ?>
                     <ul class="collection">
       						<li class="collection-item dismissable"><a target="_blank" href="../follow.php?S=<?php echo $row['case']; ?>"><?php echo $row['case'] ?><i class="material-icons circle grey darken-3 right white-text">accessibility</i></a></li>
      					</ul> 
      					<div class="divider"></div>

                     <?php }
                 }
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
</html>