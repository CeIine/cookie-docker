<?php
    $dns = "pgsql:host=postgres;port=5432;dbname=postgre";
    $user = "admin";
    $password = "admin";

    try{
        $db = new PDO($dns, $user, $password);
    }
    catch(PDOException $e){
        $error = "Database Error: ";
        $error .= $e->getMessage();
        include('view/error.php');
    }
?>
