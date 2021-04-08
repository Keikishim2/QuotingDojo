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
		<link rel='stylesheet' type='text/css' href='index.less'/>
    </head>
    <body>
    <?php 
        if(isset($_SESSION['errors']))
	{
		foreach($_SESSION['errors'] as $error)
		{
    ?>
			<span class="danger"><?= $error ?></span>
    <?php 	
            }
		unset($_SESSION['errors']);
	}
    ?>
	<div id = "wrapper">
		<h1>Welcome to QuotingDojo</h1>
		<form id="add" action="process1.php" method="post">
			<input type="hidden" name="action" value="add"><br>
			<label>Your name: <input type="text" name="name"></label><br><br>
			<label>Your quote:  <textarea name="quote"></textarea></label><br><br>
			<a href id='quote'>Add my quote!</a>
		</form>
		<form action="process1.php" method="post">
			<input type="hidden" name="action" value="skip">
			<a href id='skip'>Skip to Quotes!</a>
		</form>
	</div>
    </body>
</html>