$(document).ready(function(){
////////////////////////////////////////////REGULARNI IZRAZI/////////////////////////////////////////////
var regPas=/^([a-zA-Z0-9@*#\.\_]{8,})$/;



//////////////////////////////////////////////AJAX FUNKCIJA////////////////////////////////////////////
function ajaxIzmenaLozinke(objekat){
    $.ajax({
        url:"../serverskeobrade/obradaIzmeneLozinke.php",
        method:"POST",
        data:objekat,
        success:function(podaci,xhr){
            $("#greske").html("<p>Uspešno ste promenili lozinku.</p>");
        
        },
        error: function(xhr,status,error){
            var poruka="Došlo je do greške.";
            switch(xhr.status){
                case 404:
                poruka="Stranica nije pronađena";
                break;
                case 409:
                poruka="Email adresa već postoji u bazi";
                break;
                case 422:
                poruka="Podaci nisu validni";
                break;
                case 500:
                poruka="Greška";
                break;
            }
            $("#greske").html(poruka);
        }



    });
}

//////////////////////////////////////////DOGADJAJ NA KLIK//////////////////////////////////////////////
$("#btnSubmit").click(function(){
    //alert("radi");
//////////////////////////////////////////HVATANJE PODATAKA////////////////////////////////////////////
var greske=[];
var id=$("#id").val();
var pas=$('#pas').val();
var pas1=$("#pas1").val();
//console.log(pas);
//console.log(pas1);

///////////////////////////////////////PROVERA PODATAKA///////////////////////////////////////////////
if(pas.length==0){
    greske.push("Morate uneti lozinku.");
}
else if(!regPas.test(pas)){
    greske.push("Lozinka nije u dobrom formatu.");
}

if(pas!=pas1){
    greske.push("Lozinke moraju biti iste");
}
/////////////////////////////////////AKO POSTOJE GRESKE PRILIKOM UNOSA PODATAKA//////////////////////////////////////
if(greske.length!=0){
    var ispis="<ul class='greske'>";
    for(let i=0; i<greske.length;i++){
        ispis+="<li>"+greske[i]+"</li>";
    }
    ispis+="</ul>";
    $("#greske").html(ispis);
}
//////////////////////////////////AKO NEMA GRESAKA UPIS NOVE LOZINKE U OBJEKAT I POZIV AJAXA////////////////////////
else{
    var objekat={
        id: id,
        pas:pas
    };
    //console.log(objekat);
    ajaxIzmenaLozinke(objekat);

}





});










});