<?php

//Cabeçalho
include_once './view/topo.php';

//SELECT
if (isset($_GET['id'])) {
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sqlEdita = "SELECT * FROM videoconferencias WHERE id = '$id' ";
    $resultadoEdita = mysqli_query($connect, $sqlEdita);
    $dadosEdita = mysqli_fetch_array($resultadoEdita);
}

?>
<h3 class="light center-align">EDIÇÃO DE VIDEOCONFERÊNCIA</h3>
<hr>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <form action="update.php" method="POST">
                   
                   <input type="hidden" name="id" id="id" value="<?php echo $dadosEdita['id']; ?>">
                    <div class="input-field col s12">
                        <select name="vip" id="vip">
                        <?php 

                            $sim_nao = $dadosEdita['vip']; 
                            echo "<option value='".$sim_nao."'>".$sim_nao."</option>"; 
                        ?> 
                            <option value="SIM">SIM</option>
                            <option value="NÃO">NÃO</option>
                        </select>
                        <label for="vip">VIP?</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="number" name="ticket" id="ticket" value="<?php echo $dadosEdita['ticket']; ?>">
                        <label for="ticket">Ticket</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="date" name="dia" id="dia" value="<?php echo $dadosEdita['dia']; ?>">
                        <label for="dia">Dia</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="time" name="inicio" id="inicio" value="<?php echo $dadosEdita['horaInicio']; ?>">
                        <label for="inicio">Início</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="time" name="fim" id="fim" value="<?php echo $dadosEdita['horaFim']; ?>">
                        <label for="fim">Fim</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="participantes" id="participantes" value="<?php echo $dadosEdita['nomeParticipantes']; ?>">
                        <label for="participantes">Participantes</label>
                    </div>   

                    <div class="input-field col s12">    
                        <input type="text" name="unidades" id="unidades" value="<?php echo $dadosEdita['unidadesParticipantes']; ?>">
                        <label for="unidades">Unidades</label>
                    </div>  

                    <div class="input-field col s12">
                        <input type="text" name="salasFisicas" id="salasFisicas" value="<?php echo $dadosEdita['salasFisicas']; ?>">
                        <label for="salasFisicas">Salas Físicas</label>
                    </div>     

                    <div class="input-field col s12">    
                        <input type="text" name="pin" id="pin" value="<?php echo $dadosEdita['pin']; ?>">
                        <label for="pin">PIN</label>
                    </div>

                    <button type="submit" name="btnCadastrar" class="btn green waves-effect waves-light">Cadastrar</button>
                    <a href="dashboard.php" class="btn red waves-effect waves-light">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

<?php

    //Rodapé
    include_once './view/rodape.php';

?>