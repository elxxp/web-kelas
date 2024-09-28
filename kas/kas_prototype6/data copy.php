<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kas | Twoniverse</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .container {
                width: 90%;
                max-width: 1200px;
                background-color: #fff;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }
            h2 {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            table, th, td {
                border: 1px solid #ddd;
            }
            th, td {
                padding: 10px;
                text-align: center;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #ddd;
            }
            .button-container {
                text-align: center;
                margin-top: 20px;
            }
            .button {
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-decoration: none;
                font-size: 16px;
            }
            .button:hover {
                background-color: #45a049;
            }
            @media (max-width: 768px) {
                table, thead, tbody, th, td, tr {
                    display: block;
                }
                th {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }
                tr {
                    margin-bottom: 20px;
                    border-bottom: 1px solid #ddd;
                }
                td {
                    padding-left: 50%;
                    position: relative;
                }
                td:before {
                    position: absolute;
                    top: 50%;
                    left: 10px;
                    transform: translateY(-50%);
                    content: attr(data-label);
                    font-weight: bold;
                    color: #333;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
            // Your PHP code goes here (unchanged)
            ?>
            <div class="button-container">
                <a href="edit.php" class="button">Edit Data</a>
            </div>
        </div>
    </body>
</html>
