$("#head_bar").animate({ opacity: 1 }, 2000);
var licznik = document.getElementById('counter');
var sec = 2;
const time = setInterval(function () {
    licznik.innerHTML = sec;
    sec --;
    if(sec == -1)
    {
        clearInterval(time);
    }
}, 1000);