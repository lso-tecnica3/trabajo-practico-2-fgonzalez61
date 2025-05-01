<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php
        include 'datos.php';

        $Velocidad_inicial = count($velocidades);

        foreach ($velocidades as $patente => $velocidad) {
            if ($velocidad < 10 || $velocidad > 200) {
                unset($velocidades[$patente]);
            }
        }

        $Velocidad_final = count($velocidades);
        $cantidad_eliminada = $Velocidad_inicial - $Velocidad_final;


        print "<h2>Tabla de Velocidades</h2>";
        print "<table border='1' cellpadding='5'>";
        print "<tr><th>Patente</th><th>Velocidad (Km/h)</th></tr>";

        $infraccion = [];

        foreach ($velocidades as $patente => $velocidad) {
            if ($velocidad > 120) {
                $color = "red";
            } else {
                $color = "black";
            }
            print "<tr style='color: $color;'><td>$patente</td><td>$velocidad</td></tr>";
            if ($velocidad > 120) {
                $infraccion[$patente] = $velocidad;
            }
        }
        print "</table>";

        // Resumen
        print "<h2>Resumen</h2>";
        print "<table border='1' cellpadding='5'>";
        print "<tr><td>Velocidades válidas</td><td>" . count($velocidades) . "</td></tr>";
        print "<tr><td>Vehículos en infracción</td><td>" . count($infraccion) . "</td></tr>";
        print "<tr><td>Velocidades fuera de rango</td><td>$cantidad_eliminada</td></tr>";
        print "</table>";

        // Actas de infracción
        print "<h2>Actas de Infracción</h2>";
        $actaNum = 1;

        foreach ($infraccion as $patente => $velocidad) {
            $multa = ($velocidad > 160) ? 100000 : 50000;
            $descuento = $multa * 0.30;
            print "
            <table border='1' cellpadding='5' style='margin-bottom: 20px;'>
                <tr><th colspan='2' style='background:black; color:white;'>ACTA DE INFRACCIÓN Nº $actaNum</th></tr>
                <tr><td>Descripción de la falta:</td><td>Exceso de velocidad</td></tr>
                <tr><td>Patente:</td><td>$patente</td></tr>
                <tr><td>Velocidad máxima permitida en el lugar:</td><td>120 Km/h</td></tr>
                <tr><td>Velocidad detectada:</td><td>$velocidad Km/h</td></tr>
                <tr><td colspan='2'>
                    <b>PAGO VOLUNTARIO DE LA MULTA:</b> Notificada la falta podrá, dentro de los 10 días siguientes abonar voluntariamente la multa correspondiente a la transgresión verificada. En este caso, abonará únicamente el mínimo de aquella, disminuida en un 30% del monto.
                </td></tr>
                <tr><td>Total a Pagar:</td><td>\$$multa</td></tr>
                <tr><td>Descuento (Pago voluntario 30% del monto):</td><td>\$$descuento</td></tr>
            </table>";
            $actaNum++;
        }
    ?>
</body>
</html>
