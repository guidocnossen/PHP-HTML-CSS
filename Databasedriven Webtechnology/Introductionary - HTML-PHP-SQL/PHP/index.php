<!DOCTYPE HTML>

<html>
<head>
<title>PHP Quiz</title>
</head>
<body>
<?php 

$TotaalGoed = 0;
$Vragen = array(
    1 => array(
        'Vraag' => 'Waar staat de afkorting DBMS voor?',
        'Antwoord' => array(
            'A' => 'Disc Based Mourning Siren',
            'B' => 'Database Management System',
            'C' => 'Deaf By Mistaken Sounds',
						'D' => 'Deadly Bomb Machinegun Shooting'
        ),
        'CorrectAnswer' => 'B'
    ),
    2 => array(
        'Vraag' => 'Dit is vraag:?',
        'Antwoord' => array(
            'A' => 'Vier',
            'B' => 'Zeven',
            'C' => 'Twee',
						'D' => 'Acht'
        ),
        'CorrectAnswer' => 'C'
    ),
		3 => array(
				 'Vraag' => 'Wat is de hoofdstad van Nederland?',
				 'Antwoord' => array(
				    'A' => 'Londen',
						'B' => 'Giethoorn',
						'C' => 'Istanbul',
						'D' => 'Amsterdam'
				 ),
				 'CorrectAnswer' => 'D'
		),
		4 => array(
				 'Vraag' => 'Op welke dag is het hoorcollege van Database Driven Webtechnology?',
				 'Antwoord' => array(
				    'A' => 'Dinsdag',
						'B' => 'Maandag',
						'C' => 'Zaterdag',
						'D' => 'Vrijdag'
				 ),
				 'CorrectAnswer' => 'A'
		),
		5 => array(
				 'Vraag' => 'Welke van de viergenoemde programmas kan gebruikt worden voor het genereren van HTML-scripts?',
				 'Antwoord' => array(
				    'A' => 'HTML-Kit',
						'B' => 'Word',
						'C' => 'Powerpoint',
						'D' => 'Excel'
				 ),
				 'CorrectAnswer' => 'A'
		),
		6 => array(
				 'Vraag' => 'Welke bekende persoon viert 5 December zijn of haar verjaardag?',
				 'Antwoord' => array(
				    'A' => 'George Clooney',
						'B' => 'De Kerstman',
						'C' => 'Geraldine Kemper',
						'D' => 'Sinterklaas'
				 ),
				 'CorrectAnswer' => 'D'
		),
  	7 => array(
  		 'Vraag' => 'Welke Nederlandse zanger schreef een nummer over ene Juffrouw van Schaik?',
  		 'Antwoord' => array(
  		    'A' => 'Thomas Acda',
  				'B' => 'Jan Smit',
  				'C' => 'George Welling',
  				'D' => 'Jeroen van der Boom'
  		 ),
  		 'CorrectAnswer' => 'C'
		), 
		8 => array(
				 'Vraag' => 'Welk van onderstaande biermerken wordt geassocieerd met het Bourgondisch genieten?',
				 'Antwoord' => array(
				    'A' => 'Heineken',
						'B' => 'Hertog Jan',
						'C' => 'Palm',
						'D' => 'Gulpener'
				 ),
				 'CorrectAnswer' => 'C'
		),
		9 => array(
				 'Vraag' => 'Wat is de Nederlandse vertaling van het Engelse woord: Goosebumps?',
				 'Antwoord' => array(
				    'A' => 'Geitenbillen',
						'B' => 'Kippenvel',
						'C' => 'Ganzelever',
						'D' => 'Gossiemeine'
				 ),
				 'CorrectAnswer' => 'B'
		),
		10 => array(
				 'Vraag' => 'Uit welke Nederlandse provincie komt de lekkernij: sukerpofkes vandaan?',
				 'Antwoord' => array(
				    'A' => 'Flevoland',
						'B' => 'Groningen',
						'C' => 'Friesland',
						'D' => 'Geen van de bovengenoemde drie'
				 ),
				 'CorrectAnswer' => 'C'
		)
);

if (isset($_POST['Antwoord'])){
    $Antwoord = $_POST['Antwoord']; // Get submitted answers.
		$Vraagnr = $_POST['Vraagnr'];
		$Value = $Vragen[$Vraagnr]];
        // Echo the question
        echo $Value['Vraag'].'<br />';
        if ($Antwoord != $Value['CorrectAnswer']){
            echo '<span style="color: red;">0 punten</span>'; 
            echo '<span style="color: red;"> ----Je hebt deze vraag niet goed geantwoord!</span>'; 
        } else {
            echo '<span style="color: green;">1 punt</span>'; 
						echo '<span style="color: green;"> ----Je hebt deze vraag goed geantwoord!</span>';
        }
        echo '<br/><hr>';
				?>
    <form action="index.php" method="post" id="quiz">
		
    		<?php $VolgendeVraag = Vraagnr + 1; 
							$Value = [$Vragen[$Vraagnr]];?>  
        <li>
            <h4><?php echo $Value['Vraag']; ?></h4>
            <?php 
                foreach ($Value['Antwoord'] as $Letter => $Antwoord){ 
                $Label = 'Vraag-'.$Vraagnr.'-Antwoord-'.$Letter;
            ?>
            <div>
                <input type="radio" name="Antwoord[<?php echo $Vraagnr; ?>]" id="<?php echo $Label; ?>" value="<?php echo $Letter; ?>" />
								<input type="hidden" name="Vraag[<?php echo $Value['Vraag'] ?>]" id="<?php echo .. ?>" value="<?php echo ... ?>" /> 
                <label for="<?php echo $Label; ?>"><?php echo $Letter; ?>) <?php echo $Antwoord; ?> </label>
            </div>
        </li>
        <?php } ?>
    		<br></br>
        <input type="submit" value="Submit" />
        </form>
</body>
</html>
