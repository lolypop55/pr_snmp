<br>
<a href="admin_page.php">Return</a><br> 
<?php
$host = $_GET["Router_IP"];
$community = "public";
echo "in new page $host";

//================================ OLD CODE ================================  

$a = snmpwalk("192.168.0.1", "public", "1.3.6.1.2.1.1.1"); 
$b = snmpwalk("192.168.0.1", "public", "1.3.6.1.2.1.1.3.0"); 
$c = snmpwalk("192.168.0.1", "public", "1.3.6.1.2.1.1.5"); 
$d = snmpwalk("192.168.0.1", "public", "1.3.6.1.2.1.1.6"); 


print "<table border=1 bgcolor=#ffffff><tr><td>$host</td></tr></table><br>";
//print "<table border=1 bgcolor=#ffffff><tr><td>$sysDescr</td></tr></table><br>";
print "<table border=1 bgcolor=#ffffff>";
print "<tr>
        <td>** Detail Your Rounter **</td>
        </tr>";
print "<tr>";
print "<td>$sysDescr</td>";
print "</tr>";
foreach ($a as $val) {
    echo "$val\n";
	 echo "<br>";
}
foreach ($b as $val) {
    echo "$val\n";
	 echo "<br>";
}
foreach ($c as $val) {
    echo "$val\n";
	 echo "<br>";
}
foreach ($d as $val) {
    echo "$val\n";
	 echo "<br>";
}
print "</table>";



?>
