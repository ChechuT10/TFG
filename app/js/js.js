
let lineas = document.querySelector('.lines')
let body = document.querySelector('body')
let container = document.querySelector('.container')
let content = document.querySelector('.content')
let night = document.querySelector('.night')

window.addEventListener('load', function () {
    if (localStorage.getItem('nightmode') == 0) {
        body.classList.remove('nightmode')
        body.classList.add('lightmode')
        container.classList.remove('nightmode')
        container.classList.add('lightmode')
    } else {
        body.classList.remove('lightmode')
        body.classList.add('nightmode')
        container.classList.remove('lightmode')
        container.classList.add('nightmode')
    }


    night.addEventListener('click', function () {
        if (localStorage.getItem('nightmode') == 1) {
            body.classList.remove('nightmode')
            body.classList.add('lightmode')
            container.classList.remove('nightmode')
            container.classList.add('lightmode')
            localStorage.setItem('nightmode', 0)
        } else {
            body.classList.remove('lightmode')
            body.classList.add('nightmode')
            container.classList.remove('lightmode')
            container.classList.add('nightmode')
            localStorage.setItem('nightmode', 1)
        }
    })

})