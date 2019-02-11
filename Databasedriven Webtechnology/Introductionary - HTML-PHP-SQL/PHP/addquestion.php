<!DOCTYPE HTML>

<html>
<head>
<title>Populating the tables with the questions and answers</title>
</head>
<body>
<div class="row">
    <div class="Quiz">
        <form action="addquestion.php" method="post">
            <div class="form-group">
                <label for="question">Ask Question</label>
                <input type="text" class="form-control" id="question" name="question" placeholder="Enter your question here">
            </div>
            <div class="form-group">
                <label for="correct_answer">Correct answer</label>
                <input type="text" class="form-control" id="correct_answer" name="correct_answer" placeholder="Enter the correct answer here">
            </div>
            <div class="form-group">
                <label for="wrong_answer1">Wrong Answers</label>
                <input type="text" class="form-control" id="wrong_answer1" name="wrong_answer1" placeholder="Wrong answer 1">
            </div>
            <div class="form-group">
                <label class="sr-only" for="wrong_answer2">Wrong Answers 2</label>
                <input type="text" class="form-control" id="wrong_answer2" name="wrong_answer2" placeholder="Wrong answer 2">
            </div>
            <div class="form-group">
                <label class="sr-only" for="wrong_answer3">Wrong Answers 2</label>
                <input type="text" class="form-control" id="wrong_answer3" name="wrong_answer3" placeholder="Wrong answer 3">
            </div>
            <button type="submit" class="btn btn-primary btn-large" value="submit" name="submit">+ Add Question</button>
        </form>
    </div>
    </div>
		  <?php
        $servername="192.168.64.3";
        $username="s2610833";
        $password="naez9joo3w";
        $dbname="s2610833";
        
        $conn = mysql_connect("$servername","$username","$password");
        $db = mysql_select_db("$dbname");
    		
    		If(isset($_POST['submit'])){
    		
    		  $question= $_POST['question'];
    			$wrong_answer1= $_POST['wrong_answer1'];
    			$wrong_answer2= $_POST['wrong_answer2'];
    			$wrong_answer3= $_POST['wrong_answer3'];
    			$correct_answer= $_POST['correct_answer'];
    			
    			$query = "insert into questions (q_number,q_text,c_number1,c_number2,c_number3,correct) values (NULL,'$question','$wrong_answer1','$wrong_answer2','$wrong_answer3','$correct_answer')";
       
          if(mysql_query(!$query)){
      					echo "<script>alert('Vraag niet toegevoegd!')</script>";
      					}
      		if(mysql_query($query)){
      					echo "<script>alert('Vraag toegevoegd!')</script>";
      					}
    		 mysql_close($conn);
    		 }
  ?>
</body>
</html>
