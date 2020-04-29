
var szerokosc_table = document.querySelector('table');
var szerokosc_table = szerokosc_table.offsetWidth;
var head_bar = document.querySelector('#head_bar2');
var corrent = 12;
$("body").animate({ opacity: 1 }, 1000);
head_bar.style.width = szerokosc_table - corrent;
// console.log(head_bar.offsetWidth); 

window.addEventListener("resize", function () {
  var szerokosc_table = document.querySelector('table');
  var szerokosc_table = szerokosc_table.offsetWidth;
  var head_bar = document.querySelector('#head_bar2');


  head_bar.style.width = szerokosc_table - corrent;
  //console.log(head_bar.offsetWidth); 
});

var photos = document.querySelectorAll(".zdjecie");
var body = document.querySelector("body");
for (let i = 0; i < photos.length; i++) {
  //  var div = document.querySelector("#preview");
  //  div.parentNode.removeChild(div);
  var div2 = document.querySelector(".preview");
  console.log(div2);
  if (div2 != null) {
    div2.parentNode.removeChild(div2);
  }

  photos[i].addEventListener("mouseover", function (e) {
    div = document.createElement("div");
    //console.log(e.srcElement.src);
    div.setAttribute("class", "preview");
    div.innerHTML = "<img src='" + e.srcElement.src + "' >"
    var x = event.clientX;
    var y = event.clientY;
    div.style.left = x - 320 + 'px';
    div.style.top = y + 'px';
    body.appendChild(div);
    $(div).animate({ opacity: 1 }, 1000);

  }, false);
}

for (let i = 0; i < photos.length; i++) {
  photos[i].addEventListener("mouseout", function (e) {
    var div = document.querySelectorAll(".preview");
    console.log(div);
    $(div).animate({ opacity: 0 }, 100, function () { div.parentNode.removeChild(div[0]); });




  }, false);
}
