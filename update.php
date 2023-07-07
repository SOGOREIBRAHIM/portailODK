<?php
try {
    $bddPDO = new PDO('mysql:host=localhost;dbname=portail', 'root', "");
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (isset($_POST['modifier'])) {

        // $id = $_POST['id'];

        $matricule = $_POST['matricule'];

        $nom = $_POST['nom'];

        $prenom = $_POST['prenom'];

        $age = $_POST['age'];

        $dateNaissance = $_POST['dateNaissance'];

        $adresseEmail = $_POST['adresseEmail'];

        $telephone = $_POST['telephone'];

        $photo = $_FILES['photo']['name'];

        $promotion = $_POST['promotion'];

        $anneeCertification = $_POST['anneeCertification'];

        

        if (!empty($matricule) && !empty($nom) && !empty($prenom) && !empty($age) && !empty($dateNaissance) && 
        !empty($adresseEmail) && !empty($telephone) && !empty($promotion) 
        && !empty($anneeCertification)) {
            
            $sql = "UPDATE apprenant SET matricule=:matricule, nom=:nom,
            prenom=:prenom, age=:age, dateNaissance=:dateNaissance, adresseEmail=:adresseEmail,
            numeroTel=:telephone,photo=:photo, promotion=:promotion, anneeCertification=:anneeCertification WHERE adresseEmail=:adresseEmail";
            
            $requete = $bddPDO->prepare($sql);

            // $requete->bindParam(':id', $id);

            $requete->bindParam(':matricule', $matricule);

            $requete->bindParam(':nom', $nom);

            $requete->bindParam(':prenom', $prenom);

            $requete->bindParam(':age', $age);

            $requete->bindParam(':dateNaissance', $dateNaissance);

            $requete->bindParam(':adresseEmail', $adresseEmail);

            $requete->bindParam(':telephone', $telephone);
            

            $requete->bindParam(':photo', file_get_contents($_FILES['photo']['tmp_name']));
            
            $requete->bindParam(':promotion', $promotion);

            $requete->bindParam(':anneeCertification', $anneeCertification);

            //move_uploaded_file($_FILES['photo']['tmp_name'], 'imgApprenant/'.basename($_FILES['photo']['name']));
            
            $requete->execute(); 

            header('Location:liste.php');
            exist();

        } else {
            echo "Veuillez remplire tout les champ";
        }

            

    }else{
        echo "ertyuyu";
    }
        





} catch (PDOException $e) {
    echo "erreur ".$e->getMessage();
    die();
    
}

?>