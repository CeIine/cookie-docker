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

        
    }
?>