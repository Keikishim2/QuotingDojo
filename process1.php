<?php

session_start();
require_once("new-connection.php");
global $connection;

$errors=array();

if(isset($_POST['action']) && $_POST['action']=="add")
{
	if(strlen($_POST['name']) < 1)
	{
		$errors[] = "Name cannot be empty!";
	}
	if(strlen($_POST['quote']) < 1 )
	{
		$errors[] = "Quotes cannot be empty!";
	}
	if(count($errors) > 0)
	{
		$_SESSION['errors'] = $errors;
		header("Location: index1.php");
		exit();
	}
	else 
	{
		$esc_name = mysqli_real_escape_string($connection, $_POST['name']);
		$esc_quote= mysqli_real_escape_string($connection, $_POST['quote']);

        $date = date('g:i a F j Y');
        // date('m/d/y h:i A', strtotime($user['created_at'])

		$query_insert = "INSERT INTO quotes (name, quote, created_at)
					VALUES ('{$esc_name}', '{$esc_quote}', '{$date}')";
        // %h %i %p %M %e %Y

        // $date = date('Y-m-d H:i:s');
        // mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");
		run_mysql_query($query_insert);
		
			$query_select = "SELECT * FROM quotes";
			$quote = fetch_all($query_select); 
			header("Location: main1.php");

		if(!empty($quote))
		{
			$_SESSION['entered_quote'] = $quote;
			header("Location: main1.php");
		}
	}
}

if(isset($_POST['action']) && $_POST['action']=="skip")
{
	header("Location: main1.php");
}

if(isset($_POST['action']) && $_POST['action'] == "goback")
{
	header("Location: index1.php");
	exit();
}

?>