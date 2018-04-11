<?php
/* Create DB Connection */
$dbhost = "66.147.242.186";
$dbuser = "urcscon3_jlee";
$dbpass = "!QAZ2wsx";
$dbname = "urcscon3_jlee";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

/* Connection Fail -> Error*/
if (!$connection) {
    echo ("Connection failed: " . $conn->connect_error);
}

/* SQL Trimming +  Variable Setting + Variable Checking*/
// First Name Trim
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$firstName = Trim(stripslashes($firstName));
// Last Name Trim
$lastName  = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$lastName  = Trim(stripslashes($lastName));
// Email Trim
$email     = isset($_POST['email']) ? $_POST['email'] : '';
$email     = Trim(stripslashes($email));
// Password Trim
$password  = isset($_POST['password']) ? $_POST['password'] : '';
$password  = Trim(stripslashes($password));



/* If Register */
if (isset($_POST['register'])) {
    /* Pushed Modal Registration to DB */
    $sql    = "INSERT INTO urcscon3_jlee(firstname,lastname,email,password) VALUES('$firstName','$lastName','$email','$password')";
    $result = $connection->query($sql);
	echo "Account Registered";
}

/* If Sign In */
else if (isset($_POST['signin'])) {
    // Select Account from server using input >1 = sucess
    $query2  = "SELECT email FROM urcscon3_jlee WHERE email='$email'";
    $result2 = $connection->query($query2);
    $count   = mysqli_fetch_array($result2);
    $count2  = count($count);
    
    //create a cookie and set user data to cookie 1 day + redir
    if ($count2 > 0) {
        $cookie_name  = "email";
        $cookie_value = $email;
        $email        = '';
        $password     = '';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        echo '<script type="text/javascript">
     window.location = "http://localhost/CSC174-Midterm-master/account.php"
   </script>';
    }
    
    // Sign In fail 
    else {
        // Clear Cookie
        $email        = '';
        $cookie_name  = "email";
        $cookie_value = $email;
        setcookie($cookie_name, $cookie_value, time() + (3600), "/");
        // Reload + Alert
        echo '<script language="javascript">';
        echo 'alert("Wrong Password or Username")';
        echo '</script>';
    }
}
?>
<!-- HTML Begins -->
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- https://mdbootstrap.com/css/animations/-->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/favicon.ico">
      <title>Sterling Cooper</title>
      <!-- Bootstrap core Files -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <!-- JQuery -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <!-- Popper.JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <!-- Bootstrap Min JS -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <!-- Custom User Styles -->
      <link href="cover.css" rel="stylesheet">
	  	<!-- Fonts -->
		<link rel="icon" href="favicon.ico" type="images/logos/favicon.ico" />

		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
		
   </head>
   <body>
      <div class="site-wrapper"> <!-- Mass container + styles -->
         <div class="site-wrapper-inner"> <!-- container top pane styles -->
            <div class="cover-container"> <!-- cover container -->
               <div class="masthead clearfix"> <!-- all top/nav content container -->
                  <h3 class="masthead-brand"><a href ="index.php">Sterling Cooper </a></h3>
                  <div class="inner"> <!-- nav  -->
                     <nav>
                        <ul class="nav masthead-nav">
                         <!--  <li class="active"><a href="index.php">Home</a></li> -->
                           <li><a href="#" data-toggle="modal" data-target="#myModal">Login </a></li>
						   <li><a href="#second-view">About</a></li>
						   <li><a href="#third-pane">Portfolio</a></li>
						   
                        </ul>
                     </nav>
                  </div>
               </div>
               <div class="inner cover"> <!-- first pane mid page content -->
                  <br>
                  <h1 class="cover-heading">Sterling Cooper</h1>
                  <p class="lead">The Sterling Cooper Advertising Agency is one of the largest advertising agencies in New York City. Located on Madison Avenue, Sterling Cooper has been in the marketing indusry for over 50 years.
                  </p>
                  <p class="lead">
                     <a href="#third-pane" class="btn btn-lg btn-default">Our Work</a>
                  </p>
               </div> 
            </div> <!-- ./cover container -->
         </div> <!--  ./cover styles -->
      </div> <!-- cover styles pt 2 -->
	  
	  <!-- Second Pane: Who are we? -->
      <section id="second-view" class="content-section text-center">

         <div class="row"> <!-- Creates row styling -->
            <div class="col-lg-8 mx-auto"> <!-- uses columns for all elements -->
			               <hr class="featurette-divider">

				        <h2 class="brand-heading">About</h2>
						               <hr class="featurette-divider">
               <p>
					The Sterling Cooper Advertising Agency is an advertising agency on Madison Avenue in New York City. Sterling Cooper was founded by Bertram Cooper and Roger Sterling, Sr. in 1923. In the Fall of 1962, the firm was merged with British firm, Puttnam, Powell, and Lowe. ("Meditations in an Emergency") Because of the impending sale of Puttnam, Powell, and Lowe to McCann Erickson, Lane Pryce was convinced to free Don Draper, Bertram Cooper, and Roger Sterling from their employment contracts to start Sterling Cooper Draper Pryce. ("Shut the Door. Have a Seat")
               </p>
               <figure>
                  <img src="images/logos/logo.jpg" alt="Logo" style ="height:250px">
                  <figcaption> Sterling Cooper's new logo</figcaption>
               </figure>
               <hr class="featurette-divider">
               <p class="intro-text">
                  Sterling Cooper creates customized marketing programs for many of the world's largest companies through our comprehensive global services. The work our agencies produce helps clients build brands, increase sales of their products and services and gain market share.

				The work we provide clients is specific to their unique needs. Our solutions vary from project-based activity involving one agency to long-term.
               </p>
				        <h2>The Team</h2>
               <div class="row"> <!-- Employee subrow -->
                  <div class="col"> <!-- Employee sub column -->
                     <img class="img-circle" src="images/employees/ddraper.jpg" alt="Don Draper Image" width="140" height="140">
                     <p>  Donald Draper <br>Lead Designer
                  </div>
                  <div class="col">
                     <img class="img-circle" src="images/employees/rsterling.jpg" alt="Roger Sterling" width="140" height="140">
                     <p>  Roger Sterling <br>Primary Prototyper
                  </div>
                  <div class="col">
                     <img class="img-circle" src="images/employees/pcampbell.jpg" alt="Peter Campbell Image" width="140" height="140">
                     <p>  Peter Campbell <br>Media Marketing
                  </div>
               </div>
			   
            </div> <!-- ./col-lg-8 mx-auto -->
         </div>  <!-- /.row -->
      </section> <!-- ./second-pane -->
	  
	  
    
      <section id="third-pane" class="content-section text-center">
         <div class="row">
            <div class="col-lg-8 mx-auto">
			
			
			   <!-- Third Pane: Portfolio -->
               <hr class="featurette-divider">
               <h2> Our Portfolio </h2>
			   
			    <p class="intro-text"> Sterling Cooper's has a definite track record of sucess. With clientelle consisting of major companies.
                  <br> We are able to tackle any form of marketing large or small. 
               </p>
               <hr class="featurette-divider">
               <!-- Slide Show -->
               <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                  </ol>
                  <div class="carousel-inner">
                     <!-- Slide 1 -->
                     <div class="carousel-item active">
                        <img class="img-responsive" src="images/portfolio/popsicle.jpg" alt="First slide">
                     </div>
                     <!-- Slide 2 -->
                     <div class="carousel-item">
                        <img class="img-responsive" src="images/portfolio/bethsteele.jpg" alt="Second slide">
                     </div>
                     <!-- Slide 3 -->
                     <div class="carousel-item">
                        <img class="img-responsive" src="images/portfolio/bellejolle.jpg" alt="Third slide">
                     </div>
                     <!-- Slide 4 -->
                     <div class="carousel-item">
                        <img class="img-responsive" src="images/portfolio/kodak.jpg" alt="Fourth slide">
                     </div>
                     <!-- Slide 5 -->
                     <div class="carousel-item">
                        <img class="img-responsive" src="images/portfolio/playtex.jpg" alt="Fifth slide">
                     </div>
                  </div>
				  <!-- Slide Buttons -->
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
			   
			   <!-- News Letter  -->
			                  <hr class="featurette-divider">
			   <h2> Our Newsletter </h2>
               <p class="intro-text">  With clientelle consisting of major companies such as Kodak, Lucky Strike, Betheleham Steel and Coca-Coca. Companies like Lucky Strike, Dow Chemical and Jaguar have always played a special role in the show. A client has a problem, Don Draper and company work on that problem, character development ensues. If you would like to learn more about Sterling Cooper and our services we highly encourage you to sign up for our Newsletter to recieve updates about our artwork.
               </p> 
			   <!-- Learn More Button/Modal -->
               <p><a class="btn btn-default" href="#" role="button" data-toggle="modal" data-target="#myModal">Learn More</a></p>
            </div>
         </div>
      </section>
      <footer> © Copyright 2015-2018 Sterling Cooper, LLC. All rights reserved 
	  </footer>
      <!-- MODAL HTML -->
      <div class="modal fade" id="myModal">
      <div class="modal-dialog"> 
      <div class="modal-content">         
         <!-- Modal body -->
         <div class="modal-body">
            <div class="well">
               <ul class="nav nav-tabs">
			   <!-- Two Nav Tabs -->
                  <li class="active"><a href="#login" data-toggle="tab">Login |</a></li>
                  <li><a href="#create" data-toggle="tab">&#160;Create Account</a></li>
               </ul>
               <!-- LOGIN TAB -->
               <div id="myTabContent" class="tab-content">
                  <div class="tab-pane active in" id="login">
                     <form class="form-horizontal" action='index.php' method="POST">
					 <p>Login</p>
                        <fieldset>
                           <div class="control-group">
                           
                              <div class="controls">
							  
                                 <input type="email" id="emailS" name="email" placeholder="Email" class="input-xlarge" required>
                              </div>
                           </div>
                           <div class="control-group">
                              
                              <div class="controls">
                                 <input type="password" id="passwordS" name="password" placeholder="Password" class="input-xlarge" required>
                              </div>
                           </div>
                           <div class="control-group">
                              <!-- Login Button -->
                              <div class="controls">
                                 <button class="btn btn-success" name ="signin" type="submit">Login</button>
                              </div>
                           </div>
						   				   <p> Welcome Back! </p>

                        </fieldset>
                     </form>
                     <!-- END LOGIN -->
                  </div>
				  <!-- Register Tab Content -->
                  <div class="tab-pane fade" id="create">
                     <form id="tab" name ="register" action ="index.php" method ="POST">
                        					 <p>Register</p>
<!-- First Name -->
                        <div class="controls">
                           <input type="text" id="firtnameR" name="firstName" placeholder="First Name" class="input-xlarge" required>
                        </div>
						<!-- Last Name -->

                        <div class="controls">
                           <input type="text" id="lastnameR" name="lastName" placeholder="Last Name" class="input-xlarge" required>
                        </div>
						<!-- Email -->

                        <div class="controls">
                           <input type="email" id="emailR" name="email" placeholder="Email" class="input-xlarge" required>
                        </div>
						<!-- Password -->

                        <div class="controls">
                           <input type="password" id="passwordR" name="password" placeholder="Password" class="input-xlarge" required>
                        </div>
								 <button class="btn btn-primary"   type="submit"  name ="register">Register</button>
								 				   <p> We look forward to hearing from you!



                  
                  </form>
               </div>
			   
			   <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
			   </div>
			   </div>
			   </div>
			   <!-- JQuery Prevent refresh, select login/register -->
               <script>
                  $(function() {
                      $('#form').on('submit', function(e) {
                          $.ajax({
                              type: 'post',
                              url: 'index.php',
                              data: $(this).serialize(),
                              success: function() {
                                  location.reload();
                  alert(data);
                  
                              }
                          });
                          e.preventDefault();
                      });
                  });
               </script>
               <!-- Modal footer -->
               </div>
         </div>
      </div>
   </body>
</html>