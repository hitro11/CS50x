<?php
    
     // configuration
    require("../includes/config.php");
    
    $history = CS50::query("SELECT * from history WHERE userid = ?", $_SESSION["id"]);
    $info = [];
    
    foreach ($history as $h)
    {
       $info[] = 
            [
                "id" => $h['id'],
                "timestamp" => $h['timestamp'],
                "action" => $h['action'],
                "stock" => $h['stock'],
                "shares" => $h['shares'],
                "price" => $h['price']
            ];
     }
    
    render("../views/history_view.php", ["title" => "History", "info" => $info]);
    
?>