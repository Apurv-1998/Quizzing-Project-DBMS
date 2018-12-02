<?php
require_once('config.php');

if(isset($_POST['add_category']))
{
    $category = $_POST['category_name'];
    $query = "INSERT INTO categories(category_name)VALUES('$category')";
    $result = mysqli_query($con, $query);
	header("Location: add_category.php");
}

?>