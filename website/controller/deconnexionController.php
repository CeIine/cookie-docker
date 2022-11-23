<?php
    require_once('../model/client.php');
    require_once('../model/db_postgres.php');

    $id = $_POST['id'];
    
    $pg = new Postgres();
    $co = $pg->connecter();

    $client = new Client($co, $id);
    $client->deconnexion();

    header('Location: ./account.php');
?>