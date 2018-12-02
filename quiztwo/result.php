<?php
session_start();
?>


<?php 
require 'config.php';
if(!empty($_SESSION['name'])){
    
    $right_answer=0;
    $wrong_answer=0;
    $unanswered=0; 
  
   $keys=array_keys($_POST);//The array_keys() function returns an array containing the keys?key:The key can be any value possible for an array index
   $order=join(",",$keys);//The join() function is used to join array elements with a string.
   
   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;
   
   $response=mysqli_query( $con, "select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysqli_connect_error($con));
   
   while($result=mysqli_fetch_array($response)){
       if($result['answer']==$_POST[$result['id']]){
               $right_answer++;
           }else if($_POST[$result['id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
   }
   $name=$_SESSION['name']; 

   mysqli_query( $con, "UPDATE quiz_users set score='$right_answer' where user_name='$name'");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mock Test and Examination Management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css" rel="stylesheet" media="screen">
        

    </head>
    <body>
        <header>
            <p class="text-center">
                Welcome <?php 
                if(!empty($_SESSION['name'])){
                    echo $_SESSION['name'];
                }?>
               
            </p>
        </header>
        <div class="container result">
            <div class="row"> 
                    <div class='result-logo'>
                            <img src="image/Quiz_result.png" class="img-responsive"/>
                    </div>    
           </div>  
           <hr>   
           <div class="row">                 
                  <div class="col-xs-18 col-sm-9 col-lg-9"> 
                     <a href="<?php echo BASE_PATH.'index.php';?>" class='btn btn-primary'>Start new Quiz!!!</a>                   
                     <a href="<?php echo BASE_PATH.'logout.php';?>" class='btn btn-primary'>Logout</a>
                   
                       <div style="margin-top: 10%">
                        <p>Total no. of right answers : <span class="answer"><?php echo $right_answer;?></span></p>
                        <p>Total no. of wrong answers : <span class="answer"><?php echo $wrong_answer;?></span></p>
                        <p>Total no. of Unanswered Questions : <span class="answer"><?php echo $unanswered;?></span></p>                   
                       </div> 
                   
                   </div>
                    
            </div>    

        </div>
                    <div class="row">    
                    
            
        <footer>
            <p class="text-center" id="foot">
                <h5><center>&copy; ABC technologies 2018 </center></h5>
            </p>
        </footer>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/jquery.validate.min.js"></script>

        

    </body>
</html>
<?php }else{
    
 header( 'Location: http://localhost/quiz/quiztwo/index.php' ) ;
      
}?>