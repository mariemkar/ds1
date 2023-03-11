<?php
session_start();
if(isset($_POST['valider']))
{
	if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']))
	{
		$pseudo_par_defaut="admin";
		$mdp_par_defaut="ad123";
		$pseudo_saisie=htmlspecialchars($_POST['pseudo']);
		$mdp_saisie=htmlspecialchars($_POST['mdp']);
		if($pseudo_saisie=$pseudo_par_defaut AND $mdp_saisie=$mdp_par_defaut)
		{
           $_SESSION['mdp']=$mdp_saisie;
           header('location :gestion_membre.php');
		}else {echo "votre mdp ou pseudo incorrect" ; }
	}else {echo "veuillez saisie tous les champs.." ; }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Espace Admin</title>
</head>
<body>
  <div class="main-w3layouts wrapper">
 <h1>Login</h1>
<div class="main-agileinfo">
 <div class="agileits-top">
  <form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" required><br> <br>
         
    <label for="mdp">Mot de passe</label><br>
    <input type="text" id="mdp" name="mdp" required><br><br>

     <input type="submit" name="valider" value="valider">

</form>
</div>  
</div>
</body>
</html>