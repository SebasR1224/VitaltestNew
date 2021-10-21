$("#email").on("keyup", function(){
    setTimeout(function(){
        $('#erorLaravelEmail').remove();
    });
});
$("#username").on("keyup", function(){
    setTimeout(function(){
        $('#erorLaravelUsername').remove();
    });
});
$( "#validation-user" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        username: {
            required: true,
            minlength: 6,
            maxlength: 18
        },
        email: {
            required: true,
            email: true,
            minlength: 6,
            maxlength: 30
        },
        roles: {
            required: true,
        }
    },
    messages:
    {
        username: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            minlength:  '<p class="text-danger">Por favor ingrese al menos 6 caracteres.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 18 caracteres.</p>'
        },
        email: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            email:      '<p class="text-danger">Por favor, introduce una dirección de correo electrónico válida.</p>',
            minlength:  '<p class="text-danger">Por favor ingrese al menos 6 caracteres.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 30 caracteres.</p>'
        },
        roles:{
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
        }

    }
});
