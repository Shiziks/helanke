
(function ($) {
    "use strict";

    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div data-loader="ball-scale"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'html',
        transition: function (url) { window.location.href = url; }
    });

    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height() / 2;

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display', 'flex');
        } else {
            $("#myBtn").css('display', 'none');
        }
    });

    $('#myBtn').on("click", function () {
        $('html, body').animate({ scrollTop: 0 }, 300);
    });


    /*[ Show header dropdown ]
    ===========================================================*/
    $('.js-show-header-dropdown').on('click', function () {
        console.log("Kliknuto");

        $(this).parent().find('.header-dropdown');
        let tmp = localStorage.getItem('proizvodi');
        if (tmp != undefined || tmp != null) {
            var cartData = JSON.parse(tmp);
            // console.log(tmp);
            // console.log("TU SAM");
            var lista = document.getElementById("cartList");
            var btn=document.getElementById('cartBtn');
            var totalPrice=document.getElementById('totalPrice');
            // var price=document.createTextNode('');
            // totalPrice.appendChild(price);
            // console.log(lista);
            var ulliste = document.getElementsByClassName('header-cart-wrapitem');
            //console.log(window.location.href);
            let url=window.location.href;
            let ukupno=0;
            if(url.search('index.php')>-1 || url.search('anketa.php')>-1 || url.search('oautoru.php')>-1){
                for (let i = 0; i < ulliste.length; i++) {
                    ulliste[i].replaceChildren();
                    totalPrice.replaceChildren();
                    for (let j = 0; j < cartData.length; j++) {
                        //console.log(tmp[j]);
                        ukupno+=Number(cartData[j].cena);
                        var listItem = document.createElement('li');
                        listItem.setAttribute('class', 'header-cart-item');
                        var divInLi = document.createElement('div');
                        divInLi.setAttribute('class', "header-cart-item-img");
                        divInLi.setAttribute('id', cartData[j].id);
                        var imgElement = document.createElement('img');
                        imgElement.setAttribute('src', '.'+cartData[j].putanja);
                        imgElement.setAttribute('alt', 'image');
                        divInLi.appendChild(imgElement);
                        var divText=document.createElement('div');
                        divText.setAttribute('class', 'header-cart-item-txt');
                        var aTitle=document.createElement('a');
                        aTitle.setAttribute('class', 'header-cart-item-name');
                        aTitle.setAttribute('href', '#');
                        aTitle.appendChild(document.createTextNode(cartData[j].naziv));
                        let spanCena=document.createElement('span');
                        spanCena.setAttribute('class', 'header-cart-item-info');
                        spanCena.appendChild(document.createTextNode(cartData[j].cena));
                        divText.appendChild(aTitle);
                        divText.appendChild(spanCena);
                        listItem.appendChild(divInLi);
                        listItem.appendChild(divText);
                        ulliste[i].appendChild(listItem);
                    }
                }
                var priceElement=document.createElement('span');
                var price=document.createTextNode('Ukupno: '+ukupno/ulliste.length+' RSD');
                priceElement.appendChild(price);
                totalPrice.appendChild(priceElement);
                btn.replaceChildren();
                let aLink=document.createElement('a');
                aLink.setAttribute('class', 'flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4');
                aLink.setAttribute('id', 'dugmeKorpa');
                aLink.setAttribute('href', './cart/cart.php');
                let btnText=document.createTextNode('Korpa');
                aLink.appendChild(btnText);
                btn.appendChild(aLink);

            }
            else{
                for (let i = 0; i < ulliste.length; i++) {
                    ulliste[i].replaceChildren();
                    totalPrice.replaceChildren();
                    for (let j = 0; j < cartData.length; j++) {
                        //console.log(tmp[j]);
                        ukupno+=Number(cartData[j].cena);
                        var listItem = document.createElement('li');
                        listItem.setAttribute('class', 'header-cart-item');
                        var divInLi = document.createElement('div');
                        divInLi.setAttribute('class', "header-cart-item-img");
                        var imgElement = document.createElement('img');
                        imgElement.setAttribute('src', '..'+cartData[j].putanja);
                        imgElement.setAttribute('alt', 'image');
                        divInLi.appendChild(imgElement);
                        var divText=document.createElement('div');
                        divText.setAttribute('class', 'header-cart-item-txt');
                        var aTitle=document.createElement('a');
                        aTitle.setAttribute('class', 'header-cart-item-name');
                        aTitle.setAttribute('href', '#');
                        aTitle.appendChild(document.createTextNode(cartData[j].naziv));
                        let spanCena=document.createElement('span');
                        spanCena.setAttribute('class', 'header-cart-item-info');
                        spanCena.appendChild(document.createTextNode(cartData[j].cena));
                        divText.appendChild(aTitle);
                        divText.appendChild(spanCena);
                        listItem.appendChild(divInLi);
                        listItem.appendChild(divText);
                        ulliste[i].appendChild(listItem);
                    }
                }
                var priceElement=document.createElement('span');
                var price=document.createTextNode('Ukupno: '+ukupno/ulliste.length+' RSD');
                priceElement.appendChild(price);
                totalPrice.appendChild(priceElement);
                btn.replaceChildren();
                let aLink=document.createElement('a');
                aLink.setAttribute('class', 'flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4');
                aLink.setAttribute('href', '../cart/cart.php');
                let btnText=document.createTextNode('Korpa');
                aLink.appendChild(btnText);
                btn.appendChild(aLink);
            }
        }
    });



    var menu = $('.js-show-header-dropdown');
    var sub_menu_is_showed = -1;

    for (var i = 0; i < menu.length; i++) {
        $(menu[i]).on('click', function () {
            //  console.log("TU SAM 2");
            //  console.log(sub_menu_is_showed);

                var lista = document.getElementById("cartList");
                //console.log(lista);
                var ulliste = document.getElementsByClassName('header-cart-wrapitem');
                //console.log(ulliste);
                //console.log(menu);
                //console.log(this);
                //console.log("****************************************");
                //console.log($(this).parent().find('.header-dropdown'));




            if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
                //console.log("TU SAM 3");
                //console.log(sub_menu_is_showed);
                //console.log(menu);
                //console.log($(this).parent().find('.header-dropdown'));

                $(this).parent().find('.header-dropdown').toggleClass('show-header-dropdown');
                sub_menu_is_showed = -1;
            }
            else {
                for (var i = 0; i < menu.length; i++) {
                    //console.log("TU SAM 4");
                    //console.log($(menu[i]).parent().find('.header-dropdown'));

                    $(menu[i]).parent().find('.header-dropdown').removeClass("show-header-dropdown");
                }
                //console.log("TU SAM 5");
                //console.log($(this).parent().find('.header-dropdown'));
                $(this).parent().find('.header-dropdown').toggleClass('show-header-dropdown');

                sub_menu_is_showed = jQuery.inArray(this, menu);
            }
        });
    }

    $(".js-show-header-dropdown, .header-dropdown").click(function (event) {
        event.stopPropagation();

    });

    $(window).on("click", function () {
        for (var i = 0; i < menu.length; i++) {
            $(menu[i]).parent().find('.header-dropdown').removeClass("show-header-dropdown");
        }
        sub_menu_is_showed = -1;

    });

   


    /*[ Fixed Header ]
   ===========================================================*/
    var posWrapHeader = $('.topbar').height();
    var header = $('.container-menu-header');

    $(window).on('scroll', function () {

        if ($(this).scrollTop() >= posWrapHeader) {
            $('.header1').addClass('fixed-header');
            $(header).css('top', -posWrapHeader);

        }
        else {
            var x = - $(this).scrollTop();
            $(header).css('top', x);
            $('.header1').removeClass('fixed-header');
        }

        if ($(this).scrollTop() >= 200 && $(window).width() > 992) {
            $('.fixed-header2').addClass('show-fixed-header2');
            $('.header2').css('visibility', 'hidden');
            $('.header2').find('.header-dropdown').removeClass("show-header-dropdown");

        }
        else {
            $('.fixed-header2').removeClass('show-fixed-header2');
            $('.header2').css('visibility', 'visible');
            $('.fixed-header2').find('.header-dropdown').removeClass("show-header-dropdown");
        }

    });

    /*[ Show menu mobile ]
    ===========================================================*/
    $('.btn-show-menu-mobile').on('click', function () {
        $(this).toggleClass('is-active');
        $('.wrap-side-menu').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu');

    for (var i = 0; i < arrowMainMenu.length; i++) {
        $(arrowMainMenu[i]).on('click', function () {
            $(this).parent().find('.sub-menu').slideToggle();
            $(this).toggleClass('turn-arrow');
        })
    }

    $(window).resize(function () {
        if ($(window).width() >= 992) {
            if ($('.wrap-side-menu').css('display') == 'block') {
                $('.wrap-side-menu').css('display', 'none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }
            if ($('.sub-menu').css('display') == 'block') {
                $('.sub-menu').css('display', 'none');
                $('.arrow-main-menu').removeClass('turn-arrow');
            }
        }
    });


    /*[ remove top noti ]
    ===========================================================*/
    $('.btn-romove-top-noti').on('click', function () {
        $(this).parent().remove();
    })


    /*[ Block2 button wishlist ]
    ===========================================================*/
    $('.block2-btn-addwishlist').on('click', function (e) {
        e.preventDefault();
        $(this).addClass('block2-btn-towishlist');
        $(this).removeClass('block2-btn-addwishlist');
        $(this).off('click');
    });

    /*[ +/- num product ]
    ===========================================================*/
    $('.btn-num-product-down').on('click', function (e) {
        e.preventDefault();
        var numProduct = Number($(this).next().val());
        if (numProduct > 1) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function (e) {
        e.preventDefault();
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });


    /*[ Show content Product detail ]
    ===========================================================*/
    $('.active-dropdown-content .js-toggle-dropdown-content').toggleClass('show-dropdown-content');
    $('.active-dropdown-content .dropdown-content').slideToggle('fast');

    $('.js-toggle-dropdown-content').on('click', function () {
        $(this).toggleClass('show-dropdown-content');
        $(this).parent().find('.dropdown-content').slideToggle('fast');
    });


    /*[ Play video 01]
    ===========================================================*/
    var srcOld = $('.video-mo-01').children('iframe').attr('src');

    $('[data-target="#modal-video-01"]').on('click', function () {
        $('.video-mo-01').children('iframe')[0].src += "&autoplay=1";

        setTimeout(function () {
            $('.video-mo-01').css('opacity', '1');
        }, 300);
    });

    $('[data-dismiss="modal"]').on('click', function () {
        $('.video-mo-01').children('iframe')[0].src = srcOld;
        $('.video-mo-01').css('opacity', '0');
    });

})(jQuery);