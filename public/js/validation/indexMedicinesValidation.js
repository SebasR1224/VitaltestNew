
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



$( "#form-medicines" ).validate({
    ignore: ':hidden:not(:checkbox)',
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
            imagen: '<p class="text-danger">El archivo seleccionado no es de tipo imagen.</p>'
        }
    }

});



