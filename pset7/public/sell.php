<?php

    // configuration
    require("../includes/config.php");
    
     if ($_SERVER["REQUEST_METHOD"] == "GET")
    {   
        $ownedStock = CS50::query("SELECT stock FROM portfolio WHERE userid = ?", $_SESSION["id"]);
        
        // render form
        render("sell_form.php", ["title" => "Sell Stocks", "ownedStock" => $ownedStock]);
    }
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if number of shares entered is  a non-negative integer
        if (preg_match("/^\d+$/", $_POST["no"]) == false)
        {
            apologize("Enter a non-negative whole number of shares to be sold");
        }
        
       $symbol = lookup($_POST["stock_sell"]);
       
       // check if user owns amount of shares in the stock they requested to sell
        $ownedShares = CS50::query("SELECT shares FROM portfolio WHERE userid = ? and stock = ?", $_SESSION["id"], $_POST["stock_sell"]);
        
        if (($ownedShares['0']['shares']) < ($_POST["no"] * 1.0))
        {
                apologize("You do not own " . $_POST["no"] . " shares of " . $symbol["name"]);
        }

        // total revenue from selling stocks
        $rev = $symbol["price"] * $_POST["no"] * 1.00;
        $time = CS50::query("SELECT NOW()");
        
        // update user's history
        CS50::query("INSERT INTO history (userid, action, stock, shares, price) VALUES (?,?,?,?,?)", 
        $_SESSION["id"], "sell", $symbol["symbol"], $_POST["no"], $symbol["price"]);
        
        // update user's balance to reflect sale
        CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $rev, $_SESSION["id"]);
        CS50::query("UPDATE portfolio set shares = shares - ? WHERE userid = ? AND stock = ?", $_POST["no"], $_SESSION["id"], $symbol["symbol"]);
        CS50::query("DELETE FROM portfolio WHERE shares = 0");
        $rev = number_format($rev, 2);
        
        render("sell_result.php", ["title" => "Buy Stocks", "symbol" => $symbol, "rev" => $rev]);
    } 
    
   
?>


?>