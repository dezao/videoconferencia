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
        $dia = mysqli_escape_string($connect, $_POST['dia']);
        $inicio = mysqli_escape_string($connect, $_POST['inicio']);
        $fim = mysqli_escape_string($connect, $_POST['fim']);
        $participantes = mysqli_escape_string($connect, $_POST['participantes']);
        $unidades = mysqli_escape_string($connect, $_POST['unidades']);
        $salasFisicas = mysqli_escape_string($connect, $_POST['salasFisicas']);
        $pin = mysqli_escape_string($connect, $_POST['pin']);

        $sql = "INSERT INTO videoconferencias (ticket, dia, horaInicio,	horaFim, nomeParticipantes, unidadesParticipantes, salasFisicas, pin) VALUES ('$ticket', '$dia', '$inicio', '$fim', '$participantes', '$unidades', '$salasFisicas', '$pin')";
        $sql2 = "INSERT INTO videoconferenciasOld (ticket, dia, horaInicio,	horaFim, nomeParticipantes, unidadesParticipantes, salasFisicas, pin) VALUES ('$ticket', '$dia', '$inicio', '$fim', '$participantes', '$unidades', '$salasFisicas', '$pin')";

        mysqli_query($connect, $sql2);

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Videoconferência cadastrada com Suceso!';
            header('Location: dashboard.php');
        } else {
            $_SESSION['mensagem'] = 'Erro ao cadastar a Videoconferência, tente novamente!';
            header('Location: dashboard.php');
        }

    }

    include_once './view/rodape.php';