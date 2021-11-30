$( "#edit-contrain" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreEnfermedad: {
            required: true,
            maxlength: 200,
        }
    },
    messages:
    {
        nombreEnfermedad: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>'

        }
    }
});

$( "#create_Contrain" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreEnfermedad: {
            required: true,
            maxlength: 200,
        }
    },
    messages:
    {
        nombreEnfermedad: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>'

        }
    }
});

$( "#edit-sintoma" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreSintoma: {
            required: true,
            maxlength: 200,

        }
    },
    messages:
    {
        nombreSintoma: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>'
        }
    }
});

$( "#create_sintoma" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreSintoma: {
            required: true,
            maxlength: 200,

        }
    },
    messages:
    {
        nombreSintoma: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>'
        }
    }
});


