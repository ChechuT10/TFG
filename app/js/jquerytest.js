$(document).ready(function () {
    const lineas = $('.lines')
    const content = $('.content')
    const footer = $('footer')


    if(lineas!=null){
        lineas.on('click', function () {
            let ul = $('.nav-links');
            if (ul.hasClass('animate')) {
                content.toggle(800)
                footer.toggle(800)
                ul.removeClass('animate')
                ul.addClass('animateout')
                // content.classList.remove('ocultar')
                // ul.classList.remove('animate')
                // ul.classList.add('animateout')
            } else {
                content.toggle(800)
                footer.toggle(800)
                ul.removeClass('animateout')
                ul.addClass('animate')
                // content.classList.add('ocultar')
                // ul.classList.remove('animateout')
                // ul.classList.add('animate')
            }
        
            $(this).toggleClass("toggle");
        })
        }

    // lineas.on('click', function(){
    //     console.log('cargado')
    // })
})