<?php

    //Cabeçalho
    include_once './view/topo.php';

    include_once './view/mensagem.php';

    //Dados
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);

/*     if (isset($_SESSION['mensagem'])) { 
            echo $_SESSION['mensagem'];
    } */

?>

        <div class="row">
            <div class="col s12 m12">
                <h3 class="light">Videoconferências</h3>
                <a href="cadastrar.php" class="btn">Cadastrar nova Videoconferência</a> 
                <table class="striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ticket</th>
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

                            $sqlVideo = "SELECT * FROM videoconferencias"; 
                            $resultadoVideo = mysqli_query($connect, $sqlVideo);
                            mysqli_close($connect);

                            while($dadosVideo = mysqli_fetch_array($resultadoVideo)) {

                        ?>
                        <tr>
                            <td><?php echo $dadosVideo['id']; ?></td>
                            <td><?php echo $dadosVideo['ticket']; ?></td>
                            <td><?php echo $dadosVideo['horaInicio']; ?></td>
                            <td><?php echo $dadosVideo['horaFim']; ?></td>
                            <td><?php echo $dadosVideo['nomeParticipantes']; ?></td>
                            <td><?php echo $dadosVideo['unidadesParticipantes']; ?></td>
                            <td><?php echo $dadosVideo['salasFisicas']; ?></td>
                            <td><b><?php echo $dadosVideo['pin']; ?></b></td>
                            <td><a href="" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                            <td><a href="" class="btn-floating red"><i class="material-icons">delete</i></a></td>
                        </tr>
                        <?php }  ?>
                    </tbody>
                </table>
                <br>
                 
            </div>
        </div>


    <center>
        <h1>Olá, <?php echo $dados['nome']; ?>!</h1>
        <a href="logout.php">Sair</a>
    </center>


<?php

    //Rodapé
    include_once './view/rodape.php';

?>