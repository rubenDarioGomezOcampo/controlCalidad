window.onload = iniciar();



function iniciar() {
    var botonPesoDolar = document.getElementById('botonPesoDolar');
    botonPesoDolar.addEventListener("click", calculoPesoDolar);

}

function calculoPesoDolar() {
    const dolar = 4507.81;
    var datoPeso = document.getElementById('pesoDolar');
    var peso = datoPeso.value;


    var operacion = peso / dolar;
    alert('El valor ingresado fue de: $' + peso + '   el valor total en dolares es de: USD' + operacion);
}

window.onload = iniciarDos();

function iniciarDos() {
    var botonPesoEuro = document.getElementById('botonPesoEuro');
    botonPesoEuro.addEventListener("click", calculoPesoEuro);

}

function calculoPesoEuro() {
    const euro = 4507.81
        ;
    var datoPeso = document.getElementById('pesoEuro');
    var peso = datoPeso.value;


    var operacion = peso / euro;
    alert('El valor ingresado fue de: $' + peso + '   el valor total en euros es de: €' + operacion);
}


window.onload = iniciarTres();

function iniciarTres() {
    var botonDolarPeso = document.getElementById('botonDolarPeso');
    botonDolarPeso.addEventListener("click", calculoDolarPeso);

}

function calculoDolarPeso() {
    const dolar = 4507.81;
    var datoDolar = document.getElementById('dolarPeso').value;


    var operacion = datoDolar * dolar;
    alert('El valor ingresado fue de: USD' + datoDolar + '   El valor total en pesos es de: $' + operacion);
}



window.onload = iniciarCuatro();

function iniciarCuatro() {
    var botonDolarEuro = document.getElementById('botonDolarEuro');
    botonDolarEuro.addEventListener("click", calculoDolarEuro);

}

function calculoDolarEuro() {
    const euro = 1;
    var datoDolar = document.getElementById('dolarEuro').value;
    // var dolar = datoDolar.value;


    var operacion = datoDolar / euro;
    alert('El valor ingresado fue de: USD' + datoDolar + '   El valor total en euros es de: €' + operacion);
}

window.onload = iniciarCinco();

function iniciarCinco() {
    var botonEuroPeso = document.getElementById('botonEuroPeso');
    botonEuroPeso.addEventListener("click", calculoEuroPeso);

}

function calculoEuroPeso() {
    const euro = 4507.81;
    var datoEuro = document.getElementById('euroPeso').value;
    var operacion = datoEuro * euro;
    alert('El valor ingresado fue de: €' + datoEuro + '   El valor total en euros es de: $' + operacion);
}

window.onload = iniciarSeis();


function iniciarSeis() {
    var botonEuroDolar = document.getElementById('botonEuroDolar');
    botonEuroDolar.addEventListener("click", calculoEuroDolar);

}

function calculoEuroDolar() {
    const euro = 1;
    var datoEuro = document.getElementById('euroDolar').value;
    var operacion = datoEuro / euro;
    alert('El valor ingresado fue de: €' + datoEuro + '   El valor total en euros es de: USD' + operacion);
}
