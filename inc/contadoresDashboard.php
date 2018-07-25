
<?php

function videosDoDia($videosDoDia) {

    $sqlVideo3 = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' ORDER BY dia, horaInicio"; 
    $resultadoVideo3 = mysqli_query($connect, $sqlVideo3);

   if (mysqli_num_rows($resultadoVideo3) > 0) {

        $contVideosDoDia = 0;  

        while($dadosVideo3 = mysqli_fetch_array($resultadoVideo3)) {   
            
            $videosDoDia = $dadosVideo3['dia'];

            $videosDoDia = date('Y/m/d', strtotime($videosDoDia));
            
            if($videosDoDia === $dataDoDia) {
                $contVideosDoDia ++;
            }       
        }      
        return $contVideosDoDia;     
    }
    echo $contVideosDoDia;
}