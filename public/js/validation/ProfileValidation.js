

$("#numDocumento").on("keyup", function(){
    setTimeout(function(){
        $('#errorLaravelDocument').remove();
    });
});
$('.datepicker-input').datepicker({
    language: 'es'
});
// Validar campos para completar el perfil
jQuery.validator.addMethod("alphanumeric",
           function(value, element) {
               var pattern = /^[A-Za-z]*$/
                   return this.optional(element) || pattern.test(value);
           },
);
// {{-- Enviar foto cuando cambie --}}
    $( "#customFile" ).change(function() {
        $('#photoForm').submit();
    });
// Validar campos al completar perfil
$( "#validation-complete" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombre: {
            required: true,
            maxlength: 50,
            alphanumeric: true
        },
        apellido1: {
            required: true,
            maxlength: 50,
            alphanumeric: true,
        },
        apellido2: {
            required: true,
            maxlength: 50,
            alphanumeric: true
        },
        tipoDocumento: {
            required: true,
        },
        numDocumento: {
            minlength: 6,
            maxlength: 30,
            required: true,
            number:true
        },
        confirmNumDocumento: {
            maxlength: 30,
            required: true,
            equalTo: '#numDocumento',
            number:true
        },
        telefono: {
            required: true,
            maxlength: 30,
            minlength: 6,
            number:true,
        },
        direccion: {
            minlength: 10,
            required: true,
            maxlength: 30
        },
        fechaNacimiento: {
            required: true,
            maxlength: 50
        },
        password: {
            required: true,
        }
    },
    messages:
    {
        nombre: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 50 caracteres.</p>',
            alphanumeric:'<p class="text-danger">Introduzca un nombre valido.</p>'
        },
        apellido1: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 50 caracteres.</p>',
            alphanumeric:'<p class="text-danger">Introduzca un apellido valido </p>'
        },
        apellido2: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 50 caracteres.</p>',
            alphanumeric:'<p class="text-danger">Introduzca un apellido valido </p>'
        },
        tipoDocumento: {
            required: '<p class="text-danger">El campo es obligatorio.</p>'
        },
        numDocumento: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            number: '<p class="text-danger">Ingrese un número de documento válido</p>',
            minlength:'<p class="text-danger">Número de documento incompleto</p>'
        },
        confirmNumDocumento: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            equalTo: '<p class="text-danger">El número de documento no coincide</p>',
            number: '<p class="text-danger">Ingrese un número de documento válido</p>',
        },
        telefono: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 30 caracteres.</p>',
            number: '<p class="text-danger">Ingrese un número de telefono válido</p>',
            minlength:'<p class="text-danger">Teléfono no valido, ingrese mas de 6 dígitos</p>'

        },
        direccion: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 50 caracteres.</p>',
            minlength:'<p class="text-danger">Dirección incompleta</p>'
        },
        fechaNacimiento: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 30 caracteres.</p>'
        },
        password: {
            required: '<p class="text-danger">El campo es obligatorio.</p>'
        }
    }
});

// Validar campos al editar perfil
$( "#validation-edit" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        nombre: {
            required: true,
            maxlength: 50,
            alphanumeric: true
        },
        apellido1: {
            required: true,
            maxlength: 50
        },
        apellido2: {
            required: true,
            maxlength: 50
        },
        tipoDocumento: {
            required: true,
        },
        telefono: {
            required: true,
            maxlength: 30,
            minlength: 6,
            number:true,
        },
        direccion: {
            required: true,
            maxlength: 30,
            minlength: 10
        },
        fechaNacimiento: {
            required: true,
            maxlength: 50
        },
        password: {
            required: true,
        }
    },
    messages:
    {
        nombre: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 50 caracteres.</p>',
            alphanumeric:'<p class="text-danger">No se permiten los caracteres especiales.</p>',

        },
        apellido1: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 50 caracteres.</p>'
        },
        apellido2: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 50 caracteres.</p>'
        },
        tipoDocumento: {
            required: '<p class="text-danger">El campo es obligatorio.</p>'
        },
        telefono: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 30 caracteres.</p>',
            number: '<p class="text-danger">Ingrese un número de telefono válido</p>',
            minlength:'<p class="text-danger">Teléfono no valido, ingrese mas de 6 dígitos</p>'
        },
        direccion: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 50 caracteres.</p>',
            minlength:'<p class="text-danger">Dirección incompleta</p>'
        },
        fechaNacimiento: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 30 caracteres.</p>'
        },
        password: {
            required: '<p class="text-danger">El campo es obligatorio.</p>'
        }
    }
});

//validar campos al actualizar contraseña

$( "#validation-password" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        oldpassword: {
            required: true,
        },
        newpassword: {
            required: true,
            maxlength: 30,
            minlength: 6
        },
        confirmpassword: {
            required: true,
            equalTo: '#newpassword'
        }
    },
    messages:
    {
        oldpassword: {
            required: '<p class="text-danger">El campo es obligatorio.</p>'
        },
        newpassword: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 30 caracteres.</p>',
            minlength:'<p class="text-danger">Contraseña poco segura</p>'
        },
        confirmpassword: {
            required: '<p class="text-danger">El campo es obligatorio.</p>',
            equalTo: '<p class="text-danger">La contraseña no coincide.</p>',
        }
    }
});

function mostrarPassword(){
    var cambio = document.getElementById("password");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}

