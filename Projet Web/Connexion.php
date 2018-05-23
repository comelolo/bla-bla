
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        .leftbox {
            margin-left: 10%;
            margin-top: 10%;
            float: left;
            width: 30%;
        }
        .rightbox {
            margin-left: 10%;
            float: left;
            width: 40%;
            margin-top: 10%;
        }
    </style>
    <style>
    
        textarea:focus {
            height: 4em;
        }
    </style>

</head>
<body>
    <nav class="navbar-inverse navbar-fixed-top">
        <div class="container-fluid input-group">
            <div class="navbar-header">
                <a class="navbar-brand" href="Pagedaccueil.php">ECE Bond</a>
            </div>

        </div>
    </nav>

    <div class="leftbox">
        <div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<b>Se connecter :</b>
									</h3>
								</div>
                <div class="panel-body">
                    <fieldset>
                        <form name="myform"  action="traitement/co_auteur_traitement.php" method="POST">
            
            <table>
                <tr class="spaceUnder">
                    <td>Login :</td>
                    <td>
                        <input class="form-control" type="text" name="Login1">
                    </td>
                </tr>
                <tr class="spaceUnder">
                    <td>Mot de Passe:</td>
                    <td>
                        <input class="form-control" type="password" name="Password">
                    </td>
                </tr>
            </table>
            <br>
            <left>
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Se connecter"  />
            </left>
            <br>
            <br>
            <br><br>
		</form>
		
		<form name="myform" action="val_ins_traitement.php" method="POST">
            
            <table>
                <tr class="spaceUnder">
                    <td>Login :</td>
                    <td>
                        <input class="form-control" type="text" name="Login2" >
                    </td>
                </tr>
                <tr class="spaceUnder">
                    <td>Adresse mail:</td>
                    <td>

                        <input class="form-control" type="text" name="Email" >
                    </td>
                    <td> <p>@edu.ece.fr</p></td>
                </tr>

            </table>
            <br>
            <br>
            <left>
                <input class="btn btn-lg btn-success btn-block" type="submit" value="S'inscrire" />
            </left>
        </form>
        </fieldset>
    </div>
    </div>
    </div>

    <div class="rightbox">
        <div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<b>S'inscrire :</b>
									</h3>
								</div>
								<div class="panel-body">
									<fieldset>
										<form name="inscription" id="inscription" onsubmit="" method="POST" action="traitement/aut_inscrip_traitement.php" enctype="multipart/form-data">
											<table id="Formulaire">
												<tr class="spaceUnder">
													<td>
														<h5>Nom :</h5>
													</td>
													<td>
														<input class="form-control" placeholder="nom" name="nom" id="nom" type="text">
													</td>
												</tr>
												<tr class="spaceUnder">
													<td>
														<h5>Prénom :</h5>
													</td>
													<td>
														<input class="form-control" placeholder="prénom" name="prenom" id="prenom" type="text">
													</td>
												</tr>
												<tr class="spaceUnder">
													<td>
														<h5>Email :</h5>
													</td>
													<td>
														<input class="form-control" placeholder="email" name="email" id="email" type="email">
													</td>
												</tr>
												<tr class="spaceUnder">
													<td>
														<h5>Login :</h5>
													</td>
													<td>
														<input class="form-control" placeholder="login" name="login" id="login" type="text">
													</td>
												</tr>
												<tr class="spaceUnder">
													<td>
														<h5>Mot de passe :</h5>
													</td>
													<td>
														<input class="form-control" placeholder="mot de passe" name="mdp" id="mdp" type="password">
													</td>
												</tr>
												<tr class="spaceUnder">
													<td>
														<h5>Date de naissance :</h5>
													</td>
													<td>
														<input class="form-control" name="date" id="date" type="date">
													</td>
												</tr>
												<tr class="spaceUnder">
													<td>
														<h5>Promotion :</h5>
													</td>
													<td>
														<select style="color: rgba(0,0,0,0.5);" class="form-control" id="promo" title="promotion" name="promotion">
															<option value="2000">2000</option>
															<option value="2001">2001</option>
															<option value="2002">2002</option>
															<option value="2003">2003</option>
															<option value="2004">2004</option>
															<option value="2005">2005</option>
															<option value="2006">2006</option>
															<option value="2007">2007</option>
															<option value="2008">2008</option>
															<option value="2009">2009</option>
															<option value="2010">2010</option>
															<option value="2011">2011</option>
															<option value="2012">2012</option>
															<option value="2013">2013</option>
															<option value="2014">2014</option>
															<option value="2015">2015</option>
															<option value="2016">2016</option>
															<option value="2017">2017</option>
															<option value="2018">2018</option>
															<option value="2019">2019</option>
															<option value="2020">2020</option>
															<option value="2021">2021</option>
															<option value="2022">2022</option>
															<option value="2023">2023</option>
															<option value="2024">2024</option>
															<option value="2025">2025</option>
															<option value="2026">2026</option>
														</select>
													</td>
												</tr>
												<tr class="spaceUnder">
													<td>
														<h5>Majeure :</h5>
													</td>
													<td>
														<select style="color: rgba(0,0,0,0.5);" class="form-control" id="majeure" title="majeure" name="majeure">
															<option value="0">...</option>
															<option value="SI">SI</option>
															<option value="SE">SE</option>
															<option value="Finance">Finance</option>
															<option value="Sante">Sante</option>
															<option value="Energie et Environnement">Energie et environnement</option>
															<option value="OCRES">OCRES</option>
														</select>
													</td>
												</tr>
												<tr class="spaceUnder">
													<td>
														<h5>Post actuel:</h5>
                                                    </td>
													<td>
														<input class="form-control" placeholder="post" name="post" id="post" type="text">
													</td>
                                                </tr>
                                                <tr class="spaceUnder">
													<td>
														<h5>Choisir une photo de profil :</h5>
                                                    </td>
													<td>
														<input class="form-control" name="photo" id="photo" type="file">
													</td>
												</tr>
												
											</table>
											<input class="btn btn-lg btn-success btn-block" type="submit" value="Submit">
											<input class="btn btn-lg btn-danger btn-block" type="reset" onclick="hideAlertItemAdd()" value="Reset">
										</form>
									</fieldset>
								</div>
							</div>
					
    </div>


</body>
</html>