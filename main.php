<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quoting Dojo</title>
    </head>
    <body>
        <div id = "wrapper">
            <h1>Here are the awesome quotes!</h1>

    <?php	for($i=count($_SESSION['entered_quote'])-1; $i>=0; $i--)
            { ?>
                <?= $_SESSION['entered_quote'][$i]['quote'] ?>
                <?= $_SESSION['entered_quote'][$i]['name'] ?> at <?= $_SESSION['entered_quote'][$i]['created_at'] ?>
    <?php	} ?>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="goback">
                <input id="submit_goback" type="submit" value="Go Back">
            </form>
        </div>
    </body>
</html>