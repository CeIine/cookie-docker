<?php

use LDAP\Result;
    require_once('../model/db_redis.php');

    class Client{
        private $co;
        private $id;
        private $nom;
        private $prenom;
        private $mail;
        private $mdp;
        private $login;

		public function __construct(){

            $ctp = func_num_args();
            $args = func_get_args();

			switch($ctp)
            {
				case 6:
                    $this->co = $args[0];
                    $this->nom = $args[1];
                    $this->prenom = $args[2];
                    $this->login = $args[3];
                    $this->mdp = $args[4];
                    $this->mail = $args[5];
                    break;
                case 3:
                    $this->co = $args[0];
                    $this->login = $args[1];
                    $this->mdp = $args[2];
                    break;
                case 2:
                    $this->co = $args[0];
                    $this->id = $args[1];
                    break;
			}
		}

		public function inscription(){

            $requete="INSERT INTO client (nom, prenom, login, password, mail) VALUES('$this->nom','$this->prenom','$this->login','$this->mdp','$this->mail')";
            
            try{
                $result = $this->co->query($requete);
                if($result === false){
                    throw new PDOException;
                }
                header('Location: ../controller/account.php');
            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
		}

        public function loginExists()
        {
            $requete = "SELECT COUNT(*) FROM client WHERE login = '$this->login'";
            try
            {
                $result = $this->co->query($requete);
                if($result === false)
                {
                    $e = new PDOException('Failed to query the database');
                    throw $e;
                }
                return $result->fetch()[0] != 0;
            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
        }

		public function connexion(){
			$requete="SELECT * FROM client WHERE login='$this->login' AND password='$this->mdp'";
			
            try{
                $result = $this->co->query($requete)->fetchColumn();
                unset($error);

                if($result == 0){
                    $error = "Vous n'êtes pas encore inscrit !";
                    require('../view/header.php');
                    require('../view/navbar.php');
                    require('../view/pages/login.php');
                    require('../view/footer.php');
                }
                else{
                    $redis = new RedisDb();
                    $redis->connecter();
                    $redis->setId($result);
                    header('Location: ../controller/account.php');
                }
            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
		}

        public function getInfo($id){
			$requete="SELECT * FROM client WHERE \"idClient\"=$id";
			
            try{
                $result = $this->co->query($requete)->fetch();
                return $result;
            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
		}

        public function deconnexion()
        {
            $redis = new RedisDb();

            $redis->connecter();

            $redis->disconnect();
        }

        public function calculPrix($myPanier){

            $prixTotal = 0;
            foreach ($myPanier as $produit => $value) {
                $result = pg_query($this->co, "SELECT prix FROM produit WHERE idProduit = $idProduit");
                $row = pg_fetch_row($result);
                $prix_produit = $row[0];

                foreach ($value as $qteBoite => $nbBoite) {
                    $prixTotal = $prixTotal + ($qteBoite * $nbBoite * $prix_produit);
                }
            }
            return $prixTotal;
        }

        public function commander($myPanier){

            $montant = calculPrix($myPanier);
            $result = pg_query($this->co, "INSERT INTO commande (date, statut, montant, idClient) VALUES (date(), 'en cours de préparation', $montant, $idClient)");
            $result = pg_query($this->co, "SELECT idCommande FROM commande ORDER BY idCommande DESC");
            $row = pg_fetch_row($result);
            $idCommande = $row[O];
            
            foreach ($myPanier as $produit => $value) {
                foreach ($value as $qteBoite => $nbBoite) {
                    $result = pg_query($this->co, "INSERT INTO commandeproduit (idCommande, idProduit, quantite, nbBoite) VALUES ($idCommande, $produit, $qteBoite, $nbBoite)");
                }
            }
        }

	}
?>
