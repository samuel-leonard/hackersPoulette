/* let formulaire = document.getElementById('demande');
	
let nom = document.getElementById('nom');

let nomName = document.demande.nom;
    
    
    function checkNom(){
        nom.innerHTML = nomName.value;
    } */


    let regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    let nom = document.getElementById('nom');
    let prenom = document.getElementById('prenom');
    let message = document.getElementById('textarea');
    let email = document.getElementById('email');


function verifierFormulaire() {
let valid = 1;
let msg = "";

let formulaire = document.getElementById('contact-form');






if(nom.value.length < 1 || prenom.value.length < 1) {
msg = "Vous devez donner votre nom et prénom !\n";
valid = 0; 	}

if(!regex.test(email.value))
    {
        msg = msg + "Vous devez ecrire un mail valide!\n";
    }

if(message.value.length < 1)
{
msg = msg + "Vous devez donner ecrire un message !\n";
valid = 0; 	}


//Le formulaire est-il validé ?
if(valid == 1)
{
formulaire.submit(); //on l'envoie
return true;
}
else
{
alert(msg);
return false;
}
}


function verifMail() 	{    
    if(!regex.test(email.value))
    {
        surligne(email, true);
        
    }
    else
    {
        surligne(email, false);
        
    }
}
function surligne(champ, erreur)
{
    if(erreur){
        champ.style.borderWidth = "thick";
        champ.style.borderColor = "red";
    }
    else
        champ.style.borderColor = "green";
        champ.style.borderWidth = "thick";
}


/* let regexNom = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/; */
let regexNom = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;

/* let regexNom = /^([A-Z]|[a-z])[a-z]*(_)?[a-z]+$/; */

/* Function Verif Prenom */
function verifPrenom() 	{    
    if(!regexNom.test(prenom.value))
    {
        surlignePrenom(prenom, true); 
    }
    else
    {
        surlignePrenom(prenom, false); 
    }
}
function surlignePrenom(champ, erreur)
{
    if(erreur){
        champ.style.borderWidth = "thick";
        champ.style.borderColor = "#ff0000";
    }
    else
        champ.style.borderColor = "green";
        champ.style.borderWidth = "thick";
}
/* Function Verif Nom */
function verifNom() 	{    
    if(!regexNom.test(nom.value))
    {
        surligneNom(nom, true); 
    }
    else
    {
        surligneNom(nom, false); 
    }
}
function surligneNom(champ, erreur)
{
    if(erreur){
        champ.style.borderWidth = "thick";
        champ.style.borderColor = "#ff0000";
    }
    else
        champ.style.borderColor = "green";
        champ.style.borderWidth = "thick";
}

/* Function Verif Message */
function verifMessage() 	{    
    if(!regexNom.test(message.value))
    {
        surligneNom(message, true); 
    }
    else
    {
        surligneNom(message, false); 
    }
}
function surligneNom(champ, erreur)
{
    if(erreur){
        champ.style.borderWidth = "thick";
        champ.style.borderColor = "#ff0000";
    }
    else
        champ.style.borderColor = "green";
        champ.style.borderWidth = "thick";
}