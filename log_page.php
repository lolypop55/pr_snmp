<?php //comment for first commit @ bann p joke?>
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
                            <a href="logout.php">Logout</a>
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
                        <h2>Log page </h2>
						<h4>It show down! router only </h4>
                        <p>&nbsp;</p>
                        <div>
                            <h3>&nbsp;</h3><center>
							<button type="button" onclick="location.href = 'clear_log.php';" >Clear Log</button>
							<button type="button" onclick="location.href = 'export_log.php';" >Export Log</button>
							
							
							<?php
									$servername = "localhost";
									$username = "root";
									$password = "password";
									$dbname = "logon";

									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									}

									$sql = "SELECT router_name, router_ip, date, time FROM log";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										 // output data of each row
											echo "<br>";
										 while($row = $result->fetch_assoc()) {
											 echo "<br>". $row["router_name"]."\t".  $row["router_ip"]."\t". $row["date"] ."\t". $row["time"]. "<br>";
										 }
									} else {
										echo "<br> Non Log";
									}

									$conn->close();

							
						
                               

                                                   
?>
                                                    

                                         

                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </table>

                    </center>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>