<?php

// connect to the database
include('config.php');

// confirm that the 'id' variable has been set
if (isset($_GET['id']))
{
// get the 'id' variable from the URL
$id_quotes = $_GET['id'];
$id = str_replace("'", "", $id_quotes);

$query = "DELETE FROM categories WHERE id=$id";
$result = mysqli_query($con, $query);

// redirect user after delete is successful
header("Location: add_category.php");
}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: add_category.php");
}

?>