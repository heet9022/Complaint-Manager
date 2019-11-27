<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <h2>Admin Login</h2>
        <form action = "adminLogin.php" method="POST">
            Username: <input placeholder = "admin" type="text" name = "uname">
            <br/>
            Password: <input placeholder="compensationMaaf" type="text" name = "psw">
            <br>
            <button type="submit">SUBMIT</button>
        </form>
        Do you have any complaints? <a href = "complaint.html" >Go to the complaints page</a>
        <br>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $uname = clean_data($_POST['uname']);
                $psw = clean_data($_POST['psw']);
        
                if(($uname === "admin") && ($psw === "compensationMaaf"))
                {
                    echo "Login success";
                    header("Location: http://localhost/complaint-Manager/dashboard.php", true, 301);
                    exit();
                }
                else
                {
                    echo "Login Fail";
                }
        
            }
            function clean_data($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>

    </body>
</html>

