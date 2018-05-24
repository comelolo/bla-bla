<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel= "stylesheet" type "text/css" href "style.css" />
	<title> Inscription </title>

	<style>
		.formulaire {
			margin-top: 10%;
			margin-left: 20%;
			width: 40%;
		}
	</style>
</head>

<body>
	<?php
//session_start();
//echo $_SESSION['login'];
//echo '<form action="traitement/aut_inscrip_traitement.php?login='.$_GET['login'].'&amp;email='.$_GET['email'].'&amp;" method="post">';
?>
		<div class="formulaire">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<b>Inscription :</b>
									</h3>
								</div>
								<div class="panel-body">
									<fieldset>
										<form name="inscription" id="inscription" onsubmit="return addItemValidation();" method="POST" action="traitement/aut_inscrip_traitement.php">
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
															<option value="1">SI</option>
															<option value="2">SE</option>
															<option value="3">Finance</option>
															<option value="4">Sante</option>
															<option value="5">Energie et environnement</option>
															<option value="6">OCRES</option>
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
												
											</table>
											<input class="btn btn-lg btn-success btn-block" type="submit" value="Submit">
											<input class="btn btn-lg btn-danger btn-block" type="reset" onclick="hideAlertItemAdd()" value="Reset">
										</form>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
		
		
</body>
</html>