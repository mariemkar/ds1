<?php
session_start();
$mysqli = new Mysqli("localhost", "root", "", "site");
$contenu="";
if($_POST)
{
    $resultat = $mysqli->query("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
    if($resultat->num_rows != 0)
    {
        $membre = $resultat->fetch_assoc();
        if($membre['mdp'] == $_POST['mdp'])
        {
            foreach($membre as $indice => $element)
            {
                if($indice != 'mdp')
                {
                    $_SESSION['membre'][$indice] = $element;
                }
            }
            header("location:profil.php");
        }
        else
        {
            $contenu .= '<div class="erreur">Erreur de MDP</div>';
        }       
    }
    else
    {
        $contenu .= '<div class="erreur">Erreur de pseudo</div>';
    }
}
?>

<html>
<head>
    <title>connexion</title>
     <link rel="stylesheet" href="st.css">  
 </head>
<body>
    <header>
          <?php require_once ("aa.php")?></header>
    <div class="main-w3layouts wrapper">
 <h1>Login</h1>
<div class="main-agileinfo">
 <div class="agileits-top">
  <form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" required><br> <br>
         
    <label for="mdp">Mot de passe</label><br>
    <input type="text" id="mdp" name="mdp" required><br><br>

     <input type="submit" value="valider">

</form>
</div>  
</div> 
</body>
</html>
