<?php
try
{
	$pdo=new PDO("mysql:host=localhost;dbname=site","root" ,"");
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOEXCEPTION $e)
{
	echo "echec de connexion ";
	$e->getMessage();
}
if($pdo)
{echo "connexion reussir";}
session_start();
$contenu = '';

?>