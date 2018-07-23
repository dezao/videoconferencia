<?php

    //Conexão com o Banco de Dados
    require_once 'dbconnect.php';

    //Sessão
    session_start();

    //Verificação 
    if(!isset($_SESSION['logado'])) {
        header('Location: index.php');
    }

    if(isset($_POST['btnAtualizarVideo'])) {

        $vip = mysqli_escape_string($connect, $_POST['vip']);
        $ticket = mysqli_escape_string($connect, $_POST['ticket']);
        $dia = mysqli_escape_string($connect, $_POST['dia']);
        $inicio = mysqli_escape_string($connect, $_POST['inicio']);
        $fim = mysqli_escape_string($connect, $_POST['fim']);
        $participantes = mysqli_escape_string($connect, $_POST['participantes']);
        $unidades = mysqli_escape_string($connect, $_POST['unidades']);
        $salasFisicas = mysqli_escape_string($connect, $_POST['salasFisicas']);
        $pin = mysqli_escape_string($connect, $_POST['pin']);

        $id = mysqli_escape_string($connect, $_POST['id']);

        $sql = "UPDATE videoconferencias SET vip='$vip', ticket='$ticket', dia='$dia', horaInicio='$inicio', horaFim='$fim', nomeParticipantes='$participantes', unidadesParticipantes='$unidades', salasFisicas='$salasFisicas', pin='$pin' WHERE id='$id' ";

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Videoconferência atualizada com Suceso!';
            header('Location: dashboard.php');
        } else {
            $_SESSION['mensagem'] = 'Erro ao atualizar a Videoconferência, tente novamente!';
            header('Location: dashboard.php');
        }

        mysqli_query($connect, $sql2);
    }

    include_once './view/rodape.php';