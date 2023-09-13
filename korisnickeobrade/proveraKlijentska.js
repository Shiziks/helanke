
/////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
    //alert("radi");

    /////////////////////////// REGULARNI IZRAZI/////////////////////////////////////
    var regIme=/^[A-ZŠĐŽČĆ][a-zšđžčć]{1,15}(\s[A-Zšđžčć][a-zšđžčć])*$/;
    var regPrezime=/^[A-ZŠĐŽČĆ][a-zšđžčć]{2,15}(\s[A-Zšđžčć][a-zšđžčć])?$/;
    var regEmail=/^[a-zA-Z0-9\.\_]{4,}\@[a-z0-9]{3,}.([a-z]{2,3}){1,2}$/;
    var regPas=/^([a-zA-Z0-9@*#\.\_]{8,})$/;

    //////////////////////// POZOVI AJAX ZA REGISTRACIJU////////////////////////////////////
    function ajaxRegistracija(objekat){
        $.ajax({
            url:"../serverskeobrade/obrada.php",
            method:"post",
            data:objekat,
            success:function(podaci, xhr){
                //alert(podaci);
                console.log(podaci);
                $("#ispis").html("<h3 class='p-t-20'>Uspešno ste se registrovali.</h3>");
                setTimeout(function() {
                    window.location.href = "../korisnik/logovanje.php";
                  }, 2000);
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
                $("#ispis").html(poruka);
                
            }
        });

    }
    ////////////////////// PROVERA PODATAKA FORME ZA REGISTRACIJU///////////////////////////////////////
$("#btnSubmit").click(function(){
    //alert("radi!");

    let nizGreske=[];
    let ispis="<ul class='greske'>";
    
    /////////////////////// HVATANJE PODATAKA///////////////////////////////////////
    let ime=$('#ime').val();
    let prezime=$("#prezime").val();
    let email=$("#email").val();
    let pas=$("#password").val();
    let pas1=$("#password1").val();
    let ddl=$('#grad option:selected').val();
    //console.log(ddl);
    //console.log(ime);
    //console.log(email);
    //console.log(pas);
    //console.log(pas1);

    /////////////////////////////////PROVERA//////////////////////////////////////////
    if(ime.length==0){
        nizGreske.push("Morate  uneti ime.");
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


    if(pas.length==0){
        nizGreske.push("Morate  uneti lozinku.");
    }
    else if(!regPas.test(pas)){
        nizGreske.push("Lozinka mora imati najmanje 8 karaktera.");
    }

    if(pas1.length==0){
        nizGreske.push("Morate ponovo uneti lozinku.");
    }
    else if(pas!=pas1){
        nizGreske.push("Lozinke moraju biti iste.");
    }
    
    //////////////////////////////////////////DDL/////////////////////////////////////////////
    if(ddl==0){
        nizGreske.push("Morate izabrati grad.");
    }

    //console.log(nizGreske);

    ///////////////////////////////// ISPIS GRESAKA /////////////////////////////////////////
        if(nizGreske.length!=0){
        for(let i=0; i<nizGreske.length;i++){
            ispis+="<li>"+nizGreske[i]+"</li>";
        }
        ispis+="</ul>";
        $("#greske").html(ispis);
    
        }

        else{

            ispis="";
            $("#greske").html(ispis);
            var objekat={
            ime:ime,
            prezime:prezime,
            email:email,
            password:pas,
            password1:pas1,
            grad:ddl
                    };
            //console.log(objekat);
            ajaxRegistracija(objekat);

           

        }
    });
    
    
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

});