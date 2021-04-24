//validation script here
const inputs = document.querySelectorAll('.register input')
let btn = document.querySelector('.register button')

//let inactive = document.querySelectorAll('.sidenav')

/*ojo porque aqui tenemos ambas clases y no obtenemos los a sino los li*/
/*Array.from(activo).forEach(el=>{
    if(el.getAttribute("class","active")){
        el.addEventListener("click",e=>{
            let aux = el.children
            console.log(aux)
            console.log("hola")
            el.style.backgroundColor = "blue"
            /*el.classList.remove('activo')*/
/*  el.classList.add('inactive')
})
}
if(el.getAttribute("class","inactive")){
el.addEventListener("click",e=>{
  console.log("hola")
/*     /*el.classList.remove('activo')*/
/*   el.classList.add('active')
})
}
/* el.addEventListener("click",e=>{
console.log("hola")
/*el.classList.remove('activo')*/
//el.classList.add('inactive')
//})
//})

const patterns = {
     /*
     *  ^$              Empty string
     *  |               Or
     *  ^               Start of a string
     *  []              Explicit set of characters to match
     *  ^[:space:]      Matches any non-white-space character - equivalent to \S
     *  {6,30}          6-20 characters
     *  $               End of a string
     *  (?=...)(?=...)  And Operators
     */
     //    eg: @"^$|(?=^[^[:space:]]{6,20}$)(?=^password$)"
    /*telephone:/^\d{9}$/, si necesitaramos un numer0*//*(([a-z]{3,12}\s)+){5,30}*/
    // nombre: /(^[a-z]{4,15}[\ ])([a-z]{4,15})([\ ][a-z]{4,15})?$/i,//solo letras y un espacio
    nombre: /^[a-z]{5,12}$/i,
    apellidos:  /(^[a-z]{4,15}[\ ])([a-z]{4,15})([\ ][a-z]{4,15})?$/i,
    usuario: /^[\w]{5,12}$/i,//Entre 5 y doce caracteres includo '_'
    email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
    pswd: /^[\w@-]{8,20}$/,
    edad: /^([1-9][1-9]|[0-9][0-9])$/,
    peso: /^([1-9][1-9]|[0-9][0-9])$/,
    //confirmacion: /^[\w@-]{8,20}$/
}

//validation function
function validate(field, regex) {
    if (regex.test(field.value)) {
        field.classList.remove('invalid')
        field.classList.add('valid')
        btn.setAttribute("name", "enviar")
    }
    else {
        field.classList.remove('valid')
        field.classList.add('invalid')
        btn.setAttribute("name", "invalido")
        if (btn.getAttribute("name", "invalido")) {
            let aux = document.querySelector('.msg')
            aux.textContent = "Comprueba que todos los datos son correctos"

        }
        /*btn.addEventListener("click",function(){
            alert("Los datos introducidos no son válidos")
        })*/
    }
}

console.log(inputs)
inputs.forEach((input) => {
    input.addEventListener('keyup', (e) => {
        console.log(e.target.name)
        validate(e.target, patterns[e.target.name])
        /*if(btn.getAttribute("name","invalido")){
            btn.addEventListener("click",function(){
                alert("Los datos introducidos no son válidos")
            })
        }*/
    })
})

/*btn.addEventListener("click",stopIt)



function stopIt(e){
    if(btn.getAttribute("name","invalido")){
        e.preventDefault();
        let aux = document.querySelector('.error')
        aux.textContent = "Los datos introducidos no son válidos"

    }

}*/