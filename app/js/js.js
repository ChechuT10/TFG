
let lineas = document.querySelector('.lines')
let container = document.querySelector('.container')
let content = document.querySelector('.content')
let night = document.querySelector('.night')
let bus = document.querySelector('#alimento')
let pal = document.querySelector('#palabras')

// var alimentos=[
//     "arroz",
//     "berenjena",
//     "tomate",
//     "pollo",
//     "perejil",
//     "pepino",
//     "zanahoria"
// ]
// function damePalabras(raiz){
//     palabras=[]
//     if (raiz!=""){
//       for (var i=0;i<alimentos.length;i++){
//         if (alimentos[i].indexOf(raiz)==0){
//           palabras.push(alimentos[i])
//         }
//       }
//     }
//     return palabras
// }
// let container = document.querySelector('.container')

window.addEventListener('load',function(){
console.log('night')
    if(localStorage.getItem('nightmode')==0){
        container.classList.remove('nightmode')
        container.classList.add('lightmode')
        night.classList.remove('nightmode')
        night.classList.add('lightmode')
    }else{
        container.classList.remove('lightmode')
        container.classList.add('nightmode')
        night.classList.remove('lightmode')
        night.classList.add('nightmode')
    }

    // let lineas = document.querySelector('.lines')
if(lineas!=null){
lineas.addEventListener('click', function () {
    console.log('me has clickado')

    let ul = document.querySelector('.nav-links');
    if (ul.classList.contains('animate')) {
        content.classList.remove('ocultar')
        ul.classList.remove('animate')
        ul.classList.add('animateout')
    } else {
        content.classList.add('ocultar')
        ul.classList.remove('animateout')
        ul.classList.add('animate')
    }

    this.classList.toggle("toggle");
})
}



night.addEventListener('click',function(){
    // SessionStorage para el modo noche
    if(localStorage.getItem('nightmode')==1){
        container.classList.remove('nightmode')
        container.classList.add('lightmode')
        night.classList.remove('nightmode')
        night.classList.add('lightmode')
        localStorage.setItem('nightmode',0)
    }else{
        container.classList.remove('lightmode')
        container.classList.add('nightmode')
        night.classList.remove('lightmode')
        night.classList.add('nightmode')
        localStorage.setItem('nightmode',1)
    }
    // console.log('click')
    // container.style.backgroundColor = 'black'
})


// if(bus!=null && pal!=null){
//     bus.addEventListener('keyup',function(){
//         var cont = this.value;
//         pal.textContent = "";
//         aux = damePalabras(cont)
//         Array.from(aux).forEach(el=>{
//             let li = document.createElement('li')
//             li.textContent = el;
//             pal.appendChild(li)
//             li.addEventListener('click',function(){               
//                 bus.value = this.textContent
//                 pal.textContent = "";
//             })

//         })
//         // console.log(pal)
//         // console.log(cont)
//     })
// }
})