<?php
    require('server_connexion.php');
    $con = connect_and_select_db();

	// identifier quelle session est ouverte : récupérer le login 
    session_start();
    $Log = $_SESSION['login'];

    $fullName = $_POST['typeahead'];
    $separateur = explode(" ", $fullName);
    $prenom = $separateur[0];
    $nom = $separateur[1];
    
    if ($_POST['ajout'] == 'Ajouter au reseau') {
        $reponse = mysqli_query($con, "SELECT * FROM utilisateur WHERE nom LIKE '".$nom."' AND prenom LIKE '".$prenom."';");
        $donnees = mysqli_fetch_array($reponse);
        $login2 = $donnees['login'];

        $result = mysqli_query($con, "SELECT * FROM reseaux WHERE log_pers_un = '".$Log."' AND log_pers_deux = '".$login2."';");
        if (mysqli_num_rows($result)==0) {
        
            $query1 = "INSERT INTO reseaux (log_pers_un, log_pers_deux, amis)
                    values ('$Log', '$login2', '0')";
            $query2 = "INSERT INTO reseaux (log_pers_un, log_pers_deux, amis)
            values ('$login2', '$Log', '0')";
            $insertstm = mysqli_prepare($con, $query1);
            $insertstm2 = mysqli_prepare($con, $query2);
            $ajout = mysqli_execute($insertstm);
            $ajout = mysqli_execute($insertstm2);
            header('Location: ../reseau.php');
        } else {
            echo '<script type="text/javascript">
            alert("Cette personne fait déjà partie de votre réseau !");
            </script>';
            header('Location: ../reseau.php');
        }

    } else if ($_POST['ajout'] == 'Ajouter aux amis') {
        
        $reponse = mysqli_query($con, "SELECT * FROM utilisateur WHERE nom LIKE '".$nom."' AND prenom LIKE '".$prenom."';");
        $donnees = mysqli_fetch_array($reponse);
        $login2 = $donnees['login'];

        $result = mysqli_query($con, "SELECT * FROM reseaux WHERE log_pers_un = '".$Log."' AND log_pers_deux = '".$login2."';");
        $donne = mysqli_fetch_array($result);
        if (mysqli_num_rows($result)==0) {
            echo '<script type="text/javascript">';
            echo 'alert("Vous devez d abord ajouter cette personne au reseau !");';
            echo '</script>';
            header('Location: ../reseau.php');
         
        } else if (mysqli_num_rows($result)!=0 && $donne['amis']==1) {
            echo '<script type="text/javascript">';
            echo 'alert("Cette personne fait déjà parti de vos amis !");';
            echo '</script>';
            header('Location: ../reseau.php');
        }
        else if (mysqli_num_rows($result)!=0 && $donne['amis']==0) {
            echo '<script type="text/javascript">';
		    echo 'alert("Amis ajouté !");';
            echo '</script>';
            $query1 = "UPDATE reseaux SET amis = '1' WHERE log_pers_un = '".$Log."' AND log_pers_deux = '".$login2."';"; 
            $query2 = "UPDATE reseaux SET amis = '1' WHERE log_pers_un = '".$login2."' AND log_pers_deux = '".$Log."';";
            $insertstm = mysqli_prepare($con, $query1);
            $insertstm2 = mysqli_prepare($con, $query2);
            $ajout = mysqli_execute($insertstm);
            $ajout = mysqli_execute($insertstm2);
            header('Location: ../reseau.php');    
        }
        //commentaire
    } 

?>