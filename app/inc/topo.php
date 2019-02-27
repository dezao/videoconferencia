<?php
  //Sessão
  session_start();
  ob_start();

  //Definindo timezone do projeto
  date_default_timezone_set("America/Sao_Paulo");
  
  //Definindo Data atual
  $dataDoDia = date('Y/m/d');

  //Conexão com o Banco de Dados
  include_once 'dbconnect.php';

  //Funções do Sistema
  include_once 'functions.php';

  //Mensagens do sistema
  include_once 'mensagem.php';

  //Verificação se Logado ou não 
  if(!isset($_SESSION['logado'])) {
      header('Location: index.php');
  }

    //Dados Usuários
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
    $usuarioLogado = $dados['nome'];
    $usuarioAdm = $dados['adm'];
    $usuarioBloqueado = $dados['ativo'];
    $idUsuario = $dados['id'];
    $usuarioUnidade = $dados['unidade'];
    
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
    <link rel="stylesheet" href="../../assets/css/materialize.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <!-- Data Tables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css"/> -->
    <!--Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon.png">
    <title>Painel de Videoconferência</title>

</head>
<body>
  <div class="col s6 right-align #880e4f pink darken-2 white-text"><b style="font-size: .70em; margin-right: 20px;">BEM VINDO <?php  echo  strtoupper($dados['nome']) . '!';  ?></b></div>
  </div>
  <!--Estrutura Dropdown Menu Analistas NavBar -->
  <ul id="analistas" class="dropdown-content #880e4f pink darken-4">
    <li><a href="../../app/view/cadastraAnalista.php"><i class="material-icons left white-text">people</i>CADASTRAR</a></li>
    <li><a href="./listaAnalista.php"><i class="material-icons left white-text">filter_list</i>LISTAR</a></li>
  </ul>

  <!--Estrutura Dropdown Menu Videoconferências NavBar -->
  <ul id="videoconferencias" class="dropdown-content #880e4f pink darken-4">
  <li><a href="./cadastraVideo.php"><i class="material-icons left white-text">ondemand_video</i>CADASTRAR</a></li>
  <!--<li><a href="javascript:window.open('painel.php', 'principal', 'status=no, toolbar=no, menubar=no, location=yes, fullscreen=1, scrolling=auto');"><i class="material-icons left">videocam</i>PAINEL</a></li>
  <li><a href="./relatorioVideos.php"><i class="material-icons left white-text">insert_chart</i>RELATÓRIOS</a></li>-->
  </ul>

    <nav>
    <div class="nav-wrapper #880e4f pink darken-4">
      <a href="./dashboard.php" class="brand-logo"><img src="../../assets/img/logo_raizen.png"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
		<li><b><a href="./dashboard.php"><i class="material-icons left">home</i>HOME</a></b></li>
        <li><b><a href="./cadastraVideo.php"><i class="material-icons left">ondemand_video</i>CADASTRAR VIDEO</a></b></li>
        <!-- <b><li><a class="dropdown-trigger" data-target="videoconferencias"><i class="material-icons left" left>ondemand_video</i>VIDEOCONFERÊNCIAS<i class="material-icons right">arrow_drop_down</i></a></li></b> -->
        <li><b><a href="javascript:window.open('painel.php', 'principal', 'status=no, toolbar=no, menubar=no, location=yes, fullscreen=1, scrolling=auto');"><i class="material-icons left">videocam</i>PAINEL</a></b></li>

        <?php 
          
         //Veriicando se usuário é ADM
          if ($dados['adm'] == 0) {
          } else {
            echo '<b><li><a class="dropdown-trigger" data-target="analistas"><i class="material-icons left" left>people</i>ANALISTAS<i class="material-icons right">arrow_drop_down</i></a></li></b>';
          }
        ?>
        <li><b><a href="editaPerfil.php?id=<?php echo $idUsuario; ?>"><i class="material-icons left">account_box</i>PERFIL</a></b></li>
        <li><b><a href="logout.php"><i class="material-icons left">exit_to_app</i>SAIR</a></b></li>
      </ul>
    </div>
  </nav>

  <!--Menu Responsivo-->
  <ul class="sidenav #880e4f pink darken-4" id="mobile-demo">
        <li><a href="./cadastraVideo.php"><i class="material-icons left">ondemand_video</i>CADASTRAR VIDEO</a></li>
        <?php 
          
         //Veriicando se usuário é ADM
          if ($dados['adm'] == 0) {
          } else {
            echo '<li><a href="./cadastraAnalista.php"><i class="material-icons left">people</i>CADASTRAR ANALISTA</a></li>';
            echo '<li><a href="./listaAnalista.php"><i class="material-icons left">filter_list</i>LISTAR ANALISTAS</a></li>';
          }
        ?>
        <li><a href="javascript:window.open('painel.php', 'principal', 'status=no, toolbar=no, menubar=no, location=yes, fullscreen=1, scrolling=auto');"><i class="material-icons left">videocam</i>PAINEL</a></li>
        <li><a href="logout.php"><i class="material-icons left">exit_to_app</i>SAIR</a></li>
  </ul>
 
