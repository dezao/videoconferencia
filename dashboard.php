<?php
//Conexão com o Banco de Dados
require_once 'dbconnect.php';
    
//Sessão
session_start();

//Dados
$id = $_SESSION=['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Videoconferência</title>
</head>
<body>
    <center><h1>Olá, <?php echo $_SESSION['id_usuario']; ?>!</h1></center>
</body>
</html>