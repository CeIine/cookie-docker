<?php
    class Product{
        private $co;
        public function __construct(){
            $args = func_get_args();
            $this->co = $args[0];
		}

        function getClassicProduct(){
            $requete="SELECT * FROM produit  ORDER BY \"idProduit\" LIMIT 3";
            try{
                $result = $this->co->query($requete);

                if($result === false){
                    throw new PDOException;
                }
                
                $classics = [];
                while (($row = $result->fetch())) {
                    $cookie = [
                        'idProduit' => $row['idProduit'],
                        'nom' => $row['nom'],
                        'description' => $row['description'],
                        'prix' => $row['prix'],
                        'image' => $row['image']
                    ];
                    $classics[] = $cookie;
                }

                return $classics;
            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
            
        }

        function getBestProduct(){
            $requete="SELECT * FROM produit WHERE \"idProduit\"= 4";
            try{
                $result = $this->co->query($requete);

                if($result === false){
                    throw new PDOException;
                }
                
                $row = $result->fetch();
                $cookie = [
                    'idProduit' => $row['idProduit'],
                    'nom' => $row['nom'],
                    'description' => $row['description'],
                    'prix' => $row['prix'],
                ];

                return $cookie;
            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
            
        }

        function getProduct(){
            $requete="SELECT * FROM produit  ORDER BY \"idProduit\" OFFSET 4";
            try{
                $result = $this->co->query($requete);

                if($result === false){
                    throw new PDOException;
                }
                
                $producs = [];
                while (($row = $result->fetch())) {
                    $cookie = [
                        'idProduit' => $row['idProduit'],
                        'nom' => $row['nom'],
                        'description' => $row['description'],
                        'prix' => $row['prix'],
                        'image' => $row['image']
                    ];
                    $producs[] = $cookie;
                }

                return $producs;
            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
            
        }

        function getPanier($panier){
            $p = [];

            foreach($panier as $idProduit => $valArray){
                foreach($valArray as $boite => $qte){
                    $cookie = [
                        'nom' => $this->getNomById($idProduit),
                        'boite' => $boite,
                        'quantite' => $qte,
                        'total' => $this->getPrix($idProduit, $qte, $boite),
                    ];
                    $p[] = $cookie;
                }
            }

            return $p;
        }

        function getNomById($id){
            $requete="SELECT nom FROM produit  WHERE \"idProduit\"=$id";

            try{
                $result = $this->co->query($requete);

                if($result === false){
                    throw new PDOException;
                }
                $row = $result->fetch();

                return $row['nom'];
            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
        }

        function getPrix($id, $qte, $boite){
            $requete="SELECT prix FROM produit  WHERE \"idProduit\"=$id";

            try{
                $result = $this->co->query($requete);

                if($result === false){
                    throw new PDOException;
                }
                $row = $result->fetch();

                switch($boite){
                    case 4:
                        return $row['prix']*$qte;
                    case 8:
                        return $row['prix']*$qte*2;
                    case 16:
                        return $row['prix']*$qte*4;
                    default:
                        return 99999999;
                }

            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
        }

        function getTotal($panier){
            $total = 0;

            foreach($panier as $p){
                $total += $p['total'];
            }

            return $total;
        }
    }
?>