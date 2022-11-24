<section class="h-custom container-fluid" style="background-color: #b38c5d; padding-top: 100px; height: 100%;">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col">
            <div class="card  card-cmd">
            <div class="card-body p-4">

                <div class="row">

                <div class="col-lg-7">
                    <h5 class="mb-3">
                        <a href="../../index.php" class="link-custom text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        &nbsp;
                        Oups... j'ai encore faim</a>
                    </h5>
                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <p class="mb-1 fs-5">Panier</p>
                    </div>
                    </div>

                    <?php
                        foreach ($panier as $p) {
                    ?>
                    <div class="card shadow mb-3">
                        <div class="card-body card-body-panier">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="ms-3">
                                        <h5><?php echo $p['nom']?></h5>
                                        <p class="small mb-0">Boite de <?php echo $p['boite']?> cookies.</p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <div style="width: 50px;">
                                        <h5 class="fw-normal mb-0">x<?php echo $p['quantite']?></h5>
                                    </div>
                                    <div style="width: 80px;">
                                        <h5 class="mb-0"><?php echo $p['total']?>€</h5>
                                    </div>
                                    <a href="#!" style="color: black;" class="link-trash">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        } 
                    ?>       

                </div>
                <div class="col-lg-5">
                    <div class="card bg-teal text-white rounded-3">
                        <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">Votre carte bancaire</h5>
                        </div>

                        <form class="mt-4" method="post" action="../../controller/addCommandes.php" >
                            <div class="form-outline form-white mb-4">
                                <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                placeholder="Titulaire" />
                                <label class="form-label" for="typeName">Titulaire</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                <label class="form-label" for="typeText">Numéro de carte</label>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline form-white">
                                        <input type="text" id="typeExp" class="form-control form-control-lg"
                                        placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                                        <label class="form-label" for="typeExp">Date d'expiration</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline form-white">
                                        <input type="password" id="typeText" class="form-control form-control-lg"
                                        placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                        <label class="form-label" for="typeText">Cryptogramme</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="montant" value="<?php echo $total?>">

                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-4">
                            <p class="mb-2">Total</p>
                            <p class="mb-2"><?php echo $total?>€</p>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary-cmd btn-block btn-lg">
                                    <span>Commander</span>
                            </button>
                        </div>
                        </form>

                    </div>
                    </div>
                </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>