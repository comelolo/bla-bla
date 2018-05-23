<?php
	// les variables
	$Login = isset($_POST["Login"])?$_POST["Login"] : ""; 
	$Email = isset($_POST["Email"])?$_POST["Email"] : "";
    $error = "";

	// creer un message d'alerte pour verification
	function Alert($_message)
	{
		echo '<script type="text/javascript">';
		echo 'alert("'.$_message.'");';
		echo '</script>';
		echo '<meta http-equiv="Refresh" content="0;URL=../index.php"/>';
		exit();
		
	}
	
	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');
	
	session_start();
	$Loging_u = $_SESSION['login'];
	
	$id_post = $_GET['id_post'];

	Alert("c'est moi");
	
	//$bdd->exec("INSERT INTO liker(id_post, id_utilisateur) VALUES(".$id_post.", '".$Loging_u."')");
	//header('Location: ../liker.php');

?>