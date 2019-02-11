<!DOCTYPE HTML>

<html>
<head>
<title>Database quiz</title>
</head>
<body>
<?php 
 //error_reporting(-1);
 //ini_set("display_errors", 1);
 
 $servername="192.168.64.3";
 $username="s2610833";
 $password="naez9joo3w";
 $dbname="s2610833";

 $conn = mysql_connect("$servername","$username","$password");
 $db = mysql_select_db("$dbname");
 
 $query = "select * from questions";
 $result = mysql_query($query);
 if (mysql_num_rows($result) < 1) {
 		echo "There is no question in the Database";
		}	

 $Vragen = array();

 if (mysql_num_rows($result) > 0) {
 		while($row = mysql_fetch_assoc($result)) {
    		array_push($Vragen, $row['q_number'] = array('Vraag' => $row['q_text'], 
				'Antwoord' => array('A' => $row['c_number1'],'B' => $row['correct'],
				'C' => $row['c_number2'], 'D' => $row['c_number3']), 'CorrectAnswer' => 'B'));
				}
				print_r($Vragen);
			 }
    if (isset($_POST['Antwoord'])){
        $Antwoord = $_POST['Antwoord']; // Get submitted answers.
        foreach ($Vragen as $Vraagnr => $Value){
            // Echo the question
            echo $Value['Vraag'].'<br />';
            if ($Antwoord[$Vraagnr] != $Value['CorrectAnswer']){
                echo '<span style="color: red;">0 punten</span>'; 
                echo '<span style="color: red;"> ----Je hebt deze vraag niet goed geantwoord!</span>'; 
    						$TotaalGoed += 0;
            } else {
                echo '<span style="color: green;">1 punt</span>'; 
    						echo '<span style="color: green;"> ----Je hebt deze vraag goed geantwoord!</span>';
    						$TotaalGoed += 1;
            }
						 echo '<br/><hr>';
          }
    				echo '<span style="color: blue;">Je hebt ' .$TotaalGoed. ' van de 3 punten behaald!</span>';
    				echo '<h3>Klik <a href="databasequiz.php">hier</a> om de quiz opnieuw te beginnen!</h3>';
    } else {
?>
    <form action="databasequiz.php" method="post" id="quiz">
		
    		<?php foreach ($Vragen as $Vraagnr => $Value){?> 
        <li>
            <h4><?php echo $Value['Vraag']; ?></h4>
            <?php 
                foreach ($Value['Antwoord'] as $Letter => $Antwoord){ 
                $Label = 'Vraag-'.$Vraagnr.'-Antwoord-'.$Letter;
            ?>
            <div>
                <input type="radio" name="Antwoord[<?php echo $Vraagnr; ?>]" id="<?php echo $Label; ?>" value="<?php echo $Letter; ?>" />
                <label for="<?php echo $Label; ?>"><?php echo $Letter; ?>) <?php echo $Antwoord; ?> </label>
            </div>
            <?php } ?>
        </li>
        <?php } ?>
    		<br></br>
        <input type="submit" value="Submit" />
        </form>
    <?php
    }
    ?>

</body>
</html>