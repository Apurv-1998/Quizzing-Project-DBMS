<?php
require_once('config.php');
if(isset($_POST['submit']))
{

$question = mysqli_escape_string($con,$_POST['question']);
$answer1 = mysqli_escape_string($con,$_POST['answer1']);
$answer2 = mysqli_escape_string($con,$_POST['answer2']);
$answer3 = mysqli_escape_string($con,$_POST['answer3']);
$answer4 = mysqli_escape_string($con,$_POST['answer4']);
$answer = mysqli_escape_string($con,$_POST['answer']);
$category_id = mysqli_escape_string($con,$_POST['category_id']);
//return $category_id;

$query = "INSERT INTO  questions(question_name, answer1, answer2, answer3, answer4, answer, category_id)VALUES('$question', '$answer1', '$answer2', '$answer3', '$answer4', '$answer', '$category_id')";
$result = mysqli_query($con, $query);

header("Location: add_questions.php");
}

?>