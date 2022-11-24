var participe = document.getElementById("bouton");
var debut= new Date(2023,1,09);
var fin=new Date(2023,2,12);

if(Date.now() < debut){
    participe.disabled = true;
} else{
    if(Date.now() > fin)
    participe.disabled = true;
}

