 <?php
 $mysqli = new Mysqli("localhost", "root", "", "site");
$contenu='';

//--- ENREGISTREMENT PRODUIT ---//
if(!empty($_POST))
{  
    $photo_bdd = ""; 
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
    $result = $mysqli->query("INSERT INTO produit (reference, categorie, titre, description, photo, prix, stock) values ('$_POST[reference]', '$_POST[categorie]', '$_POST[titre]', '$_POST[description]',  '$photo_bdd',  '$_POST[prix]',  '$_POST[stock]')");
    echo '<div style="background: green; padding: 5px;" >Le produit a été ajouté</div>';
}
 
//--- AFFICHAGE PRODUITS ---//
if(isset($_GET['action']) && $_GET['action'] == "affichage")
{
    $resultat = $mysqli->query("SELECT * FROM produit");
     
    $contenu .= '<h2> Affichage des Produits </h2>';
    $contenu .= 'Nombre de produit(s) dans la boutique : ' . $resultat->num_rows;
    $contenu .= '<table border="1"><tr>';
     
    while($colonne = $resultat->fetch_field())
    {    
        $contenu .= '<th>' . $colonne->name . '</th>';
    }
    $contenu .= '<th>Modification</th>';
    $contenu .= '<th>Supression</th>';
    $contenu .= '</tr>';
 
    while ($ligne = $resultat->fetch_assoc())
    {
        $contenu .= '<tr>';
        foreach ($ligne as $indice => $information)
        {
            if($indice == "photo")
            {
                $contenu .= '<td><img src="' . $information . '" ="70" height="70"></td>';
            }
            else
            {
                $contenu .= '<td>' . $information . '</td>';
            }
        }
        $contenu .= '<td><a href="?action=modification&id_produit=' . $ligne['id_produit'] .'"><img src="../inc/img/edit.png"></a></td>';
        $contenu .= '<td><a href="?action=suppression&id_produit=' . $ligne['id_produit'] .'" OnClick="return(confirm(\'En êtes vous certain ?\'));"><img src="../inc/img/delete.png"></a></td>';
        $contenu .= '</tr>';
    }
    $contenu .= '</table><br><hr><br>';
}require_once('aa.php');
 echo $contenu;
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gestion_boutique</title>
    
</head>
<body>
<h1> Formulaire Produits </h1>
   <center> <form method="post" enctype="multipart/form-data" action="">
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
         
        <input type="submit" value="Ajouter un produit" name="btn-ajouter"><br><br>
        <input type="button" onclick=window.location.href="modifier.php" value="Modifier un produit" name=""> <br><br>
        <input type="button" onclick=window.location.href="supprimer.php" value="Supprimer un produit" name=""><br><br>

    </form>
    </center> 
</body>
</html>
 