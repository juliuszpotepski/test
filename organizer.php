<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "kalendarz";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
    }
    if (isset($_POST['submit'])) {
        $wpis = $_POST['wpis'];
        $q = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-08-09'";
        mysqli_query($conn, $q);
    }
?>

<html lang="pl">
<head>
<meta charset="utf-8">
<title>Sierpniowy kalendarz</title>
<link rel="stylesheet" href="styl5.css">
</head>
<body>
<div id="pierwszy"><h1>Organizer SIERPIEŃ</h1></div>
<div id="drugi"><form method="POST" action="organizer.php">
Zapisz wydarzenie <input name="wpis" type="text"></input><button name="submit">OK</button>
</form>
</div>
<div id="trzeci"><img src="logo2.png" alt="sierpień" width=120px height=120px></div>
<div id="kalendarz">
<?php
 $q = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'sierpien'";
 $res = mysqli_query($conn, $q);
 while ($row = mysqli_fetch_array($res)) {
     echo "<section class='kalendarz'>
             <h5>$row[0]</h5>
             <p>$row[1]</p>
         </section>";
 }
 mysqli_close($conn);
?>
</div>
<div id="stopka"><p>Stronę wykonał:029350293502350</p></div>
</body>
    </html>