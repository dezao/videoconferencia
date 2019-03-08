<?php
    include_once  '../../app/inc/dbconnect.php';
    
    $ticket = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

    //Pesquisar no banco de dados nome do usuario referente a palavra digitada
    $queryTicket = "SELECT * FROM videoconferencias WHERE ticket LIKE '%$ticket%' LIMIT 20";
    $resultadoTicket = mysqli_query($connect, $queryTicket);

    if(($resultadoTicket) AND ($resultadoTicket->num_rows != 0 )){
        
        while($rowTicket = mysqli_fetch_assoc($resultadoTicket)){
             echo '<thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>TICKET</th>
                            <th>DATA</th>
                            <th>INICIO</th>
                            <th>FIM</th>
                            <th>UNIDADES</th>
                            <th>PIN</th>
                            <th>SALAS FÍSICAS</th>
                            <th>OWNER</th>
                            <th colspan="2">AÇÕES</th>
                        </tr>
                    </thead>';
             
            $dia = $rowTicket['dia'];
            $dia = date('d/m/Y', strtotime($dia));
            
            echo "<td>".$rowTicket['ticket']."</td>";
            echo "<td>".$rowTicket['dia']."</td>";
            echo "<td>".$rowTicket['horaInicio']."</td>";
            echo "<td>".$rowTicket['horaFim']."</td>";
            echo "<td>".$rowTicket['unidadesParticipantes']."</td>";
            echo "<td>".$rowTicket['pin']."</td>";
            echo "<td>".$rowTicket['salasFisicas']."</td>";
            echo "<td>".$rowTicket['analistaResponsavel']."</td>";
            
            echo '<td><a href="editaVideo.php?id=<?php echo $dadosVideo[\'id\']; ?>" class="btn-floating orange waves-effect waves-light"><i class="material-icons">edit</i></a>
                  <a href="#modal<?php echo $dadosVideo[\'id\']; ?>" class="btn-floating red modal-trigger waves-effect waves-light"><i class="material-icons">delete</i></a></td>';
        }
    } else {
        echo "Nenhum ticket encontrado ...";
    }
    
//    $ticket = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
//    
//    //Pesquisa no banco de dados o ticket digitado
//    $queryTicket = "SELECT * FROM videoconferencias WHERE ticket LIKE '%$ticket%' LIMIT 5";
//    $resultadoTicket = mysqli_query($conn, $queryTicket);
//    
//    if (($resultadoTicket) && ($resultadoTicket->num_rows != 0)) {
//        while($rowTicket = mysqli_fetch_assoc($resultadoTicket)) {
//            echo "<li>".$rowTicket['ticket']."</li>";
//        }
//    } else {
//        echo "Nenhum ticket encontrado";
//    }
