
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>aaff</title>
</head>
<body>
<h3>tous les membres </h3>

	<?php

	session_start();
$pdo=new PDO("mysql:host=localhost;dbname=site","root" ,"");
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$req=$pdo->query("SELECT * FROM membre");

while ($user=$req->fetch()) {?>
<p<? echo $user['pseudo'];
echo $user ; ?>></p>
<?php }?>


</body>
</html>