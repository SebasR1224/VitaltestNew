$( "#edit-laboratory" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreLaboratorio: {
            required: true,
            maxlength: 200,
        }
    },
    messages:
    {
        nombreLaboratorio: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>'

        }
    }
});

$( "#create_Laboratory" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreLaboratorio: {
            required: true,
            maxlength: 200,
        }
    },
    messages:
    {
        nombreLaboratorio: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>'

        }
    }
});

$( "#edit-category" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreCategoria: {
            required: true,
            maxlength: 200,

        }
    },
    messages:
    {
        nombreCategoria: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>'
        }
    }
});

$( "#create_category" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreCategoria: {
            required: true,
            maxlength: 200,

        }
    },
    messages:
    {
        nombreCategoria: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>'
        }
    }
});


