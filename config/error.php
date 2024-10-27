<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: #343a40;
        }
        .error-container {
            text-align: center;
            max-width: 50%;
            padding: 120px;
            background-color: #F3E5AB;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 4em;
            color: #dc3545;
        }
        p {
            font-size: 3em;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Error Occurred</h1>
        <p id="error-message">We’re sorry, but something went wrong.</p>
        <?php
        // Display the error message if it exists in the URL
        if (isset($_GET['message'])) {
            $error_message = htmlspecialchars(urldecode($_GET['message']));
            echo '<p>' . $error_message . '</p>';
            // Use JavaScript to remove the message from the URL after display
            
        }
        ?>
    </div>
</body>
</html>
