<?php

    // configuration
    require("../includes/config.php");
    
     if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("quote_form.php", ["title" => "Quote Lookup"]);
    }
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_POST = lookup($_POST["symbol"]);
        
        if ($_POST == false)
        {
            apologize("Invalid stock symbol entered.");
        }
        
        $_POST["price"] = number_format($_POST['price'], 2);
        render("../views/quote_result.php", ["title" => "Quote"]);
    } 
    
   
    
    
        

?>
