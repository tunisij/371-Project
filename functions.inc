<?php
	function createTables() {
		$con=openCon();
		$sql="CREATE TABLE friends(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name CHAR(25), phone CHAR(20), age INT)";
		if ($con->query($sql) === TRUE) {
    		echo "Table MyGuests created successfully<br><br>";
		} else {
    		echo "Error creating table: " . $con->error."<br><br>";
		}
		closeCon($con);
	}

	function addFriend($name,$phone,$age) {
		$con=openCon();
		$sql = "INSERT INTO `friends`(`name`, `phone`, `age`) VALUES ('".$name."','".$phone."','" .$age."')";

		if ($con->query($sql) === FALSE) {
    		echo "Error: " . $sql . "<br>" . $con->error."<br><br>";
		}
		closeCon($con);
	}

	function readFromFile() {
		$txt_file = file_get_contents('sample.txt');
		$rows = explode("\n", $txt_file);
		array_shift($rows);

		foreach($rows as $row => $data) {
		    //get row data
		    $row_data = explode(',', $data);

		    $name = $row_data[0]." ".$row_data[1];
		    $phone = $row_data[2];
		    $age  = $row_data[3];

		    addFriend($name, $phone, $age);
		}
	}

	function showAll(){
		$con=openCon();

		$sql = "SELECT id, name, phone, age FROM friends";
		$result = $con->query($sql);
		$table = "";
		if ($result->num_rows > 0) {
			$table .= "<table border=\"1\"><tr><td>ID</td><td>Name</td><td>Phone</td><td>Age</td></tr>";
    		while($row = $result->fetch_assoc()) {
    			$table .= "<tr>";
    			$table .= "<td>".$row["id"]."</td>";
    			$table .= "<td>".$row["name"]."</td>";
    			$table .= "<td>".$row["phone"]."</td>";
    			$table .= "<td>".$row["age"]."</td>";
    			$table .= "</tr>";
    		}
    		$table .= "</table>";
    		echo $table;
		} else {
    	echo "0 records found.";
		}
		closeCon($con);
	}

	function openCon(){
		$con = new mysqli("cis.gvsu.edu", "sinclair", "sinclair5543", "sinclair");
	
		if ($con->connect_error) {
	   		die("Connection failed: " . $con->connect_error);
		} 

		return $con;
	}

	function closeCon($con){
		$con->close();
	}

?>