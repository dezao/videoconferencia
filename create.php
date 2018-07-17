<?php

    //Conexão com o Banco de Dados
    require_once 'dbconnect.php';

    //Sessão
    session_start();

    //Verificação 
    if(!isset($_SESSION['logado'])) {
        header('Location: index.php');
    }

    if(isset($_POST['btnCadastrar'])) {

        $ticket = mysqli_escape_string($connect, $_POST['ticket']);
        $inicio = mysqli_escape_string($connect, $_POST['inicio']);
        $fim = mysqli_escape_string($connect, $_POST['fim']);
        $participantes = mysqli_escape_string($connect, $_POST['participantes']);
        $unidades = mysqli_escape_string($connect, $_POST['unidades']);
        $salasFisicas = mysqli_escape_string($connect, $_POST['salasFisicas']);
        $pin = mysqli_escape_string($connect, $_POST['pin']);

        $sql = "INSERT INTO videoconferencias (ticket, horaInicio,	horaFim, nomeParticipantes, unidadesParticipantes, salasFisicas, pin) VALUES ('$ticket', '$inicio', '$fim', '$participantes', '$unidades', '$salasFisicas', '$pin')";

        if(mysqli_query($connect, $sql)) {
            //$_SESSION['mensagem'] ='<div align="center" class="card-panel green lighten-4 green-text text-darken-4">Videoconferência cadastrada com Sucesso!!</div>';
            $_SESSION['mensagem'] = 'Videoconferência cadastrada com Suceso!';
            header('Location: dashboard.php');
        } else {
            $_SESSION['mensagem'] = '<div align="center" class="card-panel red lighten-4 red-text text-darken-4">Erro ao cadastar a Videoconferência, tente novamente!</div><br>';
            header('Location: dashboard.php');
        }
    }

    include_once './view/rodape.php';