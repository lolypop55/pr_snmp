<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
    mysql_connect("localhost", "root", "password");
    mysql_select_db("logon");
    isset($_GET['id']) ? $userId = $_GET['id'] : $userId = NULL;
    $userId = stripcslashes($userId);
    $userId = mysql_real_escape_string($userId);
    $query = "SELECT * FROM admin where USER_ID = $userId";
    $result = mysql_query($query);
    $rows = mysql_fetch_array($result);
?>  

<html>

    <head>
        <meta charset="UTF-8">
        <title>Fineminds Marketing Solutions Website Template</title>
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
                            <a href="admin_page.php">Home</a></li>
                        <li><a href="view.php">GET Router</a>
                        </li>
                        <li>
                            <a href="view_page.php">Manager USER</a>
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
                                <form name="form1" method="post" action="edit_u.php">
                                    Edit User<br>
                                    <table width="478" border="1" style="width: 600px">
                                        <tbody>  <tr>
                                                <td>&nbsp;User_ID</td>
                                                <td><input type="text" name="User_ID" id="User_ID" placeholder="<?php echo $rows['User_ID']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td width="157"> &nbsp;Username</td>
                                                <td width="305"><input type="text" name="Username" id="Username" placeholder="<?php echo $rows['Username']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td width="157"> &nbsp;Name</td>
                                                <td width="305"><input type="text" name="Name" id="Name" placeholder="<?php echo $rows['Name']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td width="157"> &nbsp;Status</td>
                                                <td width="305"><input type="text" name="Status" id="Status" placeholder="<?php echo $rows['Status']; ?>"></td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td width="157"> &nbsp;Password to Confirm edited</td>
                                                <td width="305"><input type="text" name="Password" id="Password" ></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <br>
                                    <input type="submit" name="Submit" value="Save">
                                    <input type="button" value="Cancle" onclick="window.location.href='view_page.php'">
                                </form>

                            </center>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>