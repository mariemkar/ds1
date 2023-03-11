<?php
$mysqli = new Mysqli("localhost", "root", "", "site");
if($_POST)
{
    $result = $mysqli->query("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES ('$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[adresse]')");
    echo '<div style="background: green; padding: 5px;">l\'membre a bien été ajouté</div>';
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORM</title>
	<link rel="stylesheet" href="st.css">
</head>
<body>
    <header><?php require_once ("aa.php")?></header>
<div class="main-w3layouts wrapper">
 <h1>S'inscrire</h1>
<div class="main-agileinfo">
 <div class="agileits-top">
<form method="post" action="">
	<label for="nom">Nom</label><br>
    <input class="text" type="text" id="nom" name="nom" placeholder="votre nom"><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" placeholder="votre prénom"><br>

    <label for="email">Email</label><br>
    <input class="text email" type="email" id="email" name="email" placeholder="exemple@gmail.com"><br>

    <label for="civilite">Civilité</label><br>
    <input name="civilite" value="m" checked="" type="radio">Homme
    <input name="civilite" value="f" type="radio">Femme<br>

    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_."><br>

        <label for="cp">Code Postal</label><br>
    <input type="text" id="code_postal" name="code_postal" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br>

    <label for="adresse">Adresse</label><br>
    <textarea id="adresse" name="adresse" placeholder="votre dresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."></textarea><br>

   <label for="pseudo">Pseudo</label><br>
    <input class="text" type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required"><br>
 <label for="mdp">Mot de passe</label><br>
    <input class="text" type="password" id="mdp" name="mdp" required="required"><br>
<div class="wthree-text">
 <label class="anim">
 <input type="checkbox" class="checkbox" required="">
  <span>J'accepte les termes et conditions</span> </label>
  	<div class="clear"> </div>
</div>
<input type="submit" name="inscription" value="S'inscrire">
</form>
</div></div>


</body>
</html>