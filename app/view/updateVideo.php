<?php

    //Topo
    require_once '../../app/inc/topo.php';

    if(isset($_POST['btnAtualizarVideo'])) {

        $vip = mysqli_escape_string($connect, $_POST['vip']);
        $ticket = mysqli_escape_string($connect, $_POST['ticket']);
        $dia = mysqli_escape_string($connect, $_POST['dia']);
        $inicio = mysqli_escape_string($connect, $_POST['inicio']);
        $fim = mysqli_escape_string($connect, $_POST['fim']);
//        $unidades = mysqli_escape_string($connect, $_POST['unidades']);
        $salasFisicas = mysqli_escape_string($connect, $_POST['salasFisicas']);
        $pin = mysqli_escape_string($connect, $_POST['pin']);
        //$analistaResponsavel = mysqli_escape_string($connect, $_POST['analistaResponsavel']);

        $id = mysqli_escape_string($connect, $_POST['id']);

        //$sql = "UPDATE videoconferencias SET vip='$vip', ticket='$ticket', dia='$dia', horaInicio='$inicio', horaFim='$fim', unidadesParticipantes='$unidades', salasFisicas='$salasFisicas', pin='$pin', analistaResponsavel='$analistaResponsavel'  WHERE id='$id' ";
        //$sql = "UPDATE videoconferencias SET vip='$vip', ticket='$ticket', dia='$dia', horaInicio='$inicio', horaFim='$fim', salasFisicas='$salasFisicas', pin='$pin', analistaResponsavel='$analistaResponsavel'  WHERE id='$id' ";
        $sql = "UPDATE videoconferencias SET vip='$vip', ticket='$ticket', dia='$dia', horaInicio='$inicio', horaFim='$fim', salasFisicas='$salasFisicas', pin='$pin'  WHERE id='$id' ";
        
        
        if ( $inicio >= $fim ) {
           $_SESSION['mensagem'] = 'Horario de início maior que o de fim, verique!';
            header('Location: editaVideo.php?id='. $id);              
        } else if (mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Videoconferência atualizada com Suceso!';
            header('Location: dashboard.php');
            Logger("Videoconferencia ticket " . $ticket . "  editadada  por [" . $usuarioLogado . "]");
        } else {
            $_SESSION['mensagem'] = 'Erro ao atualizar a Videoconferência, tente novamente!';
            header('Location: dashboard.php');
        }

        //mysqli_query($connect, $sql2);
    }

    include_once '../../app/inc/rodape.php';