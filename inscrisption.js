// Recuperation des donnees \ getElementById permet de selectionner id
var nom = document.getElementById('nom') ;
var prenom = document.getElementById('prenom') ;
var age = document.getElementById('age') ;
var promotion = document.getElementById('promotion') ;
var telephone = document.getElementById('telephone') ;
var annee = document.getElementById('annee') ;

// ajouter les evenement
nom.addEventListener('change', verifiernom);
prenom.addEventListener('change', verifierprenom);
age.addEventListener('change', verifierAge);
promotion.addEventListener('change', verifierPromo);
telephone.addEventListener('change', verifierTel);
annee.addEventListener('change', verifierAnnee);


// Definition de fonction verifier pour nom
function verifiernom(evenement){

    // permet de recuperer la donnee
    let name = evenement.target.value;

    // permet de valider les donnees saisi 
    let regExp = new RegExp("^[a-zA-Z]{1,15}$");

    // permet de tester si l'expression est faux
    if (!regExp.test(name)) {

        // permet de selectionner la classe du msg erreur dans paragraphe
        let name = document.querySelector('.name');

        // permet de stocker le msg dans name
        name.textContent='Entrez une chaine de caractere';
        
    }else{
        name.textContent="";
    }
}

function verifierprenom(evenement) {
    let name = evenement.target.value;
    let regExp = new RegExp("^[a-zA-Z]{1,15}$");
    if (!regExp.test(name)){
        let lastname = document.querySelector('.lastname');
        lastname.textContent='Entrez une chaine de caractere';
    }else{
        lastname.textContent="";
    }

}

// Definition de fonction verifier pour nom
function verifierAge(evenement) {
    let age = evenement.target.value;
    if (age<18) {
        let ageApprenant = document.querySelector('.age');
        ageApprenant.textContent='Veuillez entrer un age superieur a 18 ans'; 
    }
    else{
        ageApprenant.textContent="";
    }
}
