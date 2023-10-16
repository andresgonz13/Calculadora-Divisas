<!DOCTYPE html>
<html>
<head>
    <title>Conversor de Moneda</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta charset="UTF-8">
    <style>
        .resultado-box {
            background-color: #ECF0F1;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Conversor de Moneda</h2>
        <form id="conversion-form" method="post">
            <input type="number" name="monto" placeholder="Monto">
            <input type="number" name "tasa" placeholder="Tasa de Cambio (Precio del dólar)">
            <select name="conversion">
                <option value="bolivares_a_dolares">Bolívares a Dólares</option>
                <option value="dolares_a_bolivares">Dólares a Bolívares</option>
            </select>
            <button type="submit">Convertir</button>
        </form>
        <div id="resultado" class="resultado-box">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                class ConversorMoneda {
                    public function convertirBolivaresADolares($monto, $tasa) {
                        return $monto / $tasa;
                    }

                    public function convertirDolaresABolivares($monto, $tasa) {
                        return $monto * $tasa;
                    }
                }

                $monto = isset($_POST['monto']) ? $_POST['monto'] : 0;
                $tasa = isset($_POST['tasa']) ? $_POST['tasa'] : 1; // Valor predeterminado
                $conversion = isset($_POST['conversion']) ? $_POST['conversion'] : '';

                $conversor = new ConversorMoneda();
                $resultado = 0;
                $tipoCambio = "";

                if ($conversion == 'bolivares_a_dolares') {
                    $resultado = $conversor->convertirBolivaresADolares($monto, $tasa);
                    $tipoCambio = "$"; // Dólares
                } elseif ($conversion == 'dolares_a_bolivares') {
                    $resultado = $conversor->convertirDolaresABolivares($monto, $tasa);
                    $tipoCambio = "Bs."; // Bolívares
                }

                echo "Resultado: <div>$ " . number_format($resultado, 2) . " " . $tipoCambio . "</div>";
            }
            ?>
        </div>
        <sub>Por: Andrés González</sub>
        <br>
        <sub>Informática T2-INF-1</sub>
    </div>
</body>
</html>
