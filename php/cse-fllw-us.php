<?php
	session_start();
	include("conex.php");
	$us = $_SESSION['user'];
	$conexion = mysqli_connect($ruta,$user,$pass,'follow');

	 if($_SESSION['user'] == ""){ ?>
	 	<script type="text/javascript">
                        alert("ERROR: Ingresa primero al sistema para poder solicitar la pagina que deseas.");
                        location.href = "../login.php";
                </script>

                <?php } ?>		
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="refresh" content="20">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale-01.0, user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="materialize.css"  media="screen,projection"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<title></title>
</head>
<body>
	
	<?php 
		if (mysqli_connect_errno()) {
                echo "<center><p style=\"color:#b40000\"><strong>Falló la conexion al Sistema LineINS.</strong></p></center>";                              
            }else{

      				$sql = "SELECT * FROM `follow`.`casosF` WHERE `inves` = '$us' and `status` = 1";
                    $result = mysqli_query($conexion,$sql); 

                     while($row = mysqli_fetch_array($result)){ ?> 

                     	<ul class="collection">
       						<li class="collection-item dismissable"><a target="_blank" href="../follow.php?S=<?php echo $row['case']; ?>"><?php echo $row['case'] ?><i class="material-icons circle deep-orange lighten-1 right white-text"><i class="material-icons">directions_run</i></i></a></li>
      					</ul>       					
                    <?php }

            }


	 ?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

</body>
</html>