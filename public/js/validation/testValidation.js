const changeStatusButton = e => {
    document.getElementById("btnconttaval").disabled = document.querySelectorAll(".form-check-input:checked").length == 2 ? false : true;
}
document.querySelectorAll(".form-check-input").forEach(check => check.addEventListener("change", changeStatusButton));


$('#partes').select2({
    placeholder: "Seleccione...",
    formatNoMatches: function () {
    return "No se encontraron resultados";
    }
});

$('#sintomas').select2({
    placeholder: "Buscar, ej. Dolor de cabeza",
    formatNoMatches: function () {
    return "No se encontraron resultados";
    }
});


var stepsSlider = document.getElementById('steps-slider-edad');
var input0 = document.getElementById('input-with-keypress-0');
var inputs = [input0];

noUiSlider.create(stepsSlider, {
    start: [50],
    connect: 'lower',
    tooltips: true,
    range: {
        'min': 1,
        'max': 80,
    },
    format: wNumb({
        decimals: 0
    })

});


stepsSlider.noUiSlider.on('update', function (values, handle) {
    inputs[handle].value =   values[handle];
});

// Listen to keydown events on the input field.
inputs.forEach(function (input, handle) {

input.addEventListener('change', function () {
    stepsSlider.noUiSlider.setHandle(handle, this.value);
});

input.addEventListener('keydown', function (e) {

    var values = stepsSlider.noUiSlider.get();
    var value = Number(values[handle]);

    // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
    var steps = stepsSlider.noUiSlider.steps();

    // [down, up]
    var step = steps[handle];

    var position;

    // 13 is enter,
    // 38 is key up,
    // 40 is key down.
    switch (e.which) {

        case 13:
            stepsSlider.noUiSlider.setHandle(handle, this.value);
            break;

        case 38:

            // Get step to go increase slider value (up)
            position = step[1];

            // false = no step is set
            if (position === false) {
                position = 1;
            }

            // null = edge of slider
            if (position !== null) {
                stepsSlider.noUiSlider.setHandle(handle, value + position);
            }

            break;

        case 40:

            position = step[0];

            if (position === false) {
                position = 1;
            }

            if (position !== null) {
                stepsSlider.noUiSlider.setHandle(handle, value - position);
            }

            break;
    }
});
});


var stepsSliderEdad = document.getElementById('steps-slider-intensidad');
var inputEdad = document.getElementById('intensidad-with-keypress-0');
var inputsEdad = [inputEdad];

noUiSlider.create(stepsSliderEdad, {
    start: [3],
    connect: 'lower',
    snap: true,
    tooltips: true,
    range: {
        'min': 1,
        '25%': 3,
        '50%': 6,
        '75%': 9,
        'max': 12,
    },
    format: wNumb({
        decimals: 0
    })

});


stepsSliderEdad.noUiSlider.on('update', function (values, handle) {
    inputsEdad[handle].value =   values[handle];
});

// Listen to keydown events on the input field.
inputsEdad.forEach(function (input, handle) {

input.addEventListener('change', function () {
    stepsSliderEdad.noUiSlider.setHandle(handle, this.value);
});

input.addEventListener('keydown', function (e) {

    var values = stepsSliderEdad.noUiSlider.get();
    var value = Number(values[handle]);

    // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
    var steps = stepsSliderEdad.noUiSlider.steps();

    // [down, up]
    var step = steps[handle];

    var position;

    // 13 is enter,
    // 38 is key up,
    // 40 is key down.
    switch (e.which) {

        case 13:
            stepsSliderEdad.noUiSlider.setHandle(handle, this.value);
            break;

        case 38:

            // Get step to go increase slider value (up)
            position = step[1];

            // false = no step is set
            if (position === false) {
                position = 1;
            }

            // null = edge of slider
            if (position !== null) {
                stepsSliderEdad.noUiSlider.setHandle(handle, value + position);
            }

            break;

        case 40:

            position = step[0];

            if (position === false) {
                position = 1;
            }

            if (position !== null) {
                stepsSliderEdad.noUiSlider.setHandle(handle, value - position);
            }

            break;
    }
});
});

$( "#start" ).on( "click", function() {
    $('.iniciar').removeClass('disabled');
    $('.iniciar').click();
});

$( "#btnconttaval" ).on( "click", function() {
    $('.sexo').removeClass('disabled');
    $('.sexo').click();
});

$( "#sexo" ).on( "click", function() {
    $('.edad').removeClass('disabled');
    $('.edad').click();
});

$( "#edad" ).on( "click", function() {
    $('.imc').removeClass('disabled');
    $('.imc').click();
});

$( "#btnImc" ).on( "click", function() {
    $('.contrain').removeClass('disabled');
    $('.contrain').click();
});

$( "#contrain" ).on( "click", function() {
    $('.parte').removeClass('disabled');
    $('.parte').click();
});
$( "#parte" ).on( "click", function() {
    $('.sintomas').removeClass('disabled');
    $('.sintomas').click();
});

$( "#atrasSintomas" ).on( "click", function() {
    $('.parte').click();
});

$( "#atrasParte" ).on( "click", function() {
    $('.contrain').click();
});
$( "#atrasContrain" ).on( "click", function() {
    $('.imc').click();
});
$( "#atrasImc" ).on( "click", function() {

    $('.edad').click();
});

$( "#atrasEdad" ).on( "click", function() {
    $('.sexo').click();
});

$( "#atrasSexo" ).on( "click", function() {
    $('.iniciar').click();
});

$( "#atrasTerminos" ).on( "click", function() {
    $('.hello').click();
});

window.addEventListener('load', () =>{
    const contenedor_loader = document.querySelector('.contenedor_loader')
    contenedor_loader.style.opacity = 0
    contenedor_loader.style.visibility = 'hidden'
})


$("#estatura").mask(
    'PN',
    {translation:
        {
            P: {pattern: /[1-9]/},
            N: {pattern: /\d*/, recursive: true}
        }
    }
);

$("#peso").mask(
    'PN',
    {translation:
        {
            P: {pattern: /[1-9]/},
            N: {pattern: /\d*/, recursive: true}
        }
    }
);

jQuery.validator.addMethod("doubletwo",
function(value, element) {
    var pattern = /^\d*(\.\d{1})?\d{0,1}$/
     return this.optional(element) || pattern.test(value);
},
);

$('.formTest').validate({
    ignore: [],
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules:
    {
        estatura: {
            required: true,
            doubletwo:true
        },
        peso: {
            required: true,
            doubletwo:true
        },
        parte: {
            required:true
        },
        'sintomas[]':{
            required:true
        }
    },
    messages:
    {
        estatura: {
            required:'<p class="text-danger">El campo es obligatorio.</p>',
            number:'<p class="text-danger">Por favor ingrese un número valido.</p>',
            doubletwo:'<p class="text-danger">Redondeé la cifra a dos decimales.</p>',
        },
        peso: {
            required:'<p class="text-danger">El campo es obligatorio.</p>',
            number:'<p class="text-danger">Por favor ingrese un número valido.</p>',
            doubletwo:'<p class="text-danger">Redondeé la cifra a dos decimales.</p>',
        },
        parte: {
            required:'<p class="text-danger">El campo es obligatorio.</p>',
        },
        'sintomas[]':{
            required:'<p class="text-danger">El campo es obligatorio.</p>',
        }
    }
})



const inputEstatura = document.getElementById("estatura")
const inputPeso = document.getElementById("peso")
const inputImc = document.getElementById("imc")
const div =  document.getElementById("div")



const calculateImc = () => {
    const estatura = +inputEstatura.value;
    const peso = +inputPeso.value;
    const op1 = estatura * estatura;
    const total = peso / op1;

    if(total<=18.4){
        $("#div").html("Bajo peso");
        inputImc.value = 1
    }else if(total>= 19 && total<=25){
        $("#div").html("Peso normal");
        inputImc.value = 2
    }else if(total>=26 && total<=30){
        $("#div").html("Sobrepeso");
        inputImc.value = 3
    }
    else if(total>=30){
        $("#div").html("Obeso");
        inputImc.value = 4
    }


}

inputPeso.addEventListener('input',function(){
    if (this.value.length > 2)
    this.value = this.value.slice(0,3);
})


inputEstatura.onkeyup = () => {
    calculateImc();
}
inputEstatura.onchange = () => {
    calculateImc();
}

inputPeso.onkeyup = () => {
    calculateImc();

}
inputPeso.onchange = () => {
    calculateImc();
}
