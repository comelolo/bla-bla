<?php
require('server_connexion.php');
$con = connect_and_select_db();

session_start();
    if(isset($_SESSION['login']) && $_SESSION['login'] != "") {
        $id_profile = $_SESSION['login'];
    } else {
        echo '<script>alert("Vous n êtes pas connecté");</script>';
        header('Location: Connexion.php');
    }
    

function add_comment() {
    $con = connect_and_select_db();
    $message = $_POST['new_message'];
    $discussion_active = $_GET['discus'];
    $date = date("Y-m-d h:i:s");

    if ($message != "") {
    $requete = "INSERT message (id_discussion, id_emetteur, moment, textemessage)
    values ('$discussion_active', '$id_profile', '$date', '$message')";
    $result = mysqli_query($con, $requete);
    }
}

if (isset($_POST['new_message'])) {
    echo add_comment();
    echo "<meta http-equiv='refresh' content='0'>";
    return;
}


//afficher le profil de la personne connectée
$reponse = $con->query("SELECT nom, prenom, photoprofil FROM utilisateur WHERE login = '".$id_profile."'");
$donnees = mysqli_fetch_array($reponse);
$Nom = $donnees['nom'];
$Prenom = $donnees['prenom'];
$photo_profile = $donnees['photoprofil'];
if ($photo_profile=="") {$photo_profile="assets/images/batman.jpg";}

?>


<html>

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

    <div class="wrapper">
        <div id="frame">
            <div id="sidepanel">
                <div id="profile">
                    <div class="wrap">
                        <?php
                        echo '
                        <img id="profile-img" src='.$photo_profile.' alt="" />
                        <p>'.$Prenom.' '.$Nom.'</p>
                        ';
                        ?>
                    </div>
                </div>
                <div id="search">
                    <label>
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </label>
                    <input type="text" placeholder="Search contacts..." />
                </div>
                <div id="contacts">
                    <ul>
                        <?php
                            $search = "SELECT emetteur, id_discus FROM discussion WHERE recepteur = '".$id_profile."' UNION SELECT recepteur, id_discus FROM discussion WHERE emetteur = '".$id_profile."'";
                            $result = mysqli_query($con, $search);
                            while($discu = mysqli_fetch_array($result)) {
                                $user_result = mysqli_query($con, "SELECT nom, prenom, photoprofil FROM utilisateur WHERE login = '".$discu['emetteur']."'");
                                while ($data = mysqli_fetch_array($user_result)) {
                                    $lastname = $data['nom'];
                                    $firstname = $data['prenom'];
                                    $photo = $data['photoprofil'];
                                    if ($photo=="") {$photo="assets/images/batman.jpg";}
                                    if(isset($_GET['contact'])){
                                        if ($discu['emetteur'] == $_GET['contact']) { $active="active";} else {$active="";}
                                    } else {$active="";}
                                    echo '
                                    <a href="message.php?contact='.$discu['emetteur'].'&amp;discus='.$discu['id_discus'].'">
                                    <li id="'.$discu["emetteur"].'" class="contact '.$active.'">
                                        <div class="wrap">
                                            <img src=' .$photo. ' alt="" />
                                                <div class="meta">
                                                <p class="name">' .$firstname. ' ' .$lastname. '</p>
                                                <p class="preview">...</p>
                                            </div>
                                        </div>
                                    </li>
                                    </a>
                                    ';
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div id="bottom-bar">
                    <button id="new_discussion">
                        <i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>
                        <span>Nouvelle discussion</span>
                    </button>
                </div>
            </div>
            <div class="content">
                <div id="" class="contact-profile">
                    <?php
                    if(isset($_GET['contact'])){
                    $contact_profile = mysqli_query($con, "SELECT nom, prenom, photoprofil FROM utilisateur WHERE login = '".$_GET['contact']."'"); 
                    while ($data = mysqli_fetch_array($contact_profile)) {
                        $lastname = $data['nom'];
                        $firstname = $data['prenom'];
                        $photo_contact = $data['photoprofil'];
                        if ($photo_contact=="") {$photo_contact="assets/images/batman.jpg";}
                        echo' 
                        <img src='.$photo_contact.' alt="" />
                        <p>'.$firstname.' '.$lastname.'</p>';
                    }
                    }
                    ?>
                </div>
                <div class="messages">
                    <ul>
                    <?php
                        if(isset($_GET['discus'])){
                        $search = "SELECT textemessage, id_emetteur FROM `message` WHERE id_discussion = '".$_GET['discus']."' ORDER BY moment;";
                        $result = mysqli_query($con, $search);
                        while($row = mysqli_fetch_array($result)) {
                            $message = $row['textemessage'];
                            if ($row['id_emetteur']==$id_profile) {
                                $class = "sent";
                                $photo_text = $photo_profile;
                            } else { 
                                $class="replies";
                                $photo_text = $photo_contact; 
                            }
                            echo'
                            <li class='.$class.'>
                                <img src='.$photo_text.' alt="" />
                                <p>'.$message.'</p>
                            </li>';
                        }
                    }
                    ?>
                    </ul>
                </div>
                <div class="message-input">
                    <div class="wrap">
                        <?php
                        if(isset($_GET['discus']) && isset($_GET['contact'])){
                            echo '
                            <form method="POST" action="">
                                <input type="text" id="new_message" name="new_message" placeholder="Write your message..." />
                                <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                                <button type="submit" class="submit">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </form>
                            ';       
                            
                        }
                        ?>
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

        <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script>$(".messages").animate({ scrollTop: $(document).height() }, "fast");

            $(window).on('keydown', function (e) {
                if (e.which == 13) {
                    newMessage();
                    return false;
                }
            });
            //# sourceURL=pen.js
        </script>

</body>

</html>