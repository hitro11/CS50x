<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];
    $res = "SELECT * FROM places WHERE ";
    
    if (strpbrk($_GET["geo"], '0123456789') != false)
    {
        $res .= "postal_code LIKE ?";
    }
    
    else
    {
        $res .= "place_name LIKE ?";
    }
    
    $places = CS50::query($res, $_GET["geo"] . "%");
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>