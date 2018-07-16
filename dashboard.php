<?php

//Cabeçalho
include_once './view/topo.php';

?>
        <div class="row">
            <div class="col s12 m12">
                <h3 class="light">Videoconferências</h3>
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
                        <tr>
                            <td>1</td>
                            <td>2078737</td>
                            <td>28/09/2018 13:00</td>
                            <td>28/09/2018 14:00</td>
                            <td>Julio Fontana</td>
                            <td>Curitiba e JK</td>
                            <td>Conselho e Sala 2</td>
                            <td>77889900</td>
                            <td><a href="" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                            <td><a href="" class="btn-floating red"><i class="material-icons">delete</i></a></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <a href="cadastrar.php" class="btn">Adicionar Vídeo</a>  
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