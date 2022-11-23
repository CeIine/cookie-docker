<div class="register-photo container-fluid d-flex align-items-center">
    <div class="form-container">
        <div class="image-holder"></div>
        <form method="post" action="../../controller/loginController.php">
            <h2 class="text-center"><strong>Connexion</strong></h2>
            <input type="hidden" name="action" value="true">
            <div class="form-group"><input class="form-control" type="login" name="login" placeholder="Login" required oninvalid="this.setCustomValidity('Le login est requis')" oninput="this.setCustomValidity('')"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Le mot de passe est requis')" oninput="this.setCustomValidity('')"></div>
            <?php if(isset($error)){ echo '<p style="color: red">'.$error.'</p>'; } ?>
            <div class="form-group text-center"><button class="btn btn-primary btn-block" type="submit">Connexion</button></div><br>
            <a href="../../view/pages/register.php" class="already">You don't have an account? Sign Up here.</a>
        </form>
    </div>
</div>
