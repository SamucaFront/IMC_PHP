<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora - IMC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Calculadora - IMC</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="peso">Digite seu peso</label>
            <input type="number" name="peso" id="peso" step="0.1" placeholder="Digite seu peso (KG)" required><br><br>

            <label for="alt">Digite sua altura</label>
            <input type="number" name="alt" id="alt" step="0.01" placeholder="Digite sua altura (m)" required><br><br>

            <input type="submit" value="Checar">
        </form>

        <!-- Resultado vai aparecer AQUI dentro do main -->
        <?php 
        if (isset($_GET['peso']) && isset($_GET['alt'])) {
            $peso = $_GET['peso'];
            $altura = $_GET['alt'];

            if ($altura > 0) {
                $imc = $peso / ($altura * $altura);
                $imcFormatado = number_format($imc, 2, ',', '.');

                echo "<div class='resultado'>";
                echo "<h2>O seu IMC é $imcFormatado</h2>";

                if ($imc < 18.5) {
                    echo "<p>Abaixo do peso</p>";
                } elseif ($imc < 24.9) {
                    echo "<p>Peso ideal</p>";
                } elseif ($imc < 29.9) {
                    echo "<p>Levemente acima do peso</p>";
                } elseif ($imc < 34.9) {
                    echo "<p>Obesidade leve</p>";
                } elseif ($imc < 39.9) {
                    echo "<p>Obesidade moderada</p>";
                } else {
                    echo "<p>Obesidade grave</p>";
                }
                echo "</div>";
            } else {
                echo "<p>Altura inválida.</p>";
            }
        }
        ?>
    </main>
</body>
</html>
