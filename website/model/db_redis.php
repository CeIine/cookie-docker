<?php
    class RedisDb{
        private $co;

        function connecter(){
            /* Connection Ã  la BDD */
            try{
                $this->co = new Redis();
                $this->co->connect('redis', 6379);
            }
            catch(Exception $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
        }

        function setId($idClient){
            /* Sauvegarde de l'ID du client quand il se connecte */
            if ($this->co->ttl('idClient') <= 0){
                $this->co->set('idClient', $idClient);
            }
            $this->co->expire($idClient, 1200);
        }

        function getId(){
            return $this->co->get('idClient');
        }

        function disconnect(){

        }

        function AjoutPanier($idProduit, $typeBoite, $nbBoite){
            $this->co->sAdd($idTabProduits, $idProduit);
            $idPanier = "panier:".getId().":".$idProduit;
            $this->co->hSet($idPanier, $typeBoite, $nbBoite);
            $this->co->expire($idPanier, 300);
            $this->co->expire($idTabProduits, 300);
        }

        function SuppressionPanier($idProduit, $typeBoite){
            $idPanier = "panier:".getId().":".$idProduit;
            $this->co->hIncrBy($idPanier, $TypeBoite, -1);
            if ($this->co->hGet($idPanier, $TypeBoite) <= 0){
                $this->co->hDel($idPanier, $TypeBoite);
                if ($this->co->hLen($idPanier) <= 0){
                    $this->co->sRem($idTabProduits, $idProduit);
                }
            }
        }

        function getPanierComplet(){
            $myPanier = array();
            foreach($this->co->sMembers($idTabProduits) as $id){
                $idPanier = "panier:".$this->co->get('idClient').":".$id;  
                $myPanier[$id] = $this->co->hGetAll($idPanier);   
            }
            return $myPanier;
        }

    }

?>