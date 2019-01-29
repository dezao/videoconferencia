<?php

    //Topo e requisições
    require_once '../../app/inc/topo.php';

    // Matriz com todos os analistas
    //$participantes = array("André", "Fabio", "Gabriel", "Mariane", "Murilo");
    // Definindo o número de participantes
    //$numParticipantes = sizeof($participantes);
    // Sorteando
    //$sorteado = $participantes[rand(0,$numParticipantes - 1)];
        
    if(isset($_POST['btnCadastrar'])) {

        $vip = mysqli_escape_string($connect, $_POST['vip']);
        $ticket = mysqli_escape_string($connect, $_POST['ticket']);
        $dia = mysqli_escape_string($connect, $_POST['dia']);
        $inicio = mysqli_escape_string($connect, $_POST['inicio']);
        $fim = mysqli_escape_string($connect, $_POST['fim']);
//        $unidades = mysqli_escape_string($connect, $_POST['unidadesParticipantes']);
        $salasFisicas = mysqli_escape_string($connect, $_POST['salasFisicas']);
        $pin = mysqli_escape_string($connect, $_POST['pin']);
        //$analistaResponsavel = $sorteado;
        //$analistaResponsavel = mysqli_escape_string($connect, $_POST['analistaResponsavel']);
  
        //$sql = "INSERT INTO videoconferencias (vip, ticket, dia, horaInicio, horaFim, unidadesParticipantes, salasFisicas, pin, analistaResponsavel) VALUES ('$vip', '$ticket', '$dia', '$inicio', '$fim', '$unidades', '$salasFisicas', '$pin', '$analistaResponsavel')";
        //$sql = "INSERT INTO videoconferencias (vip, ticket, dia, horaInicio, horaFim, salasFisicas, pin, analistaResponsavel) VALUES ('$vip', '$ticket', '$dia', '$inicio', '$fim', '$salasFisicas', '$pin', '$analistaResponsavel')";
        $sql = "INSERT INTO videoconferencias (vip, ticket, dia, horaInicio, horaFim, salasFisicas, pin) VALUES ('$vip', '$ticket', '$dia', '$inicio', '$fim', '$salasFisicas', '$pin')";
        
        //Dados Vídeo
        $sqlVideosCreate = "SELECT * FROM videoconferencias WHERE ticket = '$ticket'";
        $resultadoVideosCreate = mysqli_query($connect, $sqlVideosCreate);
        $dadosVideos = mysqli_fetch_array($resultadoVideosCreate);
        $ticketVideos = $dadosVideos['ticket'];

        if ( $inicio >= $fim ) {
            $_SESSION['mensagem'] = 'Horario de início maior que o de fim, verique!';            
            echo "<script>
                    window.history.go(-1)
                   </script>";
        } else if($ticket == $ticketVideos) {
            $_SESSION['mensagem'] = 'Ticket já cadastrado, verique!';            
            echo "<script>
                    window.history.go(-1)
                   </script>";
        }else if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Videoconferência cadastrada com Suceso!';
            Logger("Videoconferencia ticket " . $ticket . " cadastrada  por [" . $usuarioLogado."]");
            header('Location: ../../app/view/dashboard.php');
        } else {
            $_SESSION['mensagem'] = 'Erro ao cadastar a Videoconferência, tente novamente!';
            header('Location: ../../app/view/dashboard.php');
        }
    }
  
    include_once '../../app/inc/rodape.php';