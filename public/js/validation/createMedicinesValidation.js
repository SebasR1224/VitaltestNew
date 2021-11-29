
const inputPrecioNormal = document.getElementById("precioNormal")
const inputDescuento = document.getElementById("descuento")
const inputPrecioDescuento = document.getElementById("precioDescuento")
const disabled = document.getElementById("disabled")


$(document).ready(function (e){
    $('#imagen').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#imageSelected').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
});


const calculateDiscountPrice = () => {
    const precio = +inputPrecioNormal.value;
    const descuento = +inputDescuento.value;
    const op1 = descuento / 100;
    const op2 = precio * op1;
    const precioDescuento = precio - op2;
    if(precio == precioDescuento){
        inputPrecioDescuento.value = "";

        $("#disabled").removeClass("text-muted");

        $("#disabled").html("Medicamento sin descuento");
        $("#disabled").addClass("text-primary");
    }else{
        $("#disabled").removeClass("text-primary");
        inputPrecioDescuento.value = precioDescuento.toFixed(2);
        $("#disabled").html(precioDescuento.toFixed(2));
    }

    if(precioDescuento == 0.00){
        inputPrecioDescuento.value = "";
        $("#disabled").removeClass("text-muted");
        $("#disabled").html("Medicamento sin descuento");
        $("#disabled").addClass("text-primary");
    }
}



inputPrecioNormal.onkeyup = () => {
    calculateDiscountPrice();
}
inputPrecioNormal.onchange = () => {
    calculateDiscountPrice();
}

inputDescuento.onkeyup = () => {
    calculateDiscountPrice();

}
inputDescuento.onchange = () => {
    calculateDiscountPrice();
}


    $('#enviarLaboratory').click(function(e){
        e.preventDefault();
        var form = $('#register-laboratory').attr('action');
        var dataString = $('#register-laboratory').serialize();
        $.ajax({
            type:'POST',
            url:form,
            data:dataString,
            success:function(response){
                $(response.listLaboratory).each(function(key, value){
                    if(key == 0){
                        $('#laboratorio_id').append(`<option value="${value.id}">${value.nombreLaboratorio}</option>` );
                        $('#laboratorio_id').val(value.id).trigger('change.select2');
                    }
                })

                $('#register-laboratory')[0].reset();
                $('#laboratory-modal .close').click();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })
                  Toast.fire({
                    icon: 'success',
                    title: 'Laboratorio creado exitosamente',
                  })
            }
        })
    })

    $('#enviarCategory').click(function(e){
        e.preventDefault();
        var form = $('#register-category').attr('action');
        var dataString = $('#register-category').serialize();
        $.ajax({
            type:'POST',
            url:form,
            data:dataString,
            success:function(response){
                $(response.listCategory).each(function(key, value){
                    if(key == 0){
                        $('#categoria_id').append(`<option value="${value.id}">${value.nombreCategoria}</option>` );
                        $('#categoria_id').val(value.id).trigger('change.select2');
                    }
                })

                $('#register-category')[0].reset();
                $('#category-modal .close').click();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })
                  Toast.fire({
                    icon: 'success',
                    title: 'Categoria creada exitosamente',
                  })
            }
        })
    })


$( "#register-category" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreCategoria: {
            required: true,
        }
    },
    messages:
    {
        nombreCategoria: {
            required:   '<p class="text-danger">El campo es obligatorio.</p>',

        }
    }
});

$( "#register-laboratory" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreLaboratorio: {required: true}
    },
    messages:
    {
        nombreLaboratorio: {required:   '<p class="text-danger">El campo es obligatorio.</p>'}
    }
});

$( "#register-category" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreCategoria: {required: true}
    },
    messages:
    {
        nombreCategoria: {required:'<p class="text-danger">El campo es obligatorio.</p>'}
    }
});

$("#precioNormal").mask(
    'PN',
    {translation:
        {
            P: {pattern: /[1-9]/},
            N: {pattern: /\d*/, recursive: true}
        }
    }
);

$("#descuento").mask(
    'PN',
    {translation:
        {
            P: {pattern: /[1-9]/},
            N: {pattern: /\d*/, recursive: true}
        }
    }
);

    inputDescuento.addEventListener('input',function(){
        if (this.value.length > 2)
        this.value = this.value.slice(0,2);
    })

    jQuery.validator.addMethod("doubletwo",
    function(value, element) {
        var pattern = /^\d*(\.\d{1})?\d{0,1}$/
        return this.optional(element) || pattern.test(value);
    },
    );

    jQuery.validator.addMethod("imagen",
    function(value, element) {
        var pattern = /\.(jpg|jpeg|png|gif)$/
        return this.optional(element) || pattern.test(value);
    },
    );



    $( "#form-medicines" ).validate({
    ignore: [],
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {
        nombreMedicamento: {
            required: true,
            maxlength: 200,
        },
        categoria_id: {
            required: true
        },
        laboratorio_id: {
            required: true
        },
        precioNormal:{
            required:true,
            doubletwo: true,
            minlength: 3
        },
        descuento:{
            doubletwo: true
        },
        licencia:{
            required: true,
            maxlength: 200,
        },
        fichaTecnica:{
            maxlength: 60000
        },
        avisoLegal:{
            maxlength: 60000
        },
        imagen:{
            required:true,
            imagen: true
        }
    },
    messages:
    {
        nombreMedicamento: {
            required:'<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:  '<p class="text-danger">No ingrese más de 200 caracteres.</p>'
        },
        categoria_id:{
            required:'<p class="text-danger">El campo es obligatorio.</p>'
        },
        laboratorio_id:{
            required:'<p class="text-danger">El campo es obligatorio.</p>'
        },
        precioNormal: {
            required:'<p class="col-md-12 text-danger">El campo es obligatorio.</p>',
            doubletwo: '<p class="text-danger">Redondeé la cifra a dos decimales.</p>',
            number: '<p class="text-danger">Por favor ingrese un número valido.</p>',
            minlength: '<p class="text-danger">Asegurese de que el precio esté completo.</p>'
        },
        descuento:{
            number: '<p class="text-danger">Por favor ingrese un número valido.</p>',
            doubletwo: '<p class="text-danger">Redondeé la cifra a dos decimales.</p>',

        },
        licencia:{
            required:'<p class="text-danger">El campo es obligatorio.</p>',
            maxlength:'<p class="text-danger">No ingrese más de 200 caracteres.</p>'
        },
        fichaTecnica: {
            maxlength:'<p class="text-danger">Limite de texto excedido</p>'
        },
        avisoLegal: {
            maxlength:'<p class="text-danger">Limite de texto excedido</p>'
        },
        imagen: {
            required:'<p class="text-danger">El campo es obligatorio.</p>',
            imagen: '<p class="text-danger">El archivo seleccionado no es de tipo imagen.</p>'
        }
    }

});

$("select").on("select2:close", function (e) {
    $(this).valid();
});

$("#fichaTecnica").on('keypress', function() {
    var limit = 60000;
    $("#fichaTecnica").attr('maxlength', limit);
    var init = $(this).val().length;

    if(init<limit){
      init++;
      $('#caracteresFichaTecnica').text("Máximo 60.000 caracteres: " + init);
    }
  });

  $("#avisoLegal").on('keypress', function() {
    var limit = 60000;
    $("#avisoLegal").attr('maxlength', limit);
    var init = $(this).val().length;

    if(init<limit){
      init++;
      $('#caracteresAvisoLegal').text("Máximo 60.000 caracteres: " + init);
    }
  });


