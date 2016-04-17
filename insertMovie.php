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
$_SESSION['title']=$_GET['title'];
$_SESSION[''releaseDate'']=$_GET[''releaseDate''];
$_SESSION['year']=$_GET['year'];
$_SESSION['runTime']=$_GET['runTime'];
$_SESSION['genre']=$_GET['genre'];
$_SESSION['director']=$_GET['director'];
$_SESSION['actors']=$_GET['actors'];
$_SESSION['plot']=$_GET['plot'];
$_SESSION['imdbRating']=$_GET['imdbRating'];
$_SESSION['poster']=$_GET['poster'];

    $sql = "INSERT INTO Movies(title, 'releaseDate', year, runTime, genre, director, actors, plot, imdbRating, poster) Values('".$_SESSION['title']."','".$_SESSION['releaseDate']."',". $_SESSION['year'] .",'". $_SESSION['runTime'] ."','". $_SESSION['genre'] ."','" . $_SESSION['director']. "','". $_SESSION['actors'] ."','". $_SESSION['plot'] ."','". $_SESSION['imdbRating'] ."','". $_SESSION['poster'] ."');";

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
