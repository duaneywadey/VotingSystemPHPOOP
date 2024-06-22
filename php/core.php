<?php 

date_default_timezone_set('Asia/Manila');
session_start();

require_once "dbConfig.php";

// Autoload classes
spl_autoload_register(function($className) {
    $path = "classes/";
    $extension = ".php";
    $fullPath = $path.$className.$extension;

    require_once $fullPath;
});

$candidateObj = new Candidate($pdo);
$categoryObj = new Category($pdo);
$electionObj  = new Election($pdo);
// $userObj  = new User($pdo);
$voteObj  = new Vote($pdo);
