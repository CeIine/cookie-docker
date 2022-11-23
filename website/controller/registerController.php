<?php
    require_once('../model/client.php');
    require_once('../model/db_postgres.php');

	if(!empty($_POST['nom'] && $_POST['prenom'] && $_POST['mail'] && $_POST['password'] && $_POST['login']))
	{
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $password = hash('sha256', $_POST['password']);
        $login = $_POST['login'];

        $pg = new Postgres();
        $co = $pg->connecter();
       
        $client = new Client($co, $nom, $prenom, $login, $password, $mail);
        if($client->loginExists())
        {
            $error = "Login déjà pris !";
            require('../view/header.php');
            require('../view/navbar.php');
            require('../view/pages/register.php');
            require('../view/footer.php');
        }
        else
        {
            $client->inscription();
        }
	}
	else{
		echo "Remplissez vos coordonnées svp!";
		header('refresh:3; url=../view/pages/register.php');
	}
?>
