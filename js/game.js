function myFunction() {
    var x, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("numb").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x) || x < 1234 || x > 1234) {
        result = "Wrong password, please try again!";
    } else {

        //text = "Your number is correct! Good job! Now you can continue shopping with us! :-)";
        var str = "Upload a new product";
        var result = str.link("addproduct.php"); 
    }
    //document.getElementById("demo").innerHTML = text;
    document.getElementById("demo").innerHTML = result;

}