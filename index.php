<?php

//This is my controller for the midterm

//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require necessary files
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once('model/validation.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define routes
$f3->route('GET /', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /survey', function ($f3){

    //Reinitialize a session array
    $_SESSION = array();

    //Reinitialize a session array
    $userName = "";
    $userChoices = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //If the form has ben submitted, validated the data

        //Get user input
        $_SESSION['userChoices'] = implode(", ", $_POST['choices']);
        $_SESSION['name'] = $_POST['name'];
        header('location: summary');
    }

    //Get the data from the model
    $f3->set('choices', getChoices());

    //Store the user input in the hive
    $f3->set('userName', $userName);
    $f3->set('userChoice', $userChoices);

    //Display the Survey Form
    $view = new Template();
    echo $view->render('views/survey.html');
});

$f3->route('GET /summary', function(){
   //Display the summary
   $view = new Template();
   echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();