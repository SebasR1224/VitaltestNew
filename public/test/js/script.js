$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#names').val() == '' ){
            errores += '<p>Escriba un nombre</p>';
            $('#names').css("border-bottom-color", "#F14B4B")
        } else{
            $('#names').css("border-bottom-color", "#d1d1d1")
        }

        // Validado Correo ==============================
        if( $('#email').val() == '' ){
            errores += '<p>Ingrese un correo</p>';
            $('#email').css("border-bottom-color", "#F14B4B")
        } else{
            $('#email').css("border-bottom-color", "#d1d1d1")
        }

        // Validado Mensaje ==============================
        if( $('#mensaje').val() == '' ){
            errores += '<p>Escriba un mensaje</p>';
            $('#mensaje').css("border-bottom-color", "#F14B4B")
        } else{
            $('#mensaje').css("border-bottom-color", "#d1d1d1")
        }

        // ENVIANDO MENSAJE ============================
        if( errores == '' == false){
            var mensajeModal = '<div class="modal_wrap">'+
                                    '<div class="mensaje_modal">'+
                                        '<h3>Errores encontrados</h3>'+
                                        errores+
                                        '<span id="btnClose">Cerrar</span>'+
                                    '</div>'+
                                '</div>'

            $('body').append(mensajeModal);
        }

        // CERRANDO MODAL ==============================
        $('#btnClose').click(function(){
            $('.modal_wrap').remove();
        });
    });

});


let edad = document.getElementById('edad')
edad.addEventListener('keypress',(event)=>{
    event.preventDefault()
        console.log('evento keypress')
        let codigoKey = event.keyCode
        let valorKey= String.fromCharCode(codigoKey)
        let valor=parseInt(valorKey)
        if(valor){
            edad.value += valor
        }
        console.log(valorKey)

    })
let peso = document.getElementById('peso')
peso.addEventListener('keypress',(event)=>{
event.preventDefault()
    console.log('evento keypress')
    let codigoKey = event.keyCode
    let valorKey= String.fromCharCode(codigoKey)
    let valor=parseInt(valorKey)
    if(valor){
        peso.value += valor
    }
    console.log(valorKey)

})



////Terminos y servicios


