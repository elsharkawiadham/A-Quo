var n_img2 = 5;
var corrente = 1;

function succ2(){
    corrente++;
    if(corrente > n_img2){
        corrente = 1;
    }
  
    for(var i = n_img2; i > 0; i--){
        document.querySelector("#img_slider2 img:nth-child(" + i + ")").style.display = "none";
    }
    document.querySelector("#img_slider2 img:nth-child(" + corrente + ")").style.display = "block";
}

function prec2(){
    corrente--;
    if(corrente == 0){
        corrente = n_img2;
    }
  
    for(var i = n_img2; i > 0; i--){
        document.querySelector("#img_slider2 img:nth-child(" + i + ")").style.display = "none";
    }
    document.querySelector("#img_slider2 img:nth-child(" + corrente + ")").style.display = "block";
}
setInterval(prec2, 10000);


/*funzione per le categorie*/ 
var n_img = 3;
var corrente = 1;
var n_p = 3;
var attuale= 1;
function prec(){
    corrente--;
    attuale--;
    if(corrente == 0 && attuale == 00 ){
        corrente = n_img;
        attuale= n_p;
    }
  
    for(var i = n_img; i > 0; i--){
        document.querySelector("#img_slider img:nth-child(" + i + ")").style.display = "none";
        document.querySelector("#paragrafo p:nth-child(" + i + ")").style.display = "none";
    }
    document.querySelector("#img_slider img:nth-child(" + corrente + ")").style.display = "block";
    document.querySelector("#paragrafo p:nth-child(" + corrente + ")").style.display = "block";	
}

function succ(){
    corrente++;
	attuale++;
    if(corrente > n_img && attuale> n_p){
        corrente = 1;
		attuale= 1;
    }
	
    for( var i = n_img; i > 0; i--){
		
        document.querySelector("#img_slider img:nth-child(" + i + ")").style.display = "none";
		document.querySelector("#paragrafo p:nth-child(" + i + ")").style.display = "none";
		
    }
    document.querySelector("#img_slider img:nth-child(" + corrente + ")").style.display = "block";	
	document.querySelector("#paragrafo p:nth-child(" + corrente + ")").style.display = "block";	
	
	
}



