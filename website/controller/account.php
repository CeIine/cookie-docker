<?php
    require('../view/header.php');
    require('../view/navbar.php');

    $connecter = true; 
    if($connecter){
        require('../view/pages/account.php');
    }
    else{
        require('../view/pages/login.php');
    }

    require('../view/footer.php');
?>