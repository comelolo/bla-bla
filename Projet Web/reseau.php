<?php
require('server_connexion.php');
$con = connect_and_select_db();
session_start();
if(isset($_SESSION['login'])) {
    $Log = $_SESSION['login'];
} else {
    header('Location: Connexion.php');
}
//afficher le profil de la personne connectée
$reponse = $con->query("SELECT * FROM utilisateur WHERE login = '".$Log."'");
$donnees = mysqli_fetch_array($reponse);
$Nom = $donnees['nom'];
$Prenom = $donnees['prenom'];
$email = $donnees['email'];
$travail = $donnees['travail'];
$promo = $donnees['promotion'];
$majeure = $donnees['majeure'];
$photo_profile = $donnees['photoprofil'];
if ($photo_profile=="") {$photo_profile="assets/images/batman.jpg";}

function coucou() {
    echo '<script type="text/javascript">';
	echo 'alert("waaaaazzzaaaaaaa!!!");';
	echo '</script>';
}

?>

<html>

<head>
    <title>ECE Bond</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/typeahead.min.js"></script>

    <style>
        .bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 24px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 240px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 300px;
}
.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}


        .img-profil {
            padding: 3%;
            border-radius: 50%;
            width: 130;
            height: 130;
        }

        .img-post {
            padding: 2%;
            border-radius: 50%;
            width: 60;
            height: 60;
        }

        .panel-default {
            margin-top: 4%;
            min-width: 300;
        }
    </style>

    <script>
        $(document).ready(function(){
            $('input.typeahead').typeahead({
                name: 'typeahead',
                remote:'traitement/reseau_search.php?query=%QUERY',
                limit : 10
            });
        });
         
        function myFunction() {
            var x = document.getElementById("topnav");
            if (x.className === "navbar-inverse navbar-fixed-top") {
                x.className += " responsive";
            } else {
                x.className = "navbar-inverse navbar-fixed-top";
            }
        }
    </script>

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

    <div class="wrapper">
        <div id="frame">
        <div class="sidebar-wrapper pull-left">
            <?php echo'
            <div class="profile-container">
                <img class="img-responsive img-profil center-block" src="assets/images/'. $photo_profile .'" alt="" />
                <h3 class="name">'.$Prenom.' '.$Nom.'</h3>
                <h5 class="tagline">'.$travail.'</h5>
            </div>
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto: '.$email.'">'.$email.'</a>
                    </li>
                    <li>
                        <i class="fa fa-briefcase"></i>
                        <a href="#" target="_blank">'.$majeure.'</a>
                    </li>
                    <li>
                        <i class="fa fa-graduation-cap"></i>
                        <a href="#" target="_blank">'.$promo.'</a>
                    </li>
                </ul>
                <br/>
                <a href="profil.php">afficher profil</a>
                <br>
                <a href="change_profil.php">modifier profil</a>

            </div>
            ';
            ?>
        </div>

        <div id="search" class="search-bar">
            <div class="panel-body">
                    
                    <label for="typeahead">Chercher une connaissance</label>
                    <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="..." size="30"></input>
                    <button onclick="" >Ajouter au réseau</button>
                    <button >Ajouter aux amis</button>
                
            </div>
        </div>

        <div id="reseau" class="list-reseau">
            <div class="row">
                <div class="panel-heading">
                    <h4>Votre réseau</h4>
                </div>
                <div class="panel-body container-fluid input-group">
                    <form class="navbar-form" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Rechercher dans votre réseau..." name="search_reseau" size="30"></input>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- afficher tous les utilisateurs ici -->
                <div class="col-md-10">
                    <img src="assets/images/kiki.jpg" class="img-post img-responsive pull-left">
                    <a href="">
                        <h5>Quiterie Lafourcade</h5>
                    </a>
                </div>
                <div class="col-md-10">
                    <img src="assets/images/profile.png" class="img-post img-responsive pull-left">
                    <a href="">
                        <h5>Pierre Joseph Delafosse</h5>
                    </a>
                </div>
            </div>
        </div>

        <div id="amis" class="list-amis">
            <div class="panel default-panel pull left">
                <div class="row">
                    <div class="panel-heading">
                        <h4>Vos amis</h4>
                    </div>
                    <div class="panel-body">
                        <form class="navbar-form navbar-left" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Rechercher un amis..." name="search_amis" size="30"></input>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- afficher tous les utilisateurs ici -->
                    <div class="col-md-10">
                        <img src="assets/images/kiki.jpg" class="img-post img-responsive pull-left">
                        <a href="">
                            <h5>Quiterie Lafourcade</h5>
                        </a>
                    </div>
                    <div class="col-md-10">
                        <img src="assets/images/profile.png" class="img-post img-responsive pull-left">
                        <a href="">
                            <h5>Pierre Joseph Delafosse</h5>
                        </a>
                    </div>
                    <div class="col-md-10">
                        <img src="assets/images/Icon_ECEBond.png" class="img-post img-responsive pull-left">
                        <a href="">
                            <h5>ECE Bond</h5>
                        </a>
                    </div>
                </div>
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