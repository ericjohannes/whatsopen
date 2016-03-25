<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>What's open South Bend: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>What's open South Bend</title>
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
                    <h1>What's open in South Bend</h1>
                </div>
            
                <ul class="nav nav-pills">
                    <li><a href="index.php">Start over</a></li>
                    <li><a href="find.php">Find</a></li>
                    <li><a href="check.php">Check</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
            <div id="middle">
