<div class="container-fluid row align-items-center text-center section-accueil">
    <div class="col-5"> 
        <h1 class="text-light fs-1">
            <span class="auto-type text-light"></span>
        </h1> 
    </div>
    <div class="col-7 ps-5">
        <img src="./view/img/cookie-accueil.jpg" class="img-fluid" alt="cookie" >
    </div>
</div>

<!-- Classiques -->
<div class="container mb-5">
    <h1 class="text-light fs-1 text-center mb-5">Nos classiques</h1>
    <div class="container-fluid row">
        <?php
            foreach ($classic as $c) {
        ?>
        <div class="col-lg-4 mb-3 d-flex align-items-stretch text-center">
            <div class="card " data-aos="slide-up" >
                <img src="../../view/img/produits/<?php echo $c['image'] ?>" class="card-img-top" alt="cookie">
                <div class="card-body d-flex flex-column justify-content-end">
                    <h5 class="card-title"><?php echo $c['nom'] ?></h5>
                    <p class="card-text"><em><?php echo $c['description']; ?></em></p>
                    <p class="card-text"><em>4 cookies: <?php echo $c['prix']; ?>€</em></p>

                    <hr/>
                    
                    <form method="post" action="../../controller/loginController.php">
                        <div class="row align-items-center justify-content-center">
                            <input type="hidden" value="<?php echo $c['idProduit'] ?>">
                            <div class="col-auto">
                                <span class="fs-5 align-text-bottom">Boîte de </span>
                            </div>
                            <div class="col-auto">
                                <select class="form-select">
                                    <option selected value="4">4 cookies</option>
                                    <option value="8">8 cookies</option>
                                    <option value="16">16 cookies</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-block" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
            } 
        ?>
    </div>
</div>

<!-- Best Seller -->
<div class="container-fluid text-center text-light mt-5">
    <div class="row vh-100 d-flex align-items-center justify-content-center">
        <div class="col bg-img">
        </div>
        <div class="col"> 
            <h1 class="text-light fs-1 text-center fst-italic mb-5"> <span class="badge bg-success ">Best Seller</span>&nbsp;<?php echo $bs['nom'] ?></h1>
            <p class="fs-3 text-light text-center px-5">
                <?php echo $bs['description'] ?>.
            </p>
            <p class="card-text fs-3"><em>4 cookies: <?php echo $bs['prix']; ?>€</em></p>

            <form method="post" action="../../controller/loginController.php">
                <div class="row mt-5 align-items-center justify-content-center">
                    <input type="hidden" value="<?php echo $bs['idProduit'] ?>">
                    <div class="col-auto">
                        <span class="fs-5 align-text-bottom">Boîte de </span>
                    </div>
                    <div class="col-auto">
                        <select class="form-select">
                            <option selected value="4">4 cookies</option>
                            <option value="8">8 cookies</option>
                            <option value="16">16 cookies</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary btn-block" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Produits -->
<div class="container">
    <h1 class="text-light fs-1 text-center my-5">Nos Cookies</h1>
    <div class="container-fluid row">
        <?php
            foreach ($products as $p) {
        ?>
        <div class="col-lg-4 mb-3 d-flex align-items-stretch text-center">
            <div class="card" data-aos="flip-up">
                <img src="../../view/img/produits/<?php echo $p['image'] ?>" class="card-img-top" alt="cookie">
                <div class="card-body d-flex flex-column justify-content-end">
                    <h5 class="card-title"><?php echo $p['nom'] ?></h5>
                    <p class="card-text"><em><?php echo $p['description']; ?></em></p>
                    <p class="card-text"><em>4 cookies: <?php echo $p['prix']; ?>€</em></p>

                    <hr/>
                    
                    <form method="post" action="../../controller/loginController.php">
                        <div class="row align-items-center justify-content-center">
                            <input type="hidden" value="<?php echo $p['idProduit'] ?>">
                            <div class="col-auto">
                                <span class="fs-5 align-text-bottom">Boîte de </span>
                            </div>
                            <div class="col-auto">
                                <select class="form-select">
                                    <option selected value="4">4 cookies</option>
                                    <option value="8">8 cookies</option>
                                    <option value="16">16 cookies</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-block" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
            } 
        ?>
    </div>
</div>
<footer class="text-center text-light py-3 fs-5">
    Created by Céline, Dylan and Dim 🍪
</footer>