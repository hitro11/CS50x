<?php

    // configuration
    require("../includes/config.php");
    
     if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("buy_form.php", ["title" => "Buy Stocks"]);
    }
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if number of shares entered is a non-negative integer
        if (preg_match("/^\d+$/", $_POST["no"]) == false)
        {
            apologize("Enter a non-negative whole number of shares to be sold");
        }
        
        $stock = lookup($_POST["stock"]);
        if ($stock == false)
        {
            apologize("Invalid stock symbol entered.");
        }
        
        // total cost of buying stocks
        $cost = $stock["price"] * $_POST["no"] * 1.00;
        $time = CS50::query("SELECT NOW()");
        
        //check if total cost is less than or equal to balance
        $bal =  CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        if ($cost > $bal)
        {
            apologize("Insufficient funds to complete transaction!");
        }
        
        // update user's history
        CS50::query("INSERT INTO history (userid, action, stock, shares, price) VALUES (?,?,?,?,?)", 
        $_SESSION["id"], "buy", $stock["symbol"], $_POST["no"], $stock["price"]);
        
        // update user's account to reflect purchase
        CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $cost, $_SESSION["id"]);
        CS50::query("INSERT INTO portfolio (userid,stock, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + ?"  
        ,$_SESSION["id"], $stock["symbol"], $_POST["no"], $_POST["no"]);
       
        $cost = number_format($cost, 2);
        
        render("buy_result.php", ["title" => "Buy Stocks", "stocks" => $stock, "cost" => $cost]);
    } 
    
   
?>
