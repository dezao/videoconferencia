<?php

    require 'dbconnect.php';
    
    //Função para salvar mensagens de LOG 
    function Logger($msg){
 
        $data = date("d-m-y");
        $hora = date("H:i:s");
        $ip = $_SERVER['REMOTE_ADDR'];

        chdir("../../.logs");
         
        //Nome do arquivo:
        $arquivo = "log_$data.txt";
         
        //Texto a ser impresso no log:
        $texto = "[$hora] - [$ip] - $msg \n";
         
        $manipular = fopen("$arquivo", "a+b");
        fwrite($manipular, $texto);
        fclose($manipular);
         
    }
    
//    function verificaTicket () {
//        
//        $ticket = mysqli_escape_string($connect, $_POST['ticket']);
//        //Dados Vídeo
//        $sqlVideosCreate = "SELECT * FROM videoconferencias WHERE ticket = '$ticket'";
//        $resultadoVideosCreate = mysqli_query($connect, $sqlVideosCreate);
//        $dadosVideos = mysqli_fetch_array($resultadoVideosCreate);
//        $ticketVideos = $dadosVideos['ticket'];
//        
//        if($ticket == $ticketVideos) {
//            //$_SESSION['mensagem'] = 'Ticket já cadastrado, verique!';            
//            echo "alert('Ticket já cadastrado, verique!')";
//        }
//    }