<html>
    <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <h2>Dashboard</h2>
        <?php
            getFromDB();
        ?>
    </body>
</html>

<?php

    function getFromDB()
    {
        $serverName = "localhost";
        $username = "root";
        $password = "";
        $dbname = "complaintmanager";

        $conn = new mysqli($serverName, $username, $password, $dbname);

        if ($conn->connect_error)
        {
            die("Connection Failed" . $conn->connect_error);
        }

        $sql = "SELECT * FROM `complaints` ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo 
                "<div class= 'card' >
                    Name: " . $row['name'] . "<br>
                    Priority : " . $row['priority'] . " <br>
                    Complaint : " . $row['complaint'] . " <br>
                </div>"
                ;
            }
        }
        else
        {
            echo "zero results";
            echo "<br>";
        }

        $conn->close();
    }

?>
