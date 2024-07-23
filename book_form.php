<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (isset($_FILES['payment_screenshot'])) {
        $file = $_FILES['payment_screenshot'];
        $fileName = $_FILES['payment_screenshot']['name'];
        $fileTmpName = $_FILES['payment_screenshot']['tmp_name'];
        $fileSize = $_FILES['payment_screenshot']['size'];
        $fileError = $_FILES['payment_screenshot']['error'];
        $fileType = $_FILES['payment_screenshot']['type'];

   
        if ($fileError === 0) {
            $fileDestination = $uploadDir . basename($fileName);
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                echo "File uploaded successfully.";
            } else {
                echo "Failed to move the uploaded file.";
                exit();
            }
        } else {
            echo "Error uploading file.";
            exit();
        }
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "book_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
    $sql = "INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving, payment_screenshot) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssissssss', $name, $email, $phone, $address, $location, $guests, $arrivals, $leaving, $fileDestination);

    if ($stmt->execute()) {
        header("Location: booking_success.php?name=$name&email=$email&city=$location");

        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
