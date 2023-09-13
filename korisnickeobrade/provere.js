

/////////////////////////// REGULARNI IZRAZI/////////////////////////////////////
var regIme=/^[A-ZŠĐŽČĆ][a-zšđžčć]{2,15}(\s[A-Zšđžčć][a-zšđžčć])*$/;
var regPrezime=/^[A-ZŠĐŽČĆ][a-zšđžčć]{2,15}(\s[A-Zšđžčć][a-zšđžčć])?$/;
var regEmail=/^[a-zA-Z0-9\.\_]{4,}\@[a-z0-9]{3,}.([a-z]{2,3}){1,2}$/;
var regPas=/^([a-zA-Z0-9@*#\.\_]{8,})$/;


//////////////////////////////////////// PROVERA PODATAKA FORME ZA LOGOVANJE////////////////////////////////////////////////

function ProveraLog(){
///////////////////////////////////HVATANJE PODATAKA////////////////////////////////////
let ispis="<ul class='greske'>";
let nizGreske=[];
let emailLog=$("#emailLog").val();
let passLog=$("#passLog").val();
console.log(emailLog);
console.log(passLog);

if(localStorage.getItem('proizvodi')!=null || localStorage.getItem('proizvodi')!=undefined){
    console.log("TU SAM");
    let proizvodi=localStorage.getItem('proizvodi');
    console.log(proizvodi);
    let hiddenInputs=document.getElementById('hiddenInputs');

    let inputValues=document.createElement('input');
    inputValues.setAttribute('type','hidden');
    inputValues.setAttribute('name', 'cart');
    inputValues.setAttribute('id', 'cart');
    inputValues.setAttribute('value', proizvodi);
    hiddenInputs.appendChild(inputValues);
}

if(emailLog.length==0){
    nizGreske.push("Morate  uneti email adresu.");
}
else if(!regEmail.test(emailLog)){
    nizGreske.push("Email adresa nije u dobrom formatu.");
}

if(passLog.length==0){
    nizGreske.push("Morate  uneti lozinku.");
}
else if(!regPas.test(passLog)){
    nizGreske.push("Lozinka mora imati najmanje 8 karaktera.");
}

if(nizGreske.length!=0){
    for(let i=0; i<nizGreske.length;i++){
        ispis+="<li>"+nizGreske[i]+"</li>";
    }
    ispis+="</ul>";

    $("#greske").html(ispis);
return false;
}
else 
    
        return true;

    

}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

