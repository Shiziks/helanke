
var bP=localStorage.getItem('proizvodi');
if(bP=="null" || bP==undefined){
    bP=0
}
else{
    let bpJ=JSON.parse(bP);
    bP=bpJ.length;
}
console.log("UCITALO SE I POSTOJI");
console.log(bP);
let cartIcon=document.querySelector('.header-icons-noti');
console.log("ELEMENT JE");
console.log(cartIcon);
cartIcon.innerHTML=bP;
