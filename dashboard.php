<?php

    //Cabeçalho
    include_once './view/topo.php';

    include_once './view/mensagem.php';

?>

        <div class="row">
            <div class="col s12 m12">
                <h3 class="light center-align">DASHBOARD VIDEOCONFERÊNCIAS</h3>
                <hr> 
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>Ticket</th>
                            <th>Data</th>
                            <th>Hora Inicial</th>
                            <th>Hora Final</th>
                            <th>Participantes</th>
                            <th>Unidades</th>
                            <th>Salas Físicas</th>
                            <th>PIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once 'dbconnect.php';

                            $sqlVideo = "SELECT * FROM videoconferencias ORDER BY dia, horaInicio"; 
                            $resultadoVideo = mysqli_query($connect, $sqlVideo);
                            mysqli_close($connect);

                            while($dadosVideo = mysqli_fetch_array($resultadoVideo)) {

                        ?>
                        <tr>
                            <td hidden ><?php echo $dadosVideo['id']; ?></td>
                            <td><?php echo $dadosVideo['ticket']; ?></td>
                                <?php $dia = $dadosVideo['dia']; 
                                    $dia = date('d/m/Y', strtotime($dia));
                                ?>
                            <td><?php echo $dia ?></td>
                            <td><?php echo $dadosVideo['horaInicio']; ?></td>
                            <td><?php echo $dadosVideo['horaFim']; ?></td>
                            <td><?php echo $dadosVideo['nomeParticipantes']; ?></td>
                            <td><?php echo $dadosVideo['unidadesParticipantes']; ?></td>
                            <td><?php echo $dadosVideo['salasFisicas']; ?></td>
                            <td><b><?php echo $dadosVideo['pin']; ?></b></td>
                            <td><a href="editaVideo.php?id=<?php echo $dadosVideo['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                            <td><a href="" class="btn-floating red"><i class="material-icons">delete</i></a></td>
                        </tr>
                        <?php }  ?>
                    </tbody>
                </table>
                <br>
                 
            </div>
        </div>


    <center>
        
    </center>


<?php

    //Rodapé
    include_once './view/rodape.php';

?>