<?php 
    require_once('./model/product.php');
    require_once('./model/db_postgres.php');
    
    $pg = new Postgres();
    $co = $pg->connecter();
    
    $product = new Product($co);
    $classic = $product->getClassicProduct();
    $bs = $product->getBestProduct();
    $products = $product->getProduct();

    require('./view/header.php');
    require('./view/navbar.php');
    require('./view/pages/home.php');
    require('./view/footer.php'); 
?>