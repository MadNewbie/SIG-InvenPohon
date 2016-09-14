function buka(sender) {
    $('#karusel').carousel({setInterval:false});
    var tbl = sender.getAttribute('data-btn');
    if(tbl == "ukm"){
        $("#ukm").addClass('active');
        document.getElementById('investor').className = "item";
    }else if (tbl == "investor"){
        $("#investor").addClass('active');
        document.getElementById('ukm').className = "item";
    }
    var test = $(window).height() - $("#navigasi").height() - 70;
    if ($(window).height() < 500) {
        $('.item').height(400);
    } else {
        $('.item').height(test);
    }
    $('#karusel').slideToggle('fast');
    var tinggi = $('.item').height()+$('.btn-close').height();
    document.getElementById('navigasi').style.top = String(tinggi) + "px";
}

function tutup() {
    $('#karusel').slideUp('fast');
    document.getElementById('navigasi').style.top="0px";
}
