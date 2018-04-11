<?php
/* Create DB Connection */
$dbhost = "66.147.242.186";
$dbuser = "urcscon3_jlee";
$dbpass = "!QAZ2wsx";
$dbname = "urcscon3_jlee";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');
/* Connection fail -> disp error */
if (!$connection) {
    echo ("Connection failed: " . $conn->connect_error);
}
/* Globals  */
/* Cookie Validation */
$email   = $_COOKIE["email"];
$email   = str_replace("%40", "@", "$email");
/* Message Validation */
$message = isset($_POST['message']) ? $_POST['message'] : '';
$message = Trim(stripslashes($message));

/* Recieve User Info */
$query  = "SELECT firstName,lastName,message FROM urcscon3_jlee WHERE email='$email'";
$result = $connection->query($query);
$row    = mysqli_fetch_array($result);



/* END GLOBALS */

/* Log Out */
if (isset($_POST['submitM'])) {
    echo "Your Message has been sent";
    //echo $email;
    $sql    = "UPDATE urcscon3_jlee SET message = '$message' WHERE email ='$email'";
    $result = $connection->query($sql);
    
}

?>
   <!DOCTYPE html>
<html>
   <head>
      <!-- https://mdbootstrap.com/css/animations/-->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/favicon.ico">
      <title>Sterling Cooper Account</title>
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
      <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
   </head>
   <body>
      <div class="site-wrapper">
         <!-- Mass container + styles -->
         <div class="site-wrapper-inner">
            <!-- container top pane styles -->
            <div class="cover-container">
               <!-- cover container -->
               <div class="masthead clearfix">
                  <!-- all top/nav content container -->
                  <h3 class="masthead-brand">Sterling Cooper</h3>
                  <div class="inner">
                     <nav>
                        <!-- nav  -->
                        <ul class="nav masthead-nav">
                           <li class="active"><a href="account.php">My Account</a></li>
                           <li><a href="logout.php">LogOut</a></li>
                        </ul>
                     </nav>
                  </div>
               </div>
               <h2> Account Information			</h2>
               <div class="card text-center">
                  <div class="card-header">
                     <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                           <!-- Tabs Newsletter and Inbox-->
                           <a class="nav-link active" href="#1" data-toggle="tab" >Newsletter</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#2" data-toggle="tab" >Inbox</a>
                        </li>
                     </ul>
                     <div class="tab-content ">
                        <!-- Tab 1 Conent Welcome Message -->
                        <div class="tab-pane active" id="1">
                           <br>
                           <p>
                              Hello <?php echo $row[0] . " " . $row[1]?>!
                              <br>
                              Thank you for signing up for our newsletter. You will be recieving information very soon with artwork and our recent releases. If you would like to recieve a quote feel free to inbox use on the right and we'll get back to you!
                           </p>
                        </div>
                        <!-- Tab 2 Content Send Message -->
                        <div class="tab-pane" id="2">
                           <br>
                           <form action='account.php' method="POST">
                              <p> Send a Message </p>
                              <div class ="textsubmit">
                                 <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name ="message" placeholder="Insert a new message here!" ></textarea>
                                 </div>
                                 <button type="submit" class="btn btn-primary" name ="submitM">Submit</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>