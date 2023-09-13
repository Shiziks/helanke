$(document).ready(function(){
    //alert("radi");

     /////////////////////////// REGULARNI IZRAZI/////////////////////////////////////
     var regIme=/^[A-ZŠĐŽČĆ][a-zšđžčć]{2,15}(\s[A-Zšđžčć][a-zšđžčć])*$/;
     var regPrezime=/^[A-ZŠĐŽČĆ][a-zšđžčć]{2,15}(\s[A-Zšđžčć][a-zšđžčć])?$/;
     var regEmail=/^[a-zA-Z0-9\.\_]{4,}\@[a-z0-9]{3,}.([a-z]{2,3}){1,2}$/;
     
     //////////////////////////////////////////////////////////////////////////////
    function ajaxUpdate(objekat){
        $.ajax({
            url:"../serverskeobrade/obradaIzmena.php",
            method:"POST",
            data:objekat,
            success:function(podaci, xhr){
                //alert(podaci);
                //console.log(podaci);
                $("#greske").html("<p> Uspešno ste se proemnili podatke. </p>");
                },
            error: function(xhr,status,error){
                var poruka="Došlo je do greške.";
                switch(xhr.status){
                    case 404:
                    poruka="Stranica nije pronađena";
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

    ////////////////////////////////////////PROVERA PODATAKA FORME ZA IZMENU KLIJENTSKIH PODATAKA///////////////////////
    $("#btnSubmit").click(function(){
        ///////////////////////HVATANJE PODATAKA///////////////////////
        var ispis="<ul class='greske'>";
        var nizGreske=[];
        var id=$("#id").val();
        var ime=$("#ime").val();
        var prezime=$("#prezime").val();
        var email=$("#email").val();
        var ddl=$("#grad").val();
        var idUloga=$("#uloga").val();
        //console.log(email);
        //console.log(id);

        //////////////////////PROVERA PODATAKA ///////////////////////////

        if(ime.length==0){
            nizGreske.push("Morate uneti ime.");
        }
        else if(!regIme.test(ime)){
            nizGreske.push("Ime nije u dobrom formatu.");
        }

        if(prezime.length==0){
            nizGreske.push("Morate  uneti prezime.");
        }
        else if(!regPrezime.test(prezime)){
            nizGreske.push("Prezime nije u dobrom formatu.");
        }

        if(email.length==0){
            nizGreske.push("Morate  uneti email adresu.");
        }
        else if(!regEmail.test(email)){
            nizGreske.push("Email adresa nije u dobrom formatu.");
        }
        if(ddl==0){
            nizGreske.push("Morate izabrati grad.");
        }


    if(nizGreske.length!=0){
        for(let i=0; i<nizGreske.length;i++){
            ispis+="<li>"+nizGreske[i]+"</li>";
        }
        ispis+="</ul>";

        $("#greske").html(ispis);
       
    }
        else {
/////////////////////////////////POZIVANJE AJAXA ZA UPIS U BAZU/////////////////////////////
                ispis="";
                $("#greske").html(ispis);
                var objekat={
                id: id,
                ime:ime,
                prezime:prezime,
                email:email,
                grad:ddl,
                idUloga: idUloga
                        };
                console.log(objekat);
               ajaxUpdate(objekat);



     }


    
});
////////////////////////////////////////////////////////////////////////////////////////

});