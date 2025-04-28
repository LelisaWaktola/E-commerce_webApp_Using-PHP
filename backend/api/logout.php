<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged Out</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
        }
        .message-box {
            background-color: white;
            display: inline-block;
            padding: 30px 50px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #28a745;
            font-size: 32px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        .buttons {
            margin-top: 20px;
        }
        a.button {
            display: inline-block;
            margin: 10px;
            padding: 12px 24px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        a.button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="message-box">
        <h1>✅ You have logged out!</h1>
        <p>Thank you for visiting our store.</p>
        <div class="buttons">
            <a href="../../frontend/login.html" class="button">Login Again</a>
            <a href="../../frontend/index.php" class="button">Home</a>
        </div>
    </div>

</body>
</html>
