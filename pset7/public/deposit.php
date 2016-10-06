<?php
    
     // configuration
    require("../includes/config.php");
   
    
     if ($_SERVER["REQUEST_METHOD"] == "GET")
    { 
        // find user's balance
        $bal = CS50::query("SELECT cash from users WHERE id = ?", $_SESSION["id"]);
        render("deposit_form.php", ["title" => "Deposit Funds", "bal" => $bal]);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //update user's cash amount
        CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["amount"], $_SESSION["id"]);
        $balNew = CS50::query("SELECT cash from users where id = ?", $_SESSION["id"]);
        render("../views/deposit.php", ["title" => "Deposit Successful", "bal" => $balNew]);
    }

?>