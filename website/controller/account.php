<?php
    require_once('../model/db_redis.php');
    require('../view/header.php');
    require('../view/navbar.php');

    $redis = new RedisDb();
    $redis->connecter();
    $id = $redis->getId();

    if($id != null){
        require('../view/pages/account.php');
    }
    else{
        require('../view/pages/login.php');
    }

    require('../view/footer.php');
?>