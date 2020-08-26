<html>

<!-- HEAD section ............................................................................ -->
<head>
  <title> Yoonsuck Choe's Experimental Web Site </title>

  <!-- javascript functions -->
  <script>
  function randText() {
      let randomBits = ["hello world", "random thoughts", "pinky and the brain"];
      document.getElementById("demo").innerHTML = randomBits[Math.floor(Math.random()*3)];
  }
  
  
  </script>

  <!-- style -->
 
  <style>
    div.defaultFont {
        font-family: Helvetica, Arial, sans-serif;
    }
    
    div.secondaryFont {
        font-family: serif;
    }

    h3 {
        color: blue;
    }
    <!-- link href="default.css" rel="stylesheet" type="text/css -->
  </style>


</head>

<!-- BODY section ............................................................................. -->
<body>
<div class="defaultFont">

<!-- PHP testing area ................................ --> 
<?php
	//include 'proc_csv.php';
	include 'proc_wikitext.php';
	
	//testing('david.csv',",","\"", "ALL");
	test('text.wiki');
	

?>

<!-- Java script testing area ............................... -->

<div class="secondaryFont"> 

<h3>Java script test</h3>

<p id="demo"> Content to be changed: </p> 

<button type="button" onclick="randText()">Click Me!</button>

<button onClick="window.location.reload();">Reload Page</button>

</div>

<!-- HTML form input handling .......................... -->

<p/>
<form action="action.php" method="post">
Search: <input type="text" name="name"> 
<input type="submit">  
</form>




<p/>

<h3>Academic genealogy search:</h3>

Search academic genealogy (external link: <a href="https://www.mathgenealogy.org">https://www.mathgenealogy.org</a>): <p/>
<form action="https://www.mathgenealogy.org/query-prep.php" method="post">
Firstname:
<input type="text" name="given_name" value="Yoonsuck">  <br/>
Lastname:
<input type="text" name="family_name" value="Choe"> 
<input type="submit">
</form>
<p/>
</div> <!-- end of big div -->

</body>

</html>

