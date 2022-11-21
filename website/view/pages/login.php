<?php include('../header.php') ?>
<?php include('../navbar.php') ?>

<div class="register-photo container-fluid d-flex align-items-center">
    <div class="form-container">
        <div class="image-holder"></div>
        <form method="post">
            <h2 class="text-center"><strong>Connexion</strong></h2>
            <div class="form-group"><input class="form-control" type="login" name="login" placeholder="Login"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group text-center"><button class="btn btn-primary btn-block" type="submit">Connexion</button></div><br>
            <a href="../../view/pages/register.php" class="already">You don't have an account? Sign Up here.</a>
        </form>
    </div>
</div>

<?php include('../footer.php') ?>
