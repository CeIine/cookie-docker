<?php
    class Redis{
        private $redis;

        function connecter(){
            /* Connection Ã  la BDD */
            $redis = new Redis();
            $this->redis->connect('localhost', 6379);
            //echo "Connection successfull !";
            //echo "\nServer is running: ".$redis->ping();
        }

        function setId($idClient){
            /* Sauvegarde de l'ID du client quand il se connecte */
            if ($this->redis->ttl('idClient') <= 0){
                $this->redis->set('idClient', $idClient);
            }
            $this->redis->expire($idClient, 1200);
            //echo $redis->ttl($idClient);
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

        //pas fini
        function getPanierComplet(){
            foreach($redis->sMembers($idTabProduits) as $id){
                $idPanier = "panier:".getId().":".$id;
                echo "Produit ".$id." : <br>";   
                foreach ($redis->hGetAll($idPanier) as $key => $value) {
                    echo "\nBoite de $key = $value";
                    print_r($arr);
                }  
            }
        }

    }

?>