<?php

    //Cabeçalho
    include_once './view/topo.php';

    include_once './view/mensagem.php';

?>

        <div class="row">
            <div class="col s12 m12">
                <h3 class="light center-align">DASHBOARD VIDEOCONFERÊNCIAS</h3>
                <hr> 

                     <section class="col s12 m6 l12 center-align">

                        <!--Card1-->
                        <article class="col s12 l6 xl4">
                            <div class="card blue">
                                <div class="card-image">
                                    <i class="material-icons large center-align white-text">videocam</i>
                                </div>
                                <div class="card-content">
                                    <span class="card-title white-text">HOJE</span>
                                    <p class="white-text">Hoje teremos <b>xx videoconferências</b> para conectar!</p>
                                </div>
                            </div>        
                        </article>
                        <!--Card2-->
                        <article class="col s12 l6 xl4">
                            <div class="card green">
                                <div class="card-image">
                                <i class="material-icons large center-align white-text">ondemand_video</i> 
                                </div>
                                <div class="card-content">
                                    <span class="card-title white-text">AMANHÃ</span>
                                    <p class="white-text">Amanhã teremos <b>xx videoconferências</b> para conectar!</p>
                                </div>
                            </div>        
                        </article>
                        <!--Card3-->
                        <article class="col s12 l6 xl4">
                            <div class="card red">
                                <div class="card-image">
                                    <i class="material-icons large center-align white-text">info_outline</i> 
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title white-text">VIPS</span>
                                        <p class="white-text">Hoje teremos <b>xx videoconferências</b> VIPS para conectar!</p>
                                    </div>
                            </div>        
                        </article>  

                        </section>
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

                            $sqlVideo = "SELECT * FROM videoconferencias ORDER BY dia, horaInicio"; 
                            $resultadoVideo = mysqli_query($connect, $sqlVideo);
                            mysqli_close($connect);

                            if (mysqli_num_rows($resultadoVideo) > 0) {

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
                                
                                <td><a href="editaVideo.php?id=<?php echo $dadosVideo['id']; ?>" class="btn-floating orange waves-effect waves-light"><i class="material-icons">edit</i></a></td>
                                <td><a href="#modal<?php echo $dadosVideo['id']; ?>" class="btn-floating red modal-trigger waves-effect waves-light"><i class="material-icons">delete</i></a></td>

                                <!-- Modal Structure -->
                                <div id="modal<?php echo $dadosVideo['id']; ?>" class="modal">
                                    <div class="modal-content">
                                    <h4>Atenção!</h4>
                                    <p>Tem certeza que deseja excluir esse registro?</p>
                                    </div>
                                    <div class="modal-footer">

                                    <form action="delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dadosVideo['id']; ?>">
                                        <button type="submit" name="btnDeletar" class="btn red";>SIM</button>
                                    </form>
                                    <a href="#!" class="modal-close waves-effect waves-green green white-text btn-flat">NÃO</a>
                                    </div>
                                </div>
                            </tr>
                        <?php 
                        }  
                            } else { ?>
                                
                                <tr>
                                    <td colspan="8"><div class="card-panel red center-align s12">NENHUM REGISTRO ENCONTRADO</div></td>
                                </tr>
                        <?php    }  ?>
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