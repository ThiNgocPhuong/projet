var participe = document.getElementById("bouton");
var debut= new Date(2023,1,09);
var fin=new Date(2023,2,12);
var test=new Date(2023,1,12);
//Date.now()
if(test < debut){
    participe.disabled = true;
} else{
    if(test > fin)
    participe.disabled = true;

}

