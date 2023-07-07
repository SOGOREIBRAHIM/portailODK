<?php



// fonction pour etablir la connexion
function getConnexion(){
    try {
        $bddPDO = new PDO('mysql:host=localhost;dbname=portail', 'root', "");
        $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print 'error!'.$e->getMessage.'<br/>';
        die(); 
    }
}

$bddPDO = new PDO('mysql:host=localhost;dbname=portail', 'root', "");
$sql = "SELECT * FROM promotion";
// fonction pour recuperer tous les user
function getAllsUsers(){
    $con = getConnexion();

    //requete sql de selection des users
    $requete = "SELECT * FROM promotion";

    //execution du requete
    $resultat = $con->query($requete);

    return $resultat;
    
}

// fonction pour recuperer un user
function readUser($id){
    $con = getConnexion();
    $sql = "SELECT * FROM promotion where id = '$id' ";
    $stmt = $con->query($sql);
    $resultat = $stmt->fetch();
    if (!empty($resultat)) {
        return $resultat[0];
    }
}

// fonction pour inserer un user
function createUser($nom, $prenom, $email){
    try {
        $con = getConnexion();
        $sql = "INSERT INTO promotion(nom,prenom,email) VALUES('$nom','$prenom','$email')";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo '$sql'.'<br/>'.$e->getMessage();
    }
}



// fonction pour modifier un user
function updateUser($id, $nom, $prenom, $email){
    try {
        $con = getConnexion();
        $sql = "UPDATE promotion SET 
               nom = '$nom',
               prenom = '$prenom',
               email = '$email',
               WHERE id = '$id' ";
        $stmt = $con->query($sql);
    }  catch (PDOException $e) {
        echo '$sql'.'<br/>'.$e->getMessage();
    }
}

// fonction pour supprimer un user
function deleteUser($id){
    try {
        $con = getConnexion();
        $sql = "DELETE from promotion WHERE id='$id'";
        $stmt = $con->query($sql);  
    } catch (PDOException $e) {
        echo '$sql'.'<br/>'.$e->getMessage();
    }
}

?>