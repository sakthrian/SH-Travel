<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Successful</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .container p {
            font-size: 20px;
        }
        .container h1 {
            font-size: 30px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Successful!</h1>
        <?php
        if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['city']) && !empty($_GET['city']) && isset($_GET['email']) && !empty($_GET['email'])) {
            $name = htmlspecialchars($_GET['name']);
            $city = htmlspecialchars($_GET['city']);
            $email = htmlspecialchars($_GET['email']);
            echo "<p>Thank you for booking with us, $name!</p>";

            
            $subject = "Your Booking Confirmation";
            $message = "
            <html>
            <head>
                <title>Booking Confirmation</title>
            </head>
            <body>
                <h2>Booking Confirmation</h2>
                <p>Dear $name,</p>
                <p>Your trip to $city has been booked successfully!</p>
                <p>We are excited to have you with us and hope you have a fantastic time!</p>
                <p>If you have any questions, feel free to contact us at shtraveltrips@gmail.com</p>
                <p>Thank you for choosing us!</p>
                <p>Best regards,</p>
                <p>The Booking Team</p>
            </body>
            </html>";

            
            echo "
            <form id='emailForm' action='send.php' method='POST'>
                <input type='hidden' name='email' value='$email'>
                <input type='hidden' name='subject' value='$subject'>
                <input type='hidden' name='message' value='$message'>
            </form>
            <script>
                document.getElementById('emailForm').submit();
            </script>
            ";

        } else {
            echo "<p>Thank you for booking with us!</p>";
        }
        ?>
        <p>Your booking has been received, and you will receive a confirmation email shortly.</p>
        <p>If you have any questions, please contact us at <a href="mailto:shtraveltrips@gmail.com">shtraveltrips@gmail.com</a>.</p>
        <a href="home.php" class="btn">Go to Homepage</a> 
    </div>

    
</body>
</html>
