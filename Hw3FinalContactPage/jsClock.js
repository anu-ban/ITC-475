var hours = document.getElementById("hours");
var minutes = document.getElementById("minutes");
let image = document.getElementById("sunOrMoon");
var phase = document.getElementById("phase");

function clock() {
    var h = new Date().getHours();
    var i = new Image();
   
    
    var m = new Date().getMinutes();
    var s = new Date().getSeconds();
    i = 'https://previews.123rf.com/images/mcherevan/mcherevan1804/mcherevan180400059/99301508-hand-drawn-vector-illustration-of-yellow-sun-icon-isolated-on-white-sun-logo-design-summer-sun-logot.jpg';
    var am = "Good Morning";

    if(h==0){
        h= h+12;
    }

    if (h >= 12 && h<=17) 
    {
        i = 'https://previews.123rf.com/images/mcherevan/mcherevan1804/mcherevan180400059/99301508-hand-drawn-vector-illustration-of-yellow-sun-icon-isolated-on-white-sun-logo-design-summer-sun-logot.jpg';
        h = h - 12;
        var am = "Good Afternoon";
    }
    if (h>=17){
        i = 'https://cdn.dribbble.com/users/1091150/screenshots/11185331/media/69c4024aadec36e96d7b5cb2562b0b2a.jpg?compress=1&resize=400x300';
        h = h - 12;
        var am = "Good Evening";
    }

    h = h < 10 ? "0" + h : h;
    m = m < 10 ? "0" + m : m;

hours.innerHTML = h;
minutes.innerHTML = m;
phase.innerHTML = am;
sunOrMoon.src= i;

}
clock();
