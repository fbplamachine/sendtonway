<?php
$serveurname = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "projet2cp";
$conn = mysqli_connect($serveurname,$dbusername,$dbpassword,$dbname);//pas de connexion avec le serveur
if (!$conn)
{

	die("connection failed :".mysqli_connect_error());
}
