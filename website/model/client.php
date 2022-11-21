<?php
    class client{
        private $co;
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
				case 8:
                    $this->co = $args[0];
                    $this->nom = $args[1];
                    $this->prenom = $args[2];
                    $this->mail = $args[3];
                    $this->mdp = $args[4];
                    $this->login = $args[5];
                    break;
                case 3:
                    $this->co = $args[0];
                    $this->login = $args[1];
                    $this->mdp = $args[2];
                    break;
			}
		}

	// 	public function inscript(){
	// 		$sqlQuar = "SELECT idQua FROM quartier WHERE nomQua = '$this->quar'";

	// 		$ruls = mysqli_query($this->co,$sqlQuar);
	// 		$row = mysqli_fetch_row($ruls);
	// 		$idQua = $row[0];

	// 		//see if the client already has an account
	// 		$sqlMail = "SELECT * FROM client WHERE mail='$this->mail'";
	// 		$resulMail = mysqli_query($this->co,$sqlMail);

	// 		if(mysqli_num_rows($resulMail)==0){
	// 			$requete="INSERT INTO client VALUES(0,'$this->nom','$this->prenom','$this->mail','$this->mdp',$this->tel,'$this->adr',$idQua,0)";
	// 			$result = mysqli_query($this->co,$requete);
	// 			echo "Vous vous êtes bien inscrit. Rediger à la page d'accueil dans 3 secondes.";
	// 			header('refresh:3; url=../vues/accueil.html');
	// 		}
	// 		else{
	// 			echo "Vous vous êtes déjà inscrit avec cette adresse électronique, vous pouvez vous connecter directement.";
	// 			header('refresh:3; url=../vues/accueil.html');
	// 		}
	// 	}

	// 	public function connexion(){
	// 		$code="SELECT idCli,mdp FROM client WHERE mail='$this->mail'";
	// 		$codeRes=mysqli_query($this->co,$code);
    //   $code2="SELECT * FROM producteur WHERE mailP='$this->mail'";
	// 		$codeRes2=mysqli_query($this->co,$code2);
	// 		if(mysqli_num_rows($codeRes)==0 && mysqli_num_rows($codeRes2)==0){
	// 					echo "Vous vous êtes pas encore inscrit.";
	// 					header('refresh:3; url=../vues/accueil.html');
	// 		}
    //   else if(mysqli_num_rows($codeRes)==0 && mysqli_num_rows($codeRes2)!=0){
    //     $codeRow = mysqli_fetch_assoc($codeRes2);
    //     $idPct = $codeRow["idP"];
    //     $codeMdp = $codeRow["mdpP"];
    //     if($codeMdp==$this->mdp){
    //       $_SESSION['mail']="$this->mail";
    //       $_SESSION['idCli']=$idPct;

    //       header('Location:../vues/gesteur.html');
    //     }
    //     else{

	// 						echo "Mot de passe incorrect!";
	// 						header('refresh:2; url=../vues/accueil.html');

	// 				}
    //   }
	// 		else{
	// 				  $codeRow = mysqli_fetch_assoc($codeRes);
	// 					$idCli = $codeRow["idCli"];
	// 					$codeMdp = $codeRow["mdp"];
	// 					//si le client mal saisit le mdp
	// 					if($codeMdp==$this->mdp){

	// 						$_SESSION['mail']="$this->mail";
	// 						$_SESSION['idCli']=$idCli;

    //           $recup = "SELECT * FROM client natural join quartier WHERE idCli ='$idCli'";
    //           $result = mysqli_query($this->co,$recup);
    //           $row = mysqli_fetch_assoc($result);
    //           $_SESSION['idQua']=$row['idQua'];
    //           $_SESSION['nomQua']= $row['nomQua'];
    //           $_SESSION['adr']=$row['adresse'];


    //                 header('Location:../vues/main_try.html');
    //             }
    //             else{

    //                 echo "Mot de passe incorrect!";
    //                 header('refresh:2; url=../vues/accueil.html');
    //             }
    //         }
	// 	}
	}
?>
