var uploadField = document.getElementById("photo");

uploadField.onchange = function() {
    if(this.files[0].size > 10){  // environ 10 Mo
       alert("Le fichier est trop volumineux!");
       this.value = "";
    };
};