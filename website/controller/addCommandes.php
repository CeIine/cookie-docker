<?php
    require_once('../model/db_redis.php');
    require_once('../model/db_postgres.php');
    require_once('../model/commands.php');

    $montant = $_POST['montant'];

    $redis = new RedisDb();
    $redis->connecter();
    $id = $redis->getId();
    
    $pg = new Postgres();
    $co = $pg->connecter();

    $commands = new Commands($id);
    $commands->commander(null, $montant,$co, $id);

    header('Location: ../controller/account.php');
?>