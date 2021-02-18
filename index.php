<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();
// Set session variables
if (isset($_POST['submit']) === true) {
    $_SESSION["email"] = $_POST['email'];
    $_SESSION["street"] = $_POST['street'];
    $_SESSION["streetNumber"] = $_POST['streetNumber'];
    $_SESSION["city"] = $_POST['city'];
    $_SESSION["zipcode"] = $_POST['zipcode'];
}
// define variables and begin with empty values
$emailErr = $streetErr = $streetNumberErr = $cityErr = $zipcodeErr = '';
$street = $streetNumber = $city = $zipcode = '';

//validation email
/*if (isset($_POST['email'])== true  && empty ($_POST['email'])==false) {
    $email=$_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)==true){
      echo  'Email accepted';
    }else{
        echo 'Not valid email';
    }
}*/


//all inputs must be filled
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // isset="exists"   !empty= is different than empty
    /*if (!empty ($_POST['email'] && (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { //use var $_POST['email'] cause we need to validate what client wrote, not the empty variable I created
            $email = $_POST['email'];
        } else {
            $emailErr = 'Enter a valid email';
        }*/

        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $emailErr = 'Enter a valid email';
        } else {
            $email = $_POST['email'];
        }

        if (empty ($_POST['email'])) {
            $emailErr ='Enter a valid email';
        }else{
            $email= $_POST['email'];
        }

        if (empty($_POST['street'])) {
            $streetErr = 'Street missing';
        } else {
            $street = $_POST['street'];
        }

        if (empty($_POST['streetNumber'])) {
            $streetNumberErr = 'Number missing';
        } elseif (!is_numeric($_POST['streetNumber']))
            $streetNumberErr = 'Just numbers allowed';
        else {
            $streetNumber = $_POST['streetNumber'];
        }

        if (empty($_POST['city'])) {
            $cityErr = 'City missing';
        } else {
            $city = $_POST['city'];
        }

        if (empty($_POST['zipcode'])) {
            $zipcodeErr = 'Zip code missing';
        } elseif (!is_numeric($_POST['zipcode'])) $zipcodeErr = 'Just numbers allowed';
        else {
            $zipcode = $_POST['zipcode'];
        }

}

// mail send
    //mail(to "for me",subject , messages)




/* function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}*/

//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;



//all inputs must be filled
// isset="exists"   !empty= is different than empty


require 'form-view.php';