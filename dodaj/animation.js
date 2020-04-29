var czas = 500;



window.onload=function(){
    allbuttons = document.querySelectorAll('.btn');
    for(let i=2;i<allbuttons.length;i++)
    {
        allbuttons[i].disabled = true;
        
    }
    
}
$("#head_bar").animate({ opacity: 1 }, 2000);
$("#button1").click(
    function () {
        if ($('#producent>div>input').val() != '' && $('#producent>div>input').val() != ' ')
        {
           $('#model').animate({ opacity: 1 }, czas); 
            allbuttons[2].disabled = false;
            $("#producent>div>input").css('border', 'solid red 0px');
            $("#producent>div>input").attr('readonly', 'readonly');
        }
        else
        {
            $('#producent>div>input').val('');
            $("#producent>div>input").attr("placeholder", "to pole nie moze byc puste");
            $("#producent>div>input").css('border','solid red 2px');
        }
        
    }
),
    $("#button2").click(
        
        function () {
            if ($('#model>div>input').val() != '' && $('#model>div>input').val() != ' ') {
                $('#typ').animate({ opacity: 1 }, czas);
                allbuttons[3].disabled = false;
                $("#model>div>input").css('border', 'solid red 0px');
                $("#model>div>input").attr('readonly', 'readonly');
            }
            else {
                $('#model>div>input').val('');
                $("#model>div>input").attr("placeholder", "to pole nie moze byc puste");
                $("#model>div>input").css('border', 'solid red 2px');
            }

        }
    )
$("#button3").click(
    

    function () {
        if ($('#typ>div>input').val() != '' && $('#typ>div>input').val() != ' ') {
            $('#szybkosc_kolor').animate({ opacity: 1 }, czas);
            allbuttons[4].disabled = false;
            $("#typ>div>input").css('border', 'solid red 0px');
            $("#typ>div>input").attr('readonly', 'readonly');
        }
        else {
            $('#typ>div>input').val('');
            $("#typ>div>input").attr("placeholder", "to pole nie moze byc puste");
            $("#typ>div>input").css('border', 'solid red 2px');
        }

    }
)
$("#button4").click(
    

    function () {
        if ($('#szybkosc_kolor>div>input').val() != '' && $('#szybkosc_kolor>div>input').val() != ' ') {
            $('#szybkosc_czarny').animate({ opacity: 1 }, czas);
            allbuttons[5].disabled = false;
            $("#szybkosc_kolor>div>input").css('border', 'solid red 0px');
            $("#szybkosc_kolor>div>input").attr('readonly', 'readonly');
        }
        else {
            $('#szybkosc_kolor>div>input').val('');
            $("#szybkosc_kolor>div>input").attr("placeholder", "to pole nie moze byc puste");
            $("#szybkosc_kolor>div>input").css('border', 'solid red 2px');
        }

    }
)
$("#button5").click(
    
    function () {
        if ($('#szybkosc_czarny>div>input').val() != '' && $('#szybkosc_czarny>div>input').val() != ' ') {
            $('#gwarancja').animate({ opacity: 1 }, czas);
            allbuttons[6].disabled = false;
            $("#szybkosc_czarny>div>input").css('border', 'solid red 0px');
            $("#szybkosc_czarny>div>input").attr('readonly', 'readonly');
        }
        else {
            $('#szybkosc_czarny>div>input').val('');
            $("#szybkosc_czarny>div>input").attr("placeholder", "to pole nie moze byc puste");
            $("#szybkosc_czarny>div>input").css('border', 'solid red 2px');
        }

    }
)
$("#button6").click(
    

    function () {
        if ($('#gwarancja>div>input').val() != '' && $('#gwarancja>div>input').val() != ' ') {
            $('#wifi').animate({ opacity: 1 }, czas);
            allbuttons[7].disabled = false;
            $("#gwarancja>div>input").css('border', 'solid red 0px');
            $("#gwarancja>div>input").attr('readonly', 'readonly');
        }
        else {
            $('#gwarancja>div>input').val('');
            $("#gwarancja>div>input").attr("placeholder", "to pole nie moze byc puste");
            $("#gwarancja>div>input").css('border', 'solid red 2px');
        }

    }
)
$("#button7").click(
   
    function () {
        if ($('#wifi>div>input').val() != '' && $('#wifi>div>input').val() != ' ') {
            $('#duplex').animate({ opacity: 1 }, czas);
            allbuttons[8].disabled = false;
            $("#wifi>div>input").css('border', 'solid red 0px');
            $("#wifi>div>input").attr('readonly', 'readonly');
        }
        else {
            $('#wifi>div>input').val('');
            $("#wifi>div>input").attr("placeholder", "to pole nie moze byc puste");
            $("#wifi>div>input").css('border', 'solid red 2px');
        }

    }
)
$("#button8").click(
    
    function () {
        if ($('#duplex>div>input').val() != '' && $('#duplex>div>input').val() != ' ') {
            $('#cena').animate({ opacity: 1 }, czas);
            allbuttons[9].disabled = false;
            $("#duplex>div>input").css('border', 'solid red 0px');
            $("#duplex>div>input").attr('readonly', 'readonly');
        }
        else {
            $('#duplex>div>input').val('');
            $("#duplex>div>input").attr("placeholder", "to pole nie moze byc puste");
            $("#duplex>div>input").css('border', 'solid red 2px');
        }

    }
)
$("#button10").click(

    function () {
        if ($('#ocena_eksperta>div>input').val() != '' && $('#ocena_eksperta>div>input').val() != ' ') {
            if ($('#ocena_eksperta>div>input').val() <= 10 && $('#ocena_eksperta>div>input').val()>=0 )
            {
                $('#zdjecie').animate({ opacity: 1 }, czas);
                allbuttons[11].disabled = false;
                $("#ocena_eksperta>div>input").css('border', 'solid red 0px');
                $("#ocena_eksperta>div>input").attr('readonly', 'readonly');
            }
            else
            {
                $('#ocena_eksperta>div>input').val('');
                $("#ocena_eksperta>div>input").attr("placeholder", "podano nie poprawna ocene eksperta ");
                $("#ocena_eksperta>div>input").css('border', 'solid red 2px');
            }
           
        }
        else {
            $('#ocena_eksperta>div>input').val('');
            $("#ocena_eksperta>div>input").attr("placeholder", "to pole nie moze byc puste");
            $("#ocena_eksperta>div>input").css('border', 'solid red 2px');
        }

    }
)
$("#button11").click(

    function () {
        if ($('#plik_zdjecie').val() != '' && $('#plik_zdjecie').val() != ' ') {
            console.log($('#plik_zdjecie').val());
            $('#zakoncz').animate({ opacity: 1 }, czas);
            allbuttons[12].disabled = false;
            $('#plik_zdjecie').css('border', 'solid red 0px');
        }
        else {
            $('#plik_zdjecie').val('');
            $("#plik_zdjecie").attr("placeholder", "to pole nie moze byc puste");
            $("#plik_zdjecie").css('border', 'solid red 2px');
        }

    }
)
