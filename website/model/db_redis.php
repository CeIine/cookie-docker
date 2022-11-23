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

        function saveId($idClient){
            /* Sauvegarde de l'ID du client quand il se connecte */
            if ($this->redis->ttl($idClient) <= 0){
                $this->redis->set($idClient, 'connected');
            }
            $this->redis->expire($idClient, 1200);
            //echo $redis->ttl($idClient);
        }

        // function savePanier(){
        //     /* Sauvegarde panier */
        //     $idPanier = "panier:".$idClient;
        //     $idProduit = 2;
        //     $Qte = 5;
        //     $this->redis->hIncrBy($idPanier, $idProduit, $Qte);
        //     $this->redis->expire($idPanier, 300);
        //     //echo "\n";
        //     //print_r($redis->hGetAll($idPanier));
        //     //echo $redis->ttl($idPanier);
        // }
    }

?>