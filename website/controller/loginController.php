<?php
    require_once('../model/client.php');
    require_once('../model/db_postgres.php');

    if(!empty($_POST['password'] && $_POST['login']))
    {
        $password = hash('sha256', $_POST['password']);
        $login = $_POST['login'];

        $pg = new Postgres();
        $co = $pg->connecter();
        
        $client = new Client($co, $login, $password);
        $client->connexion();
    }
    else{
        header('Location: ./account.php');
    }
?>
