<div class="register-photo container-fluid d-flex justify-content-center flex-column align-items-center p-5 rounded" style="padding-top: 100px ;">
    <div class="p-5 bg-white rounded shadow ">
        <!-- Lined tabs-->
        <ul id="myTab2" role="tablist" class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
        <li class="nav-item flex-sm-fill">
            <a id="home-tab" data-toggle="tab" href="#home2" data-bs-toggle="tab" role="tab" aria-controls="home2" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 active">Informations</a>
        </li>
        <li class="nav-item flex-sm-fill">
            <a id="profile-tab" data-toggle="tab" href="#profile2" data-bs-toggle="tab" role="tab" aria-controls="profile2" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0">Commandes</a>
        </li>
        </ul>
        <div id="myTab2Content" class="tab-content">
            <div id="home2" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                <div class="form-container">
                    <form method="post">
                        <span>
                            Nom
                        </span>
                        <div class="form-group"><input class="form-control" type="nom" name="nom" value="<?php echo $infoCli['nom'] ?>" ></div>
                        <span>
                            Prénom
                        </span>
                        <div class="form-group"><input class="form-control" type="prenom" name="prenom" value="<?php echo $infoCli['prenom'] ?>"></div>
                        <span>
                            Login
                        </span>
                        <div class="form-group"><input class="form-control" type="login" name="login" value="<?php echo $infoCli['login'] ?>" ></div>
                        <span>
                            Mail
                        </span>
                        <div class="form-group"><input class="form-control" type="mail" name="mail" value="<?php echo $infoCli['mail'] ?>"></div>
                        <span>
                            Password
                        </span>
                        <div class="form-group"><input class="form-control" type="password" name="password" value="<?php echo $infoCli['password'] ?>"></div>
                    </form>
                </div>
                <form method="post" action="../../controller/deconnexionController.php">
                    <div class="text-center">
                        <input class="form-control" type="hidden" name="id" value="<?php echo $infoCli['idClient'] ?>">
                        <div class="form-group text-center"><button class="btn btn-danger" type="submit">Déconnexion</button></div>
                    </div>
                </form>
            </div>
            <div id="profile2" role="tabpanel" aria-labelledby="profile-tab" class="container-fluid tab-pane fade px-4 py-5">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Date</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($commandes as $c) {
                    ?>
                        <tr>
                            <th><?php echo $c['idCommande']; ?></th>
                            <td><?php echo $c['date']; ?></td>
                            <td><?php echo $c['statut']; ?></td>
                            <td><?php echo $c['montant']; ?></td>
                        </tr>
                    <?php
                        } 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End lined tabs -->
  </div>

</div>







