<form action="deposit.php" method="post">
    <fieldset>
        <div class="form-group">
            Your current balance is $ <?= $bal['0']["cash"] ?>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="amount" placeholder=" Amount" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">
            <span aria-hidden="true" class="glyphicon glyphicon-usd"></span>
            Deposit
            </button>
        </div>
    </fieldset>
</form>

   