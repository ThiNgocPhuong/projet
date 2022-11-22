var uploadField = document.getElementById("file");

uploadField.onchange = function() {
    if(this.files[0].size > 9437184){  // environ 10 Mo
       alert("Le fichier est trop volumineux!");
       this.value = "";
    };
};
