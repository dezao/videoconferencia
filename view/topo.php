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
    <!--Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon.png">
    <title>Sistema de Videoconferência</title>
</head>
<body>
  <div class="col s6 right-align #880e4f pink darken-2 white-text"><b>BEM VINDO <?php echo strtoupper($dados['nome']) . '!'; ?></b></div>  
  </div>
  <!--Estrutura Dropdown Menu Analistas NavBar -->
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="./cadastraAnalista.php">CADASTRAR</a></li>
    <li class="divider"></li>
    <li><a href="./listaAnalista.php">LISTAR</a></li>
  </ul>

    <nav>
    <div class="nav-wrapper #880e4f pink darken-4">
      <a href="./dashboard.php" class="brand-logo"><img src="./img/logo_raizen.png"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><b><a href="./cadastraVideo.php"><i class="material-icons left">ondemand_video</i>CADASTRAR VIDEO</a></b></li>
        <?php 
          
         //Veriicando se usuário é ADM
          if ($dados['adm'] == 0) {
          } else {
            echo '<b><li><a class="dropdown-trigger" data-target="dropdown1"><i class="material-icons left" left>people</i>ANALISTAS<i class="material-icons right">arrow_drop_down</i></a></li></b>';
            //echo '<li><b><a href="./cadastraAnalista.php">CADASTRAR ANALISTA</a></b></li>';
          }
        ?>
        <li><b><a href="javascript:window.open('painel.php', 'principal', 'status=no, toolbar=no, menubar=no, location=yes, fullscreen=1, scrolling=auto');"><i class="material-icons left">videocam</i>PAINEL VIDEOCONFERÊNCIA</a></b></li>
        <li><b><a href="logout.php"><i class="material-icons left">exit_to_app</i>SAIR</a></b></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="./cadastrar.php">Cadastrar Vídeo</a></li>
    <li><a href="cadastraAnalista.php">Cadastrar Analistas</a></li>
    <li><a href="painel.php">Painel de Vídeo</a></li>
  </ul>