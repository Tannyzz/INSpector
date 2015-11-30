<?php
	include("php/conex.php");
	$conexion = mysqli_connect($ruta,$user,$pass,$db);
        session_start(); 
        
        $sql = "UPDATE `user_ins_2018` SET `type_b`=0 WHERE user='$_SESSION[user]'";
		$result = mysqli_query($conexion,$sql);
		mysql_close();

		session_unset($_SESSION['user']);
		session_destroy(); 		
        header('location: login.php');
        exit();
?>