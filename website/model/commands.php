<?php

require_once('../model/db_redis.php');
require_once('../model/db_postgres.php');

class Commands
{
    private $co;
    private int $clientID;
    private array $data;
    private array $dataToInsert = [];
    private $co;

    public function __construct(){

        $ctp = func_num_args();
        $args = func_get_args();

        switch($ctp)
        {
            case 1:
                $this->clientID = $args[0];
                $this->dataToInsert = [];
                break;
            case 4:
                $this->dataToInsert = [
                    'date' => $args[0],
                    'statut' => $args[1],
                    'montant' => $args[2],
                    'idClient' => $args[3]
                ];
                $this->insertDataSQL();

                $this->clientID = $this->dataToInsert['idClient'];
                
                break;
        }

        $pg = new Postgres();
        $this->co = $pg->connecter();

        $this->getDataSQL();
    }

    private function getDataSQL()
    {
        $requete = "SELECT * FROM commande WHERE idClient = '$this->clientID'";

        try
        {
            $result = $this->co->query($requete);
            if($result === false)
            {
                $e = new PDOException('Failed to query the database');
                throw $e;
            }
            $this->data = $result->fetchAll();
        }
        catch(PDOException $e){
            $error = "Database Error: ";
            $error .= $e->getMessage();
            include('../view/error.php');
        }

        $this->getDetailedDataSQL();
    }

    private function getDetailedDataSQL()
    {
        foreach($this->data as $command)
        {
            $requete = "SELECT * FROM commandeproduit WHERE idCommande = '".$command['idCommande']."'";

            try
            {
                $result = $this->co->query($requete);
                if($result === false)
                {
                    $e = new PDOException('Failed to query the database');
                    throw $e;
                }
                $command['details'] = $result->fetchAll();
            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
                break;
            }
        }
    }

    private function insertDataSQL()
    {
        $requete = "INSERT INTO commande (date, statut, montant, idClient) VALUES (:date, :statut, :montant, :idClient)";
        
        try
        {
            $sth = $this->co->prepare($requete, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $sth->execute($this->dataToInsert);
            if($sth === false)
            {
                $e = new PDOException('Failed to query the database');
                throw $e;
            }
            $this->dataToInsert = [];
        }
        catch(PDOException $e){
            $error = "Database Error: ";
            $error .= $e->getMessage();
            include('../view/error.php');
        }
    }

    public function getClientId()
    {
        return $this->clientID;
    }

    public function getData()
    {
        return $this->data;
    }

    public function commander($myPanier, $montant, $co, $idClient){

        $result = pg_query($co, "INSERT INTO commande (date, statut, montant, idClient) VALUES (date(), 'en cours de préparation', $montant, $idClient)");
        $result = pg_query($co, "SELECT idCommande FROM commande ORDER BY idCommande DESC");
        $row = pg_fetch_row($result);
        $idCommande = $row[0];
        
        foreach ($myPanier as $produit => $value) {
            foreach ($value as $qteBoite => $nbBoite) {
                $result = pg_query($co, "INSERT INTO commandeproduit (idCommande, idProduit, quantite, nbBoite) VALUES ($idCommande, $produit, $qteBoite, $nbBoite)");
            }
        }
    }

    public function getCommandes($id)
    {
        $requete="SELECT * FROM commande WHERE \"idClient\"=$id";

        try{
            $result = $this->co->query($requete);

            if($result === false){
                throw new PDOException;
            }

            $commandes = [];
            while (($row = $result->fetch())) {
                $commande = [
                    'idCommande' => $row['idCommande'],
                    'date' => $row['date'],
                    'description' => $row['statut'],
                    'statut' => $row['prix'],
                    'montant' => $row['montant']
                ];
                $commandes[] = $commande;
            }

            return $commandes;
        }
        catch(PDOException $e){
            $error = "Database Error: ";
            $error .= $e->getMessage();
            include('../view/error.php');
        }
    }
}

?>