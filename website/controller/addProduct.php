<?php
    require_once('../model/db_redis.php');

    $idSection = $_POST['idSection'];
    $idProduit = $_POST['id'];
    $type = $_POST['type'];

    $redis = new RedisDb();
    $redis->connecter();
    $redis->AjoutPanier($idProduit, $type, 1);

    header('Location: ../index.php#'.$idSection);
?>