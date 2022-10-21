<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Zodiaco</title>
    </head>
    <body>

        <?php
        const CAPRICORNIO = "Capricornio";
        const ACUARIO = "Acuario";
        const PISCIS = "Piscis";
        const ARIES = "Aries";
        const TAURO = "Tauro";
        const GEMINIS = "Géminis";
        const CANCER = "Cáncer";
        const LEO = "Leo";
        const VIRGO = "Virgo";
        const LIBRA = "Libra";
        const ESCORPIO = "Escorpio";
        const SAGITARIO = "Sagitario";

        //Las claves del día de corte van incluídas. Por ejemplo: los nacidos hasta el 20/01 son capricornio
        $zodiaco = array(
            //enero  
            1 => array(20 => CAPRICORNIO,
                "else" => ACUARIO),
            //febrero
            2 => array(19 => ACUARIO,
                "else" => PISCIS),
            //marzo
            3 => array(20 => PISCIS,
                "else" => ARIES),
            //abril
            4 => array(19 => ARIES,
                "else" => TAURO),
            //mayo
            5 => array(20 => TAURO,
                "else" => GEMINIS),
            //junio
            6 => array(20 => GEMINIS,
                "else" => CANCER),
            //julio
            7 => array(22 => CANCER,
                "else" => LEO),
            //agosto
            8 => array(22 => LEO,
                "else" => VIRGO),
            //septiembre
            9 => array(22 => VIRGO,
                "else" => LIBRA),
            //octubre
            10 => array(22 => LIBRA,
                "else" => ESCORPIO),
            //completar aquí...
            11 => array(22 => ESCORPIO,
                "else" => SAGITARIO),
            12 => array(21 => SAGITARIO,
                "else" => CAPRICORNIO)
        );

        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        if (isset($_POST["dia"]) && isset($_POST["mes"])) {
            $dia = $_POST["dia"];
            $mes = $_POST["mes"];
            $array_mes = $zodiaco[$mes];

            $clave_numerica = array_key_first($array_mes);

            if ($dia <= $clave_numerica) {
                $signo = $array_mes[$clave_numerica];
            } else {
                $signo = $array_mes["else"];
            }

//            foreach ($array_mes as $key => $valor) {
//                if (is_numeric($key)) {
//                    if ($dia <= $key) {
//                        $signo = $valor;
//                    } else {
//                        $signo = $array_mes["else"];
//                    }
//                }
//            }
        }
        ?>
        <form  method="post" >

            Selecciona tu día y mes de nacimiento:

            <p>
                <label for="dia">Día:</label>
                <select name="dia" id="dia" required>
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        $selected="";
                        if($dia==$i){
                           $selected="selected"; 
                        }                        
                        echo "<option value=\"$i\" $selected>$i</option>";
                    }
                    ?>


                </select>


                <label for="mes">Mes</label>
                <select name="mes" id="mes" required> 

                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        $j = $i - 1;
                         $selected="";
                        if($mes==$i){
                           $selected="selected"; 
                        }  
                        
                        echo "<option value=\"$i\" $selected>$meses[$j]</option>";
                    }
                    ?>


                </select>



            </p>


            <p>
                <input type="submit" value="Enviar" />
            </p>



        </form>


        <?php
        if (isset($signo)) {
            echo "Tu signo es $signo";
        }
        ?>

    </body>
</html>
