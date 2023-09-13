$( document ).ready(function(){
$("#posalji").click(function(){
    let nizGreske=[];
    let regEmail=/^[\w]+(\w\.\_\-)*\@[\w]+(\.[\w]+)?(\.[a-z]{2,3})$/;
    let email=$('#email1').val();

    if(email.length==0){
        nizGreske.push("Niste uneli email adresu");
    }
    else if(!regEmail.test(email)){
        nizGreske.push("Email nije u dobrom formatu.");
    }
    else

    /////////////// Ovde pozivamo ajax////////////////////////////
    console.log(nizGreske);
})


});