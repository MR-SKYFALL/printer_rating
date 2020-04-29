
var wyskosc_okna = window.innerHeight;
var szerokosc_okna = window.innerWidth;
var tak = document.querySelector('#tak');
var nie = document.querySelector('#nie');

$(document).ready(function () {
    $('#alert').css('width', 0);
    $('#alert').css('height', 0);
})

window.addEventListener("resize", function () {
    
    wyskosc_okna = window.innerHeight;
    szerokosc_okna = window.innerWidth;
    
});
var kliked_form;
$(document).ready(function(){

    var cos = $('.button_usun').on('click', function(e){
        kliked_form = e;
        $('#alert').css('width', szerokosc_okna);
        $('#alert').css('height', wyskosc_okna);
        $('.tak').css('height', '100px');
        $('.tak').css('width', '100px');
        $('.nie').css('height', '100px');
        $('.nie').css('width', '100px');
        $('#alert').animate({ opacity: 0.8 }, 1000);
    })

    $('.tak').on('click',function(){
        
       
        kliked_form = kliked_form.target.parentNode.parentNode.submit();
    })
    $('.nie').on('click',function(){
        $('#alert').animate({ opacity: 0.0 }, 100);
        $('#alert').css('width', 0);
        $('#alert').css('height', 0);

        $('.tak').css('height', '0px');
        $('.tak').css('width', '0px');
        $('.nie').css('height', '0px');
        $('.nie').css('width', '0px');
    })
})

