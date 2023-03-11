<?php
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
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>

<form action="search.php" method="get">
  <label for="price_range">Trier par tranche de prix :</label>
  <select name="price_range" id="price_range">
    <option value="">-- Sélectionnez une tranche de prix --</option>
    <option value="0-100">0 - 100 €</option>
    <option value="100-500">100 - 500 €</option>
    <option value="500-1000">500 - 1000 €</option>
    <option value="1000-">Plus de 1000 €</option>
  </select>
  <input type="submit" value="Rechercher">
</form>

</body>
</html>