
function validation(cos) {
    if(cos==''||cos==' ')
    {
        return false;
    }
    let tab = ['1', '2', '.', '3', '4', '5', '6', '7', '8', '9', '0'];
    let test = 0;
    var test_kropki = 0;
    var licznik_po_przecinku = 0;
    for (let i = 0; i < cos.length; i++) {
        for (let j = 0; j < tab.length; j++) {
            if (cos[i] == tab[j]) {
                test = 1;
            }

        }
        if (cos[i] == '.') {

            test_kropki++;

        }
        if (test == 0 || test_kropki == 2||licznik_po_przecinku>2) {
            return false;
        }
        test = 0;
        if(test_kropki>0)
        {
            licznik_po_przecinku++;
        }


    }
    return true;
}



var button_cena = document.getElementById('myInput_cena');

button_cena.addEventListener('keyup',function(){
    var input_cena = document.getElementById('myInput_cena');
    var tresc_input = input_cena.value;
    var dodaj_id_block = document.getElementById('keyup');
    if(validation(tresc_input)==false)
    {
        input_cena.style.border='2px solid red';
        input_cena.value='';
        input_cena.placeholder = 'podaj poprawna cene';
    }
    else
    {
        console.log('dziala1');
        input_cena.style.border = '';
        
        
    
    }
})