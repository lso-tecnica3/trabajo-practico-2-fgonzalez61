<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
    <?php
        $maximas = [
            'Enero' => 30.4,
            'Febrero' => 29,
            'Marzo' => 26.8,
            'Abril' => 23.4,
            'Mayo' => 19.3,
            'Junio' => 16.6,
            'Julio' => 16,
            'Agosto' => 17.7,
            'Septiembre' => 19.6,
            'Octubre' => 23.1,
            'Noviembre' => 26.1,
            'Diciembre' => 26.5  
        ];

        $minimas = [
            'Enero' => 20.2,
            'Febrero' => 19.5,
            'Marzo' => 18,
            'Abril' => 13.6,
            'Mayo' => 10.5,
            'Junio' => 8.3,
            'Julio' => 7.7,
            'Agosto' => 8.7,
            'Septiembre' => 10.6,
            'Octubre' => 13.5,
            'Noviembre' => 16,
            'Diciembre' => 18.2  
        ];


        $sumador_min = 0;
        $sumador_max = 0;
        $cantidad = count($maximas); 


        $temp_max = -999; 
        $temp_min = 999;  
        $mes_max = "";
        $mes_min = "";

 
        foreach($minimas as $mes => $temp){
            $sumador_min += $temp;
            if($temp < $temp_min){
                $temp_min = $temp;
                $mes_min = $mes;
            }
        }


        foreach($maximas as $mes => $temp){
            $sumador_max += $temp;
            if($temp > $temp_max){
                $temp_max = $temp;
                $mes_max = $mes;
            }
        }


        $promedio_min = $sumador_min / $cantidad;
        $promedio_max = $sumador_max / $cantidad;


        print "<h2>Promedios</h2>";
        print "Temperatura máxima promedio: " . number_format($promedio_max, 1) . "°C<br>";
        print "Temperatura mínima promedio: " . number_format($promedio_min, 1) . "°C<br>";

        print "<h2>Temperaturas Extremas</h2>";
        print "Temperatura más alta: $temp_max °C en $mes_max<br>";
        print "Temperatura más baja: $temp_min °C en $mes_min<br>";
    ?>
</body>
</html>