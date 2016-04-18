<?php session_start(); ?>
<?php
$servername = "cis.gvsu.edu";
$username = "sinclair";
$password = "sinclair5543";
$dbname =  "sinclair";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

    $sql = "INSERT INTO Movies(title, releaseDate, year, runTime, genre, director, actors, plot, imdbRating, poster) Values('".$_GET['title']."','".$_GET['releaseDate']."',". $_GET['year'] .",'". $_GET['runTime'] ."','". $_GET['genre'] ."','" . $_GET['director']. "','". $_GET['actors'] ."','". $_GET['plot'] ."','". $_GET['imdbRating'] ."','". $_GET['poster'] ."');";

    if($conn->query($sql)){
      echo "SQL insert success";
    } else {
       echo "SQL insert failure";
    }


$conn->close();
?>


<!-- Create Table Movies (
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(100),
	releaseDate DATE,
	year INT,
	runTime VARCHAR(50),
	genre VARCHAR(50),
	director VARCHAR(50),
	actors VARCHAR(255),
	plot VARCHAR(255),
	imdbRating VARCHAR(20),
	poster VARCHAR(255)
); -->
