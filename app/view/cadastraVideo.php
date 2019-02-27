<?php

//Cabeçalho
include_once '../../app/inc/topo.php';

?>

<h3 class="light center-align">CADASTRO DE VIDEOCONFERÊNCIA</h3>
<hr>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <form action="createVideo.php" method="POST" id="insert_form">

                    <div class="input-field col s12">
                        <input type="number" name="ticket" id="ticket" onblur="valTicket()" required>
                        <label for="ticket">Ticket</label>
                    </div>
                    
                    <div class="input-field col s12">
                        <select name="vip" id="vip" required>
                            <option value="" disabled selected>--</option>
                            <option value="SIM">SIM</option>
                            <option value="NÃO">NÃO</option>
                        </select>
                        <label for="vip">VIP?</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="date" name="dia" id="dia" required>
                        <label for="dia">Dia</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="time" name="inicio" id="inicio" required>
                        <label for="inicio">Início</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="time" name="fim" id="fim" required>
                        <label for="fim">Fim</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="salasFisicas" id="salasFisicas" required>
                        <label for="salasFisicas">Salas Físicas</label>
                    </div>     

                    <div class="input-field col s12">    
                        <input type="number" name="pin" id="pin" required>
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
    include_once '../../app/inc/rodape.php';

?>