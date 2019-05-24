<?php

// FUNCTION TO VALIDATE INPUT
function validator($data){
    $data = trim($data);
    $data = htmlentities($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = strtolower($data);
    return $data;

}?>