//on click handler for the nav-bar
document.getElementById("nav-bar").addEventListener("click", function() {

    //Call the changeColor function passing
    //the object clicked on as a parameter.
    changeColor(this);

    //run test for debugging only
    testRandom();

});

function changeColor(element) {

    var red, green, blue;

    red = randomColor();
    green = randomColor();
    blue = randomColor();

    element.style.backgroundColor = "rgb(" + red +
        "," + green + "," + blue + ")";
}

function randomColor() {

    var randomColor = Math.floor(Math.random() * 256);

    return randomColor;

}

//unit test
function testRandom() {

    var testRuns = 1000;

    for (var i = 0; i < testRuns; i++) {

        var result = randomColor();

        //if the result is less greater than 255
        if (result > 255) {

            console.log(result);

        }

        //if the result is less than 0
        if (result < 0) {

            console.log(result);

        }

    }

}
