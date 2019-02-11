        <nav class="navbar navbar-default">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <div class="button navbar-right">
              	  <?php if(userLoggedIn()){ ?>
              	    <a href="profile.php"><button class="navbar-btn nav-button wow fadeInRight login">Profiel</button></a>
                  	<a href="logout.php"><button class="navbar-btn nav-button wow fadeInRight" >Uitloggen</button></a>
                  <?php } else { ?>
            	  	<a href="login.php"><button class="navbar-btn nav-button wow fadeInRight login">Inloggen</button></a>
                  	<a href="register.php"><button class="navbar-btn nav-button wow fadeInRight" >Aanmelden</button></a>
                  <?php } ?>
              </div>
              <ul class="main-nav nav navbar-nav navbar-right">
                <li class="wow fadeInDown"><a class="<?php echo ($page == "home" ? "active" : "")?>" href="index.php">Home</a></li>
                <li class="wow fadeInDown"><a class="<?php echo ($page == "recipes" ? "active" : "")?>" href="recipes.php">Recepten</a></li>
                <li class="wow fadeInDown"><a class="<?php echo ($page == "addrecipe" ? "active" : "")?>" href="addrecipe.php">Recept toevoegen</a></li>
                <li class="wow fadeInDown"><a class="<?php echo ($page == "about" ? "active" : "")?>" href="information.php">Over ons</a></li>
                <li class="wow fadeInDown"><a class="<?php echo ($page == "contact" ? "active" : "")?>" href="contact.php">Contact</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>