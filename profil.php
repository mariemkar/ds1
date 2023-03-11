

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>profil </title>
	<link rel="stylesheet" href="st.css">
</head>
<body>
	  <header><?php require_once ("aa.php")?></header>
	<center>
<?php
require_once("fon.php");
session_start();
$mysqli = new Mysqli("localhost", "root", "", "site");
$contenu="";

$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . '</strong></p>';
$contenu .= '<div class="cadre"><h2> Voici vos informations </h2>';
$contenu .= '<p> votre email est: ' . $_SESSION['membre']['email'] . '<br>';
$contenu .= 'votre ville est: ' . $_SESSION['membre']['ville'] . '<br>';
$contenu .= 'votre cp est: ' . $_SESSION['membre']['code_postal'] . '<br>';
$contenu .= 'votre adresse est: ' . $_SESSION['membre']['adresse'] . '</p></div><br><br>';
echo $contenu;
?>
	<a href="membre.php">Mettre à jour mes informations</a><br>
	<a href="desinscrie.php?delete=<?php echo $_SESSION['membre']['id_membre'] ;?>">Supprimer votre compte</a><br>
	<a href="deconnexion.php">se deconnecter</a>
  </center> 

</body>
</html>