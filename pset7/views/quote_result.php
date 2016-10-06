<form action="quote.php" method="post">
    <fieldset>
        <div class= "results">
           <p> <?php print "Stock: " .  $_POST["name"]; ?> </p>
       </div>
       
       <div class= "results">
           <p> <?php print "Symbol: " . $_POST["symbol"]; ?> </p>
       </div>
       
       <div class= "results">
           <p> <?php print "Price:       $       " . $_POST["price"] . " per share"; ?> </p>
       </div>
    </fieldset>
</form>
        
   
<form action="quote.php" method="get">
    <fieldset>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Search another stock
            </button>
        </div>
     </fieldset>
</form>