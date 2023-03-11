<?php
$mysqli = new Mysqli("localhost", "root", "", "site");
$contenu='';

if(!empty($_POST))
{  
    $photo_bdd = ""; 
    if(isset($_GET['action']) && $_GET['action'] == 'modification')
    {
        $photo_bdd = $_POST['photo_actuelle'];
    }
    if(!empty($_FILES['photo']['name']))
    {   
        $nom_photo = $_POST['reference'] . '_' .$_FILES['photo']['name'];
        $photo_bdd =  "photo/$nom_photo";
        $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . "/img/$nom_photo"; 
        copy($_FILES['photo']['tmp_name'],$photo_dossier);
    }
    foreach($_POST as $indice => $valeur)
    {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    $result =$mysqli->query("REPLACE INTO produit (id_produit, reference, categorie, titre, description, photo, prix, stock) values ('$_POST[id_produit]', '$_POST[reference]', '$_POST[categorie]', '$_POST[titre]', '$_POST[description]',  '$photo_bdd',  '$_POST[prix]',  '$_POST[stock]')");
   echo '<div style="background: green; padding: 5px;" >Le produit a été modifier</div>';
   
}


?>
<html>
    <head>
         <title>modifier_prod</title>
<link rel="stylesheet" href="st.css">
    </head>
<body>
      <header><?php require_once ("aa.php")?></header>
      <h1> Formulaire Produits </h1>
    <form method="post" enctype="multipart/form-data" action="">
        <label for="id_produit">id_produit</label><br>
        <input type="text" id="id_produit" name="reference" placeholder="id_produit" required="required"> <br><br>
        <label for="reference">reference</label><br>
        <input type="text" id="reference" name="reference" placeholder="la référence de produit" required="required"> <br><br>
 
        <label for="categorie">categorie</label><br>
        <input type="text" id="categorie" name="categorie" placeholder="la categorie de produit" required="required"><br><br>
 
        <label for="titre">titre</label><br>
        <input type="text" id="titre" name="titre" placeholder="le titre du produit" required="required"> <br><br>
 
        <label for="description">description</label><br>
        <textarea name="description" id="description" placeholder="la description du produit" required="required"></textarea><br><br>
         
         
        <label for="photo">photo</label><br>
        <input type="file" id="photo" name="photo" required="required"><br><br>
 
        <label for="prix">prix</label><br>
        <input type="text" id="prix" name="prix" placeholder="le prix du produit" required="required"><br><br>
         
        <label for="stock">stock</label><br>
        <input type="text" id="stock" name="stock" placeholder="le stock du produit" required="required"><br><br>
         
        <input type="submit" value="Modifier un produit" name="btn-modifier"><br><br>
    </form>
</body>
</html>
