<?php
    require_once('../model/db_redis.php');
    require_once('../model/db_postgres.php');
    require_once('../model/product.php');


    require('../view/header.php');
    require('../view/navbar.php');

    $redis = new RedisDb();
    $redis->connecter();
    $panierArray = $redis->getPanierComplet();

    $pg = new Postgres();
    $co = $pg->connecter();

    $product = new Product($co);
    $panier = $product->getPanier($panierArray);
    $total = $product->getTotal($panier);

    require('../view/pages/panier.php');
    require('../view/footer.php');
?>