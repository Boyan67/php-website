<?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $car = $_POST['car'];
    $message = $_POST['message'];

    $conn = new mysqli('localhost', 'root', '', 'didko');
    if($conn->connect_error){
    		echo "$conn->connect_error";
    		die("Connection Failed : ". $conn->connect_error);
    	} else {
    		$stmt = $conn->prepare("insert into zapitvane(name, phone, car, message) values(?, ?, ?, ?)");
    		$stmt->bind_param("ssss", $name, $phone, $car, $message);
    		$execval = $stmt->execute();
    		echo $execval;
    		echo "Съобщението беше изпратено...";
    		$stmt->close();
    		$conn->close();
    		header('Location: ' . $_SERVER['HTTP_REFERER']);

    	}
?>