<!DOCTYPE html>
<html lang="en">
<head>

    <?php 
    $bddPDO = new PDO('mysql:host=localhost;dbname=portail', 'root', "");
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $prepareStatement = $bddPDO->prepare("SELECT * FROM apprenant");
    $prepareStatement ->execute();
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
        <div class="line_form">
            <p class="liste">Liste des apprenants ODK <a href="inscription.html"><img width="60" height="60" src="https://img.icons8.com/ios-filled/50/FD7E14/plus-key.png" alt="plus-key"/></a> </p>
        </div>
    </section>
    <section>
    <div class="container">
        <div class="row">
        <?php foreach($apprenant as $app) :?>
            <div class="col-md-3 my-5">
                <div class="card w-100">
                    <div class="card-body">  
                        <img style="border-radius:5%; margin-left: 10px;" src="data:image/jpg;charset=utf8;base64, 
                        <?php echo base64_encode($app['photo']); ?>" width="250px" height="250px" />
                        <h5 class="nom">Nom : <?= $app['nom'] ?> </h5>   
                        <h5 class="prenom">Prenom  : <?= $app['prenom'] ?> </h5> 
                        <h5 class="details"> <?php echo "<a href=voirPlus.php?id=".$app['id'].">" ?>Voir plus 
                        </a> <?php echo "<a href=details.php?id=".$app['id'].">" ?><img class="img-view" width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/FD7E14/visible--v1.png" alt="visible--v1"/></a> </h5> 
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
    </section>
    <section>
        <div>
            <div class="card-footer"></div>
        </div>
    </section>
</body>
</html>