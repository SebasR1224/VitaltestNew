

////Terminos y servicios
const form =document.querySelector('#form')

const terminos = form.terminos
const terminos2 = form.terminos2

let errors=document.querySelector('.errors')
let errorss=document.querySelector('.errorss')
form.addEventListener('submit',validar)
form.addEventListener('submit',validarr)

function validar(e){
errors.innerHTML=''
validarTerminos(e)
}
function validarr(e){
    errorss.innerHTML=''
    validarTerminos2(e)
    }

function validarTerminos(e){
if(!terminos.checked){
    errors.style.display='block'
    errors.innerHTML += '<p><ul>Por favor acepte los términos y condiciones.</ul></p>'
    e.preventDefault()

}

}
function validarTerminos2(e){
    if(!terminos2.checked){
        errorss.style.display='block'
        errorss.innerHTML += '<p><ul>Por favor acepte el procesamiento de su información.</ul></p>'
        e.preventDefault()

    }

    }

