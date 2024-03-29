<?php session_start(); 
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
			setTimeout("window.open('logout.php','_top');",1800000);
			}
		</script>
	</head>
	<body onload="killerSession()">		
			<div class="navbar-fixed">
			    <nav class="teal" >
			    <div class="container">
				      <div class="nav-wrapper">
				        <a  href="#!" class="brand-logo">INSpector System</a>
				              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

				        <ul class="right hide-on-med-and-down">
				        <li><?php echo $_SESSION['user'] ?></li>
				          <li><a href="encriptacion.php"><i class="mdi-action-account-child right"></i>Registrar Cuenta</a></li>
				          <li><a href="logout.php"><i class="mdi-navigation-close right"></i>Cerrar sesión</a></li>
				        </ul>
				        <ul class="side-nav" id="mobile-demo">
				         <li><a href="encriptacion.php"><i class="mdi-action-account-child right"></i>Registrar Cuenta</a></li>
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
	     	 	<li class="collection-header"><h5 class="login-logo"><b>Administrador</b></h5></li>
		        </ul>
		      </div>
	      	</div>
	      	<div class="collection-header center"><h5><b>Usuarios Online</b></h5></div>
	      	<div><iframe src="php/line_ins.php" width="100%"></iframe></div>
	      	<div class="collection-header center"><h5><b>SSIAS Activos</b></h5></div>
	      	<div><iframe src="php/cse-fllw.php" width="100%" height="250px"></iframe></div>

	      </div>

	      <div class="col s12 m8 l9 teal lighten-5"> 
	      		<h4 class="flow-text"><b>Panel de control</b></h4>
	      		<div class="row">
			        <div class="col s12 m4 l4">
			          <div class="card  teal">
			            <div class="card-content white-text">
			              <span class="card-title">Alta de Siniestro</span>
			              <p>En este apartado podrás dar de alta nuevos Siniestros en INSpector. Cada Siniestro lleva un SSIAS asociado.</p>
			            </div>
			            <div class="card-action">
			              <a href="siniestros/ifsinind.php" target="_blank" class="white-text waves-light waves-effect orange darken-3 btn modal-trigger">Iniciar</a>
			            </div>
			          </div>
			        </div>
			        <div class="col s12 m4 l4">
			          <div class="card teal darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Baja de Siniestro</span>
			              <p>En esta opción solo darás de BAJA el Siniestro, si deseas dar de baja el SSIAS, necesitas ir al apartado de BAJA de seguimiento de Siniestro en tu panel de control. <span class="orange-text text-darken-5">Se recomienda precaución</span>. </p>
			            </div>
			            <div class="card-action">
			              <a href="#bajaSiniestro" class="white-text waves-light waves-effect orange darken-3 btn modal-trigger">Inicio</a>
			            </div>
			          </div>
			        </div>
			        <div class="col s12 m4 l4">
			          <div class="card teal darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Modificación de Siniestro</span>
			              <p>En esta opción podras modificar los datos de un Siniestro como también, agregar datos faltantas. <span class="orange-text text-darken-5">Se recomienda precaución</span>.</p>
			            </div>
			            <div class="card-action">
			              <a href="#modificarSiniestro" class="white-text waves-light waves-effect orange darken-3 btn modal-trigger">Inicio</a>
			            </div>
			          </div>
			        </div>
			    </div>
			    <div class="row">
			    	<div class="col s12 m4 l4">
			          <div class="card teal darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Casos Activos</span>
			              <p>En este apartado podrás solo consultar los datos del Siniestro que solicites.</p>
			            </div>
			            <div class="card-action">
			              <a href="#casoActivo" class="white-text waves-light waves-effect orange darken-3 btn modal-trigger">Inicio</a>
			            </div>
			          </div>
			        </div>
			        <div class="col s12 m4 l4">
			          <div class="card teal darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Histórico</span>
			              <p>En este apartado podrás consultar los Siniestros que han sido dados de baja del Sistema, ya no estan activos.</p>
			            </div>
			            <div class="card-action">
			              <a href="#historicoSin" class="white-text waves-light waves-effect orange darken-3 btn modal-trigger">Inicio</a>
			            </div>
			          </div>
			        </div>
			    </div>
			    <div class="row">
			    <h4 class="flow-text"><b>SSIAS, Sistema de Seguimiento e Investigación detallado de Actividades en Siniestros</b></h4>
			    	<div class="col s12 m4 l4">
			          <div class="card teal darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Alta de Seguimiento de Siniestro</span>
			              <p>En este apartado podras dar de alta un SSIAS sin que este asociado a un Siniestro a nivel de datos.</p>
			            </div>
			            <div class="card-action">
			              <a class="white-text waves-light waves-effect orange darken-3 btn modal-trigger" href="#follow">Iniciar</a>
			            </div>
			          </div>
			        </div>
			        <div class="col s12 m4 l4">
			          <div class="card teal darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Baja de Seguimiento de Siniestro</span>
			              <p>En esta opción sólo darás de BAJA el SSIAS, si deseas dar de baja el Siniestro, necesitas ir al apartado BAJA de Siniestro en tu panel de control.</p>
			            </div>
			            <div class="card-action">
			              <a class="white-text waves-light waves-effect orange darken-3 btn modal-trigger" href="#follow2">Iniciar</a>
			            </div>
			          </div>
			        </div>
			        <div class="col s12 m4 l4">
			          <div class="card teal darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Históricos de Seguimientos de Siniestro</span>
			              <p></p>
			            </div>
			            <div class="card-action">
			              <a class="white-text waves-light waves-effect orange darken-3 btn modal-trigger" href="#follow3">Iniciar</a>
			            </div>
			          </div>
			        </div>
			    </div>

	      </div>

    </div>
    <div id="bajaSiniestro" class="modal modal-fixed-footer">
    <div class="modal-content">
      <iframe src="php/dwnSin.php" width="100%" height="500px"></iframe>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
  <div id="casoActivo" class="modal modal-fixed-footer">
    <div class="modal-content">
      <iframe src="php/cseactSin.php" width="100%" height="500px"></iframe>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
  <div id="historicoSin" class="modal modal-fixed-footer">
    <div class="modal-content">
      <iframe src="php/hstrcssin.php" width="100%" height="500px"></iframe>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
  <div id="modificarSiniestro" class="modal modal-fixed-footer">
    <div class="modal-content">
      <iframe src="php/modySin.php" width="100%" height="500px"></iframe>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
	<div id="follow" class="modal modal-fixed-footer">
    <div class="modal-content">
      <iframe src="new_follow.php" width="100%" height="400px"></iframe>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
  <div id="follow2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <iframe src="dltfllw.php" width="100%" height="400px"></iframe>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
  <div id="follow3" class="modal modal-fixed-footer">
    <div class="modal-content">
      <iframe src="php/historicos.php" width="100%" height="400px"></iframe>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>

    <footer class="page-footer teal">
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