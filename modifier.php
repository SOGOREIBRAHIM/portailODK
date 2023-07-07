<!DOCTYPE html>
<html lang="en">
    <?php 
    
    $bddPDO = new PDO('mysql:host=localhost;dbname=portail', 'root', "");
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_REQUEST['id'];

    $prepareStatement = $bddPDO->prepare("SELECT * FROM apprenant WHERE id=$id ");
    $reponseIsOK = $prepareStatement ->execute();
    $apprenant = $prepareStatement->fetchAll(); 
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleInscription.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="inscrisption.js" defer></script>
    <title>Orange Digital Kalanso</title>
</head>
<body>
    <!-- dabut du menu -->
    <header>
        <div class="container">
            <nav>
                <a href="index.html"><img class="img" src="img/1.png" alt="logo" width="100px" height="90px"></a>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="inscription.html">Nouveau</a></li>
                    <li><a href="liste.php">Liste</a></li>
                    <li class="connexion"><a class="navbtn" href="#">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
     <!-- fin du menu -->

     <!-- debut du section 1 -->
     <section>
     <?php foreach($apprenant as $app) :?>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">Modifier un apprenant</div>
                <div class="card-body">
                    <form class="form_inner" action="update.php" method="POST" enctype="multipart/form-data">
                        <div class="line_form">
                            <div class="form_block">
                                <input class="form_input" id="nom" type="text" name="nom" value="<?= $app['nom'] ?>" required>
                                <p class="name"></p>
                            </div>
                            <div class="form_block">
                                <input class="form_input" id="prenom" type="text" name="prenom" value="<?= $app['prenom'] ?>" required>
                                <p class="lastname"></p>
                            </div>
                        </div>
                        <div class="line_form">
                            <div class="form_block">
                                <input class="form_input" id="age" type="number" name="age" pattern="[0-9]{2}" value="<?= $app['age'] ?>"  required>
                                <p class="age"></p>
                            </div>
                            <div class="form_block">
                                <input class="form_input" id="email" type="email" name="adresseEmail" value="<?= $app['adresseEmail'] ?>" required>
                            </div>
                        </div>
                        <div class="line_form">
                            <div class="form_block">
                                <input class="form_input" id="dateNaissance" type="date" name="dateNaissance" value="<?= $app['dateNaissance'] ?>" required>
                            </div>
                            <div class="form_block">
                                <input class="form_input" id="promotion" type="text" name="promotion" value="<?= $app['promotion'] ?>"  required>
                            </div>
                        </div>
                        <div class="line_form">
                            <div class="form_block">
                                <input class="form_input" type="tel" id="phone" name="telephone" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}"value="<?= $app['numeroTel'] ?>"  required>
                            </div>
                            <div class="form_block">
                                <input class="form_input" id="annee" type="text" name="anneeCertification" value="<?= $app['anneeCertification'] ?>" value="<?= $app['anneeCertification'] ?>" required>
                            </div>
                        </div>
                        <div class="line_form">
                            <div class="form_block">
                                <input class="form_input" id="matricule" type="text" name="matricule" pattern="^P[0-9]$" value="<?= $app['matricule'] ?>" required>
                            </div>
                            <div class="form_block">
                            <div class="col-md-3 my-5">
                          </div>
                                <input class="form_file" id="photo" type="file" name="photo" value="<?php echo base64_encode($app['photo']); ?>">
                            </div>
                        </div>
                        <div class="line_form">
                            <input class="form_btn" type="submit" value="Enregistrer" name="modifier"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
     </section>
    
    <section>
        <div class="contour">
        </div>
    </section>

</body>
</html>