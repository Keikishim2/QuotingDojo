<?php

session_start();
require_once("new-connection.php");
global $connection;

$errors=array();

if(isset($_POST['action']) && $_POST['action']=="add")
{
	if(strlen($_POST['name']) < 1)
	{
		$errors[] = "Name cannot be empty. Please enter your name.";
	}
	if(strlen($_POST['quote']) < 1 )
	{
		$errors[] = "Quote cannot be empty. Please enter your quote.";
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

		$query_insert = "INSERT INTO quotes (name, quote, created_at, updated_at)
					VALUES ('{$esc_name}', '{$esc_quote}', NOW(), NOW())";

		run_mysql_query($query_insert);
		
			$query_select = "SELECT * FROM quotes";
			$quote = fetch_all($query_select); 
			header("Location: main.php");

		if(!empty($quote))
		{
			$_SESSION['entered_quote'] = $quote;
			header("Location: main.php");
		}
	}
}

if(isset($_POST['action']) && $_POST['action']=="skip")
{
	header("Location: main.php");
}

if(isset($_POST['action']) && $_POST['action'] == "goback")
{
	header("Location: index1.php");
	exit();
}

?>