<?php include('../header.php') ?>
<?php include('../navbar.php') ?>

<div class="register-photo container-fluid d-flex align-items-center">
    <div class="form-container">
        <div class="image-holder"></div>
        <form method="post" action="../../controller/registerController.php">
            <h2 class="text-center"><strong>Inscription</strong></h2>
            <div class="form-group"><input class="form-control" type="text" name="nom" placeholder="Nom" required></div>
            <div class="form-group"><input class="form-control" type="text" name="prenom" placeholder="Prénom" required></div>
            <div class="form-group"><input class="form-control" type="text" name="login" placeholder="Login" required></div>
            <div class="form-group"><input class="form-control" type="email" name="mail" placeholder="Mail" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group text-center"><button class="btn btn-primary btn-block" type="submit">Créer mon compte</button></div><br>
        </form>
    </div>
</div>

<?php include('../footer.php') ?>
