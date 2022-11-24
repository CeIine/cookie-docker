<?php
    require_once('../model/db_redis.php');
    require_once('../model/db_postgres.php');
    require_once('../model/client.php');
    require_once('../model/commands.php');

    //require('../view/header.php');
    //require('../view/navbar.php');

    $redis = new RedisDb();
    $redis->connecter();
    $id = $redis->getId();
    
    if($id != null){
        $pg = new Postgres();
        $co = $pg->connecter();
        echo "testaa";

        $client = new Client($co, $login, $password);
        $infoCli = $client->getInfo($id);

        $commands = new Commands($co, $id);
        $commandes = $commands->getCommandes($id);

        require('../view/pages/account.php');
    }
    else{
        require('../view/pages/login.php');
    }

    //require('../view/footer.php');
?>