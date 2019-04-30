<?php

    //Topo e requisições
    include_once '../../app/inc/topo.php';

    // Matriz com todos os analistas
    //$participantes = array("André", "Fabio", "Gabriel", "Mariane", "Murilo");
    // Definindo o número de participantes
    //$numParticipantes = sizeof($participantes);
    // Sorteando
    //$sorteado = $participantes[rand(0,$numParticipantes - 1)];
        
    if(isset($_POST['btnCadastrar'])) {

        $vip = mysqli_escape_string($connect, $_POST['cwb']);


    }