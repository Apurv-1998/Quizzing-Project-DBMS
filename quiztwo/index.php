<?php
require_once('config.php');//The difference between include and require arises when the file being included cannot be found: include will emit a warning ( E_WARNING ) and the script will continue, whereas require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script.require_once:If it is found that the file has already been included, calling script is going to ignore further inclusions.
session_start();//SESSION:An alternative way to make data accessible across the various pages of an entire website is to use a PHP Session.
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
				Welcome <?php if(!empty($_SESSION['name'])){echo $_SESSION['name'];}?>
			</p>
		</header>
		<div class="container">
			<div class="row">
                 <div class="col-xs-14 col-sm-7 col-lg-7">
					<div class="intro">
						<p class="text-center">
							Please enter your name
						</p>
						<?php if(empty($_SESSION['name'])){?>
						<form class="form-signin" method="post" id='signin' name="signin" action="questions.php">
							<div class="form-group">
								<input type="text" id='name' name='name' class="form-control" placeholder="Enter your Name"/>
								<span class="help-block"></span>
							</div>
                            <?php
				              $query = "SELECT * FROM categories";
				              $result = mysqli_query($con, $query); //mysql_query($query[, $resource])Used to send any MySQL command to the database server
				              ?>
				             
							<div class="form-group">
							    <select class="form-control" name="category" id="category">
							      <option value="">Choose your category</option>
                            <?php  while ($row = mysqli_fetch_array($result)) 
                                                                     // mysql_fetch_array($result) Return a row of data from the query’s result set
							{ ?>
				                 <option value="<?php echo $row['id']?>"> <?php echo $row['category_name']; ?>
				                 </option>
				             <?php  }  ?>                                
                                </select>
                                <span class="help-block"></span>
							</div>
							
							<div class="form-group">
							    <select class="form-control" name="num_questions" id="num_questions">
							      <option value="">Choose number of questions to be showed on each page </option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option> 
                                  <option value="5">5</option>                                
                                </select>
                                <span class="help-block"></span>
							</div>
							
							<br>
							<button class="btn btn-primary btn-block"  name = "submit" type="submit">
								Start quiz
							</button>
						</form>
						
						<?php }else{?>
						    <form class="form-signin" method="post" id='signin' name="signin" action="questions.php">

						    <?php
				              $query = "SELECT * FROM categories";
				              $result = mysqli_query($con, $query);//mysql_query($query[, $resource])Used to send any MySQL command to the database server
				              ?>
                            <div class="form-group">
                                <select class="form-control" name="category" id="category">
                                  <option value="">Choose your category</option>

                             <?php  while ($row = mysqli_fetch_array($result)) { ?>
				                 <option value="<?php echo $row['id']?>"> <?php echo $row['category_name']; ?>
				                 </option>
				             <?php  }  ?>    


                                </select>
                                <span class="help-block"></span>
                            </div>
                            
                            <div class="form-group">
							    <select class="form-control" name="num_questions" id="num_questions">
							      <option value="">Choose number of questions to be showed on each page </option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option> 
                                  <option value="5">5</option>                                
                                </select>
                                <span class="help-block"></span>
							</div>
                            
                            <br>
                            <button class="btn btn-primary btn-block" name = "submit" type="submit">
                                Start quiz
                            </button>
                        </form>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<p class="text-center" id="foot">
				<h5><center> &copy; ABC technologies 2018</center></h5>
			</p>
		</footer>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/jquery.validate.min.js"></script>

	<script>
			$(document).ready(function() {
				$("#signin").validate({
					submitHandler : function() {
					    console.log(form.valid());
						if (form.valid()) {
						    alert("sf");
							return true;
						} else {
							return false;
						}

					},
					rules : {
						name : {
							required : true,
							minlength : 2,
							remote : {
								url : "check_name.php",
								type : "post",
								data : {
									username : function() {
										return $("#name").val();
									}
								}
							}
						},
						category : {
						    required : true
						},
						num_questions : {
							required : true
						}
					},
					messages : {
						name : {
							required : "Please enter your name",
							remote : "Name is already taken, Please choose some other name"
						},
						category:{
                            required : "Please choose your category to start Quiz"
                       },
                       num_questions : {
                       	   required : "Please choose number of questions to be showed on each page"
                       }
					},
					errorPlacement : function(error, element) {
						$(element).closest('.form-group').find('.help-block').html(error.html());
					},
					highlight : function(element) {
						$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					success : function(element, lab) {
						var messages = new Array("That's Great!", "Looks good!", "You got it!", "Great Job!", "Smart!", "That's it!");
						var num = Math.floor(Math.random() * 6);
						$(lab).closest('.form-group').find('.help-block').text(messages[num]);
						$(lab).addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');
					}
				});
			});
		</script>


		

	</body>
</html>
