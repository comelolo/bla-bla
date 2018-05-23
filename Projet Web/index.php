<html>

<?php

	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');

	// identifier quelle session est ouverte : récupérer le login 
    session_start();
    if(isset($_SESSION['login'])) {
        $Log = $_SESSION['login'];
    } else {
        echo '<script>alert("Vous n êtes pas connecté");</script>';
        header('Location: Connexion.php');
    }
	
	
	//afficher le profil de la personne connectée
	$reponse = $bdd->query("SELECT * FROM utilisateur WHERE login = '".$Log."'");
	$donnees = $reponse->fetch();
	$Nom = $donnees['nom'];
	$Prenom = $donnees['prenom'];
	$Email = $donnees['email'];
	$Majeure = $donnees['majeure'];
    $Promo = $donnees['promotion'];
    $travail = $donnees['travail'];
    $photo_profile = $donnees['photoprofil'];
	
	
	
	// afficher les posts existants dans le serveur 
	$rc = $bdd->query('SELECT * FROM posts ORDER BY d_h DESC');
	$d_rc = $rc->fetch();
	$Id_P = $d_rc['id_post'];

	if($d_rc == "")
	{
		echo "il n'y a pas d'actualité ";
	}
	
	$rep = $bdd->query('SELECT * FROM posts ORDER BY d_h');

	function liker()
	{
		// liker_traitement.php?id_post='.$Id_P.''
		header('Location: Connexion.php');
	}
	function deliker()
	{
	}
?>

<head>
    <title>ECE Bond</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/docs.css">

    <style>
        .img-profil {
            padding: 3%;
            border-radius: 50%;
            width: 130;
            height: 130;
        }
        .img-post {
            padding: 2%;
            border-radius: 50%;
            width: 80;
            height: 80;
        }

        .panel-default {
            margin-top: 4%;
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="index.php">ECE Bond</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <form class="form-inline navbar-form navbar-left" action="">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="Search" name="search"></input>
                    <div class="input-group-btn">
                        <button class="btn btn-default btn-md" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
                </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Accueil</a></li>
                <li><a href="reseau.php">Réseau</a></li>
                <li><a href="emploi.php">Emplois</a></li>
                <li><a href="message.php">Messagerie</a></li>
                <li><a href="notif.php">Notifications</a></li>
                <li ><a href="profil.php">Vous</a></li>
                <li><a href="Connexion.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="wrappe">
        <div id="frame">
        <div class="sidebar-wrapper pull-left">
                <div class="profile-container">
                <?php echo '
                   <img class="img-responsive img-profil center-block" src="assets/images/'.$photo_profile.'" alt="" />

				<h3 class="name">'.$Nom.'  '.$Prenom.'</h3>
                  <!--  <h5 class="tagline">'.$travail.'</h5>-->
                </div>
                <div class="contact-container container-block">
                    <ul class="list-unstyled contact-list">
                        <li><i class="fa fa-envelope"></i> <a href="mailto: '.$Email.'">'.$Email.'</a></li>
                        <li><i class="fa fa-graduation-cap"></i>'.$Promo.'</li>
						<li><i class="fa fa-briefcase"></i>'.$Majeure.'</li>
                    </ul>
                    <br/>
                    <a href="profil.php">afficher profil</a><br>
                    <a href="change_profil.php">modifier profil</a>
                    ';  ?>
                </div> 
                
        </div>
        
        <div class="fil_actu">
            <div class="row">
            <!-- main center col -->
			<!-- Encadrer pour publier un commentaire -->
            <div class="col-sm-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <h4>Du nouveau à partager :</h4>
                            <div class="form-group" style="padding:14px;">
                                <textarea class="form-control" placeholder="Update your status" rows="4"></textarea>
                            </div>
                            <button class="btn btn-primary pull-right" type="button">Publier</button>
                            <ul class="list-inline">
                                <li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li>
                                <li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
                                <li><a href=""><i class="glyphicon glyphicon-facetime-video"></i></a></li>
                            </ul>
                        </form>
                    </div>
                </div>
				<div class="panel panel-default">
                        <div class="panel-body">
                            <img src="assets/images/profile.png" class="img-post pull-left">
                            <hr>
<?php
// faire une boucle pour ecrire tous les posts dans l'ordre chronologique
	while($donnees = $rep->fetch())
{
	$L_ut = $donnees['log_utilisateur'];
	//afficher le profil de la personne connectée
	$r_t = $bdd->query("SELECT * FROM utilisateur WHERE login = '".$L_ut."'");
	$d_t = $r_t->fetch();
	$N_p = $d_t['nom'];
	$P_p = $d_t['prenom'];
		if($L_ut != "")
		{
			echo '<span><h5> Poste de : '.$N_p.'  '.$P_p.' </h5></span>';
			
		}
?>
							<hr>
<?php
	$Com = $donnees['commentaire'];
		if($Com != "")
		{
			echo '<p> '.$Com.'</p>'; 
		}

	$Lieu = $donnees['lieu'];
		if($Lieu != "")
		{
			echo '<p> Fait a : '.$Lieu.'</p>';
		}

	$Humeur = $donnees['humeur'];
		if($Humeur != "")
		{
			echo '<p> L utilisateur est : '.$Humeur.'</p>';
		}

	$Act = $donnees['activite'];
		if($Act != "")
		{
			echo '<p> L utilisateur fait : '.$Act.'</p>';
		}

	$D = $donnees['d_h'];
		if($D != "")
		{
			echo '<p> Fait le  : '.$D.'</p>';
		}
?>
                           <form>
                           <div class="input-group">
                             <div class="input-group-btn">
<?php
		/////////////////////////////////////////// LIKE /////////////////////////////////////////////////////////////
		// recuperer nb de like par posts
		$reponse2 = $bdd->query("SELECT COUNT(id_post) AS c FROM liker WHERE id_post=".$Id_P);
		$donnees2 = $reponse2->fetch();
		$reponse3 = $bdd->query("SELECT * FROM liker WHERE id_utilisateur='".$L_ut."' AND id_post=".$Id_P);
		$donnees3 = $reponse3->fetch();
		$u = $donnees3['id_utilisateur'];
		if($u != "")
		{
			//liker_traitement_retour.php?id_post='.$Id_P.'
			echo '<button onclick="liker();" class="btn btn"> Deja Liker['.$donnees2['c'].'] <i class="fa fa-thumbs-o-up"></i></button><button class="btn btn-default">Partager <i class="glyphicon glyphicon-share"></i></button>';
			//echo '<a  href = "liker_traitement_retour.php?id_post='.$Id_P.'"> Deja Liker['.$donnees2['c'].'] </a>';
			//echo "peut pas liker";
		}
		else
		{
			echo '<button onclick="liker();" class="btn btn"> Liker['.$donnees2['c'].'] <i class="fa fa-thumbs-o-up"></i></button><button class="btn btn-default">Partager <i class="glyphicon glyphicon-share"></i></button>';
			//echo '<a  href = "liker_traitement.php?id_post='.$Id_P.'"> Liker['.$donnees2['c'].'] </a>';
			//echo "peut liker";
		}
?>
                             
							 </div>
                             <input class="form-control" placeholder="Ajouter un commentaire.." type="text">
                           </div>
                           </form>
						   <hr>
						   <br/>
						   <br/>
						   <hr>
                           <?php
}
?>
                         </div>
                    </div>
            </div>
            </div>
        </div>

        <div class="sidebar-right col-sm-2">
                <div class="panel-body">
                    <p>Connaissez cette personne ?</p>
                    <br><br><br>
                    <p>Connaissez vous ce réseau ?</p>
                </div>
        </div>
        </div>

        <footer class="footer">
                <div class="text-center">
                        <small class="copyright">Designed with <i class="fa fa-heart"></i> by Quiterie Lafourcade, Pierre-Joseph Delafosse et Côme L'Ollivier</small>
                </div>
        </footer>
    </div>
    
</body>

</html>