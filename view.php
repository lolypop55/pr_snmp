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
                            <form id="form1" name="form1" method="post" action="">
                                <select name="catalog" id="catalog"onChange="location.href = 'show_user.php?Router_IP=' + this.value;" style="width:200px">
                                    <option value="">- Choose -</option>
                                    <?php
                                    $host = "localhost";
                                    $user = "root";
                                    $password = "password";
                                    $dbname = "logon";
                                    $connection = mysql_connect($host, $user, $password) or die("àª×èÍÁµèÍ°Ò¹¢éÍÁÙÅäÁèä´é");
                                    mysql_select_db($dbname) or die("äÁèÊÒÁÒÃ¶àÅ×Í¡°Ò¹¢éÍÁÙÅä´é");
                                    $sql = "select * from router order by Router_ID ASC";
                                    $dbquery = mysql_db_query($dbname, $sql);
                                    var_dump($dbquery);
                                    while ($result = mysql_fetch_array($dbquery)) {
                                        if ($Router_ID == $result[Router_Name]) { 
                                            ?>
                                            <option value="<?php echo $result["Router_IP"]; ?>" selected="selected"><?php echo $result["Router_Name"]; ?></option>
                                            <?php
                                            }else{?>
                                            <option value="<?php echo $result["Router_IP"]; ?>"><?php echo $result["Router_Name"]; ?></option>

                                    <?php
                                    } }
                                    ?>
                                </select>
                                <br />
                                <br />

                            </form>


                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>