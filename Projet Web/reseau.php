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
            width: 60;
            height: 60;
        }

        .panel-default {
            margin-top: 4%;
            min-width: 300;
        }
    </style>

    <script>
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
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div id="frame">
        <div class="sidebar-wrapper pull-left">
            <div class="profile-container">
                <img class="img-responsive img-profil center-block" src="assets/images/fjords.jpg" alt="" />
                <h3 class="name">Côme L'Ollivier</h3>
                <h5 class="tagline">Trapeur</h5>
            </div>
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto: yourname@email.com">comelolo@yolo.com</a>
                    </li>
                    <li>
                        <i class="fa fa-briefcase"></i>
                        <a href="#" target="_blank">Systemes Embarqués</a>
                    </li>
                    <li>
                        <i class="fa fa-graduation-cap"></i>
                        <a href="#" target="_blank">Promo 2020</a>
                    </li>
                </ul>
                <br/>
                <a href="profil.php">afficher profil</a>
                <br>
                <a href="change_profil.php">modifier profil</a>

            </div>

        </div>

        <div id="search" class="search-bar">
            <div class="panel-body">
                
                <form action="" class="navbar-form">
                    <div class="input-group"></div>
                    <span>Rechercher quelqu'un</span>
                    <input type="text" placeholder="..." size="40"></input>
                </form>
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