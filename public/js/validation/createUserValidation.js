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

$.validator.addMethod("emailPersonalized", function (value, element) {
    var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
    return this.optional(element) || pattern.test(value);
 });

 jQuery.validator.addMethod("alphanumeric",
           function(value, element) {
               var pattern = /^[A-Za-z0-9]*$/
                return this.optional(element) || pattern.test(value);
           },
);

$( "#validation-user" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        username: {
            required: true,
            alphanumeric: true,
            minlength: 6,
            maxlength: 18
        },
        email: {
            required: true,
            email: true,
            emailPersonalized: true,
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
            alphanumeric:  '<p class="text-danger">Por favor evite utilizar caracteres especiales</p>',
            minlength:  '<p class="text-danger">Por favor ingrese al menos 6 caracteres.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 18 caracteres.</p>'
        },
        email: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
            email:      '<p class="text-danger">Por favor, introduce una dirección de correo electrónico válida.</p>',
            emailPersonalized:'<p class="text-danger">Por favor, introduce una dirección de correo electrónico válida.</p>',
            minlength:  '<p class="text-danger">Por favor ingrese al menos 6 caracteres.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 30 caracteres.</p>'
        },
        roles:{
            required:   '<p class="text-danger">El campo es obligatorio.</p>',
        }
    }
});
