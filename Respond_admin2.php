 <br>
  <a href="admin_page.php">Return</a><br> 
<?php

echo "In Respond 2";
$host = $_GET["Router_IP"];
$community = "public";
                
$sysDescr = snmpget("$host","$community","system.sysDescr.0");
$ifDescr = snmpwalk("$host","$community","interfaces.ifTable.ifEntry.ifDescr");
$ifIndex = snmpwalk("$host","$community","interfaces.ifTable.ifEntry.ifIndex");
$ifAdminStatus = snmpwalk("$host","$community","interfaces.ifTable.ifEntry.ifAdminStatus");
$ifOperStatus = snmpwalk("$host","$community","interfaces.ifTable.ifEntry.ifOperStatus");
$ifLastChange = snmpwalk("$host","$community","interfaces.ifTable.ifEntry.ifLastChange");
                                     
print "<table border=1 bgcolor=#ffffff><tr><td>$host</td></tr></table><br>";
//print "<table border=1 bgcolor=#ffffff><tr><td>$sysDescr</td></tr></table><br>";
print "<table border=1 bgcolor=#ffffff>";
print "<tr>
        <td>** Detail Your Rounter **</td>
        </tr>";
            
for ($i=0; $i<count($ifIndex); $i++) {
        print "<tr>";
        print "<td>$ifIndex[$i]</td>";

        print "</tr>";
}           
print "</table>";
  
?>
