
let lineas = document.querySelector('.lines')
let container = document.querySelector('.container')
let content = document.querySelector('.content')
let night = document.querySelector('.night')

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
})

})