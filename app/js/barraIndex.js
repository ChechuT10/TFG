
$('.progress-bar').each(function () {
    datawidth = $('.cal-neto h4').text()
    if (datawidth > 100) {
        datawidth = 100;
        $(this).animate({ left: datawidth - 5 + "%" }, 800);
    }
    else if (datawidth < 0 || datawidth == 0) {
        datawidth = 0;
        $(this).animate({ left: datawidth + "%" }, 800);
    } else {
        $(this).animate({ left: datawidth - 5 + "%" }, 800);
    }
    $(this).find("span.data-percent").html(datawidth + "%");
});

