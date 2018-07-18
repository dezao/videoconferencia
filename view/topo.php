<?php

    //Conexão com o Banco de Dados
    require_once 'dbconnect.php';

    //Sessão
    session_start();

    //Verificação 
    if(!isset($_SESSION['logado'])) {
        header('Location: index.php');
    }

    //Dados
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
    <link rel="stylesheet" href="css/materialize.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="css/custom.css">
    <title>Sistema de Videoconferência</title>
</head>
<body>

    <nav>
    <div class="nav-wrapper #880e4f pink darken-4">
      <a href="./dashboard.php" class="brand-logo"><img src="./img/logo_raizen.png"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="./cadastraVideo.php">Cadastrar Vídeo</a></li>
        <li><a href="./cadastraAnalista.php">Cadastrar Analistas</a></li>
        <li><a href="./painel.php">Painel de Vídeos</a></li>
        <li><a href="logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="./cadastrar.php">Cadastrar Vídeo</a></li>
    <li><a href="cadastraAnalista.php">Cadastrar Analistas</a></li>
    <li><a href="painel.php">Painel de Vídeo</a></li>
  </ul>


        