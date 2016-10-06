<?php

    // configuration
    require("../includes/config.php"); 
    
    // query database for user's shares of each stock owned and remaining cash.
    $pf = CS50::query("SELECT stock, shares FROM portfolio WHERE userid = ?", $_SESSION["id"]);
    $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    $info = [];
    
    foreach ($pf as $pf)
    {
        $stock = lookup($pf["stock"]);
        if ($stock != false)
        {
            $info[] = 
            [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "symbol" => $stock["symbol"],
                "shares" => $pf["shares"]
            ];
        }
    }
    
    
    
    // render portfolio
    render("portfolio.php", ["title" => "Portfolio", "info" => $info]);

?>
