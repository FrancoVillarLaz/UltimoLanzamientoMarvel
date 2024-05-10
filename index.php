<?php

//URL de la api
const API_URL = "https://whenisthenextmcufilm.com/api";

// Inicia nueva sesion de cURL
$ch = curl_init(API_URL);

// Para que no muestre el resultado de peticion en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Ejecuta la peticion y guardamos el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);

//Se cierra la sesion de curl
curl_close($ch);


//Alternativa 2:
//$result = file_get_contents(API_URL); 
//Mas sencillo si solo queres hacer un GET de una api
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La proxima pelicula de Marvel</title>
    <!-- Centered viewport --> 
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>
    <main>
        <header>
        <h2>Proximo estreno de Marvel!</h2>
        </header>
        <section>
            <img src="<?= $data["poster_url"];?>" width="300" alt="Poster de <?= $data["title"];?>"
            style="border-radius: 16px"/>
        </section>
        <hgroup>
            <h3><?= $data["title"];?> se estrena en <?= $data["days_until"]; ?></h3>
            <p>Fecha de estreno: <?=$data["release_date"];?></p>
            <p>La siguiente es <?=$data["following_production"]["title"];?></p>
        </hgroup>
    </main>
    
</body>

<style>
    :root{
        color-scheme: light dark;
    }
    header{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    main{
        display: grid;
        place-content: space-around center;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;

    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img{
        margin: 0 auto;
    }
</style>
