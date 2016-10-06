<form action="sell.php" method="post">
    <fieldset>
        <div>
            <select name="stock_sell">
                <option value="">Choose</option>
                    <?php
                    foreach($ownedStock as $os) 
                    {
                        echo '<option value="'. $os["stock"] .'">'. $os["stock"] .'</option>';
                    }
                    ?>
            </select>
        </div>
    </fieldset>
<p></p>
            
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="no" placeholder="No. of shares" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-shopping-cart"></span>
                &nbsp; Sell
            </button>
        </div>
    </fieldset>
</form>
        
<div>
     or <a href="register.php">register</a> for an account
</div>

  