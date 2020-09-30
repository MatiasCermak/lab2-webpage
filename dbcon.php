<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">
    
    <title>Document</title>
</head>
<body>
    <?php
        include "php/dbconnection.php";
        
    ?>
    <?php
        connect($conn);
        $cardsStatement = $conn->prepare('SELECT eventos.titulo, eventos.descripcion, eventos.cupo, eventos.ubicacion, eventos.fecha, eventos.tipo_id, tipo_evento.tipo 
                                        FROM eventos JOIN tipo_evento
                                        ON eventos.tipo_id = tipo_evento.id_tipo');
        $cardsStatement->execute();
        $data = $cardsStatement->fetchAll();
        echo count($data)%6;
        disconnect($conn);   
    ?>
</body>