// --------------------------------------
// ZOOM GLOBAL (como lupa do computador)
// --------------------------------------
let zoom = 1;

function aumentarFonte() {
    zoom += 0.1;
    document.body.style.zoom = zoom;
}

function diminuirFonte() {
    if (zoom > 0.3) {
        zoom -= 0.1;
    }
    document.body.style.zoom = zoom;
}



// --------------------------------------
//   MODO CLARO / MODO ESCURO
// --------------------------------------
let modoClaro = false;

function modoAltoContraste() {
    modoClaro = !modoClaro;

    if (modoClaro) {
        // MODO CLARO
        document.body.style.backgroundColor = "#ffffff";
        document.body.style.color = "#000000";

        document.querySelectorAll("*").forEach(el => {
            if (getComputedStyle(el).color) {
                el.style.color = "#000000";
            }
        });

    } else {
        // MODO ESCURO ORIGINAL
        document.body.style.backgroundColor = "#090909";
        document.body.style.color = "#ffffff";

        document.querySelectorAll("*").forEach(el => {
            el.style.color = "";
        });
    }
}



// --------------------------------------
//   LEITOR DE TEXTO (fala a partir .titli)
// --------------------------------------
let sintetizador = window.speechSynthesis;

function lerTexto() {

    sintetizador.cancel(); // Cancela leitura anterior

    // Procura o texto começando pela classe .titli
    let titulo = document.querySelector(".titli");

    if (!titulo) return; // Se não existir, não fala nada

    // Pega o texto da class titli e depois o resto da página
    let textoTitulo = titulo.innerText.trim();
    let textoCorpo = document.body.innerText.replace(textoTitulo, "").trim();

    // Texto final que será lido
    let textoFinal = textoTitulo + ". " + textoCorpo;

    if (textoFinal.length <= 5) {
        sintetizador.cancel();
        return;
    }

    let fala = new SpeechSynthesisUtterance(textoFinal);
    fala.lang = "pt-BR";
    fala.rate = 1;

    sintetizador.speak(fala);

    // Ao terminar → parar automaticamente
    fala.onend = () => sintetizador.cancel();
}
