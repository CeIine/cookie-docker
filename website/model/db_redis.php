<?php
    class Redis{
        private $redis;

        function connecter(){
            $redis = new Redis();
            $this->redis->connect('localhost', 6379);
        }

        function setId($idClient){
            if ($this->redis->ttl('idClient') <= 0){
                $this->redis->set('idClient', $idClient);
            }
            $this->redis->expire($idClient, 1200);
        }

        function getId(){
            return $this->redis->get('idClient');
        }

        function disconnect(){

        }

        function AjoutPanier($idProduit, $typeBoite, $nbBoite){
            $this->redis->sAdd($idTabProduits, $idProduit);
            $idPanier = "panier:".getId().":".$idProduit;
            $this->redis->hSet($idPanier, $typeBoite, $nbBoite);
            $this->redis->expire($idPanier, 300);
            $this->redis->expire($idTabProduits, 300);
        }

        function SuppressionPanier($idProduit, $typeBoite){
            $idPanier = "panier:".getId().":".$idProduit;
            $this->redis->hIncrBy($idPanier, $TypeBoite, -1);
            if ($this->redis->hGet($idPanier, $TypeBoite) <= 0){
                $this->redis->hDel($idPanier, $TypeBoite);
                if ($this->redis->hLen($idPanier) <= 0){
                    $this->redis->sRem($idTabProduits, $idProduit);
                }
            }
        }

        function getPanierComplet(){
            $myPanier = array();
            foreach($redis->sMembers($idTabProduits) as $id){
                $idPanier = "panier:".$redis->get('idClient').":".$id;  
                $myPanier[$id] = $redis->hGetAll($idPanier);   
            }
            return $myPanier;
        }
    }

?>