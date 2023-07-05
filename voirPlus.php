<!DOCTYPE html>
<html lang="en">
<head>

    <?php 
    $bddPDO = new PDO('mysql:host=localhost;dbname=portail', 'root', "");
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_REQUEST['id'];

    $prepareStatement = $bddPDO->prepare("SELECT * FROM apprenant WHERE id=$id ");
    $reponseIsOK = $prepareStatement ->execute();
    $apprenant = $prepareStatement->fetchAll();
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleList.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Orange Digital Kalanso</title>
</head>
<body>
    <header>
        <div class="container">
            <nav>
            <a href="index.html"><img class="img" src="img/1.png" alt="logo" width="100px" height="90px"></a>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="inscription.html">Nouveau</a></li>
                    <li class="connexion"><a class="navbtn" href="#">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section>
    <?php foreach($apprenant as $app) :?>
        <div class="line_form">
            <p class="liste">Details de  <?= $app['nom'] ?> <a href="inscription.html"><img width="60" height="60" src="https://img.icons8.com/ios-filled/50/FD7E14/plus-key.png" alt="plus-key"/></a> </p>
        </div>
    </section>
    <section>
    <div class="container">
        <div class="row">
            <div class="line_form">
                <div class="col-md-3 my-5">
                    <img style="border-radius:5%; margin-left: 10px;" src="data:image/jpg;charset=utf8;base64, 
                    <?php echo base64_encode($app['photo']); ?>" width="450px" height="500px" />
                </div>
                <div class="text-body">
                    <h5 class="text"><span>Matricule  :</span> <?= $app['matricule'] ?> </h5>
                    <h5 class="text"> <span>Nom :</span> <?= $app['nom'] ?> </h5>   
                    <h5 class="text"> <span>Prenom  :</span> <?= $app['prenom'] ?> </h5> 
                    <h5 class="text"> <span>Age  :</span> <?= $app['age'] ?> </h5> 
                    <h5 class="text"> <span>Email  :</span> <?= $app['adresseEmail'] ?> </h5>
                    <h5 class="text"> <span>Date de naissance  :</span> <?= $app['dateNaissance'] ?> </h5> 
                    <h5 class="text"> <span>Telephone  :</span> <?= $app['numeroTel'] ?> </h5>
                    <h5 class="text"> <span>Promotion  :</span> <?= $app['promotion'] ?> </h5>
                    <h5 class="text"><span>Annee de Certification  :</span> <?= $app['anneeCertification'] ?> </h5>
                </div>  
            </div>
            <div class="line_form">
                <a class="icon" href="#"><img width="60" height="60" src="https://img.icons8.com/ios-glyphs/30/FD7E14/filled-trash.png" alt="filled-trash"/></a>
                <a class="icon" href="#"><img width="60" height="60" src="https://img.icons8.com/glyph-neue/64/FD7E14/edit--v1.png" alt="edit--v1"/></a>
            </div> 
        </div>
    </div>
    <?php endforeach; ?>
    </section>
    <section>
        <div>
            <div class="card-footer"></div>
        </div>
    </section>
</body>
</html>