 <?php
 //********rech********

// Connexion à la base de données
$pdo=new PDO("mysql:host=localhost;dbname=site","root" ,"");
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// Récupération de la tranche de prix sélectionnée
if (isset($_GET['prix'])) {
  $price_range = $_GET['prix'];
} else {
  $price_range = '';
}

// Construction de la requête SQL en fonction de la tranche de prix sélectionnée
if ($price_range == '0-100') {
  $sql = "SELECT * FROM produit WHERE prix >= 0 AND prix <= 100";
} else if ($price_range == '100-500') {
  $sql = "SELECT * FROM produit WHERE prix >= 100 AND prix <= 500";
} else if ($price_range == '500-1000') {
  $sql = "SELECT * FROM produit WHERE prix >= 500 AND prix <= 1000";
} else if ($price_range == '1000-') {
  $sql = "SELECT * FROM produit WHERE prix >= 1000";
} else {
  $sql = "SELECT * FROM produit";
}

// Exécution de la requête SQL et affichage des résultats
$stmt = $pdo->query($sql);
while ($row = $stmt->fetch()) {
  // Affichage des résultats
    
}
 //************
$mysqli = new Mysqli("localhost", "root", "", "site");
$contenu='';
$res= "SELECT DISTINCT categorie FROM produit";
 $resultat=$mysqli->query($res);
$contenu .= '<div class="boutique-gauche">';
$contenu .= "<ul>";
while($cat = $resultat->fetch_assoc())
{
   $contenu .= "<li><a href='?categorie=" . $cat['categorie'] . "'>" . $cat['categorie'] . "</a></li>";
}
$contenu .= "</ul>";
$contenu .= "</div>";

 

//--- AFFICHAGE DES PRODUITS ---//
$contenu .= '<div class="boutique-droite">';
if(isset($_GET['categorie']))
{
    $donnees =$mysqli->query ("select id_produit,reference,titre,photo,prix from produit where categorie='$_GET[categorie]'");  
    while($produit = $donnees->fetch_assoc())
    {

        $contenu .= '<div class="boutique-droite">';
        $contenu .= "<h2>$produit[titre]</h2>";
        $contenu .= "<a href=\"fiche_produit.php?id_produit=$produit[id_produit]\"><img src=\"$produit[photo]\" =\"130\" height=\"100\"></a>";
        $contenu .= "<p>$produit[prix] €</p>";
        $contenu .= '<a href="fiche_produit.php?id_produit=' . $produit['id_produit'] . '">Voir la fiche</a>';
        $contenu .= '</div>';
    }
}
$contenu .= '</div>';

require_once('aa.php');
echo $contenu;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>boutique</title>

</head>
<body>
<form action="search.php" method="get">
 
  <select name="price_range" id="price_range">
    <option value="">-- Sélectionnez une tranche de prix --</option>
    <option value="0-100">0 - 100 €</option>
    <option value="100-500">100 - 500 €</option>
    <option value="500-1000">500 - 1000 €</option>
    <option value="1000-">Plus de 1000 €</option>
  </select>
  <input type="submit" value="Rechercher">
</form>
<img src="/img/aa2.jpg" ><br><br>
<video controls width="250">
    <source src="C:\xampp4\htdocs\mon site\flower" type="video/webm">
</body>
</html>