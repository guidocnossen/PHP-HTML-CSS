<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang=
"en">
  <head>
    <title>
      Congres groene energie
    </title>
    <meta http-equiv="Content-Type" content=
    "text/html; charset=us-ascii" />
    <link rel="stylesheet" type="text/css" href=
    "../css/chromestyle3.css" />
    <script type="text/javascript" src="../script/chromephp.js">
//<![CDATA[

    /***********************************************
    * Chrome CSS Drop Down Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
    * This notice MUST stay intact for legal use
    * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
    ***********************************************/

    //]]>
    </script>
  </head>
  <body>
    <div class="image">
      <img src="../images/logo.jpg" />
    </div>
    <div class="header">
      <div class="linkonderhoud">
        <a href="../linklijst.htm">Linklijst</a> en <a href=
        "../onderhoudsboek.htm">Onderhoudsboek</a>
      </div>
      <div class="headercontent">
        <h1>
          Welkom op de website van het congres groene energie!
        </h1>
      </div>
    </div>
    <div class="chromestyle" id="chromemenu">
      <ul>
        <li>
          <a href="../home.htm">Home</a>
        </li>
        <li>
          <a href="../plaats.htm" rel="dropmenu1">Locatie en
          tijd</a>
        </li>
        <li>
          <a href="../programma.htm" rel=
          "dropmenu2">Programma</a>
        </li>
        <li>
          <a href="../aanbeveling.htm" rel=
          "dropmenu2">Comit&eacute; van aanbeveling</a>
        </li>
        <li>
          <a href="deelnemers.php" rel="dropmenu2">Deelnemers</a>
        </li>
        <li>
          <a href="registratie.php" rel=
          "dropmenu2">Registreren</a>
        </li>
        <li>
          <a href="../abstracts.htm" rel=
          "dropmenu2">Abstracts</a>
        </li>
        <li>
          <a href="../contact.htm" rel="dropmenu3">Contact</a>
        </li>
      </ul>
    </div><script type="text/javascript">
//<![CDATA[

    cssdropdown.startchrome("chromemenu")

    //]]>
    </script>
    <div class="textbox">
      <div class="left">
        <h1>
          Registratie formulier
        </h1>
        <form method='post' action='registratie.php'>
          <table>
            <tr>
              <td>
                Voornaam:
              </td>
              <td>
                <input type='text' name='firstname' />
              </td>
            </tr>
            <tr>
              <td>
                Achternaam:
              </td>
              <td>
                <input type='text' name='lastname' />
              </td>
            </tr>
            <tr>
              <td>
                E-mail:
              </td>
              <td>
                <input type='text' name='email' />
              </td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td>
                Accomodatie:
              </td>
              <td>
                <select name='kamer'>
                  <option value="Hampshire hotel">
                    Hampshire Hotel: &euro;63,50
                  </option>
                  <option value="Mercure Hotel">
                    Mercure Hotel: &euro;79,00
                  </option>
                  <option value="Bastion Hotel">
                    Bation Hotel: &euro;51,00
                  </option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                Spreken of bijwonen:
              </td>
              <td>
                <select name='spreken'>
                  <option value="Ja">
                    Ik wil spreken
                  </option>
                  <option value="Nee">
                    Ik wil alleen het congres bijwonen
                  </option>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan='5' align='center'>
                <input type='submit' name='submit' value=
                'Sign Up' />
              </td>
            </tr>
          </table><br />
          Als u wilt spreken kunt u na uw aanmelding <a href=
          "../upload.htm">hier</a> een abstract uploaden.<br />
        </form>
      </div>
      <div class="right">
        <img src="../images/hampshire.jpg" alt="" /><i>Hampshire
        Hotel</i><br />
        <br />
        <br />
        <img src="../images/mercure.jpg" alt="" /><i>Mercure
        Hotel</i><br />
        <br />
        <br />
        <img src="../images/bastion.jpg" alt="" /><i>Bastion
        Hotel</i>
      </div>
    </div><?php
                            $db_host="192.168.64.3"; 
                            $db_username="s2748428";  
                            $db_pass="sowuib7duu";     
                            $db_name="s2748428";

                            $connect = mysql_connect("$db_host","$db_username","$db_pass");
                            $db = mysql_select_db("$db_name");

                            If(isset($_POST['submit'])){

                              $user_firstname = $_POST['firstname'];
                              $user_lastname = $_POST['lastname'];
                              $user_email = $_POST['email'];
                              $user_room = $_POST['kamer'];
                              $user_congres = $_POST['spreken'];

                              if($user_firstname==''){
                              echo "<script>alert('Fill in all fields')</script>";
                              exit();
                              }
                              
                              if($user_lastname==''){
                              echo "<script>alert('Fill in all fields')</script>";
                              exit();
                              }

                             if($user_email==''){
                             echo "<script>alert('Fill in all fields')</script>";
                             exit();
                             }

                             $check_email = "select * from test where user_email='$user_email'";

                             $run = mysql_query($check_email);

                             if(mysql_num_rows($run)>0){
                             echo "<script>alert('Email $user_email already exists, try a different one')</script>";
                             exit();
                             }

                             $query = "insert into congres (user_firstname,user_lastname,user_email,user_room,user_congres) values ('$user_firstname','$user_lastname','$user_email','$user_room','$user_congres')";
                             if(mysql_query(!$query)){
                             echo "<script>alert('Nope')</script>";
                             }
                             if(mysql_query($query)){
                             echo "<script>alert('Registration completed')</script>";
                             }

                             mysql_close($connect);
                            }
                            ?>
  </body>
</html>
