 
$("#sort").change(function(){
    var vrednost=$("#sort").val();
    //alert(vrednost);
    var objekat={
        vrednost:vrednost
         };
 
    function ajaxSort(obj){
        $.ajax({
        url:"../prodavnica/sort.php",
        method:"POST",
        data:obj,
        success:function(podaci, xhr){
            //alert(podaci);
            $("#proizvodi").html(podaci);
        }
                 
        //},
             // error: function(xhr,status,error){
             //     var poruka="Došlo je do greške.";
             //     switch(xhr.status){
             //         case 404:
             //         poruka="Stranica nije pronađena";
             //         break;
             //         case 409:
             //         poruka="Email adresa već postoji u bazi";
             //         break;
             //         case 422:
             //         poruka="Podaci nisu validni";
             //         break;
             //         case 500:
             //         poruka="Greška";
             //         break;
             //     }
             //     $("#proizvodi").html(poruka);
                 
             //}
        });
         
 
    }

    ajaxSort(objekat);
 
});