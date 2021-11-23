
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

$('#modalPrice').on('show.bs.modal', function(event){
    clearValidationErrors();
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var precio = button.data('precio')
    var descuento = button.data('descuento')
    var oferta = button.data('oferta')
    action = $('#form-update-price').attr('data-action').slice(0, -1)
    action+= id;
    $('#form-update-price').attr('action', action)
    $('#precioNormal').val(precio)
    $('#descuento').val(descuento)
    $('#precioDescuento').val(oferta)

    if(oferta == ""){
    $('#disabled').removeClass('text-muted')
    $('#disabled').addClass('text-primary')
    $('#disabled').html('Medicamento sin descuento')
    }else{
        $('#disabled').html(oferta)
    }

    var modal = $(this)
    modal.find('.modal-title').text('$ Editar precio con codigo #' + id )
})

var validator = $( "#form-update-price" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    rules: {

        precioNormal:{
            required:true,
            doubletwo: true,
            minlength: 3
        },
        descuento:{
            doubletwo: true
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
            number: '<p class="text-danger">Por favor ingrese un número valido.</p>',
            doubletwo: '<p class="text-danger">Redondeé la cifra a dos decimales.</p>',
            minlength: '<p class="text-danger">Asegurese de que el precio esté completo.</p>'
        },
        descuento:{
            number: '<p class="text-danger">Por favor ingrese un número valido.</p>',
            doubletwo: '<p class="text-danger">Redondeé la cifra a dos decimales.</p>',
        }
    }

});



function clearValidationErrors() {
    validator.resetForm();
    $("#precioNormal").removeClass("is-invalid");
    $("#descuento").removeClass("is-invalid");
}


