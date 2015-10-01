<?php

session_start();

if(isset($_SESSION["puppies"])){
    
    $puppies = $_SESSION["puppies"];
    $puppyId = $_POST["puppyId"];

    array_splice($puppies, $puppyId, 1);

    $_SESSION["puppies"] = $puppies;
    
}