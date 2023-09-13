$(document).ready(function () {
    function ajaxIzmenaKorpe(objekat, newCart){
        $.ajax({
            url:"../serverskeobrade/izmenakorpe.php",
            method:"post",
            data:objekat,
            success:function(podaci, xhr){
                //alert(podaci);
                localStorage.setItem('proizvodi', JSON.stringify(newCart));
                location.reload();
                // $("#ispis").html("<h3 class='p-t-20'>Uspešno ste se registrovali.</h3>");
                // setTimeout(function() {
                //     window.location.href = "../korisnik/logovanje.php";
                //   }, 2000);
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
                // $("#ispis").html(poruka);
                console.log(poruka);
                
            }
        });
    }
    var idkorisnika=document.getElementById('idkorisnika');
    //console.log(typeOf(idkorisnika));
    if(idkorisnika!==null && idkorisnika!==undefined && idkorisnika!==0){
        console.log("jeste");
        localStorage.setItem('idkorisnika', idkorisnika.value);
    }
    else{
        console.log("nije");
    }
    var idKorpe=document.getElementById('idkorpe');
    if(idKorpe!==null && idKorpe!==undefined && idKorpe!==0){
        localStorage.setItem('idkorpe', idKorpe.value);
    }

    var proizvodi = [];
    var cart = 0;
    $('#proizvodi').on('click', '.block2-btn-addcart', function () {
        console.log("Radi");
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        cart = localStorage.getItem('proizvodi');
        console.log("PRI UCITAVANJU CART JE");
        console.log(cart);
        if (cart == 'null' || cart == undefined) {
            cart = 0;
        }
        else {
            cart = JSON.parse(cart);
            proizvodi = cart;
        }
        console.log($(this));
        let cena = $(this)[0].dataset.cena;
        let putanja = $(this)[0].dataset.putanja;
        let naziv = $(this)[0].dataset.naziv;
        swal(nameProduct, "su dodate u korpu !", "success");
        var el = document.querySelector(".header-icons-noti");
        var num = Number(el.innerHTML);
        el.innerHTML = num + 1;
        let id = $(this)[0].id;
        let proizvod = {
            id: id,
            cena: cena,
            putanja, putanja,
            naziv: naziv
        }
        console.log(proizvod);
        proizvodi.push(proizvod);
        console.log(typeof proizvodi)
        console.log(proizvodi);
        localStorage.setItem('proizvodi', JSON.stringify(proizvodi));
    });

     /*CART ITEM DELETE
    .........................................................................................*/

    var cartImg=document.getElementsByClassName('cart-img-product');
    console.log(cartImg);

    for(let i=0; i<cartImg.length; i++){
        cartImg[i].addEventListener('click', function(event){
            let id=event.target.id;
            let pid=event.target.dataset['pid'];
            let tmp=localStorage.getItem('proizvodi');
            let obj={
                pid:pid,
                kid:id
            };

            console.log(id);
            console.log(pid);
            let newCart=[];
            if(tmp!=undefined && tmp!=null){
                let cart=JSON.parse(tmp);
                for(let j=0; j<cart.length; j++){
                    if(cart[j].id!=pid){
                        newCart.push(cart[j]);
                    }
                }


                console.log("Stara korpa je:");
                console.log(cart);
                console.log("Nova korpa je");
                console.log(newCart);
                localStorage.setItem('proizvodi', JSON.stringify(newCart));

                ////POZVATI AJAX FUNKCIJU DA IZ BAZE PROMENI KORPU

                ajaxIzmenaKorpe(obj, newCart);
                
            }
        });
    }

    $('.js-show-header-dropdown').on('click', 'button', function(event){
        event.preventDefault();
        console.log(event.target);
    });

    

  

});


