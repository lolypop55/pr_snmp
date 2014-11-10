<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com ���� �������ǹ������� -->
<?php
$isDown = FALSE;
date_default_timezone_set("Asia/Bangkok");
$myfile = fopen("logfile.txt", "a") or die("Unable to open file!");

header("Refresh: 5;");

function myErrorHandler($errno, $errstr, $errfile, $errline) {
    global $isDown;
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }
    if ($errno == 2) {
        $isDown = TRUE;
    }
}
?>
<script>
    function refreshss(){
        var s = document.getElementById("timeRefresh");

        var time = s.options[s.selectedIndex].value * 60000;
        
        setInterval(function(){
            location.href = "admin_page.php";
        },time);
        alert();
    }
</script>
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
                                $tbl_name = "router"; // Table name 
                                // Connect to server and select databse.
                                //=========================================
                                mysql_connect("$host", "$username", "$password")or die("cannot connect");
                                mysql_select_db("$db_name")or die("cannot select DB");

                                $sql = "SELECT * FROM $tbl_name";
                                $result = mysql_query($sql);

                                $count = mysql_num_rows($result);
                                //=========================================
                                ?>

                                <table width="400" border="0" cellspacing="1" cellpadding="0">
                                    <tr>
                                        <td><form action="admin_page5.php" method="post" >
                                                <table width="950" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                                                    <tr>
                                                        <td width="20" bgcolor="#FFFFFF">&nbsp;</td>
                                                        <td colspan="3" bgcolor="#FFFFFF"><strong>Router DB</strong> </td>
                                                        <td bgcolor="#FFFFFF" colspan="6"><strong>Router Status</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" bgcolor="#FFFFFF">#</td>
                                                        <td width="73" align="center" bgcolor="#FFFFFF"><strong>Router_ID</strong></td>
                                                        <td width="95" align="center" bgcolor="#FFFFFF"><strong>Router_Name</strong></td>
                                                        <td width="70" align="center" bgcolor="#FFFFFF"><strong>Router_IP</strong></td>
                                                        <td width="55" align="center" bgcolor="#FFFFFF"><strong>Remark</strong></td>
                                                        <td width="57" align="center" bgcolor="#FFFFFF"><strong>System Descript</strong></td>
                                                        <td width="48" align="center" bgcolor="#FFFFFF"><strong>Uptime</strong></td>
                                                        <td width="53" align="center" bgcolor="#FFFFFF"><strong>System Name</strong></td>
                                                        <td width="58" align="center" bgcolor="#FFFFFF"><strong>System Location</strong></td>
                                                        <td width="72" align="center" bgcolor="#FFFFFF"><strong>Status</strong></td>
                                                    </tr>

                                                    <?php
                                                    set_error_handler("myErrorHandler");

                                                    while ($rows = mysql_fetch_array($result)) {
                                                        $snmpSysDescr = null;
                                                        $snmpSysUptime = null;
                                                        $snmpSysName = null;
                                                        $snmpSysLocation = null;
                                                        $snmpSysDescr = snmpwalk($rows['Router_IP'], $rows['String'], "1.3.6.1.2.1.1.1");
                                                        if (!$isDown) {
                                                            $snmpSysUptime = snmpget($rows['Router_IP'], $rows['String'], "sysUpTime.0");
		                                                    $snmpSysName = snmpwalk($rows['Router_IP'], $rows['String'], "1.3.6.1.2.1.1.5");
                                                            $snmpSysLocation = snmpwalk($rows['Router_IP'], $rows['String'], "1.3.6.1.2.1.1.6");
                                                        }
                                                        ?>

                                                        <tr>
                                                            <td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['Router_Name']; ?>"></td>
                                                            <td bgcolor="#FFFFFF"><?php echo $rows['Router_ID']; ?></td>
                                                            <td bgcolor="#FFFFFF"><?php echo $rows['Router_Name']; ?></td>
                                                            <td bgcolor="#FFFFFF"><?php echo $rows['Router_IP']; ?></td>
                                                            <td bgcolor="#FFFFFF"><?php echo $rows['Remark']; ?></td>                                                
                                                            <td bgcolor="#FFFFFF"><?php if ($isDown)
                                                        echo "---";
                                                    else{
														$val = explode(":", $snmpSysDescr[0]);
                                                        echo $val[1];
													}
                                                        ?></td>
                                                            <td bgcolor="#FFFFFF"><?php if ($isDown){
                                                                echo "---";
																$txt = $rows['Router_Name']."\t".$rows['Router_IP']."\t".date("Y-m-d")."\t".date("h:i:sa");
																fwrite($myfile, $txt.PHP_EOL);
																$var1 = $rows['Router_Name'];
																$var2 = $rows['Router_IP'];
																$var3 = date("Y-m-d");
																$var4 = date("h:i:sa");
																$servername = "localhost";
																$username = "root";
																$password = "password";
																$dbname = "logon";

																// Create connection
																$conn = new mysqli($servername, $username, $password, $dbname);
																$sql="INSERT INTO log (router_name, router_ip, date,time)
																VALUES('$var1','$var2','$var3','$var4')";
																if ($conn->query($sql) === TRUE) {
																	} else {
																	echo "Error: " . $sql . "<br>" . $conn->error;
																}
														}else{
																
																echo $snmpSysUptime;
																}
                                                                ?></td>
                                                            <td bgcolor="#FFFFFF"><?php if ($isDown){
                                                                echo "---";
																}else
                                                                echo eregi_replace("STRING:","",$snmpSysName[0]);
                                                            ?></td>
                                                            <td bgcolor="#FFFFFF"><?php if ($isDown)
                                                    echo "---";
                                                else
                                                    echo eregi_replace("STRING:","",$snmpSysLocation[0]);
                                                    ?></td-->
                                                            <td bgcolor="#FFFFFF"><?php if ($isDown)
                                                    echo "<img src=\"images/Offline.png\" height=\"16\" width=\"16\">";
                                                else
                                                    echo "<img src=\"images/Online.png\" height=\"16\" width=\"16\">"
                                                    ?></td>
                                                        </tr>

														<?php
														$isDown = FALSE;
													}
													?>

                                                    <tr>
                                                        <td colspan="4" align="left" bgcolor="#FFFFFF">
                                                            <input name="add" type="submit" id="add" value="Add">
                                                            <input name="delete" type="submit" id="delete" value="Delete">
                                                        </td>
                                                        <td colspan="6" align="left" bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="10" align="left" bgcolor="#FFFFFF">Refresh Every 
                                                            <select name="timeRefresh" id="timeRefresh">

                                                                
                                                                <option value="5">5 Sec.</option>
																<option value="3">3 Sec.</option>
                                                                <option value="10">10 Sec.</option>

                                                            </select><input name="refresh" type="submit" value="Refresh" /></td>
                                                    </tr>

                                                    <?php
                                                    // Check if delete button active, start this
                                                    //==========================================
                                                    if (isset($_POST["delete"])) {
                                                        $routerList = $_POST["checkbox"];
                                                        for ($i = 0; $i < count($routerList); $i++) {
                                                            $sql = "DELETE FROM $tbl_name WHERE Router_Name='$routerList[$i]'";
                                                            $sql2 = "DROP TABLE $routerList[$i]";
                                                            $result = mysql_query($sql);
                                                            $result2 = mysql_query($sql2);
                                                        }
                                                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_page5.php\">";
                                                    }
                                                    /* ($delete) {
                                                      for ($i = 0; $i < $count; $i++) {
                                                      $del_id = $checkbox[$i];
                                                      $sql = "DELETE FROM $tbl_name WHERE Router_Name='$del_id'";
                                                      $sql2 = "DROP TABLE $del_id";
                                                      $result = mysql_query($sql);
                                                      $result2 = mysql_query($sql2);
                                                      }
                                                      // if successful redirect to delete_multiple.php
                                                      if ($result) {
                                                      echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_page.php\">";
                                                      }
                                                      } */
                                                    if (isset($_POST["add"]))
                                                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=add_router.php\">";

													if (isset($_POST["refresh"])){
                                                        echo "EIEI!";
														$ro = $_POST["timeRefresh"];
														if ($ro==10)
															echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_page10.php\">";
														if ($ro==5)
															echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_page5.php\">";
														if ($ro==3)
															echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_page3.php\">";

													}
                                                    mysql_close();
													fclose($myfile);
                                                    //==========================================
                                                    ?>

                                                </table>
                                            </form>
                                        </td>
                                    </tr>
                                </table>

                            </center>
                            <center>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
