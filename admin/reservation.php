<?php
include('db.php');
include ('../auth_session.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESERVATION PWANI GOWNS</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="../index.php"><i class="fa fa-home"></i> Homepage</a>
                    </li>
                     <li>
                        <a  href="../logout.php"><i class="fa fa-home"></i> Logout</a>
                    </li>
                    
					</ul>

            </div>

        </nav>
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                           Welcome, <?php echo $_SESSION['username']; ?>  Please Reserve your gown here 
                        </h2>

                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            PERSONAL INFORMATION
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label>Title*</label>
                                            <select name="title" class="form-control" required >
												<option value selected ></option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Miss.">Miss.</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
												<option value="Prof.">Prof.</option>
												<option value="Rev .">Rev .</option>
												<option value="Rev . Fr">Rev . Fr .</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>First Name</label>
                                            <input name="fname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Last Name</label>
                                            <input name="lname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>School*</label>
                                            <input name="school" class="form-control" required>

                                </div>
								<?php

								$course = array("PhD. in Anthroplogy", "PhD. in Arts Subjects", "PhD. Agriculture and Marketing", "PhD. Animal Health and Management", "PhD. Agriculture and Enterprise Development", "Masters in Arts Subjects", "Master of Science (fisheries)", "Masters in Education (ECD)", "Master of Arts (Geography)", "Master of Science (Agronomy)", "Bachelor of Environmental Science", "Bachelor of Education (Special Education)", "Bachelor of Education (Science)", "Bachelor of Science (Actuarial Science)", "Bachelor of Science (Computer Science)", "Bachelor of Environmental Studies (Community Development)", "Diploma in Animal Health and Management", "Diploma in Horticulture", "Diploma in Community Development", "Diploma in Agricultural Engineering", "Diploma in Early Childhood Education");

								?>
								<div class="form-group">
                                            <label>Course*</label>
                                            <select name="course" class="form-control" required>
												<option value selected ></option>
                                                <?php
												foreach($course as $key => $value):
												echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
												endforeach;
												?>
                                            </select>
								</div>
								<div class="form-group">
                                            <label>Phone Number</label>
                                            <input name="phone" type ="text" class="form-control" required>
                                            
                               </div>
							   
                        </div>
                        
                    </div>
                </div>
                
                  
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            RESERVATION INFORMATION
                        </div>
                        <div class="panel-body">
								<div class="form-group">
                                            <label>Type Of Gown *</label>
                                            <select name="tgown"  class="form-control" required>
												<option value selected ></option>
                                                <option value="Doctorate">DOCTORATE</option>
                                                <option value="Masters">MASTERS</option>
												<option value="Bachelors">BACHELORS</option>
												<option value="Diploma">DIP/CERT</option>
                                            </select>
                              </div>
							 <div class="form-group">
                                            <label>Size of Gown</label>
                                            <select name="tsize" class="form-control" required>
												<option value selected ></option>
                                                <option value="Extra large">Extra large</option>
                                                <option value="Large">Large</option>
												<option value="Small">Small</option>
                                            </select>
                              </div>

							  <div class="form-group">
                                            <label>Graduation-date</label>
                                            <input name="cin" type ="date"  min=

                                     <?php 
                                     echo date('Y-m-d');
                                     ?> value="<?php print(date("Y-m-d")); ?>"
                                     class="form-control">
                                            
                               </div>
							   <div class="form-group">
                                            <label>Return-date(Must Be Atleast 1 Day After Graduation)</label>
                                            <input type="date" name="cout" min=

                                     <?php 
                                     echo date('Y-m-d');
                                     ?> value="<?php print(date("Y-m-d")); ?>"
                                            class="form-control">
                                            
                               </div> 
                       </div>
                        
                    </div>
                </div>
				
				
                <div class="col-md-12 col-sm-12">
                    <div class="well">
                        <h4>HUMAN VERIFICATION</h4>
                        <p>Type Below this code <?php $Random_code=rand(); echo$Random_code; ?> </p><br />
						<p>Enter the random code<br /></p>
							<input  type="text" name="code1" title="random code" />
							<input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
						<input type="submit" name="submit" class="btn btn-primary">
						<?php
							if(isset($_POST['submit']))
							{
							$code1=$_POST['code1'];
							$code=$_POST['code']; 
							if($code1!="$code")
							{
							$msg="Invalide code"; 
							}
							else
							{
							
									$con=mysqli_connect("localhost","root","","gowns");
									$check="SELECT * FROM gownbook WHERE email = '$_POST[email]'";
									$rs = mysqli_query($con,$check);
									$data = mysqli_fetch_array($rs, MYSQLI_NUM);
									if($data[0] > 1) {
										echo "<script type='text/javascript'> alert('User Already in Exists')</script>";
										
									}

									else
									{
										$new ="Not Conform";
										$newUser="INSERT INTO `gownbook`(`Title`, `FName`, `LName`, `Email`, `School`, `Course`, `Phone`, `TGown`, `TSize`,  `cin`, `cout`) VALUES ('$_POST[title]','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[school]','$_POST[course]','$_POST[phone]','$_POST[tgown]', '$_POST[tsize]', '$_POST[cin]','$_POST[cout]')";
										if (mysqli_query($con,$newUser))
										{
											echo "<script type='text/javascript'> alert('Gown booked successfully')</script>";
											
										}
										else
										{
											echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
											
										}
									}

							$msg="Your code is correct";
							}
							}
							?>
						</form>
							
                    </div>
                </div>
            </div>
           
                
                </div>
                    
            
				
					</div>
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
