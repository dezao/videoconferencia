<?php

require_once '../inc/dbconnect.php';

//Receber o ticket a ser pesquisado no banco de dados
$ticket = filter_input(INPUT_POST, 'ticket', FILTER_SANITIZE_STRING);

//consultar no banco de dados
$resultTicket = "SELECT ticket FROM videoconferencias WHERE ticket = '$ticket'";
//$result_usuario = "SELECT id FROM usuarios WHERE id = 1 LIMIT 1";
$resultadoTicket = mysqli_query($connect, $resultTicket);

//Verificar se encontrou resultado na tabela "usuarios"
if (($resultadoTicket) AND ( $resultadoTicket->num_rows != 0)) {
    echo true;
} else {
    echo false;
}
