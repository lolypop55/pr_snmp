<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>


    <head>
        <meta charset="UTF-8">
        <title>SNMP MANAGER</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div class="border">
            <div id="bg">
                background
            </div>
            <div class="page">
                <div class="sidebar">
                    <a href="index.html" id="logo"><img src="images/logo223.png" alt="logo"></a>
                    <ul>
                        <li class="selected">
                            <a href="admin_page5.php">Home</a></li>
                        <li><a href="view.php">GET Router</a>
                        </li>
                        <li>
                            <a href="view_page.php">Manager USER</a>
                        </li>
						<li>
                            <a href="upload.html">Your Topology</a>
                        </li>
						<li>
                            <a href="log_page.php">Log File</a>
                        </li>
                        <li>
                            <a href="logout.php">LOgout</a>
                        </li>
                        <li></li>
                    </ul>
                    <form action="about.html">
                        <span>Newsletter Signup</span>
                        <input type="text" onClick="this.value = '';" onFocus="this.select()" onBlur="this.value = !this.value ? 'Enter Valid Email Address' : this.value;" value="Enter Valid Email Address">
                        <input type="submit" id="submit" value="submit">
                    </form>
                    <div class="connect">
                        <a href="http://freewebsitetemplates.com/go/facebook/" id="facebook">facebook</a> <a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">twitter</a> <a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">youtube</a>
                    </div>
                    <p>
                        Copyright 2023
                    </p>
                    <p>
                        Fineminds Marketing Solutions
                    </p>
                </div>
                <div class="body">
                    <div>
                        <h2>Welcome to Admin Page! </h2>
                        <p>&nbsp;</p>
                        <div>
                            <h3>&nbsp;</h3>

                            <?php
                            $host = "localhost"; // Host name 
                            $username = "root"; // Mysql username 
                            $password = "password"; // Mysql password 
                            $db_name = "logon"; // Database name 
                            $tbl_name = "admin"; // Table name 
// Connect to server and select databse.
                            mysql_connect("$host", "$username", "$password")or die("cannot connect");
                            mysql_select_db("$db_name")or die("cannot select DB");

                            $sql = "SELECT * FROM $tbl_name";
                            $result = mysql_query($sql);

                            $count = mysql_num_rows($result);
                            ?>
                            <?php //echo $_GET["Router_IP"]; ?>
                            <?php include "new_respon.php"; ?>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>