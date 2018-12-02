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
              <center><b>Total Categories</b>&nbsp;&nbsp;<a  class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
          <span class="glyphicon glyphicon-plus"></span>
        </a>
      </center>
              <center>
              <center><br>
              <table class="table table " style="width:70%;text-align:center;border:1px solid #fff;" border="1">
            <thead>
              <tr>
               <th style="background:red;color:#fff;text-align:center;">id</th>
               <th style="background:red;color:#fff;text-align:center;">Category Name</th>
               <th style="background:red;color:#fff;text-align:center;">Actions</th>
              </tr>
            <thead>
            <tbody>
              <?php
              $query = "SELECT * FROM categories";
              $result = mysqli_query($con, $query);
              ?>
              
              <?php 
              while ($row = mysqli_fetch_array($result)) { ?>
                 <tr>
                 <td> <?php echo $row['id']; ?></td>
                 <td> <?php echo $row['category_name']; ?></td>
                 <td><a class="btn btn-danger btn-sm" href="delete_category.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
             <?php  }  ?>
             
            </tbody>
          </table><br><br>


          

          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Category</h4>
                </div>
                <div class="modal-body">
                  <form method="POST" action="cat_submit.php">
                  <div class="form-group">
                     <input type="text" class="form-control" placeholder="Enter category" name="category_name"><br>
                     <input type="submit" class="btn btn-primary" name="add_category" value="submit">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                 <!-- <div class="modal-footer"> -->
                    
               <!--  </div> -->
                  </form>
                </div>
              </div>
              
            </div>
          </div>  

      </div>
      </div>
    </section>   
</body>
</html> 
