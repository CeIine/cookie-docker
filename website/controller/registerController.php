<?php
    // require_once('../modeles/client.php');
    // require_once('../modeles/bd.php');

	if(!empty($_POST['nom'] && $_POST['prenom'] && $_POST['mail'] && $_POST['password'] && $_POST['login']))
	{
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $login = $_POST['login'];

        // $connection = new connection();
        // $co = $connection->connecter();

        // $cli = new client($co,$nom,$prenom,$mail,$login);
        // $cli->inscript();
	}
	else{
		echo "Remplissez vos coordonnées svp!";
		header('refresh:3; url=../view/pages/register.php');
	}
?>
