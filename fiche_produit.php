<?php
$mysqli = new Mysqli("localhost", "root", "", "site");
$contenu='';
if(isset($_GET['id_produit'])) 
 { 
    $resultat = $mysqli->query("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'"); 
 }
if($resultat->num_rows <= 0)
 {
  header("location:boutique.php"); exit();
 }
 
$produit = $resultat->FETCH_ASSOC();
$contenu .= "<h2>Titre : $produit[titre]</h2><hr><br>";
$contenu .= "<p>Categorie: $produit[categorie]</p>";
$contenu .= "<img src='$produit[photo]' ='150' height='150'>";
$contenu .= "<p><i>Description: $produit[description]</i></p><br>";
$contenu .= "<p>Prix : $produit[prix] DT</p><br>";
if($produit['stock'] > 0)
{
    $contenu .= "<i>Nombre d'produit(s) disponible : $produit[stock] </i><br><br>";
    $contenu .= '<form method="post" action="panier.php">';
        $contenu .= "<input type='hidden' name='id_produit' value='$produit[id_produit]'>";
        $contenu .= '<label for="quantite">Quantité : </label>';
        $contenu .= '<select id="quantite" name="quantite">';
            for($i = 1; $i <= $produit['stock'] && $i <= 4; $i++)
            {
                $contenu .= "<option>$i</option>";
            }
        $contenu .= '</select>';
        $contenu .= '<input type="submit" name="ajout_panier" value="ajout au panier">';
    $contenu .= '</form>';
}
else
{
    $contenu .= 'Rupture de stock !';
}

echo $contenu;
 ?>
 <style >
     body {background-color: #DEB887;}
 </style>