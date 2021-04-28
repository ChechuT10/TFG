$(document).ready(function () {
    const lineas = $('.lines')
    const content = $('.content')
    const footer = $('footer')
    const backImage = $('.small-back-image')
    const pop = $('.fullscreen-container')


    if (lineas != null) {

        // $(window).on('resize', function () {
            // if ($(window).width() < 500) {
            //     if (subheader) {
            //         let aux = subheaderLi.clone()
            //         nav.prepend(aux)
            //         subheader.hide()
            //     }
            // } else {
            //     if (subheader) {
            //         subheader.show()
            //     }
            // }
        // });

        lineas.on('click', function () {
            let ul = $('.nav-links');
            if (ul.hasClass('animate')) {
                content.fadeIn(600)
                footer.fadeIn(600)
                backImage.fadeIn(600)
                ul.removeClass('animate')
                ul.addClass('animateout')
            } else {
                backImage.fadeOut(600)
                content.fadeOut(600)
                footer.fadeOut(600)
                ul.removeClass('animateout')
                ul.addClass('animate')
            }

            $(this).toggleClass("toggle");
        })
    }

    if(pop.length >0){
        pop.fadeTo(1000, 1);
        $('.content').hide()
        $('footer').hide()
    }

})
