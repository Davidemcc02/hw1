

/*
Crea un carosello lista di immagini
Utilizza un array di percorsi delle immagini e tiene traccia dell'indice corrente dell'immagine visualizzata. 
La funzione carosel_switch(event, advance) gestisce il cambio di immagine quando si clicca sulle frecce destre o sinistre.
*/ 

const CAROSEL_IMAGES = ["img/IMG_1.PNG", "img/IMG_2.PNG", "img/IMG_3.PNG"]
let CAROSEL_INDEX = 0;

function carosel_switch(event, advance) {
    CAROSEL_INDEX = CAROSEL_INDEX + (advance ? 1 : -1)
    let index = Math.abs(CAROSEL_INDEX) % CAROSEL_IMAGES.length
    document.getElementById("displayed-img").src = CAROSEL_IMAGES[index];
}

// Chiamata alla funzione per far scorrere le immagini una volta che il documento è stato caricato
window.addEventListener('load', function () {
    console.log("test");

    const arrow_r = document.getElementById("arrow-right");
    const arrow_l = document.getElementById("arrow-left");
    console.log(arrow_l, arrow_r);
    arrow_r.addEventListener("click", (e) => carosel_switch(e, false));
    arrow_l.addEventListener("click", (e) => carosel_switch(e, true));
});

//Mostra e nascolde le categorie in base quante volte viene cliccato il tasto

function showhideCategories() {
    var sectionShow = document.getElementById("hide-container");
    var sectionHidden = document.getElementById("show-container");

    if (sectionShow.classList.contains("hidden")) {
        sectionShow.classList.remove("hidden");
        sectionHidden.classList.add("hidden");
    } else {
        sectionShow.classList.add("hidden");
        sectionHidden.classList.remove("hidden");
    }
}
const apiKey = '423646880590-egpckrb0rdlto68eg7j3ol03bkplihn4.apps.googleusercontent.com'; //Chiave api google
const videoId = 'PPlwlmwitdw'; //ID del video

let player; //variabile per inzializzare il player del video


function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '400',
        width: '800',
        videoId: videoId,
                                //dimensione e configugazione video
        events: {
            onReady: autoplayer,
        },
    });
}


function autoplayer(event) {
    event.target.playVideo(); //per avviare il video
}


//settaggio coordinate GoogleMaps

window.addEventListener('load', function () {
    var pos = { lat:37.5070068, lng:15.0856844};
    var map = new google.maps.Map(document.getElementById('map'), { zoom: 20, center: pos });
    var marker = new google.maps.Marker({ position: pos, map: map, title:'DmFixIt'});
});



