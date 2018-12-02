<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Dashboard</a>
  <a href="add_category.php">Add Categories</a>
  <a href="add_questions.php">Add Questions</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

<section>
    <style>
      tr:hover{
    /*border: 2px solid gray; */
      border: 2px solid red;
      color:green;
      }
      
      </style>
      <div class="container" id="igenda">
        <div class="row">
          <div class="col-lg-3">
          </div>
           <div class="col-lg-6">
            <center><h2>Add New Question</h2></center>
            <form class="form-horizontal" method='POST' action="add_question_submit.php" id="addQuestionForm">
              <div class="form-group">
                  <textarea rows="4" cols="50" name="question" form="addQuestionForm" placeholder="Enter Question in brief.... " required></textarea><br>

                  <input type="text" class="form-control" id="answer1" placeholder="Enter Answer 1" name="answer1" required><br>

                  <input type="text" class="form-control" id="answer2" placeholder="Enter Answer 2" name="answer2" required><br>

                  <input type="text" class="form-control" id="answer3" placeholder="Enter Answer 3" name="answer3" required><br>

                  <input type="text" class="form-control" id="answer4" placeholder="Enter Answer 4" name="answer4" required><br>

                  <input type="number" class="form-control" id="answer" placeholder="Enter Correct Answer (only numeric like 1 or 2 or 3 or 4 from above answers)" name="answer" min="1" max="4" required><br>

                  <input type="number" class="form-control" id="category_id" placeholder="Enter category id (only numeric)" name="category_id" required><br>

                  <input type="submit" name="submit" value="submit" class="btn btn-primary">

              </div>
            </form>
      </div>
    </section>   
</body>
</html> 