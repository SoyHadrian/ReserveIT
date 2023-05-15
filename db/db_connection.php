<?php
$conexion = new mysqli("localhost", "root", "", "reserveit");
$conexion->set_charset("utf8");
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reserveit2";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed " . mysqli_connect_error());
}
//echo "Connected successfully";
?>