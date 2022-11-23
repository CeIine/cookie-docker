<?php
    $connecter = false; 
    if($connecter){
        echo "envoyer sur page info client";
    }
    else{
        require('../view/header.php');
        require('../view/navbar.php');
        require('../view/pages/login.php');
        require('../view/footer.php');
    }
?>