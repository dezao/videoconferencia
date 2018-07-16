<?php

    //Conexão com o Banco de Dados
    require_once 'dbconnect.php';

    //Sessão
    session_start();

    if(isset($_POST['btnCadastrar'])) {

        $ticket = mysqli_escape_string($connect, $_POST['ticket']);
        $inicio = mysqli_escape_string($connect, $_POST['inicio']);
        $fim = mysqli_escape_string($connect, $_POST['fim']);
        $participantes = mysqli_escape_string($connect, $_POST['participantes']);
        $unidades = mysqli_escape_string($connect, $_POST['unidades']);
        $salasFisicas = mysqli_escape_string($connect, $_POST['salasFisicas']);
        $pin = mysqli_escape_string($connect, $_POST['pin']);

        $sql = "INSERT INTO videoconferencias (ticket, dataEHoraInicio,	dataEHoraFim, nomeParticipantes, unidadesParticipantes, salasFisicas, pin) VALUES ('$ticket', '$inicio', '$fim', '$participantes', '$unidades', '$salasFisicas', '$pin')";

        if(mysqli_query($connect, $sql)) {
            header('Location: dashboard.php?sucesso');
        } else {
            header('Location: dashboard.php?erro');
        }
    }