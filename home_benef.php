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
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <link href="AdminLTE-2.1.1/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	    <link href="AdminLTE-2.1.1/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
	<script>
			function killerSession(){
			setTimeout("window.open('logout.php','_top');",300000);
			}
		</script>
	</head>	
	<body onload="killerSession()" class="teal lighten-5">		
			<div class="navbar-fixed">
			    <nav class="blue" >
			    	<div class="container">
				      <div class="nav-wrapper">
				        <a href="#!" class="brand-logo">INSpector System</a>
				         <ul class="right hide-on-med-and-down">
				        <li><?php echo $_SESSION['user'] ?></li>
				          <li><a href="logout.php"><i class="mdi-navigation-close right"></i>Cerrar sesión</a></li>
				        </ul>
				      </div>
			      </div>
			    </nav>
		    </div>	
		    <div class="container">	    
	<div class="row">
	      <div class="col s12 m4 l3 teal lighten-5"> 
	      	<div class="left-aling">
	     	 <div class="collection with-header">
	     	 <ul>
	     	 <li class="center"><img src="images/logo.png"></li>
	     	 	<li class="collection-header center"><h4><b>Asegurado/Beneficiario</b></h4></li>
		        </ul>
		      </div>
	      	</div>
	      </div>

	      <div class="col s12 m8 l9 teal lighten-5"> 
	      		<h4 class="flow-text"><b>Bienvenido</b></h4>
	      		<div class="row">
			        
			        <div class="col s12 m4 l4">
			          <div class="card blue darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Status del caso</span>
			              <p>Ingresa el tu número de Siniestro. Si no te fue proporcionado dicho número, ponte en contacto con nosotros: <br><br><b>Dirección General</b><br>

						    Tel. 55 5367 2004<br>
						    Tel. 55 6646 5380<br>
						    Cel: 04455 4279 0140<br>
						    Cel: 04455 5143 9442 </p>
			            </div>
			            <div class="card-action">
			            <form method="post">
			              <input autocomplete="off" class="white-text" required type="text" name="noSiniestro" placeholder="Número de Siniestro"/>
			             <button value="Status" name="status" class="orange waves-effect waves-light btn right"><i class="material-icons right">done_all</i>Status</button>
			              </form>
			            </div>
			          </div>
			        </div>
			        <?php 

		if(isset($_POST['status'])){
			$siniestro = $_POST['noSiniestro'];

			if (mysqli_connect_errno()) {
                echo "<center><p style=\"color:#b40000\"><strong>Falló la conexion al Sistema LineINS.</strong></p></center>";                              
            }else{

      				$sql = "SELECT `porcentaje` FROM `siniestro` WHERE `siniestro` = '$siniestro'";
                    $result = mysqli_query($conexion,$sql); 
                    if(mysqli_num_rows(mysqli_query($conexion,$sql)) == 0){ ?>
                    	<h4 class="red-text">No se ha encontrado el porcentaje del Siniestro que solicitas.<br> Verifica tu escritura e intentalo nuevamente.</h4>
                    <?php }else{

                     while($row = mysqli_fetch_array($result)){ ?>
                     <h2>Porcentaje de caso: </h3>
                     <h3 class="orange-text"><?php echo $row['porcentaje']; ?></h3>

                     <?php }
                 }
            }
		}
	 ?>

			        <div class="col s12 m4 l4">
			          <div class="card blue darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Subir documentación</span>
			              <p>Carga  de archivos faltantes para enriquecer tu investigación.</p>
			            </div>
			            <div class="card-action">
			              <a class="lime-text" href="#!">En Construcción</a>
			            </div>
			          </div>
			        </div>	
			        <div class="col s12 m4 l4">
			          <div class="card blue darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">Comentarios</span>
			              <p>Tienes alguna observación, sugerencia, comentario o duda?</p>
			            </div>
			            <div class="card-action">
			              <a class="lime-text" href="#!">En Construcción</a>
			            </div>
			          </div>
			        </div>			        
			    </div>
			    <div class="row">
			    <div class="col m1 l1 hide-on-small-only"><p></p></div>
							 <div class="col s12 m10 l10">
									<div class="card-panel blue">
									<h2 class="">Asesores Profesionales, Soluciones para Seguros.</h2>
							          <span class="white-text">La Dirección de Asesores Profesionales reconoce la importancia de identificar y <b>proteger sus activos
												de información</b>, evitando la divulgación, modificación y utilización no autorizada de toda información
												relacionada con clientes, empleados, manuales, casos de investigación, estrategia, gestión, y otros
												conceptos.<br><br>
							          </span>
							          <span class="white-text"><h4 class="black-text">La Seguridad de la Información se caracteriza como la preservación de:</h4>
													<b>a)</b> su confidencialidad, asegurando que sólo quienes estén autorizados pueden acceder a la
													información;<br><br>
													<b>b)</b> su integridad, asegurando que la información y sus métodos de proceso son exactos y completos;<br><br>
													<b>c)</b> su disponibilidad, asegurando que los usuarios autorizados tienen acceso a la información y a sus
													activos asociados cuando lo requieran. La seguridad de la información se consigue implantando un
													conjunto adecuado de controles, tales como políticas, prácticas, procedimientos, estructuras
													organizativas y funciones de software. Estos controles han sido establecidos para asegurar que se
													cumplen los objetivos específicos de seguridad de la empresa.<br><br>
							          	
							          </span>
							          <span class="white-text"><h4 class="black-text">Es política de Asesores Profesionales el que:</h4>
													<b>1.</b> Se establezcan cada 6 meses objetivos con relación a la Seguridad de la Información.<br><br>
													<b>2.</b> Se establezcan los objetivos de control y los controles correspondientes, en virtud de las
													necesidades que en materia de riesgos surjan del proceso de Análisis de riesgos
													manejado.<br><br>
													<b>3.</b> Se cumpla con los requisitos del negocio, legales o reglamentarios y las obligaciones
													contractuales de seguridad.<br><br>
													<b>4.</b> Se brinde concientización y entrenamiento en materia de seguridad de la información a
													todo el personal.<br><br>
													Todo empleado es responsable de reportar a la Dirección las violaciones a la seguridad,
													confirmadas o sospechadas.<br><br>
													<b>5.</b> A toda persona que quebrante esta política será sancionado con suspensión temporal sin
													goce de sueldo o terminación de su contrato.<br><br>
													<b>6.</b> Todo empleado es responsable de preservar la confidencialidad, integridad y disponibilidad
													de los activos de información en cumplimiento de la presente política y de las políticas y
													procedimientos inherentes de la Información.<br><br>
													<b>7.</b> El Responsable de Seguridad de la Información es responsable directo sobre el
													mantenimiento de esta política, por brindar consejo y guía para su implementación, e
													investigar toda violación reportada por el personal.<br><br>
							          	

							          </span>
							          <div class="center white-text"><b>Gustavo E. Covarrubias Pacheco<div class="divider"></div></b>Director General</div>
							        </div>
						        </div>	
						        <div class="col m1 l1 hide-on-small-only"><p></p></div>								
			    	</div>
			    	<div class="col s12 m8 l8"><p></p></div>
			    </div>
	      </div>
    </div>
   </div>


    <footer class="page-footer blue">
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