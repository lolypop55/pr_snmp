<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
header("Refresh: 3;");
print_r ($_SESSION);


?>

</body>
</html>