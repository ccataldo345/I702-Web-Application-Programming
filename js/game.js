function myFunction() {
    var x, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("numb").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x) || x < 1 || x > 10) {
        text = "Your number is not valid, please try again!";
    } else {
        text = "Your number is correct! Good job! Now you can continue shopping with us! :-)";
    }
    document.getElementById("demo").innerHTML = text;
}