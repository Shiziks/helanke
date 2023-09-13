function ajaxKorpa(objekat){
    $.ajax({
        url:"../serverskeobrade/korpa.php",
        method:"POST",
        data:{data:objekat},
        success:function(podaci, xhr){
            //alert(podaci);
            console.log(JSON.parse(podaci));
            if(podaci!=null && podaci!=undefined){
                localStorage.setItem('proizvodi', podaci);
                idKorpeTmp=JSON.parse(podaci);
                idKorpe=idKorpeTmp[0].idkorpa;
                console.log(idKorpe);
                localStorage.setItem('idkorpe', idKorpe);
            }
            
        }});
}
var tmpCart=localStorage.getItem('proizvodi');
var tmpIdkorisnika=localStorage.getItem('idkorisnika');
var tmpIdkorpe=localStorage.getItem('idkorpe');

if(tmpIdkorisnika!=null && tmpIdkorisnika!=undefined && tmpIdkorisnika!=0 && tmpIdkorisnika!='null'){
    if(tmpCart!=null && tmpCart!=undefined && tmpCart!="null" && tmpCart!=''){
        cartLocalStorage=JSON.parse(tmpCart);
        if(tmpIdkorpe!=null && tmpIdkorpe!=undefined && tmpIdkorpe!='' && tmpIdkorisnika!='null'){
            idCart=JSON.parse(tmpIdkorpe);
        }
        else{
            idCart=0;
        }
        var obj=[];
        for(let i=0; i<cartLocalStorage.length; i++){
            obj.push({
                pid:cartLocalStorage[i].id,
                kid:idCart,
                kolicina:1,
                idkorisnika:tmpIdkorisnika
    
            }); 
        }
        console.log("Objekat je");
        console.log(obj);
        obj=JSON.stringify(obj);
        ajaxKorpa(obj);
    }
    else{
        obj=[];
        if(tmpIdkorpe!=null && tmpIdkorpe!=undefined && tmpIdkorpe!='' && tmpIdkorisnika!='null'){
            idCart=JSON.parse(tmpIdkorpe);
            obj.push({
                pid:0,
                kid:idCart,
                kolicina:1,
                idkorisnika:tmpIdkorisnika
            });
        }
        else{
            obj=[];
            idCart=0;
            obj.push({
                pid:0,
                kid:idCart,
                kolicina:1,
                idkorisnika:tmpIdkorisnika
            });
        }
        obj=JSON.stringify(obj);
        ajaxKorpa(obj);
        ///DOVUCI KORPU IZ BAZE
        
    }
}
else{
    console.log("DOSAO SAM TU");
    window.location.replace("../korisnik/logout.php");
}
