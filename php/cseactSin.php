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
	<meta http-equiv="refresh" content="20">
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
        <b>Casos Activos de Siniestros</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">En este apartado podrás visualizar los Siniestros que estan activos en el Sistema web.</p>
		        <form method="post">		          
		        <div class="container">
		        	<?php 
		if (mysqli_connect_errno()) {
                echo "<center><p style=\"color:#b40000\"><strong>Falló la conexion al Sistema LineINS.</strong></p></center>";                              
            }else{

      				$sql = "SELECT * FROM `follow`.`casosF` WHERE statusSin = 1";
                    $result = mysqli_query($conexion,$sql); 

                     while($row = mysqli_fetch_array($result)){ ?> 

                     	<ul class="collection">
       						<li class="collection-item dismissable"><a target="_blank" href="../siniestros/ifsinind2.php?siniestro=<?php echo $row['case']?>&amp;asegurado=<?php echo $row['asegurado']?>&amp;producto=<?php echo $row['typeSin']?>&amp;vzlcn=hide&amp;ride=ro"><?php echo $row['case'] ?><i class="material-icons circle deep-orange lighten-1 right white-text"><i class="material-icons">directions_run</i></i></a></li>
      					</ul>       					
                    <?php }

            }


	 ?>
		        </div>
      </div>
      </div>
	
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