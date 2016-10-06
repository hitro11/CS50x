<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a class="logo" href="/"><img alt="C$50 Finance" src="/img/logo.png"/></a>
                </div>
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li><a class="menulinks" href="index.php"><strong>PORTFOLIO</strong></a></li>
                        <li><a class="menulinks" href="deposit.php"><strong>DEPOSIT</strong></a></li>
                        <li><a class="menulinks" href="quote.php"><strong>QUOTE</strong></a></li>
                        <li><a class="menulinks" href="buy.php"><strong>BUY</strong></a></li>
                        <li><a class="menulinks" href="sell.php"><strong>SELL</strong></a></li>
                        <li><a class="menulinks" href="history.php"><strong>HISTORY</strong></a></li>
                        <li><a class="menulinks-logout" href="logout.php"><strong>LOG OUT</strong></a></li>
                    </ul>
                <?php endif ?>
            </div>

            <div id="middle">
