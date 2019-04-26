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
                        <label for="Salas Físicas">Salas Físicas</label>
                    </div>
                    
                    <div class="input-field col s12">

                        <div class="input-field col s3">
                            <ul class="collapsible" name="salasFisicas">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>CWB</div>

                                    <div class="collapsible-body">
                                        
                                        <p>
                                        <label>
                                            <input class="with-gap" name="cwb" type="radio" checked>
                                            <span>Sala do Conselho</span>
                                        </label>
                                        </p>
                                        
                                        <p>
                                        <label>
                                            <input class="with-gap" name="cwb" type="radio">
                                            <span>Sala Brasil</span>
                                        </label>
                                        </p>
                                        
                                        <p>
                                        <label>
                                            <input class="with-gap" name="cwb" type="radio">
                                            <span>Sala Rondonópolis</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="cwb" type="radio">
                                            <span>Sala Sâo Paulo</span>
                                        </label>
                                        </p>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="input-field col s3">
                            <ul class="collapsible" name="salasFisicas">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>CAR</div>
                                    <div class="collapsible-body">
                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" checked />
                                            <span>Red</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" />
                                            <span>Yellow</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="input-field col s3">
                            <ul class="collapsible" name="salasFisicas">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>FL</div>
                                    <div class="collapsible-body">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" checked />
                                            <span>Red</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" />
                                            <span>Yellow</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    
                        <div class="input-field col s3">
                            <ul class="collapsible" name="salasFisicas">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>COMGAS</div>
                                    <div class="collapsible-body">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" checked />
                                            <span>Red</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" />
                                            <span>Yellow</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="input-field col s12">
                        <div class="input-field col s3">
                            <ul class="collapsible" name="salasFisicas">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>FIGEUIRA</div>
                                    <div class="collapsible-body">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" checked />
                                            <span>Red</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" />
                                            <span>Yellow</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="input-field col s3">
                            <ul class="collapsible" name="salasFisicas">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>ARA</div>
                                    <div class="collapsible-body">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" checked />
                                            <span>Red</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" />
                                            <span>Yellow</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="input-field col s3">
                            <ul class="collapsible" name="salasFisicas">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>TRO</div>
                                    <div class="collapsible-body">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" checked />
                                            <span>Red</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" />
                                            <span>Yellow</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="input-field col s3">
                            <ul class="collapsible" name="salasFisicas">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>SAN</div>
                                    <div class="collapsible-body">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" checked />
                                            <span>Red</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio" />
                                            <span>Yellow</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="CAR" type="radio"  />
                                            <span>Green</span>
                                        </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="salasFisicas" id="salasFisicas" required>
                        <label for="salasFisicas">Salas Físicas</label>
                    </div>

                    <div class="input-field col s12">    
                        <input type="number" name="pin" id="pin" required>
                        <label for="pin">PIN</label>
                    </div>

                    <div class="input-field col s12">
                        <button type="submit" name="btnCadastrar" class="btn green waves-effect waves-light">Cadastrar</button>
                        <a href="dashboard.php" class="btn red waves-effect waves-light">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php
    //Rodapé
    include_once '../../app/inc/rodape.php';

?>