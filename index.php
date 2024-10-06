<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        // Prepare statement
        $stmt = $conn->prepare("INSERT INTO surya(firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
        
        // Check if the statement was prepared successfully
        if ($stmt === false) {
            die('Prepare failed: ' . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
        
        // Execute the statement
        $execval = $stmt->execute();
        if ($execval === false) {
            die('Execute failed: ' . $stmt->error);
        } else {
            echo "Registration successfully...";
        }
        
        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
?>
