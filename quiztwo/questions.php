<?php
session_start();
?>


<?php 
require 'config.php';
if(isset($_POST['submit'])){
$category='';
 if(!empty($_POST['name'])){
     $name=$_POST['name'];
     $category=$_POST['category'];
     mysqli_query( $con, "INSERT INTO quiz_users ( user_name,score,category_id)VALUES ( '$name',0,'$category')") or die(mysql_error());
     $_SESSION['name']= $name;
    
 } }
$category=$_POST['category'];
if(!empty($_SESSION['name'])){
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ABC technologies 2018</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
		<script src="js/countdown.js"></script>
		<style>
			.container {
				margin-top: 110px;
			}
			.error {
				color: #B94A48;
			}
			.form-horizontal {
				margin-bottom: 0px;
			}
			.hide{display: none;}
		</style>
	</head>
	<body>
	    <header>
            <p class="text-center">
                Welcome : <?php if(!empty($_SESSION['name'])){echo $_SESSION['name'];}?>
            </p>
        </header>
        <div id='timer'>
            <script type="application/javascript">
            var myCountdownTest = new Countdown({
                                    time: 160, 
                                    width:200, 
                                    height:80, 
                                    rangeHi:"hour"
                                    });
           </script>
            
        </div>
        
		<div class="container question">
			<div class="col-xs-12 col-sm-8 col-md-8 col-xs-offset-4 col-sm-offset-3 col-md-offset-3">
				<p>
				ABC technologies 2018	
				</p>
				<hr>
				<form class="form-horizontal" role="form" id='login' method="post" action="result.php">
					<?php
					$number_question = $_POST['num_questions'];
					$row = mysqli_query( $con, "select * from questions where category_id=$category ORDER BY RAND()");
					$rowcount = mysqli_num_rows( $row );
					$remainder = $rowcount/$number_question;
					$i = 0;
					$j = 1; $k = 1;
					?>
					<?php while ( $result = mysqli_fetch_assoc($row) ) {
						 if ( $i == 0) echo "<div class='cont' id='question_splitter_$j'>";?>
						<div id='question<?php echo $k;?>' >
						<p class='questions' id="qname<?php echo $j;?>"> <?php echo $k?>.<?php echo $result['question_name'];?></p>
						<input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
						<br/>
						<input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
						<br/>
						<input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
						<br/>
						<input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
						<br/>
						<input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/> <!-- When no option is marked chage the answer id to 5 -->                                                                   
						<br/>
						</div>
						<?php
							 $i++; 
							 if ( ( $remainder < 1 ) || ( $i == $number_question && $remainder == 1 ) ) {
							 	echo "<button id='".$j."' class='next btn btn-primary' type='submit'>Finish</button>";
							 	echo "</div>";
							 }  elseif ( $rowcount > $number_question  ) {
							 	if ( $j == 1 && $i == $number_question ) {
									echo "<button id='".$j."' class='next btn btn-primary' type='button'>Next</button>";
									echo "</div>";
									$i = 0;
									$j++;           
								} elseif ( $k == $rowcount ) { 
									echo " <button id='".$j."' class='previous btn btn-primary' type='button'>Previous</button>
												<button id='".$j."' class='next btn btn-primary' type='submit'>Finish</button>";
									echo "</div>";
									$i = 0;
									$j++;
								} elseif ( $j > 1 && $i == $number_question ) {
									echo "<button id='".$j."' class='previous btn btn-primary' type='button'>Previous</button>
							                    <button id='".$j."' class='next btn btn-primary' type='button' >Next</button>";
									echo "</div>";
									$i = 0;
									$j++;
								}
								
							 }
							  $k++;
					     } ?>	
				</form>
			</div>
		</div>
       <footer>
            <p class="text-center" id="foot">
                 <h5><center> &copy; ABC technologies  2018 </center></h5>
            </p>
        </footer>



		
		
		<script>
		$('.cont').addClass('hide');

		$('#question_splitter_1').removeClass('hide');
		 
		$(document).on('click','.next',function(){
		    last=parseInt($(this).attr('id'));  console.log( last );   
		    nex=last+1;
		    $('#question_splitter_'+last).addClass('hide');
		    
		    $('#question_splitter_'+nex).removeClass('hide');
		});
		
		$(document).on('click','.previous',function(){
		    last=parseInt($(this).attr('id'));     
		    pre=last-1;
		    $('#question_splitter_'+last).addClass('hide');
		    
		    $('#question_splitter_'+pre).removeClass('hide');
		});
            
         setTimeout(function() {
             $("form").submit();
          }, 60000);
		</script>
	</body>
</html>
<?php }else{
    
 header( 'Location: http://localhost/quiztwo/index.php' ) ;
      
}
?>