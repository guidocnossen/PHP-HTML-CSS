<?php
	/*************************************************
	 * File:		addrecipe.php
	 * Description:	add a new recipe to the database
	 * Created:		2016-01-06
	 * Last update:	2016-01-08
	 * Authors:		Guido Cnossen, Johan Groenewold
	 *************************************************/

	// Start session
	session_set_cookie_params(3600*24*7); // one week
	session_start();
	
	// Connect to database (or throw exception)
	if(!@require('dbconn.php'))
		throw new Exception("Could not load database file. Please try again later.");
	
	// Include functions
	if(!@require('functions.php'))
		throw new Exception("Could not load necessary files. Please try again later.");
		
		
	// Redirect user to login page if he's not logged in	
	if(!userLoggedIn()){
		redirectToLogin();
	}
	
	// Check if user submitted a recipe already. If yes, add it to database and
	// redirect user to his new submitted recipe
	if (isset($_POST['submit'])) {
		// Read POST data
		$rName = $_POST['title'];
		$rFull = $_POST['fulltextrecipe'];
		$rKeywords = $_POST['keywords'];
		$rPersons = intval($_POST['persons']);
		$rCat = "Test";
		$uID = $_SESSION['userID'];
		
		// Insert data into database
		$query ="
			INSERT INTO recipes(
				title,
				userID,
				fullrecipe,
				keywords,
				persons,
				category
			)
			VALUES
			(
				?, ?, ?, ?, ?, ?
			)";
		
			// Prepare and bind parameters, preventing SQL injections
			$statement = $db->prepare($query);
			$statement->bind_param('sissis', $rName, $uID, $rFull, $rKeywords, $rPersons, $rCat);
	
	
			if($statement->execute()){
				// Receive the id of the last inserted row and redirect user to the new recipe
				header('Location: http://siegfried.webhosting.rug.nl/~s2382482/project/recipe.php?i=' . $statement->insert_id, true, 303);
				die();
			} else {
				die('Error: ' . $db->error .  '.');
			}
	
			$statement->close();
			
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Receptje Toevoegen</title>
        <meta name="description" content="geniETEN is de website om recepten te ontdekken en te delen">
        <meta name="author" content="Guido Cnossen, Johan Groenewold">
        <meta name="keyword" content="recipes, recepten, cooking, koken">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/animate.css">        
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
				<link rel="stylesheet" href="css/recipe.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
				<script src="recipe.js"></script>

    </head>
    <body>
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

		<?php
			// Define current page and include header
			$page = "recipes";
			if(!@require('header.php'))
				throw new Exception("Could not load header file. Please try again later.");
		?>
		  <div class="content-area">
             <div class="container">
                <div class="row page-title text-center">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <h2>Recepten toe<span>voegen</span></h2>
													
<div class="form">
      <div class="tab-content">
        <div id="signup">          
          <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">  
          <div class="top-row">
            <div class="field-wrap">
              <label>
              <span class="req"></span>
              </label>
              <input type="text" placeholder="Titel" name= "title" required autocomplete="off" />
            </div>      
            <div class="field-wrap">
              <label>
              <span class="req"></span>
              </label>
              <textarea name="fulltextrecipe" placeholder="Uw Recept"required autocomplete="off"></textarea>
            </div>
          </div>
          <div class="field-wrap">
            <label>
             <span class="req"></span>
            </label>
            <input type="text" name="keywords" placeholder="Tags(gescheiden door komma's)" required autocomplete="off"/>
          </div>        
          <div class="field-wrap">
            <label>
            <span class="req"></span>
            </label>
            <input type="text" name="persons" placeholder="Aantal Personen" required autocomplete="off"/>
          </div>        
          <button type="submit" class="button2 button-block"/>Laat Anderen Geni<strong>eten</strong>!</button>         
          </form>
        </div>
				<div id="login"> <!-- Div that is needed to complete the form - form based on example from http://codepen.io/ehermanson/pen/KwKWEv -->
        </div>       
      </div><!-- tab-content -->     
</div> <!-- /form -->
                       </div>
                    </div>
                </div>
            </div>
		
			 <?php
        // Include footer
		if(!@require('footer.php'))
			throw new Exception("Could not load footer file. Please try again later.");
        
        ?>
	
	
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/wow.js"></script>
        <script src="js/main.js"></script>

</body>
</html>