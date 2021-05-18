function recogerDatos(datos) {
    fetch("include/getExerciseByUser.php", {})
        .then(function (respuesta) {
            return respuesta.json();
        }).then(function (resultado) {
            console.log(resultado)
            for (const key in resultado) {
                datos.CaloriaEjercicios = datos.CaloriaEjercicios + parseInt(resultado[key].calorias * resultado[key].minutos);
            }
        }).then(function () {
            let total = 1500;
            $('.cal-res h1').text(total)

            $('.progress-bar').each(function () {
                $('.cal-obj h4').text(total)
                $('.cal-al h4').text(datos.CaloriaAlimentos)
                $('.cal-ej h4').text(datos.CaloriaEjercicios)
                var datawidth = datos.CaloriaAlimentos - datos.CaloriaEjercicios;
                $('.cal-neto h4').text(datawidth)
                datawidth = Math.round((datawidth * 100) / total);
                console.log(datos)
                if(datawidth > 100){
                    datawidth = 100;
                    $(this).animate({ left: datawidth-5 + "%" }, 800);
                }
                else if (datawidth < 0 || datawidth == 0) {
                    datawidth = 0;
                    $(this).animate({ left: datawidth + "%" }, 800);
                }else{
                    $(this).animate({ left: datawidth-5 + "%" }, 800);
                }
                $(this).find("span.data-percent").html(datawidth + "%");
            });
        }).catch(function (err) {
            console.log(err)
        });
}

window.addEventListener("load", function () {
    datos = {
        CaloriaAlimentos: 0,
        CaloriaEjercicios: 0,
    };

    fetch("include/getFoodByUser.php", {})
        .then(function (respuesta) {
            return respuesta.json();
        }).then(function (resultado) {
            console.log(resultado)
            for (const key in resultado) {
                datos.CaloriaAlimentos = datos.CaloriaAlimentos + parseInt(resultado[key].calorias * (resultado[key].cantidad / 100));
            }
        }).then(recogerDatos(datos))
        .catch(function (err) {
            console.log(err)
        })

});
