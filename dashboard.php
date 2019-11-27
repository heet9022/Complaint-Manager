<html>
    <body>
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
        else
        {
            echo("Connection Successfull");
            echo "<br>";
        }

        $sql = "SELECT * FROM `complaints` ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo 
                "<div>
                    Name: " . $row['name'] . "
                    Priority : " . $row['priority'] . "
                    Complaint : " . $row['complaint'] . "
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
