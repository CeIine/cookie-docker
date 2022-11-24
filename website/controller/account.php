<?php
    require_once('../model/db_redis.php');
    require_once('../model/db_postgres.php');
    require_once('../model/client.php');

    require('../view/header.php');
    require('../view/navbar.php');

    $redis = new RedisDb();
    $redis->connecter();
    $id = $redis->getId();
    
    if($id != null){
        $pg = new Postgres();
        $co = $pg->connecter();

        $client = new Client($co, $login, $password);
        $infoCli = $client->getInfo($id);
        require('../view/pages/account.php');
    }
    else{
        require('../view/pages/login.php');
    }

    require('../view/footer.php');
?>