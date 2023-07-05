<?php
try {
    $bddPDO = new PDO('mysql:host=localhost;dbname=portail', 'root', "");
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['ajouter'])) {

        $matriule = $_POST['matricule'];

        $nom = $_POST['nom'];

        $prenom = $_POST['prenom'];

        $age = $_POST['age'];

        $dateNaissance = $_POST['dateNaissance'];

        $email = $_POST['email'];

        $telephone = $_POST['telephone'];

        $photo = $_FILES['photo']['name'];

        $promotion = $_POST['promotion'];

        $annee = $_POST['annee'];

        if (!empty($nom) && !empty($prenom) && !empty($age) && !empty($dateNaissance) && 
        !empty($email) && !empty($telephone) && !empty($promotion) 
        && !empty($annee)) {
            
            $requete = $bddPDO->prepare("INSERT INTO apprenant(matricule, nom, prenom, age, dateNaissance, adresseEmail, numeroTel, photo, promotion, anneeCertification)
            VALUES (:matricule, :nom,:prenom,:age,:dateNaissance,:adresseEmail,:numeroTel,:photo,:promotion,:anneeCertification)");


            $requete->bindParam(':matricule', $matriule);

            $requete->bindParam(':nom', $nom);

            $requete->bindParam(':prenom', $prenom);

            $requete->bindParam(':age', $age);

            $requete->bindParam(':dateNaissance', $dateNaissance);

            $requete->bindParam(':adresseEmail', $email);

            $requete->bindParam(':numeroTel', $telephone);

            $requete->bindParam(':photo', file_get_contents($_FILES['photo']['tmp_name']));
            
            $requete->bindParam(':promotion', $promotion);

            $requete->bindParam(':anneeCertification', $annee);

            //move_uploaded_file($_FILES['photo']['tmp_name'], 'imgApprenant/'.basename($_FILES['photo']['name']));

            $requete->execute();        
            

    } else {

        echo "Veuillez remplire tout les champ";

    }

}

header('Location:liste.php');
exist();

} catch (PDOException $e) {
    echo "erreur ".$e->getMessage();
    die();
    
}

?>