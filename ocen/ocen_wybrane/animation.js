var czas = 20;

var zakoncz = document.querySelector("#button12");




$("#head_bar").animate({ opacity: 1 }, 1000);


$("#myInput").keyup(
    function()
    {
        console.log("up");
        if ($("#myInput").val() == '' || $("#myInput").val() == ' ')
        {
            $('#myInput').val('');
            $("#myInput").attr("placeholder", "to pole nie moze byc puste");
            $("#myInput").css('border', 'solid red 2px');
            zakoncz.disabled = true;
        }
        else
        {
            $("#myInput").css('border', 'solid red 0px');
            zakoncz.disabled = false;
        }
    }
)


$("#model_input").keyup(
    function () {
        console.log("up");
        if ($("#model_input").val() == '' || $("#model_input").val() == ' ') {
            $('#model_input').val('');
            $("#model_input").attr("placeholder", "to pole nie moze byc puste");
            $("#model_input").css('border', 'solid red 2px');
            zakoncz.disabled = true;
        }
        else {
            $("#model_input").css('border', 'solid red 0px');
            zakoncz.disabled = false;
        }
    }
)

$("#myInput_typy").keyup(
    function () {
        console.log("up");
        if ($("#myInput_typy").val() == '' || $("#myInput_typy").val() == ' ') {
            $('#myInput_typy').val('');
            $("#myInput_typy").attr("placeholder", "to pole nie moze byc puste");
            $("#myInput_typy").css('border', 'solid red 2px');
            zakoncz.disabled = true;
        }
        else {
            $("#myInput_typy").css('border', 'solid red 0px');
            zakoncz.disabled = false;
        }
    }
)

$("#ocena").keyup(
    function () {
        console.log("up");
        if ($("#ocena").val() == '' || $("#ocena").val() == ' ') {
            $('#ocena').val('');
            $("#ocena").attr("placeholder", "to pole nie moze byc puste");
            $("#ocena").css('border', 'solid red 2px');
            zakoncz.disabled = true;
        }
        else {
            if ($("#ocena").val() > 0 && $("#ocena").val()<=10)
            {
              $("#ocena").css('border', 'solid red 0px');  
                zakoncz.disabled = false;
            }
            else
            {
                $('#ocena').val('');
                $("#ocena").attr("placeholder", "podano nieprawidlowa cene");
                $("#ocena").css('border', 'solid red 2px');
                zakoncz.disabled = true;
            }
            
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
            zakoncz.disabled = false;
            
        }
        else {
            $('#plik_zdjecie').val('');
            $("#plik_zdjecie").attr("placeholder", "to pole nie moze byc puste");
            $("#plik_zdjecie").css('border', 'solid red 2px');
            zakoncz.disabled = true;
        }

    }
)
