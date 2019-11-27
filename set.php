<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = clean_data($_POST['name']);
        $priority = clean_data($_POST['priority']);
        $complaint = clean_data($_POST['complaint']);

        echo $name . " " . $priority . " " . $complaint;
        echo "<br>";

        sendToDB($name, $priority, $complaint);

    }
    
    function clean_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function sendToDB($name, $priority, $complaint)
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
            echo("Connection Successful");
            echo "<br>";
        }

        $sql = "INSERT INTO `complaints`(`name`, `priority`, `complaint`) VALUES ( '$name', $priority, '$complaint' )";

        if ($conn->query($sql) === TRUE)
        {
            echo "New record added successfully";
            echo "<br>";
        }
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<br>";
        }
        $conn->close();
    }

?>
