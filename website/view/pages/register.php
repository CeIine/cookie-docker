<?php include('../header.php') ?>
<?php include('../navbar.php') ?>

<div class="register-photo container-fluid d-flex align-items-center">
    <div class="form-container">
        <div class="image-holder"></div>
        <form method="post" action="../../controller/registerController.php">
            <h2 class="text-center"><strong>Inscription</strong></h2>
            <div class="form-group"><input class="form-control" type="nom" name="nom" placeholder="Nom"></div>
            <div class="form-group"><input class="form-control" type="prenom" name="prenom" placeholder="Prénom"></div>
            <div class="form-group"><input class="form-control" type="login" name="login" placeholder="Login"></div>
            <div class="form-group"><input class="form-control" type="mail" name="mail" placeholder="Mail"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group text-center"><button class="btn btn-primary btn-block" type="submit">Créer mon compte</button></div><br>
        </form>
    </div>
</div>

<?php include('../footer.php') ?>
