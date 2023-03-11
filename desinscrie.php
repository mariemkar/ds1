<?php
$mysqli = new Mysqli("localhost", "root", "", "site");
if(isset($_POST['delete']))
{
$id=$_GET['delete'];
$req="DELETE from membre where id_membre='$id'";
$query=mysql_query($req);
if($query)
{echo "supprime succee";}	
}
  ?>