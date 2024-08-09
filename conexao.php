<?php
// Create a connection to the database
$servername = "localhost"; // pelo nome LOBODELL\SQLEXPRESS ou pelo IP 127.0.0.1  192.168.0.4
$username = "root";  //LOBODELL\mathe
$password = "1234"; //senha do usuario
$dbname = "db_lobo"; // nome do teu banco de dados exempli.: bd_Locadora

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection - se der erro mostrar o erro pra mim
if ($conn->connect_error) {
    die("Conexão falhou, segue o erro : " . $conn->connect_error);
}
?>