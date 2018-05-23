<?php
	require('server_connexion.php');
	$con = connect_and_select_db();
	$querry = $_GET['query'];
	$sql = "SELECT prenom, nom FROM utilisateur
            WHERE prenom LIKE '".$querry."%'
            OR nom LIKE '".$querry."%'
			LIMIT 10"; 
	$result = mysqli_query($con, $sql);
	$json = [];
	while($row = mysqli_fetch_assoc($result)){
		 $json[] = $row['prenom'] . ' ' . $row['nom'];
	}

	echo json_encode($json);

?>