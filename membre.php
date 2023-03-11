<?php  
session_start();

$mysqli = new Mysqli("localhost", "root", "", "site");
if(isset($_GET['id_membre']))
{
    $req=$mysqli->prepare("SELECT * from membre where id_membre=?");
    $req->execute(array($_GET['id_membre']));
    $user=$req->fetch();

 if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['ville']) and isset($_POST['code postal']) and isset($_POST['adresse']) and isset($_POST['pseudo']) and isset($_POST['mdp']))
 {
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $ville=$_POST['ville'];
    $cdp=$_POST['code postal'];
    $adresse=$_POST['adresse'];
    $pseudo=$_POST['pseudo'];
    $mdp=$_POST['mdp'];

  $req2=" UPDATE membre SET 
    nom ='$nom'  ,
    prenom ='prenom'  ,
    email ='$email'  ,
    ville ='$ville'  ,
    code postal ='$cdp'  ,
    adresse ='$adresse'  ,
    pseudo ='$pseudo'  , 
    mdp ='$mdp' ";
$res=mysql_query($req2);
}
if($res)
{echo "informations modifier";}
}

if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
{
 $tailleMax=2097152;
 $extensionValides=array('jpg','jpeg','gif','png');
 if($_FILES['avatar']['size']<=$tailleMax)
 {
   $extensionUpload=strtolower(substr(strrchr($_FILES['avatar']['name'],'.'), 1));
     if (in array($extensionUpload,$extensionValides)) 
      {
           $chemin="C:\xampp4\htdocs\mon site\avatar".$_SESSION['id_membre'].".".$extensionUpload ;
           $resultat=move_uploaded_file($_FILES['avatar']['tmp_name'], destination);
           if ($resultat)
            {
            $updateavatar=$pdo->prepare("update membre set avatar= :avatar where id_membre=:id_membre");
            $updateavatar->execute(array('avatar'=>$_SESSION['id_membre'].".".$extensionUpload , 'id_membre'=>$_SESSION['id_membre'])); 
            header('location : profil.php');
          }else{echo "erreur ";}
      }else {echo "votre photo doit etre sous format indiquer";}
 }else{$msg="votre photo de profil ne doit depasser 2MO";}
}

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>modifier compte</title>
	<link rel="stylesheet" href="st.css">
</head>
<body>
     <header><?php require_once ("aa.php")?></header>
<div class="main-w3layouts wrapper">
 <h1>Modifier</h1>
<div class="main-agileinfo">
 <div class="agileits-top">
<form method="post" action="" enctype="multipart/form-data">
	<label for="nom">Nom</label><br>
    <input class="text" type="text" id="nom" name="nom" placeholder="votre nom" value="<?php echo $nom ;?>"><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" placeholder="votre prénom" value="<?php echo $prenom ; ?>"><br>

    <label for="email">Email</label><br>
    <input class="text email" type="email" id="email" name="email" placeholder="exemple@gmail.com" value="<?php echo $email ; ?>"/><br>

 

    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville" placeholder="votre ville"  pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_." value="<?php echo $ville ; ?>"><br>

        <label for="cp">Code Postal</label><br>
    <input type="text" id="code_postal" name="code_postal" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9" value="<?php echo $cdp  ; ?>"><br>

    <label for="adresse">Adresse</label><br>
    <textarea id="adresse" name="adresse" placeholder="votre dresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_." value="<?php echo $adresse ; ?>"></textarea><br>

   <label for="pseudo">Pseudo</label><br>
    <input class="text" type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required" value="<?php echo $pseudo ; ?>"><br>
 <label for="mdp">Mot de passe</label><br>
    <input class="text" type="password" id="mdp" name="mdp" placeholder="Mot de passe" required="required" value="<?php echo $mdp ; ?>"><br>
 <label>Avatar</label><br>
   <input type="file" name="avatar"/><br><br><br>
<div class="wthree-text">
 <label class="anim">
 <input type="checkbox" class="checkbox" required="">
  <span>J'accepte les termes et conditions</span> </label>
  	<div class="clear"> </div>
</div>
<input type="submit" name="modifier" value="Modifier">
</form>
</div></div>
</body>
</html>