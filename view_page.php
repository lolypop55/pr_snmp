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
                            <h3>&nbsp;</h3><center>
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

                                <table width="400" border="0" cellspacing="1" cellpadding="0">
                                    <tr>
                                        <td><form action="view_page.php" method="post" >
                                                <table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                                                    <tr>
                                                        <td bgcolor="#FFFFFF">&nbsp;</td>
                                                        <td colspan="4" bgcolor="#FFFFFF"><strong>Member</strong> </td>
                                                        <td bgcolor="#FFFFFF">
                                                    </tr>
                                                    <tr>
                                                        <td align="center" bgcolor="#FFFFFF">#</td>
                                                        <td align="center" bgcolor="#FFFFFF"><strong>User_ID</strong></td>
                                                        <td align="center" bgcolor="#FFFFFF"><strong>Username</strong></td>
                                                        <td align="center" bgcolor="#FFFFFF"><strong>Name</strong></td>
                                                        <td align="center" bgcolor="#FFFFFF"><strong>Status</strong></td>
                                                        <td align="center" bgcolor="#FFFFFF"><strong>Password</strong></td>
                                                    </tr>

                                                    <?php
                                                    while ($rows = mysql_fetch_array($result)) {
                                                        ?>

                                                        <tr>
                                                            <td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['User_ID'];?>"></td>
                                                            <td bgcolor="#FFFFFF"><?php echo $rows['User_ID']; ?></td>
                                                            <td bgcolor="#FFFFFF"><?php echo $rows['Username']; ?></td>
                                                            <td bgcolor="#FFFFFF"><?php echo $rows['Name']; ?></td>
                                                            <td bgcolor="#FFFFFF"><?php echo $rows['Status']; ?></td>
                                                            <td bgcolor="#FFFFFF"><?php echo $rows['Password']; ?></td>
                                                        </tr>

                                                        <?php
                                                    }
                                                    ?>

                                                    <tr>
                                                        <td colspan="4" align="left" bgcolor="#FFFFFF"><input name="add" type="submit" id="add" value="add">
                                                    <colspan="5" align="left" bgcolor="#FFFFFF"><input name="delete" type="submit" id="delete" value="delete">
                                                    </td><td bgcolor="#FFFFFF"><td bgcolor="#FFFFFF"</td>
                                                </tr>

                                                <?php
// Check if delete button active, start this    
                                                if (isset($_POST["delete"])){
                                                    $userList = $_POST["checkbox"];
                                                    for ($i=0; $i<count($userList);$i++){
                                                        $sql = "DELETE FROM $tbl_name WHERE User_ID='$userList[$i]'";
                                                        //$sql2 = "DROP TABLE $routerList[$i]";
                                                        $result = mysql_query($sql);
                                                        //$result2 = mysql_query($sql2);
                                                    }
                                                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=view_page.php\">";
                                                }
                                                if (isset($_POST["add"])) {
                                                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=add_user.php\">";
                                                }
                                                /*
                                                if ($delete) {
                                                    for ($i = 0; $i < $count; $i++) {
                                                        $del_id = $checkbox[$i];
                                                        $sql = "DELETE FROM $tbl_name WHERE User_ID='$del_id'";
                                                        $sql2 = "DROP TABLE $del_id";
                                                        $result = mysql_query($sql);
                                                        $result2 = mysql_query($sql2);
                                                    }
// if successful redirect to delete_multiple.php 
                                                    if ($result) {
                                                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=view_page.php\">";
                                                    }
                                                }
                                                        
                                                
                                                 
                                                */
                                                mysql_close();
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