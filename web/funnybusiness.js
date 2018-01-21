doFunnyBusiness = false;
var speed = 5000;
var firstTime = true;

function funnybusiness () {
    var choosenSpeed;
    if (firstTime == true) {
        chosenSpeed = parseInt(prompt("Please choose a speed.", 5000));
        firstTime = false;
    }
    if (doFunnyBusiness == false) {
        doFunnyBusiness = true;
    }
    else {
        doFunnyBusiness = false;
        alert("You turned it off");
    }
    speed = chosenSpeed;
    colorChanger();
    setInterval(function() {
      // method to be executed;
        if (doFunnyBusiness == true) {
        colorChanger();
        }
    }, speed);
}

function colorChanger() {
    var all = document.getElementsByTagName("*");

    var j = 0;
        for (var i=0, max=all.length; i < max; i++) {
             all[i].style.backgroundColor = getRandomColor();
    }
}

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

