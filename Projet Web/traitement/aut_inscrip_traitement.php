<?php
	// les variables
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$login = $_POST['login'];
	$mdp = $_POST['mdp']; 
	$date = $_POST['date'];
	$promotion = $_POST['promotion'];
	$majeure = $_POST['majeure'];
	$travail = $_POST['post']; 
	$photo = $_FILES["photo"]['name'];
	$adresse = '/wamp64/www/bla-bla/Projet Web/assets/images/'.basename($_FILES['photo']['name']);
	$upload_photo = move_uploaded_file($_FILES["photo"]['tmp_name'], $adresse);
	$promo = "$promotion";
	$majeure = "$majeure";
	$error = "";
		

	// connection à la bdd
	require('../server_connexion.php');
	$con = connect_and_select_db();

	// identifier quelle session est ouverte : récupérer le login 
	

	// creer un message d'alerte pour mauvaise entrée
	function Alert($_message)
	{
		echo '<script type="text/javascript">';
		echo 'alert("'.$_message.'");';
		echo '</script>';
		echo '<meta http-equiv="Refresh" content="0;URL=../Connexion.php"/>';
		exit();
		
	}
	
	// verifier que les champs sont bien remplis
	if($prenom == "") { $error .= "Prenom vide".'\n';}
	if($nom == "") { $error .= "Nom vide";}
	if($email == "") { $error .= "Email vide".'\n';}
	if($login == "") { $error .= "Login vide".'\n';}
	if($mdp == "") { $error .= "Mot de passe vide".'\n';}
	if($date == "") { $error .= "Anniversaire vide".'\n';}
	if($promo == "") { $error .= "Promotion vide".'\n';}
	if($majeure == "") { $error = "Majeure vide".'\n';}
	if($travail == ""){ $travail = "Travail vide".'\n';}
	//if(!$upload_photo) { $error .= "erreur lors du chargement de la photo  ";}
	if ($error != "") {
		Alert($error);
 	}
	
		
	// si formulaire plein on continue les actions
	if($error == ""){
		echo '<script type="text/javascript">';
		echo 'alert("bonjour");';
		echo '</script>';
		$sql = "INSERT utilisateur (login, email, nom, prenom, password, anniversaire, travail, promotion, majeure, photoprofil) 
		VALUES ('$login', '$email', '$nom', '$prenom', '$mdp', '$date', '$travail', '$promo', '$majeure', '$photo')";
		$result = mysqli_query($con, $sql);
	
		//$Date_con = $_SESSION['dateco'];
		if ($result) {
			echo '<script type="text/javascript">';
			echo 'alert("bonjour22");';
			echo '</script>';
			session_start();
			$_SESSION['login'] = $login;
			header('Location: ../index.php');
			exit();
		} else {
			echo '<script type="text/javascript">';
			echo 'alert("erreur lors de votre inscription");';
			echo '</script>';
		}
	}

?>