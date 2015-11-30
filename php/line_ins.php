<?php
	include("conex.php");
	$conexion = mysqli_connect($ruta,$user,$pass,$db);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="refresh" content="10">
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

      				$sql = "SELECT * FROM user_ins_2018 WHERE type_b = 1";
                    $result = mysqli_query($conexion,$sql); 

                     while($row = mysqli_fetch_array($result)){ ?> 

                     	<ul class="collection">
       						<li class="collection-item dismissable"><div><?php echo $row['user'] ?><i class="material-icons circle green right white-text">done</i></div></li>
      					</ul>          			
                    <?php }

            }


	 ?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

</body>
</html>