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
		<title>Home - INSpector</title>
		<meta content="text/html;" http-equiv="content-type" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
		<link rel="stylesheet" type="text/css" href="materialize/css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="materialize/css/stylenterprise.css"/>
		<link rel="stylesheet" type="text/css" href="stylenterprise.css"/>
		<link href="AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <link href="AdminLTE-2.1.1/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	    <link href="AdminLTE-2.1.1/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
	<script>
			function killerSession(){
			setTimeout("window.open('logout.php','_top');",900000);
			}
		</script>
	</head>
	<body onload="killerSession()">		
			<div class="navbar-fixed">
			    <nav class="orange" >
			    <div class="container">
				      <div class="nav-wrapper">
				        <a  href="#!" class="brand-logo">INSpector System Investigador</a>
				              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

				        <ul class="right hide-on-med-and-down">
				        <li><?php echo $_SESSION['user'] ?></li>
				          <li><a href="logout.php"><i class="mdi-navigation-close right"></i>Cerrar sesión</a></li>
				        </ul>
				        <ul class="side-nav" id="mobile-demo">
				          <li><a href="logout.php"><i class="mdi-navigation-close right"></i>Cerrar sesión</a></li>
 					     </ul>
				      </div>
				     </div>
			    </nav>
		    </div>
		    <div class="row">

	      <div class="col s12 m4 l3 teal lighten-5"> 
	      	<div class="left-aling">
	     	 <div class="collection with-header">
	     	 <ul>
	     	 <li class="center"><img src="images/logo.png"></li>
	     	 	<li class="collection-header"><h5 class="login-logo"><b>Investigador</b></h5></li>
	     	 	<div class="collection-header center"><h5><b>Tus Follows asignados</b></h5></div>
	      	<div><iframe src="php/cse-fllw-us.php" width="100%" height="250px"></iframe></div>
		        </ul>
		      </div>
	      	</div>
	      </div>

	      <div class="col s12 m8 l9 teal lighten-5"> 
				<div class="row">
			    <h4 class="flow-text"><b>Sistema Follow</b></h4>
			    	<div class="col s12 m4 l4">
			          <div class="card orange darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Tus históricos FOLLOW</span>
			              <p></p>
			            </div>
			            <div class="card-action">
			              <a class="white-text waves-effect waves-light grey darken-2 btn modal-trigger" href="#follow">Iniciar</a>
			            </div>
			          </div>
			        </div>
			    </div>

	      		<h4 class="flow-text"><b>Panel de control</b></h4>
	      		<div class="row">
			        
			       
			        <div class="col s12 m4 l4">
			          <div class="card orange darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Modificación</span>
			              <p></p>
			            </div>
			            <div class="card-action">
			              <a class="white-text" href="#!">En Construcción</a>
			            </div>
			          </div>
			        </div>
			        <div class="col s12 m4 l4">
			          <div class="card orange darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Consulta</span>
			              <p></p>
			            </div>
			            <div class="card-action">
			              <a class="white-text" href="#!">En Construcción</a>
			            </div>
			          </div>
			        </div>
			    </div>
			    
	      </div>
    </div>
    <div id="follow" class="modal modal-fixed-footer">
    <div class="modal-content">
      <iframe src="php/hstrcsus.php" width="100%" height="400px"></iframe>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>


    <footer class="page-footer orange">
          <div class="footer-copyright">
            <div class="container">
            © 2015 INSpector, Asesores Profesionales.
            </div>
          </div>
        </footer>
	      	
	    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
      	<script type="text/javascript" src="nav.js"></script> 
	</body>
</html>
