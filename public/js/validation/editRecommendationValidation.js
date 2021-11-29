$('#parte_id').select2({
    placeholder: "Seleccione...",
    formatNoMatches: function () {
    return "No se encontraron resultados <a href='#' >Click</a> para agregar parte del cuerpo";
    }
});
$('#sintomas').select2({
    placeholder: "Seleccione...",
    formatNoMatches: function () {
    return "No se encontraron resultados";
    }
});
$('#medicamentos').select2({
    placeholder: "Seleccione...",
    formatNoMatches: function () {
    return "No se encontraron resultados";
    }
});

$('#enfermedades').select2({
    placeholder: "Seleccione...",
    formatNoMatches: function () {
    return "No se encontraron resultados";
    }
});


var stepsSlider = document.getElementById('steps-slider-intensidad');
var input0 = document.getElementById('input-with-keypress-0');
var inputs = [input0];

noUiSlider.create(stepsSlider, {
    start: [input0.value],
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


var stepsSliderEdad = document.getElementById('step-slider-edad');
var inputEdad0 = document.getElementById('input-edad-keypress-0');
var inputEdad1 = document.getElementById('input-edad-keypress-1');
var inputsEdad = [inputEdad0, inputEdad1];

noUiSlider.create(stepsSliderEdad, {
    start: [inputEdad0.value, inputEdad1.value],
    connect: true,
    tooltips: true,
    range: {
        'min': 1,
        'max': 80
    },
    format: wNumb({
        decimals: 0
    })

});

stepsSliderEdad.noUiSlider.on('update', function (values, handle) {
    inputsEdad[handle].value = values[handle];
});



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


$('#recomendacion').validate({
    ignore: [],
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules:
    {
        nombreRecomendacion: {
            required: true,
            maxlength: 200,
        },
        parte_id: {
            required: true,
        },
        'sintomas[]': {
            required: true,
        },
        'medicamentos[]': {
            required: true,
        },
        dosis: {
            required:true,
            maxlength: 200,
            minlength: 6,
        },
        frecuencia: {
            required:true,
            maxlength: 200,
            minlength: 6,
        },
        tiempo: {
            required:true,
            minlength: 6,
        },
        imc_id: {
            required:true,
        }
    },
    messages:
    {
        nombreRecomendacion: {
            required:'<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>'
        },
        parte_id: {
            required:'<p class="text-danger">El campo es obligatorio.</p>',
        },
        'sintomas[]': {
            required:'<p class="text-danger">El campo es obligatorio.</p>',
        },
        'medicamentos[]': {
            required:'<p class="text-danger">El campo es obligatorio.</p>',
        },
        dosis: {
            required:'<p class="text-danger">El campo es obligatorio.</p>',
            minlength:  '<p class="text-danger">Asegurese de escribir de manera detallada la dosis.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>',
        },
        frecuencia:{
            required:'<p class="text-danger">El campo es obligatorio.</p>',
            minlength:  '<p class="text-danger">Asegurese de escribir de manera detallada la frecuencia</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>',
        },
        tiempo:{
            required:'<p class="text-danger">El campo es obligatorio.</p>',
            minlength:  '<p class="text-danger">Asegurese de escribir de manera detallada el tiempo</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>',
        },
        imc_id:{
            required:'<p class="text-danger">El campo es obligatorio.</p>',
        }
    }
})

