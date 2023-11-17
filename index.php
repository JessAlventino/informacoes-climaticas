<?php

require './vendor/autoload.php';
require 'Classes/OpenWeather.php';

$o = new OpenWeather();

$clima = $o->getTempoAtual();

//$clima = json_decode($dadosClimaticos);



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Link Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <!-- Links das  fontes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@1,300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@1,300&family=Mate&display=swap" rel="stylesheet">
   <!-- Estilização CSS -->
    <style>
          body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
            margin: 0;
            background-image: linear-gradient( 109.6deg,  rgba(61,131,97,1) 11.2%, rgba(28,103,88,1) 91.1% );
            background-size: cover;
        }
      
        .card-container {
            max-width: 400px; /* Largura máxima para o contêiner */
            min-width: 1125px;
            background-color: #F0F8FF;
            border-radius: 40px;
            box-shadow: 0 0 20px rgba(35, 206, 235);
        }

        .card {
            text-align: center;
            margin: 0 auto;
            max-width: 400px;
            padding: 18px;
            background-color: #FFDEE9;
            background-image: linear-gradient(0deg, #FFDEE9 0%, #B5FFFC 100%);


        }
       h1 {
        text-align: center;
        font-family: 'Jost', sans-serif;
        color: linear-gradient( 109.6deg,  rgba(61,131,97,1) 11.2%, rgba(28,103,88,1) 91.1%)
       }
        .card h2 {
            font-size: 39px;
            font-family: 'Jost', sans-serif;
            font-family: 'Mate', serif;
         }

        .card h3 {
            font-size: 25px;
            font-family: 'Jost', sans-serif;
            font-family: 'Mate', serif;
        }
        .card p {
            font-size: 19px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;        }
        .card i {
            font-size: 40px;
            color: #007BFF;
        }
    </style>
    <title>Consulta de Clima</title>
</head>
<body>

<div class="card-container">
<h1 >PREVISÃO DO TEMPO</h1>

    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"><?php echo $clima->cidade ?></h2>
                <h3 class="card-title"><?php echo $clima->temperatura ?> °C</h3>
                <i class="fas fa-cloud-showers-heavy fa-2x" style="color: #8491a3;"></i>
                <p class="card-text">Descrição: <?php echo $clima->descricao ?></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="card-text">Temperatura Máxima <?php echo $clima->temperaturaMaxima ?> °C <img src="Ícones/clima-quente.png" alt="Temperatura Máxima"></p>
                <p class="card-text">Temperatura Mínima <?php echo $clima->temperaturaMinima ?> °C <img src="Ícones/temperatura-minima.png" alt="Temperatura Mínima"></p>
                <p class="card-text">Umidade <?php echo $clima->umidade ?>% <img src="Ícones/umidade.png" alt="Umidade"></p>
                <p class="card-text">Direção do Vento <?php echo $clima->direcaoDoVento ?> <img src="Ícones/biruta.png" alt="Direção do Vento"></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="card-text">Velocidade do Vento <?php echo $clima->velocidadeDoVento ?> Km/h<img src="Ícones/vento.png" alt="Velocidade do Vento"></p>
                <p class="card-text">Sensação Térmica <?php echo $clima->sensacaoTermica ?>°C <img src="Ícones/termometro.png" alt="Sensação Térmica"></p>
                <p class="card-text">Nascer do Sol <?php echo date('H:i', $clima->nascerDoSol) ?> <img src="Ícones/nascer-do-sol.png" alt="Nascer do Sol"></p>
                <p class="card-text">Por do Sol <?php echo date('H:i', $clima->porDoSol) ?> <img src="Ícones/por-do-sol.png" alt="Por do Sol"></p>


            </div>
        </div>
    </div>
</div>   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjvP/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</html>

