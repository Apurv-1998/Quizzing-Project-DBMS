<?php

// connect to the database
include('config.php');

// confirm that the 'id' variable has been set
if (isset($_GET['id']))
{
// get the 'id' variable from the URL
$id_quotes = $_GET['id'];
$id = str_replace("'", "", $id_quotes);

$query = "DELETE FROM quiz_users WHERE id=$id";
$result = mysqli_query($con, $query);

// redirect user after delete is successful
header("Location: index.php");
}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: index.php");
}

?>